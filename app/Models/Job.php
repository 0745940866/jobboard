<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'industry',
        'location',
        'salary',
        'description',
        'requirements',
    ];

    // 🔁 One Job has many Applications
    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
