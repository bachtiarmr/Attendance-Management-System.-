<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    // Sesuaiin sama nama tabelnya (opsional kalau ngikut standar jamak Laravel)
    protected $table = 'kehadirans';

    protected $fillable = [
        'user_id',
        'tanggal',
        'check_in',
        'check_out',
        'status',
    ];

    // Relasi balik ke User (Setiap data Kehadiran itu milik 1 User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}