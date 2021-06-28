<?php

namespace App\Http\Controllers\Frontend\Faculty;

use App\Models\FacultyMember;
use App\Models\FacultyCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacultyMemberController extends Controller
{
    public function show(FacultyCategory $category, FacultyMember $faculty)
    {
        return view('frontend.faculties.faculty-show', compact('faculty'));
    }
}
