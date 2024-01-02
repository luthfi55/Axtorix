<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    protected $table = 'recruiter';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'phone_number',        
        'city',
        'address',
        'picture',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
