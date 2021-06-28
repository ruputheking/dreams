<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostalReceive extends Model
{
    use HasFactory;

    protected $fillable = ['to_title', 'address', 'note', 'from_title', 'date', 'image', 'status', 'slug'];

    public function date()
    {
        return Carbon::parse($this->date)->format('d - M, Y');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
