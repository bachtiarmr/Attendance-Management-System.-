<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kehadiran;
use App\Models\User;
use Carbon\Carbon;

class KehadiranController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $now = Carbon::now();
        $batasCheckIn = Carbon::createFromTime(16, 0, 0); // Jam 4 sore

        // AUTO-ALPA TRIGGER:
        // Kalau jam sekarang sudah lewat dari jam 4 sore, sistem jalanin pengecekan
        if ($now->greaterThan($batasCheckIn)) {

            // Ambil semua user yang role-nya 'user' (karyawan)
            $karyawans = User::where('role', 'user')->get();

            foreach ($karyawans as $karyawan) {
                // Cek apakah karyawan ini udah absen hari ini
                $sudahAbsen = Kehadiran::where('user_id', $karyawan->id)
                    ->whereDate('tanggal', $today)
                    ->exists();

                // Kalau belum absen, bikinin data Alpa
                if (!$sudahAbsen) {
                    Kehadiran::create([
                        'user_id' => $karyawan->id,
                        'tanggal' => $today,
                        'check_in' => null,
                        'check_out' => null,
                        'status' => 'alpa'
                    ]);
                }
            }
        }

        // Ambil data kehadiran untuk ditampilin ke tabel
        $kehadiran = Kehadiran::with('user.divisi')->latest()->get();
        return view('pages.admin.kehadiran', compact('kehadiran'));
    }
}