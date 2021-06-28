<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'purpose', 'phone', 'in_time', 'out_time', 'note', 'image', 'no_of_people'];

    public function date()
    {
        return Carbon::parse($this->date)->format('d - M, Y');
    }

    public function in_time()
    {
        return Carbon::parse($this->in_time)->format('g:i A');
    }

    public function out_time()
    {
        return Carbon::parse($this->out_time)->format('g:i A');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
