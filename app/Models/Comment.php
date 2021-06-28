<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'comments', 'post_id', 'phone'
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function getDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
