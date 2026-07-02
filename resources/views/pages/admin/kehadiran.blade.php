@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-black text-slate-900 tracking-tight">Kehadiran</h1>
        <p class="text-slate-500 font-medium">Rekap absensi seluruh karyawan</p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50 text-slate-600 uppercase text-xs font-bold">
                <tr>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Divisi</th>
                    <th class="px-6 py-4">Tanggal</th>
                    <th class="px-6 py-4">Check In</th>
                    <th class="px-6 py-4">Check Out</th>
                    <th class="px-6 py-4">Durasi</th>
                    <th class="px-6 py-4">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($kehadiran as $item)
                    <tr class="hover:bg-slate-50 transition {{ $item->status === 'telat' ? 'bg-red-50/50' : '' }}">
                        <td class="px-6 py-4 font-semibold text-slate-900">{{ $item->user->name ?? 'User Deleted' }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $item->user->divisi->nama_divisi ?? '-' }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-slate-600">
                            {{ $item->check_in ? \Carbon\Carbon::parse($item->check_in)->format('H:i') : '-' }}</td>
                        <td class="px-6 py-4 text-slate-600">
                            {{ $item->check_out ? \Carbon\Carbon::parse($item->check_out)->format('H:i') : '-' }}</td>

                        {{-- Durasi Kerja --}}
                        <td class="px-6 py-4 font-bold text-slate-700">
                            @if($item->check_in && $item->check_out)
                                @php
                                    $start = \Carbon\Carbon::parse($item->check_in);
                                    $end = \Carbon\Carbon::parse($item->check_out);
                                    $diff = $start->diff($end);
                                @endphp
                                {{ $diff->h }}j {{ $diff->i }}m
                            @else
                                <span class="text-amber-600 text-xs">On Going</span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <x-status :status="$item->status" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-10 text-center text-slate-400">Belum ada data kehadiran</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection