<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyMember extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'position_id', 'details', 'facebook', 'twitter', 'instagram', 'skype', 'photo'];

    public function position()
    {
        return $this->belongsTo(FacultyCategory::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
