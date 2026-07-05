@extends('layouts.admin')

@section('content')
    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Divisi</h1>
            <p class="text-slate-500 font-medium">Manajemen daftar divisi perusahaan</p>
        </div>
        <button onclick="openModal('modal-divisi')"
            class="bg-slate-900 text-white px-6 py-3 rounded-xl font-bold hover:bg-slate-800 transition">
            + Tambah Divisi
        </button>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50 text-slate-600 uppercase text-xs font-bold">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Nama Divisi</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($divisi as $index => $item)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 text-slate-600">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-semibold text-slate-900">{{ $item->nama_divisi }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button onclick="editDivisi('{{ $item->id }}', '{{ $item->nama_divisi }}')"
                                class="text-blue-600 font-bold hover:underline text-xs">
                                Edit
                            </button>

                            <form action="{{ route('admin.divisi.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus divisi ini?')"
                                    class="text-red-600 font-bold hover:underline text-xs">Hapus</button>
                            </form>
                        </td>
                        <x-admin.modal id="modal-edit-divisi">
                            <h2 class="text-xl font-black mb-6">Edit Divisi</h2>
                            <form id="form-edit-divisi" method="POST">
                                @csrf @method('PUT')
                                <div class="space-y-4">
                                    <input type="text" id="edit_nama_divisi" name="nama_divisi" required
                                        class="w-full border rounded-lg p-3 outline-none focus:ring-2 focus:ring-slate-900">
                                    <button type="submit"
                                        class="w-full bg-slate-900 text-white py-3 rounded-lg font-bold">Update</button>
                                    <button type="button" onclick="closeModal('modal-edit-divisi')"
                                        class="w-full text-slate-400 font-medium hover:text-slate-600">Batal</button>
                                </div>
                            </form>
                        </x-admin.modal>

                        <script>
                            function editDivisi(id, nama_divisi) {
                                document.getElementById('form-edit-divisi').action = '/admin/divisi/' + id;
                                document.getElementById('edit_nama_divisi').value = nama_divisi;
                                openModal('modal-edit-divisi');
                            }
                        </script>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-admin.modal id="modal-divisi">
        <h2 class="text-xl font-black mb-6">Tambah Divisi</h2>
        <form action="{{ route('admin.divisi.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <input type="text" name="nama_divisi" placeholder="Contoh: IT Support" required
                    class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:ring-2 focus:ring-slate-900">

                <button type="submit" class="w-full bg-slate-900 text-white py-3 rounded-lg font-bold">Simpan</button>
                <button type="button" onclick="closeModal('modal-divisi')"
                    class="w-full text-slate-400 font-medium hover:text-slate-600">Batal</button>
            </div>
        </form>
    </x-admin.modal>
@endsection