<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'host', 'location', 'starting_date', 'ending_date', 'website', 'quote', 'details', 'file_1', 'file_2', 'file_3', 'file_4', 'file_5', 'file_6'];

    public function candidates()
    {
        return $this->hasMany(EventCandidate::class);
    }

    public function speakers()
    {
        return $this->hasMany(EventSpeaker::class);
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

    public function start_time()
    {
        return Carbon::parse($this->start_time)->format('H:i A');
    }

    public function end_time()
    {
        return Carbon::parse($this->end_time)->format('H:i A');
    }

    public function scopeFilter($query, $filter)
    {
        // check if any term entered
        if (isset($filter['term']) && $term = strtolower($filter['term']))
        {
            $query->where(function($q) use ($term) {
                $q->orWhere('title', 'LIKE', "%{$term}%");
                $q->orWhere('quote', 'LIKE', "%{$term}%");
                $q->orWhere('details', 'LIKE', "%{$term}%");
            });
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
