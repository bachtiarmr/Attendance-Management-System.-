<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kehadiran;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $today = Kehadiran::where('user_id', Auth::id())
            ->where('tanggal', Carbon::today())
            ->first();

        // Pass ke view. Kalau null, biarin null biar di view bisa di-check
        return view('pages.user.dashboard', compact('today'));
    }

    public function checkIn(Request $request)
    {
        // 1. Cek apakah sudah absen hari ini
        $check = Kehadiran::where('user_id', Auth::id())
            ->where('tanggal', Carbon::today())
            ->exists();

        if ($check) {
            return back()->with('error', 'Anda sudah melakukan check-in hari ini!');
        }

        // 2. Logic Jam Kerja
        $now = Carbon::now();
        $batasCheckIn = Carbon::createFromTime(16, 0, 0); // Jam 4 sore (16:00)
        $jamMasuk = '08:00';

        // A. Cek Cutoff (Lewat jam 4 sore gabisa absen)
        if ($now->greaterThan($batasCheckIn)) {
            return back()->with('error', 'Jam kerja sudah lewat, sudah tidak bisa absen!');
        }

        // B. Tentukan Status (Telat/Hadir)
        // Kalau jam sekarang > 08:00, maka telat
        $status = $now->format('H:i') > $jamMasuk ? 'telat' : 'hadir';

        // 3. Simpan ke Database
        Kehadiran::create([
            'user_id' => Auth::id(),
            'tanggal' => Carbon::today(),
            'check_in' => $now,
            'status' => $status
        ]);

        // Pesan sukses + info status
        $pesan = ($status == 'telat') ? 'Berhasil Check In, tapi Anda terlambat!' : 'Berhasil Check In tepat waktu!';
        return back()->with('success', $pesan);
    }

    public function checkOut(Request $request)
    {
        $kehadiran = Kehadiran::where('user_id', Auth::id())
            ->where('tanggal', Carbon::today())
            ->first();

        if (!$kehadiran) {
            return back()->with('error', 'Silahkan check-in terlebih dahulu!');
        }

        if ($kehadiran->check_out) {
            return back()->with('error', 'Anda sudah melakukan check-out hari ini!');
        }

        $kehadiran->update(['check_out' => Carbon::now()]);

        return back()->with('success', 'Berhasil Check Out!');
    }

    public function resetAbsen()
    {
        Kehadiran::where('user_id', Auth::id())
            ->where('tanggal', Carbon::today())
            ->delete();

        return back()->with('success', 'Data absen hari ini telah direset.');
    }
    public function laporan()
    {
        // Ambil data absen user yang lagi login, urutin dari yang terbaru
        $attendance = Kehadiran::where('user_id', auth()->id())
            ->orderBy('tanggal', 'desc')
            ->paginate(10); // Biar nggak kepenuhan

        return view('pages.user.laporan', compact('attendance'));
    }
    public function izin()
    {
        // Ambil data izin user yang login, urutin dari yang terbaru
        $izin = \App\Models\Izin::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.user.izin', compact('izin'));
    }

    public function storeIzin(Request $request)
    {

        $request->validate([
            'alasan' => 'required|string|max:500',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Tambahin 'required'
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            // Simpan file ke folder storage/app/public/surat_izin
            $filePath = $request->file('file')->store('surat_izin', 'public');
        }

        \App\Models\Izin::create([
            'user_id' => auth()->id(),
            'tanggal_mulai' => now(), // Izin hari ini
            'tanggal_selesai' => now(), // Defaultnya izin 1 hari
            'alasan' => $request->alasan,
            'file' => $filePath,
            'status' => 'Pending',
        ]);

        return back()->with('success', 'Pengajuan izin berhasil dikirim!');
    }
}