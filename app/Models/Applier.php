<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applier extends Model
{
    protected $table = 'applier'; // Nama tabel yang sesuai dengan migrasi

    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'birth_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
