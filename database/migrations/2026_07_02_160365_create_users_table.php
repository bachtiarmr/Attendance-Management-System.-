<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel divisis
            $table->foreignId('divisi_id')->nullable()->constrained('divisis')->onDelete('set null');

            $table->string('name'); // Sesuai kolom "Nama"
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // Tambahan untuk sistem absensi
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif'); // Sesuai kolom "Status" di tabel Karyawan

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
