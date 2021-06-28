<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCandidate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'gender', 'address', 'qualification', 'birthday', 'message', 'attachment', 'previous_job', 'experience'];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
