@extends('layouts.admin')

@section('content')

    <div class="mb-6">
        <h1 class="text-2xl font-semibold">Divisi</h1>
        <p class="text-slate-500 text-sm">Mengatur Divisi</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border p-6">

        <div class="flex justify-between mb-4">
            <h2 class="font-semibold">List Divisi</h2>
            <x-admin.button color="blue">+ Tambah</x-admin.button>
        </div>

        <table class="w-full text-sm">

            <thead>
                <tr class="text-left border-b">
                    <th class="py-3">No</th>
                    <th class="py-3">Nama Divisi</th>
                    <th class="py-3 text-right">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($divisi as $index => $item)
                    <tr class="border-b hover:bg-slate-50">
                        <td class="py-3">{{ $index + 1 }}</td>
                        <td class="py-3">{{ $item['nama'] }}</td>
                        <td class="py-3 text-right space-x-2">
                            <x-admin.button color="blue">Edit</x-admin.button>
                            <x-admin.button color="red">Hapus</x-admin.button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

@endsection