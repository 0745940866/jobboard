<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Job;

class JobApplication extends Model
{
    protected $fillable = [
    'user_id',
    'job_id',
    'name',
    'email',
    'education_level',
    'applicant_location',
    'cover_letter',
    'resume',
];


    // 🔁 Each application belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔁 Each application belongs to a job
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
