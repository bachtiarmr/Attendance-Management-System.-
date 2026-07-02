<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kehadiran;

class KehadiranController extends Controller
{
    public function index()
    {
        // Eager loading user dan divisi biar gak bikin server berat
        $kehadiran = Kehadiran::with('user.divisi')->latest()->get();
        return view('pages.admin.kehadiran', compact('kehadiran'));
    }
}