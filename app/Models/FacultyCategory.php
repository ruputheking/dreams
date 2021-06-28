<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function faculty_members()
    {
        return $this->hasMany(FacultyMember::class, 'position_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
