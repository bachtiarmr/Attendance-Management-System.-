<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = [
            [
                'id' => 1,
                'nama' => 'Budi',
                'divisi' => 'IT',
                'status' => 'Aktif'
            ],
            [
                'id' => 2,
                'nama' => 'Siti',
                'divisi' => 'HR',
                'status' => 'Aktif'
            ],
        ];

        return view('pages.admin.karyawan', compact('karyawan'));
    }

    public function create()
    {
        return view('admin.karyawan_create');
    }
    // Fungsi buat Update Profil Karyawan
    public function update(Request $request, User $karyawan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $karyawan->id,
            'divisi_id' => 'required|exists:divisis,id',
        ]);

        $karyawan->update([
            'name' => $request->name,
            'email' => $request->email,
            'divisi_id' => $request->divisi_id,
        ]);

        return back()->with('success', 'Data karyawan berhasil diperbarui!');
    }

    // Fungsi khusus buat Admin ganti password karyawan
    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password akun ' . $user->name . ' berhasil direset!');
    }

    public function store()
    {
        // dummy (nanti ke database)
    }

    public function edit($id)
    {
        return view('admin.karyawan_edit');
    }

    public function update($id)
    {
        // dummy
    }

    public function destroy($id)
    {
        // dummy
    }
}