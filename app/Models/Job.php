<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'salary', 'location', 'summary', 'published_at', 'deadline', 'details', 'seo_meta_keywords', 'seo_meta_description', 'view_count', 'status'];

    public function candidates()
    {
        return $this->hasMany(JobCandidate::class);
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
