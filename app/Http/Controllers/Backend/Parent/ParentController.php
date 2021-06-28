<?php

namespace App\Http\Controllers\Backend\Parent;

use DB;
use Hash;
use Validator;
use App\Models\User;
use App\Models\ParentModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parents = ParentModel::select('users.*', 'parents.id AS id', 'students.student_name')
                                ->join('users', 'users.id', '=', 'parents.user_id')
                                ->where('parents.status', 0)
                                ->leftJoin('students', 'parents.id', '=', 'students.parent_id')
                                ->orderBy('parents.id', 'DESC')->get();

        return view('backend.parents.parent-list', compact('parents'));
    }

    public function get_parents() {
		$parents = [];
		if( ! isset($_GET['term'])){
			$parents = ParentModel::select('id','parent_name as text')
					   ->orderBy('parents.id', 'DESC')
					   ->get();
		}else{
			$parents = ParentModel::select('id','parent_name as text')
				   ->where('parents.parent_name','like', '%'.$_GET['term'].'%')
				   ->orderBy('parents.id', 'DESC')
				   ->get();
		}
		echo json_encode($parents);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if( ! $request->ajax()){
		   return view('backend.parents.parent-add');
		}else{
           return view('backend.parents.modal.create');
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parent_name' => 'required|string|max:191',
            'f_name' => 'required|string|max:191',
            'm_name' => 'required',
            'f_profession' => 'nullable|string|max:191',
            'm_profession' => 'nullable|string|max:191',
            'phone' => 'numeric',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($validator->fails()) {
			if($request->ajax()){
			    return response()->json(['result'=>'error','message'=>$validator->errors()->all()]);
			}else{
				return redirect('dashboard/parents/create')
							->withErrors($validator)
							->withInput();
			}
		}

        $ImageName='profile.png';
        if ($request->hasFile('image')){
             $image = $request->file('image');
             $ImageName = Str::uuid() . '.' .$image->getClientOriginalExtension();
             $image->move('images/parents/', $ImageName);
        }

        $request->role = 4;

        $user = new User;
        $user->user_name = $request->parent_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password =  Hash::make($request->password);
        if ($request->hasFile('image')) {
            $user->photo = 'parents/' . $ImageName;
        }else {
            $user->photo = $ImageName;
        }
        $user->save();
        $user->attachRole($request->role);

        $parent = new ParentModel();
        $parent->user_id = $user->id;
		$parent->parent_name = $request->parent_name;
        $parent->f_name = $request->f_name;
        $parent->m_name = $request->m_name;
        $parent->f_profession = $request->f_profession;
        $parent->m_profession = $request->m_profession;
        $parent->phone = $request->phone;
        $parent->address = $request->address;
        $parent->save();

		if(! $request->ajax()){
           return redirect()->route('parents.index')->with('success','Information has been added');
        }else{
		   return response()->json(['result'=>'success','action'=>'store','message'=> 'Information has been added sucessfully','data'=>$parent]);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parent = ParentModel::select('*', 'parents.id as id', 'users.photo', 'parents.phone', 'parents.address')
                    ->join('users', 'users.id', '=', 'parents.user_id')
					 ->leftJoin('students','parents.id','=','students.parent_id')
                     ->leftJoin('student_sessions','students.id','=','student_sessions.student_id')
                     ->leftJoin('courses','courses.id','=','student_sessions.course_id')
                     ->leftJoin('sections','sections.id','=','student_sessions.section_id')
                     ->where('parents.id', $id)->first();

        return view('backend.parents.parent-view', compact('parent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parent = ParentModel::select('*','parents.id AS id')
                                ->join('users','users.id','=','parents.user_id')
                                ->where('parents.id',$id)->first();

        return view('backend.parents.parent-edit', compact('parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parent = ParentModel::find($id);
        $this->validate($request, [
            'parent_name' => 'required|string|max:191',
            'f_name' => 'required|string|max:191',
            'm_name' => 'required',
            'f_profession' => 'nullable|string|max:191',
            'm_profession' => 'nullable|string|max:191',
            'phone' => 'string',
            'email' => [
                'required',
                Rule::unique('users')->ignore($parent->user_id),
            ],
            'password' => 'nullable|min:6|confirmed',
			'image' => 'nullable|max:5120',
        ]);

		$parent->parent_name = $request->parent_name;
        $parent->f_name = $request->f_name;
        $parent->m_name = $request->m_name;
        $parent->f_profession = $request->f_profession;
        $parent->m_profession = $request->m_profession;
        $parent->phone = $request->phone;
        $parent->address = $request->address;
        $parent->update();

        $user = User::find($parent->user_id);
        $user->user_name = $request->parent_name;
        $user->email = $request->email;
		$user->phone = $request->phone;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('image')){
             $image = $request->file('image');
             $ImageName = Str::uuid() . '.' .$image->getClientOriginalExtension();
             $image->move('public/images/parents/', $ImageName);
             $user->photo = 'parents/'. $ImageName;
        }
        $user->update();

        return redirect()->route('parents.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent = ParentModel::findOrFail($id);
        DB::table('role_user')->where('user_id', $parent->user_id)->delete();
        $user = User::find($parent->user_id);
        
        $parent->delete();
        $user->delete();

        return redirect()->route('parents.index')->with('success', 'Information has been deleted');
    }
}
