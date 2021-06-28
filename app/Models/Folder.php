<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function images()
    {
        return $this->hasMany(Gallery::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
