<?php

namespace App\Models;

use Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'summary', 'price', 'description', 'starting_date', 'starting_time', 'schedule', 'ending_time', 'duration', 'total_credit', 'max_student', 'status'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    // Date

    public function start_time()
    {
        return Carbon::parse($this->starting_time)->format('H:i A');
    }

    public function end_time()
    {
        return Carbon::parse($this->ending_time)->format('H:i A');
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

    // Comment
    public function comments()
    {
        return $this->hasMany(CourseComment::class);
    }

    public function commentsNumber()
    {
        $commentsNumber = $this->comments->count($label = 'Comment');

        return $commentsNumber . " " . Str::plural($label, $commentsNumber);
    }

    public function scopeFilter($query, $filter)
    {
        // check if any term entered
        if (isset($filter['term']) && $term = strtolower($filter['term']))
        {
            $query->where(function($q) use ($term) {
                $q->orWhere('title', 'LIKE', "%{$term}%");
                $q->orWhere('summary', 'LIKE', "%{$term}%");
                $q->orWhere('description', 'LIKE', "%{$term}%");
            });
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
