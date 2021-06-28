<?php

namespace App\Http\Controllers\Backend\Request;

use Auth;
use App\Models\User;
use App\Models\Student;
use App\Models\Section;
use App\Models\ParentModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\StudentRequest;
use App\Models\StudentSession;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        if (Auth::user()->roles()->first()->name == 'user')
        {
            $students = StudentRequest::select('*', 'student_requests.id as id', 'student_requests.slug as slug', 'student_requests.status as status', 'students.photo as photo')
                                    ->join('students', 'students.author_id', '=', 'student_requests.author_id')
                                    ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                                    ->join('courses', 'courses.id', '=', 'student_sessions.course_id')
                                    ->join('parents', 'parents.id', '=', 'students.parent_id')
                                        ->where('student_requests.type', 'Student')
                                        ->where('student_requests.author_id', Auth::user()->id)
                                    ->orderBy('student_requests.id', 'desc')->get();
                                    
        }else {
            $students = StudentRequest::select('*', 'student_requests.id as id', 'student_requests.slug as slug', 'students.photo as photo', 'student_requests.status as status')
                                    ->join('students', 'students.author_id', '=', 'student_requests.author_id')
                                    ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                                    ->join('courses', 'courses.id', '=', 'student_sessions.course_id')
                                    ->join('parents', 'parents.id', '=', 'students.parent_id')
                                        ->where('student_requests.type', 'Student')
                                    ->orderBy('student_requests.id', 'desc')->get();
        }
        
                                    
        return view('backend.requests.student-index', compact('students'));
    }
    
    public function create()
    {
        $student = StudentRequest::where('author_id', Auth::user()->id)->first();
        if (!$student)
        {
            $sections = Section::orderBy('id', 'DESC')->get();
            return view('backend.requests.student-create', compact('sections'));
        }else
        {
            return redirect()->back()->with('error', "You have been Already Requested");
        }
        
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'birthday' => 'required',
            'guardian' => 'nullable',
            'gender' => 'required|string|max:10',
            'religion' => 'required|string|max:20',
            'phone' => 'string|max:20',
            'passport' => 'nullable|unique:students',
            'citizenship_no' => 'nullable|unique:students',
            'class' => 'required',
            'section' => 'required',
            'image' => 'required|image|max:5120',
            'blood_group' => 'required'
        ]);
        
        $ImageName='profile.png';
        if ($request->hasFile('image')){
             $image = $request->file('image');
             $ImageName = Str::uuid() . '.' .$image->getClientOriginalExtension();
             $image->move('frontend/images/students/', $ImageName);
        }

        $student = new Student;
        $student->author_id = Auth::user()->id;
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
        $student->status = 1;
        if ($request->hasFile('image')) {
            $student->photo = 'students/' . $ImageName;
        }else {
            $student->photo = $ImageName;
        }
        $student->save();
        
        // Student request
        $requestStudent = new StudentRequest;
        $requestStudent->slug = Str::uuid();
        $requestStudent->author_id = Auth::user()->id;
        $requestStudent->type = 'Student';
        $requestStudent->status = 1;
        $requestStudent->save();
        
        //Create Student Session Information
        $studentSession = new StudentSession;
        $studentSession->student_id = $student->id;
        $studentSession->course_id = $request->class;
        $studentSession->section_id = $request->section;
        $studentSession->session_id = get_option('academic_years');
        $studentSession->save();
        
        $users = User::select('*','users.id AS id')
                        ->join('role_user', 'role_user.user_id', '=', 'users.id')
                        ->orWhere('role_user.role_id', 6)
                        ->orWhere('role_user.role_id', 1)->get();
        foreach ($users as $data) {
            $notification = new Notification;
            $notification->user_id = $data->id;
            $notification->title = 'You have one request For Student.';
            $notification->message = Auth::user()->user_name . "has been sent you a request for Student.";
            $notification->address = route('user_requests.index');
            $notification->save();
        }

        return redirect()->route('user_requests.index')->with('success', 'Successfully requested for student');
    }
    
    public function show(Request $request, StudentRequest $studentRequest)
    {
        $student = StudentRequest::select('*', 'student_requests.id as id', 'students.address as address', 'students.photo as photo')
                                    ->join('students', 'students.author_id', '=', 'student_requests.author_id')
                                    ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                                    ->join('courses', 'courses.id', '=', 'student_sessions.course_id')
                                    ->join('parents', 'parents.id', '=', 'students.parent_id')
                                    ->join('sections', 'sections.id', '=', 'student_sessions.section_id')
                                    ->join('users', 'users.id', '=', 'students.author_id')
                                        ->where('student_requests.type', 'Student')
                                        ->where('student_requests.author_id', $studentRequest->author_id)
                                    ->orderBy('student_requests.id', 'desc')->first();
        if (! $request->ajax())
        {
            return view('backend.requests.student-view', compact('student'));
        }else
        {
            return view('backend.requests.modal.student-view', compact('student'));
        }
    }
    
    public function edit(Request $request, StudentRequest $studentRequest)
    {
        $sections = Section::orderBy('id', 'desc')->get();
        
        $student = StudentRequest::select('*', 'student_requests.id as id', 'student_requests.slug as slug', 'students.photo as photo')
                                    ->join('students', 'students.author_id', '=', 'student_requests.author_id')
                                    ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                                    ->join('courses', 'courses.id', '=', 'student_sessions.course_id')
                                    ->join('sections', 'sections.id', '=', 'student_sessions.section_id')
                                    ->join('users', 'users.id', '=', 'students.author_id')
                                        ->where('student_requests.type', 'Student')
                                        ->where('student_requests.author_id', $studentRequest->author_id)
                                    ->orderBy('student_requests.id', 'desc')->first();

        return view('backend.requests.student-edit', compact('student', 'sections'));
    }
    
    public function update(Request $request, StudentRequest $studentRequest)
    {
        $student = Student::where('author_id', $studentRequest->author_id)->first();
        $request->validate([
            'name' => 'required|string|max:191',
            'birthday' => 'required',
            'guardian' => 'nullable',
            'gender' => 'required|string|max:10',
            'religion' => 'required|string|max:20',
            'phone' => 'string|max:20',
            'passport' => 'nullable|unique:students',
            'citizenship_no' => ['nullable', Rule::unique('students')->ignore($student->id)],
            'class' => 'required',
            'section' => 'required',
            'image' => 'nullable|image|max:5120',
            'blood_group' => 'required'
        ]);
        
        if ($request->hasFile('image')){
             $image = $request->file('image');
             $ImageName = Str::uuid() . '.' .$image->getClientOriginalExtension();
             $image->move('frontend/images/students/', $ImageName);
        }

        $student = new Student;
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
        $student->status = 1;
        if ($request->hasFile('image')) {
            $student->photo = 'students/' . $ImageName;
        }
        $student->update();
        
        return redirect()->route('user_requests.index')->with('success', 'Information has been updated');
    }
    
    public function accept(Request $request, StudentRequest $studentRequest)
    {
        // Student
        $user = User::find($studentRequest->author_id);
        $student = Student::where('author_id', $user->id)->first();
        $student->status = 0;
        $student->update();
        $user->detachRole($user->roles()->first()->id);
        $user->attachRole(3);
        
        // Parent
        $parent = ParentModel::findOrFail($student->parent_id);
        $parent->status = 0;
        $parent->save();
        $parentRole = User::find($parent->user_id);
        $parentRole->detachRole($parentRole->roles()->first()->id);
        $parentRole->attachRole(4);
        $student->status = 0;
        $student->update();
        
        $studentRequest->status = 0;
        $studentRequest->save();
        
        return redirect()->route('user_requests.index')->with('success', 'Successfully Request Accepted');
    }
    
    public function reject(Request $request, StudentRequest $studentRequest)
    {
        // Student
        $user = User::find($studentRequest->author_id);
        $student = Student::where('author_id', $user->id)->first();
        $student->status = 2;
        $student->update();
        $user->detachRole($user->roles()->first()->id);
        $user->attachRole(7);
        
        // Parent
        $parent = ParentModel::findOrFail($student->parent_id);
        $parent->status = 2;
        $parent->save();
        $parentRole = User::find($parent->user_id);
        $parentRole->detachRole($parentRole->roles()->first()->id);
        $parentRole->attachRole(7);
        $student->status = 2;
        $student->update();
        
        $studentRequest->status = 2;
        $studentRequest->save();
        
        return redirect()->route('user_requests.index')->with('success', 'Rejected Successfully!');
    }
}
