<?php

namespace App\Http\Controllers\Backend\Support;

use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\Course;
use App\Models\Picklist;
use App\Models\Section;
use App\Models\Subject;
use App\Models\StudentRequest;
use Illuminate\Support\Str;
use App\Models\Notification;
use App\Models\ParentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_subject(Request $request)
    {
        $results = Subject::where('course_id', $request->course_id)->orderBy('id', 'DESC')->get();
        $subjects = '';
        $subjects .= '<option value="">Select One</option>';
        foreach($results as $data){
            $subjects .= '<option value="'.$data->id.'">'.$data->subject_name.'</option>';
        }
        return $subjects;
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
		   return view('backend.requests.parents.parent-create');
		}else{
           return view('backend.requests.parents.modal.parent-create');
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
            'phone' => 'required|numeric',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($validator->fails()) {
			if($request->ajax()){
			    return response()->json(['result'=>'error','message'=>$validator->errors()->all()]);
			}else{
				return redirect('dashboard/student/requests/create')
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

        $request->role = 7;

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
        
        // Student request
        $requestStudent = new StudentRequest;
        $requestStudent->slug = Str::uuid();
        $requestStudent->author_id = Auth::user()->id;
        $requestStudent->type = 'Parent';
        $requestStudent->status = 1;
        $requestStudent->save();
        
        $users = User::select('*','users.id AS id')
                        ->join('role_user', 'role_user.user_id', '=', 'users.id')
                        ->orWhere('role_user.role_id', 6)
                        ->orWhere('role_user.role_id', 1)->get();
        foreach ($users as $data) {
            $notification = new Notification;
            $notification->user_id = $data->id;
            $notification->title = 'You have one request For Parent.';
            $notification->message = Auth::user()->user_name . "has been sent you a request for Parent.";
            $notification->address = route('user_requests.index');
            $notification->save();
        }


		if(! $request->ajax()){
           return redirect()->route('user_requests.index')->with('success','Information has been added');
        }else{
		   return response()->json(['result'=>'success','action'=>'store','message'=> 'Information has been added sucessfully','data'=>$parent]);
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_section(Request $request)
    {
        $results = Section::where('course_id',$request->course_id)->get();
        $sections = '';
        $sections .= '<option value="">'. 'Select One'.'</option>';
        foreach($results as $data){
            $sections .= '<option value="'.$data->id.'">'.$data->section_name.'</option>';
        }
        return $sections;
    }

    public function get_students( $course_id="", $section_id="" ){
		if($course_id != "" && $section_id != ""){
		   $students = \App\Models\Student::join('student_sessions','students.id','=','student_sessions.student_id')
					   ->where('student_sessions.session_id', get_option('academic_years'))
					   ->where('student_sessions.course_id', $course_id)
					   ->where('student_sessions.section_id', $section_id)->get();

		   return json_encode($students);
		}
	}

    public function get_users( $user_type="" ){
		if( $user_type != "" ){
		   $users = User::select('users.*', 'users.id as id')
   						->join('role_user', 'role_user.user_id', '=', 'users.id')
   						->join('roles', 'roles.id', '=', 'role_user.role_id')
                        ->where("roles.display_name", $user_type)->get();
		   return json_encode($users);
		}
	}
}
