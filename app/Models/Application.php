<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'user_id', 'reason', 'subject', 'status', 'starting_date', 'ending_date', 'document'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fromMonth()
    {
        return Carbon::parse($this->starting_date)->format('M');
    }

    public function fromYear()
    {
        return Carbon::parse($this->starting_date)->format('Y');
    }

    public function fromDay()
    {
        return Carbon::parse($this->starting_date)->day;
    }

    public function toMonth()
    {
        return Carbon::parse($this->ending_date)->format('M');
    }

    public function toYear()
    {
        return Carbon::parse($this->ending_date)->format('Y');
    }

    public function toDay()
    {
        return Carbon::parse($this->ending_date)->day;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
