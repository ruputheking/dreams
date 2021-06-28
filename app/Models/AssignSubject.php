<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignSubject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getSubject($class,$section){
		$class = sql_escape($class);
		$section = sql_escape($section);
		$subjects = DB::select("SELECT subjects.*, assign_subjects.*, subjects.id as s_id, assign_subjects.id as a_id
		FROM subjects LEFT JOIN assign_subjects ON subjects.id=assign_subjects.subject_id AND assign_subjects.section_id='$section'
		WHERE subjects.course_id='$class'");
		return $subjects;
	}
}
