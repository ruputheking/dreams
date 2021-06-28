<?php

namespace App\Http\Controllers\Backend\Student;

use DB;
use Auth;
use Hash;
use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\Section;
use App\Models\StudentSession;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $students = array();
        $class = "";

        return view('backend.students.index', compact('students','class'));
    }

    public function class($class='')
    {
        $students = Student::select('*', 'students.id', 'students.student_name', 'students.photo as photo')
                            ->join('users', 'users.id', '=', 'students.author_id')
                            ->join('student_sessions','students.id','=','student_sessions.student_id')
                            ->join('courses','courses.id','=','student_sessions.course_id')
                            ->join('sections','sections.id','=','student_sessions.section_id')
                            ->where('student_sessions.session_id',get_option('academic_years'))
                                ->where('student_sessions.course_id',$class)
                                ->where('students.status', 0)
                            ->orderBy('students.id', 'desc')->get();

        return view('backend.students.index', compact('students', 'class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::orderBy('id', 'DESC')->get();
        return view('backend.students.student-add', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'birthday' => 'required',
            'guardian' => 'required',
            'gender' => 'required|string|max:10',
            'religion' => 'required|string|max:20',
            'phone' => 'string|max:20',
            'passport' => 'nullable|unique:students',
            'citizenship_no' => 'nullable|unique:students',
            'class' => 'required',
            'section' => 'required',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|max:5120',
            'blood_group' => 'required'
        ]);

        $request->role = 3;

        $ImageName='profile.png';
        if ($request->hasFile('image')){
             $image = $request->file('image');
             $ImageName = Str::uuid() . '.' .$image->getClientOriginalExtension();
             $image->move('frontend/images/students/', $ImageName);
        }

        $user = new User;
        $user->user_name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password =  Hash::make($request->password);
        if ($request->hasFile('image')) {
            $user->photo = 'students/' . $ImageName;
        }else {
            $user->photo = $ImageName;
        }
        $user->save();
        $user->attachRole($request->role);

        $student = new Student;
        $student->author_id = $user->id;
        $student->student_name = $request->name;
        $student->birthday = $request->birthday;
        $student->gender = $request->gender;
        $student->religion = $request->religion;
        $student->phone = $request->phone;
        $student->parent_id = $request->guardian;
        $student->passport = $request->passport;
        $student->citizenship_no = $request->citizenship_no;
        $student->address = $request->address;
        $student->blood_group = $request->blood_group;
        $student->remarks = $request->remarks;
        if ($request->hasFile('image')) {
            $student->photo = 'students/' . $ImageName;
        }else {
            $student->photo = $ImageName;
        }
        $student->save();

        //Create Student Session Information
        $studentSession = new StudentSession;
        $studentSession->student_id = $student->id;
        $studentSession->course_id = $request->class;
        $studentSession->section_id = $request->section;
        $studentSession->session_id = get_option('academic_years');
        $studentSession->save();

        return back()->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::select('*' ,'students.phone', 'students.address')->join('users','users.id','=','students.author_id', 'students.photo as photo')
                            ->join('student_sessions','students.id','=','student_sessions.student_id')
                            ->join('courses','courses.id','=','student_sessions.course_id')
                            ->join('sections','sections.id','=','student_sessions.section_id')
                            ->join('parents', 'parents.id', '=', 'students.parent_id')
                            ->where('student_sessions.session_id',get_option('academic_years'))
                            ->where('students.id',$id)->first();

        if ($student) {
            return view('backend.students.student-view',compact('student'));
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
        $data=[
            'courses' => Course::orderBy('id', 'DESC')->get(),
            'sections' => Section::orderBy('id', 'DESC')->get(),
            'student' => Student::join('users','users.id','=','students.author_id')
                                ->join('student_sessions','students.id','=','student_sessions.student_id', 'students.photo as photo')
                                ->select('*','students.id as id','student_sessions.id as ss_id')
                                ->where('student_sessions.session_id',get_option('academic_years'))
                                ->where('students.id',$id)->first(),
        ];
        if ($data['student']) {
            return view('backend.students.student-edit',$data);
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
        $student = Student::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'guardian' => 'required',
            'birthday' => 'required',
            'gender' => 'required|string|max:10',
            'religion' => 'required|string|max:20',
            'passport' => ['nullable', Rule::unique('students')->ignore($id)],
            'citizenship_no' => ['nullable', Rule::unique('students')->ignore($id)],
            'phone' => 'string|max:20',
            'class' => 'required',
            'section' => 'required',
            'blood_group' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($student->author_id),
            ],
            'password' => 'nullable|min:6|confirmed',
            'image' => 'nullable|image|max:5120',
        ]);


        if ($request->hasFile('image')){
             $image = $request->file('image');
             $ImageName = Str::uuid().'.'.$image->getClientOriginalExtension();
             $image->move('frontend/images/students/', $ImageName);
        }

        $student->parent_id = $request->guardian;
        $student->student_name = $request->name;
        $student->birthday = $request->birthday;
        $student->gender = $request->gender;
        $student->religion = $request->religion;
        $student->phone = $request->phone;
        $student->passport = $request->passport;
        $student->citizenship_no = $request->citizenship_no;
        $student->address = $request->address;
        $student->blood_group = $request->blood_group;
        $student->remarks = $request->remarks;
        if ($request->hasFile('image')) {
            $student->photo = 'students/' . $ImageName;
        }
        $student->update();

		//Update Student Session Information
		$studentSession = StudentSession::find($request->ss_id);
		$studentSession->student_id = $student->id;
		$studentSession->course_id = $request->class;
		$studentSession->section_id = $request->section;
        $studentSession->session_id = get_option('academic_years');
		$studentSession->update();

        $user = User::find($student->author_id);
        $user->user_name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('iamge')) {
            $user->image = 'students/' . $ImageName;
        }
        $user->update();

        return redirect()->back()->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$student = Student::findOrFail($id);
        if ($student) {
            DB::table('assign_students')->where('assign_students.student_id', $student->id)->delete();
            DB::table('student_assignments')->where('student_assignments.student_id', $student->id)->delete();
            DB::table('student_attendances')->where('student_attendances.student_id', $student->id)->delete();
            DB::table('student_sessions')->where('student_sessions.student_id', $student->id)->delete();
            DB::table('role_user')->where('role_user.user_id', $student->author_id)->delete();
            $user = User::find($student->author_id);
            $student->delete();
            $user->delete();

            return redirect()->back()->with('success', 'Information has been deleted');
        }else {
            return back()->with('error', "You don't have permission");
        }
    }

	public function get_subjects( $course_id="" ){
		if($course_id != ""){
		   $subjects = Subject::where('course_id', $course_id)->get();
		   $options = '';
		   $options .= '<option value="">'.'Select One'.'</option>';
		   foreach($subjects as $subject){
			   $options .= '<option value="'.$subject->id.'">'.$subject->subject_name.'</option>';
		   }
		   return $options;
		}
	}
}
