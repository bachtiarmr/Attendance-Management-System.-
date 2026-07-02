<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    protected $table = 'izins';

    protected $fillable = [
        'user_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'file',
        'status',
    ];

    // Relasi balik ke User (Setiap data Izin itu milik 1 User/Karyawan pengaju)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}