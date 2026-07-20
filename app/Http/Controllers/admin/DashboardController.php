<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
<<<<<<< HEAD
            'total_karyawan' => 50,
            'hadir' => 40,
            'izin' => 5,
            'terlambat' => 5,
=======
            'total_karyawan' => User::where('role', 'user')->count(),
            'hadir' => Kehadiran::whereDate('tanggal', Carbon::today())->where('status', 'hadir')->count(),
            'izin' => Izin::whereDate('tanggal_mulai', '<=', Carbon::today())
                ->whereDate('tanggal_selesai', '>=', Carbon::today())
                ->where('status', 'disetujui')->count(),
            'terlambat' => Kehadiran::whereDate('tanggal', Carbon::today())->where('status', 'terlambat')->count(),
            'alpa' => Kehadiran::whereDate('tanggal', Carbon::today())->where('status', 'alpa')->count(),
>>>>>>> d9ab3cbcc48faa649be3822073a24b29e165c6a4
        ];

        $traffic = [
            ['hari' => 'Sen', 'jumlah' => 30],
            ['hari' => 'Sel', 'jumlah' => 45],
            ['hari' => 'Rab', 'jumlah' => 25],
            ['hari' => 'Kam', 'jumlah' => 50],
            ['hari' => 'Jum', 'jumlah' => 40],
            ['hari' => 'Sab', 'jumlah' => 20],
            ['hari' => 'Min', 'jumlah' => 10],
        ];

        $summary = [
<<<<<<< HEAD
            'hadir' => 120,
            'terlambat' => 15,
            'izin' => 8,
=======
            'hadir' => Kehadiran::whereMonth('tanggal', Carbon::now()->month)->where('status', 'hadir')->count(),
            'terlambat' => Kehadiran::whereMonth('tanggal', Carbon::now()->month)->where('status', 'terlambat')->count(),
            'izin' => Izin::whereMonth('tanggal_mulai', Carbon::now()->month)->where('status', 'disetujui')->count(),
            'alpa' => Kehadiran::whereMonth('tanggal', Carbon::now()->month)->where('status', 'alpa')->count(),
>>>>>>> d9ab3cbcc48faa649be3822073a24b29e165c6a4
        ];

        return view('pages.admin.dashboard', compact('stats', 'traffic', 'summary'));
    }
}

