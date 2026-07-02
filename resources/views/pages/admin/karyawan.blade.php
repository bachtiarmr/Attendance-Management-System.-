@extends('layouts.admin')

@section('content')

    <div class="mb-6">
        <h1 class="text-2xl font-semibold">Karyawan</h1>
        <p class="text-slate-500 text-sm">Manage employee data</p>
    </div>

    <div class="bg-white p-6 rounded-2xl border shadow-sm">

        <!-- Search + Action -->
        <div class="flex justify-between mb-4">
            <input type="text" placeholder="Cari karyawan..."
                class="border px-4 py-2 rounded-lg w-1/3 focus:outline-none focus:ring-2 focus:ring-slate-300">

            <x-admin.button color="blue" onclick="openModal('modal-karyawan')">
                + Tambah
            </x-admin.button>
        </div>

        <!-- Table -->
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-left">
                    <th class="py-3">Nama</th>
                    <th class="py-3">Divisi</th>
                    <th class="py-3">Status</th>
                    <th class="py-3 text-right">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($karyawan as $item)
                    <tr class="border-b hover:bg-slate-50">
                        <td class="py-3">{{ $item['nama'] }}</td>
                        <td class="py-3">{{ $item['divisi'] }}</td>
                        <td class="py-3">{{ $item['status'] }}</td>
                        <td class="py-3 text-right space-x-2">
                            <x-admin.button color="blue">Edit</x-admin.button>
                            <x-admin.button color="red">Hapus</x-admin.button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- 🔥 MODAL -->
    <x-admin.modal id="modal-karyawan">
        <x-admin.form-karyawan />
    </x-admin.modal>

@endsection