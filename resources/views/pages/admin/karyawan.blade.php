@extends('layouts.admin')

@section('content')
    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Karyawan</h1>
            <p class="text-slate-500 font-medium">Manajemen data dan akun karyawan</p>
        </div>
        <button onclick="openModal('modal-karyawan')"
            class="bg-slate-900 text-white px-6 py-3 rounded-xl font-bold hover:bg-slate-800 transition">
            Tambah Karyawan
        </button>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50 text-slate-600 uppercase text-xs font-bold">
                <tr>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Divisi</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($karyawan as $item)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 font-semibold text-slate-900">{{ $item->name }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $item->divisi->nama_divisi ?? '-' }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="px-2 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded-lg">{{ $item->status }}</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <form action="{{ route('admin.karyawan.destroy', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="text-red-600 font-bold hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-admin.modal id="modal-karyawan">
        <h2 class="text-xl font-black mb-6">Tambah Karyawan</h2>
        <form action="{{ route('admin.karyawan.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <input type="text" name="name" placeholder="Nama Lengkap" required class="w-full border rounded-lg p-3">
                <input type="email" name="email" placeholder="Email (untuk login)" required
                    class="w-full border rounded-lg p-3">
                <input type="password" name="password" placeholder="Password Awal" required
                    class="w-full border rounded-lg p-3">
                <select name="divisi_id" class="w-full border rounded-lg p-3 bg-white">
                    @foreach($divisis as $d)
                        <option value="{{ $d->id }}">{{ $d->nama_divisi }}</option>
                    @endforeach
                </select>

                <button type="submit" class="w-full bg-slate-900 text-white py-3 rounded-lg font-bold">Simpan</button>
                <button type="button" onclick="closeModal('modal-karyawan')"
                    class="w-full text-slate-400 font-medium hover:text-slate-600">
                    Batal
                </button>
            </div>
        </form>
    </x-admin.modal>
@endsection