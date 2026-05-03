<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_karyawan' => 50,
            'hadir' => 40,
            'izin' => 5,
            'terlambat' => 5,
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
            'hadir' => 120,
            'terlambat' => 15,
            'izin' => 8,
        ];

        return view('pages.admin.dashboard', compact('stats', 'traffic', 'summary'));
    }
}

