<?php

namespace App\Models;

use Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'view_count', 'description', 'feature_image', 'summary', 'seo_meta_keywords', 'seo_meta_description'];

    public function user_type()
    {
        return $this->hasMany('App\Models\UserNotice');
    }
    // Comment && Likes
    public function comments()
    {
        return $this->hasMany(NoticeComment::class);
    }

    public function commentsNumber()
    {
        $commentsNumber = $this->comments->count($label = 'Comment');

        return $commentsNumber . " " . Str::plural($label, $commentsNumber);
    }

    public function getDateAttribute($value)
    {
        return is_null($this->created_at) ? '' : $this->created_at->diffForHumans();
    }

    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/Y";
        if ($showTimes) $format = $format . " H:i:s";
        return $this->created_at->format($format);
    }

    public function month()
    {
        return Carbon::parse($this->created_at)->format('M');
    }

    public function year()
    {
        return Carbon::parse($this->created_at)->format('Y');
    }

    public function day()
    {
        return Carbon::parse($this->created_at)->day;
    }

    // Scope
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('view_count', 'desc');
    }

    public function scopeFilter($query, $filter)
    {
        // check if any term entered
        if (isset($filter['term']) && $term = strtolower($filter['term']))
        {
            $query->where(function($q) use ($term) {
                $q->orWhere('title', 'LIKE', "%{$term}%");
                $q->orWhere('summary', 'LIKE', "%{$term}%");
                $q->orWhere('details', 'LIKE', "%{$term}%");
            });
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
