<?php

namespace App\Http\Controllers\Backend\Teacher;

use DB;
use App\Models\User;
use App\Models\Teacher;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::select('*','teachers.id AS id', 'teachers.phone', 'teachers.address')
                            ->join('users','users.id','=','teachers.author_id')
                            ->orderBy('teachers.id', 'DESC')->get();

        return view('backend.teachers.teacher-list', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.teachers.teacher-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'birthday' => 'required',
            'gender' => 'required|string|max:191',
            'religion' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
			'address' => 'required',
            'joining_date' => 'required',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|max:5120',
        ]);

        $ImageName='profile.png';
        $request->role = 2;
        if ($request->hasFile('image')){
             $image = $request->file('image');
             $ImageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
             $image->move('frontend/images/teachers/', $ImageName);
        }
        $user = new User;
        $user->user_name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password =  Hash::make($request->password);
        if ($request->hasFile('image')) {
            $user->photo = 'teachers/' . $ImageName;
        }else {
            $user->photo = $ImageName;
        }
        $user->save();
        $user->attachRole($request->role);

        $teacher = new Teacher;
        $teacher->author_id = $user->id;
        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->email = $request->email;
        $teacher->religion = $request->religion;
        $teacher->birthday = $request->birthday;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->joining_date = $request->joining_date;
        if ($request->hasFile('image')) {
            $teacher->photo = 'teachers/' . $ImageName;
        }else {
            $teacher->photo = $ImageName;
        }
        $teacher->save();

        return redirect()->route('teachers.create')->with('success', 'Information has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::select('*','teachers.id AS id', 'teachers.address', 'teachers.phone')
                            ->join('users','users.id','=','teachers.author_id')
                            ->where('teachers.id',$id)->first();

        if ($teacher) {
            return view('backend.teachers.teacher-view',compact('teacher'));
        }else {
            return back()->with('error', "You don't have permission");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::select('*','teachers.id AS id', 'teachers.phone', 'teachers.address')
                            ->join('users','users.id','=','teachers.author_id')
                            ->where('teachers.id', $id)->first();
        if ($teacher) {
            return view('backend.teachers.teacher-edit', compact('teacher'));
        }else {
            return back()->with('error', "You don't have permission");
        }
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
        $teacher = Teacher::find($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'birthday' => 'required',
            'gender' => 'required|string|max:191',
            'religion' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'address' => 'required',
            'joining_date' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($teacher->author_id),
            ],
            'password' => 'nullable|min:6|confirmed',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')){
             $image = $request->file('image');
             $ImageName = Str::uuid() . '.' .$image->getClientOriginalExtension();
             $image->move('frontend/images/teachers/', $ImageName);
        }

        $teacher->name = $request->name;
        $teacher->birthday = $request->birthday;
        $teacher->gender = $request->gender;
        $teacher->religion = $request->religion;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->address = $request->address;
        $teacher->joining_date = $request->joining_date;
        if ($request->hasFile('image')) {
            $user->photo = 'teachers/'.$ImageName;
        }
        $teacher->update();

        $user = User::find($teacher->author_id);
        $user->user_name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('image')) {
            $user->photo = 'teachers/'.$ImageName;
        }
        $user->update();

        return redirect()->route('teachers.index')->with('success', 'Information has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        DB::table('assign_subjects')->where('assign_subjects.teacher_id', $teacher->id)->delete();
        DB::table('staff_attendances')->where('staff_attendances.user_id', $teacher->author_id)->delete();
        DB::table('role_user')->where('role_user.user_id', $teacher->author_id)->delete();
        $user = User::find($teacher->author_id);
        $teacher->delete();
        $user->delete();

        return redirect()->route('teachers.index')->with('success', 'Information has been deleted.');
    }
}
