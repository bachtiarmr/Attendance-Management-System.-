<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama_divisi',
    ];

    // Relasi ke User (1 Divisi punya banyak User)
    public function users()
    {
        return $this->hasMany(User::class);
    }
}