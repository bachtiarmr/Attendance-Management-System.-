<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index()
    {
        // Eager loading 'divisi' biar query-nya gak lambat (N+1 problem)
        $karyawan = User::where('role', 'user')->with('divisi')->get();
        $divisis = Divisi::all();
        return view('pages.admin.karyawan', compact('karyawan', 'divisis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'divisi_id' => 'required|exists:divisis,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'divisi_id' => $request->divisi_id,
            'role' => 'user',
            'status' => 'Aktif',
        ]);

        return back()->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function destroy(User $karyawan)
    {
        $karyawan->delete();
        return back()->with('success', 'Karyawan berhasil dihapus!');
    }
}