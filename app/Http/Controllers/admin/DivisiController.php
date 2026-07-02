<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $divisi = Divisi::all();
        return view('pages.admin.divisi', compact('divisi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required|string|max:255',
        ]);

        Divisi::create([
            'nama_divisi' => $request->nama_divisi,
        ]);

        return back()->with('success', 'Divisi berhasil ditambahkan!');
    }

    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        return back()->with('success', 'Divisi berhasil dihapus!');
    }
}