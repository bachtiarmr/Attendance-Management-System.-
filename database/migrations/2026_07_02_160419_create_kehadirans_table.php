<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke Karyawan

            $table->date('tanggal'); // Sesuai kolom "Tanggal"
            $table->time('check_in')->nullable(); // Sesuai kolom "Check In"
            $table->time('check_out')->nullable(); // Sesuai kolom "Check Out"

            // Status absensi harian (Hadir, Terlambat, Alpha)
            $table->string('status')->default('Alpha'); // Default Alpha kalau belum absen

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kehadirans');
    }
};
