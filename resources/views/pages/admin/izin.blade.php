@extends('layouts.admin')

@section('title', 'Kelola Izin')

@section('content')

    <div class="mb-8">
        <h1 class="text-3xl font-black text-slate-900 tracking-tight">Permohonan Izin</h1>
        <p class="text-slate-500 font-medium">Kelola pengajuan izin karyawan</p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50 text-slate-600 uppercase text-xs font-bold">
                <tr>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Tanggal</th>
                    <th class="px-6 py-4">Alasan</th>
                    <th class="px-6 py-4">File</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($izin as $item)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 font-semibold text-slate-900">{{ $item->user->name }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-slate-700 max-w-[200px] truncate">{{ $item->alasan }}</td>
                        <td class="px-6 py-4">
                            @if($item->file)
                                <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                    class="text-blue-600 font-bold hover:underline text-xs">Lihat File</a>
                            @else
                                <span class="text-slate-400 text-xs italic">Tanpa file</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <x-status :status="$item->status" />
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            @if($item->status == 'Pending')
                                <form method="POST" action="{{ route('admin.izin.approve', $item->id) }}" class="inline">
                                    @csrf
                                    <button
                                        class="bg-green-600 text-white px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-green-700">Setuju</button>
                                </form>
                                <form method="POST" action="{{ route('admin.izin.reject', $item->id) }}" class="inline">
                                    @csrf
                                    <button
                                        class="bg-red-600 text-white px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-red-700">Tolak</button>
                                </form>
                            @else
                                <span class="text-slate-400 text-xs font-bold uppercase tracking-wider">Selesai</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-slate-400">Belum ada pengajuan izin.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection