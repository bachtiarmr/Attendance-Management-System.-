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
                        {{-- GANTI KOLOM AKSI DI DALAM TABEL JADI GINI --}}
                        <td class="px-6 py-4 text-right space-x-2">
                            <button onclick="editPassword('{{ $item->id }}', '{{ $item->name }}')"
                                class="text-amber-500 font-bold hover:underline text-xs">
                                🔑 Password
                            </button>

                            <button
                                onclick="editKaryawan('{{ $item->id }}', '{{ $item->name }}', '{{ $item->email }}', '{{ $item->divisi_id }}')"
                                class="text-blue-600 font-bold hover:underline text-xs">
                                Edit
                            </button>

                            <form action="{{ route('admin.karyawan.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Yakin hapus karyawan ini?')"
                                    class="text-red-600 font-bold hover:underline text-xs">Hapus</button>
                            </form>
                        </td>


                        {{-- TARUH MODAL INI DI BAWAH MODAL TAMBAH KARYAWAN LU --}}

                        <x-admin.modal id="modal-edit-karyawan">
                            <h2 class="text-xl font-black mb-6">Edit Data Karyawan</h2>
                            <form id="form-edit-karyawan" method="POST">
                                @csrf @method('PUT')
                                <div class="space-y-4">
                                    <input type="text" id="edit_name" name="name" required
                                        class="w-full border rounded-lg p-3 outline-none focus:ring-2 focus:ring-slate-900">
                                    <input type="email" id="edit_email" name="email" required
                                        class="w-full border rounded-lg p-3 outline-none focus:ring-2 focus:ring-slate-900">

                                    <select id="edit_divisi" name="divisi_id" required
                                        class="w-full border rounded-lg p-3 bg-white outline-none focus:ring-2 focus:ring-slate-900">
                                        @foreach($divisis as $d)
                                            <option value="{{ $d->id }}">{{ $d->nama_divisi }}</option>
                                        @endforeach
                                    </select>

                                    <button type="submit"
                                        class="w-full bg-slate-900 text-white py-3 rounded-lg font-bold">Update Data</button>
                                    <button type="button" onclick="closeModal('modal-edit-karyawan')"
                                        class="w-full text-slate-400 font-medium hover:text-slate-600">Batal</button>
                                </div>
                            </form>
                        </x-admin.modal>

                        <x-admin.modal id="modal-password">
                            <h2 class="text-xl font-black mb-2">Reset Password</h2>
                            <p id="nama_user_password" class="text-sm text-slate-500 mb-6 font-medium"></p>

                            <form id="form-password" method="POST">
                                @csrf @method('PUT')
                                <div class="space-y-4">
                                    <input type="password" name="password" placeholder="Masukkan password baru" required
                                        class="w-full border rounded-lg p-3 outline-none focus:ring-2 focus:ring-slate-900">
                                    <button type="submit"
                                        class="w-full bg-amber-500 hover:bg-amber-600 text-white py-3 rounded-lg font-bold">Simpan
                                        Password Baru</button>
                                    <button type="button" onclick="closeModal('modal-password')"
                                        class="w-full text-slate-400 font-medium hover:text-slate-600">Batal</button>
                                </div>
                            </form>
                        </x-admin.modal>

                        <script>
                            function editKaryawan(id, name, email, divisi_id) {
                                document.getElementById('form-edit-karyawan').action = '/admin/karyawan/' + id;
                                document.getElementById('edit_name').value = name;
                                document.getElementById('edit_email').value = email;
                                document.getElementById('edit_divisi').value = divisi_id;
                                openModal('modal-edit-karyawan');
                            }

                            function editPassword(id, name) {
                                document.getElementById('form-password').action = '/admin/karyawan/' + id + '/reset-password';
                                document.getElementById('nama_user_password').innerText = 'Akun: ' + name;
                                openModal('modal-password');
                            }
                        </script>
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