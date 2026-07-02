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