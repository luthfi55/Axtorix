<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education'; // Nama tabel sesuai dengan migration

    protected $fillable = [
        'user_id', 
        'name', 
        'description', 
        'start_date', 
        'end_date'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
