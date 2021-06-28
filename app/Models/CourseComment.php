<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'comments', 'course_id', 'phone'
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function getDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
