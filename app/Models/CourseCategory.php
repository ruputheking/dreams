<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
