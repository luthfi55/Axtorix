<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;

    protected $table = 'apply'; // Nama tabel sesuai dengan migration

    protected $fillable = [
        'applier_id',
        'job_id',
        'email',
        'phone_number',
        'resume',
        'link_vidio',
        'status'
    ];

    /**
     * Relasi dengan model Applier.
     */
    public function applier()
    {
        return $this->belongsTo(Applier::class, 'applier_id');
    }    

    /**
     * Relasi dengan model Job.
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
