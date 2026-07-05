<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kehadiran;
use App\Models\Izin;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Stats Hari Ini
        $stats = [
            'total_karyawan' => User::where('role', 'user')->count(),
            'hadir' => Kehadiran::whereDate('tanggal', Carbon::today())->where('status', 'hadir')->count(),
            'izin' => Izin::whereDate('tanggal_mulai', '<=', Carbon::today())
                ->whereDate('tanggal_selesai', '>=', Carbon::today())
                ->where('status', 'disetujui')->count(),
            'terlambat' => Kehadiran::whereDate('tanggal', Carbon::today())->where('status', 'terlambat')->count(),
            'alpa' => Kehadiran::whereDate('tanggal', Carbon::today())->where('status', 'alpa')->count(),
        ];

        // 2. Traffic Senin - Jumat (Minggu Berjalan)
        $traffic = [];
        $days = [
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat'
        ];

        // Start dari hari Senin minggu ini
        $startDate = Carbon::now()->startOfWeek();

        foreach ($days as $eng => $indo) {
            // Cari tanggal untuk hari tersebut
            $currentDate = $startDate->copy()->addDays(array_search($eng, array_keys($days)));

            $traffic[] = [
                'hari' => $indo,
                'jumlah' => Kehadiran::whereDate('tanggal', $currentDate)->count(),
            ];
        }

        // 3. Summary (Total Bulanan)
        $summary = [
            'hadir' => Kehadiran::whereMonth('tanggal', Carbon::now()->month)->where('status', 'hadir')->count(),
            'terlambat' => Kehadiran::whereMonth('tanggal', Carbon::now()->month)->where('status', 'terlambat')->count(),
            'izin' => Izin::whereMonth('tanggal_mulai', Carbon::now()->month)->where('status', 'disetujui')->count(),
            'alpa' => Kehadiran::whereMonth('tanggal', Carbon::now()->month)->where('status', 'alpa')->count(),
        ];

        return view('pages.admin.dashboard', compact('stats', 'traffic', 'summary'));
    }
}