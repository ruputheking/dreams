<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhoneCallLog extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact', 'date', 'description', 'follow_up_date', 'call_duration', 'note', 'call_type'];

    public function date()
    {
        return Carbon::parse($this->date)->format('d - M, Y');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
