<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'source', 'complaint_by', 'phone', 'date', 'description', 'assigned_by', 'note', 'action_taken'];

    public function date()
    {
        return Carbon::parse($this->date)->format('d - M, Y');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
