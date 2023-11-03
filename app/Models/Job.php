<?php

namespace App\Models;

use App\Models\Recruiter;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';

    protected $fillable = [
        'recruiter_id',
        'name',
        'type',
        'description',
        'required_vidio',
        'status',
    ];

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class, 'recruiter_id');
    }

    public function applies()
    {
        return $this->hasMany(Apply::class); 
        // Assuming the model name for your application is Apply
    }
}
