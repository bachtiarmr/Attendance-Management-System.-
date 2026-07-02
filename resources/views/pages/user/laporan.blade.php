@extends('layouts.user')

@section('title', 'Laporan Absensi')

@section('content')
    <div class="max-w-4xl mx-auto">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-slate-800">Laporan Absensi</h1>
            <div class="text-sm text-slate-500 font-medium">
                Total Rekap: {{ $attendance->total() }} Hari
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-slate-50 border-b border-slate-200 text-slate-600 uppercase text-xs font-bold tracking-wider">
                            <th class="px-6 py-4">Tanggal</th>
                            <th class="px-6 py-4">Check In</th>
                            <th class="px-6 py-4">Check Out</th>
                            <th class="px-6 py-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($attendance as $item)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-semibold text-slate-700">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600">
                                    {{ $item->check_in ? \Carbon\Carbon::parse($item->check_in)->format('H:i') : '-' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600">
                                    {{ $item->check_out ? \Carbon\Carbon::parse($item->check_out)->format('H:i') : '-' }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{-- Panggil component status lu --}}
                                    <x-status :status="$item->status" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-slate-400">
                                    Belum ada riwayat absensi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="px-6 py-4 border-t border-slate-200">
                {{ $attendance->links() }}
            </div>
        </div>
    </div>
@endsection