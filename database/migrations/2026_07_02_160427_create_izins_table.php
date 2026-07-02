<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('izins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke Karyawan pengaju

            // Biar fleksibel kalau izinnya berhari-hari
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();

            $table->text('alasan'); // Sesuai kolom "Alasan" dan textarea di form
            $table->string('file')->nullable(); // Sesuai kolom "File", string untuk simpan path file

            // Status persetujuan (Pending, Disetujui, Ditolak)
            $table->string('status')->default('Pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('izins');
    }
};
