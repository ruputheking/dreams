<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

	protected $fillable = array('exam_id', 'subject_id', 'student_id', 'class_id', 'section_id');
}
