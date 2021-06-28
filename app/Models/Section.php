<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['section_name', 'course_id', 'teacher_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
