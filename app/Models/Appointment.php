<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    public function month()
    {
        return Carbon::parse($this->date)->format('M');
    }

    public function year()
    {
        return Carbon::parse($this->date)->format('Y');
    }

    public function day()
    {
        return Carbon::parse($this->date)->day;
    }
    
    public function time()
    {
        return Carbon::parse($this->date)->format('g:i A');
    }
}
