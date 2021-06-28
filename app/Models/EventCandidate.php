<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCandidate extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'name', 'email', 'phone'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
