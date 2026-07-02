<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class KehadiranController extends Controller
{
    public function index()
    {
        $kehadiran = session()->get('attendance', []);

        return view('pages.admin.kehadiran', compact('kehadiran'));
    }
}