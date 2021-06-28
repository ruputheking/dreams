<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'comments', 'notice_id', 'phone'
    ];

    public function posts()
    {
        return $this->belongsTo(Notice::class);
    }

    public function getDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getBodyHtmlAttribute()
    {
        return Markdown::convertToHtml(e($this->comments));
    }
}
