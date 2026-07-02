<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Kolom yang boleh diisi (sesuaikan dengan migration baru)
    protected $fillable = [
        'name',
        'email',
        'password',
        'divisi_id',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke Divisi (Setiap User punya 1 Divisi)
    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    // Relasi ke Kehadiran (1 User punya banyak data Kehadiran)
    public function kehadirans()
    {
        return $this->hasMany(Kehadiran::class);
    }

    // Relasi ke Izin (1 User punya banyak data Izin)
    public function izins()
    {
        return $this->hasMany(Izin::class);
    }
}