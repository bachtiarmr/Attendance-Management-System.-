<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use Illuminate\Http\Request;

class IzinController extends Controller
{
    public function index()
    {
        // Ambil semua izin, urutkan dari yang terbaru, dan ambil data usernya
        $izin = Izin::with('user')->latest()->get();
        return view('pages.admin.izin', compact('izin'));
    }

    public function approve($id)
    {
        $izin = Izin::findOrFail($id);
        $izin->update(['status' => 'Disetujui']);

        return back()->with('success', 'Izin telah disetujui.');
    }

    public function reject($id)
    {
        $izin = Izin::findOrFail($id);
        $izin->update(['status' => 'Ditolak']);

        return back()->with('success', 'Izin telah ditolak.');
    }
}