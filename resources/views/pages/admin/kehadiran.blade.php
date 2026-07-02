@extends('layouts.admin')

@section('content')

    @php
        $kehadiran = session('attendance', []);
    @endphp

    <div class="mb-6">
        <h1 class="text-2xl font-semibold">Kehadiran</h1>
        <p class="text-slate-500 text-sm">Employee attendance records</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border p-6">

        <table class="w-full text-sm">

            <thead>
                <tr class="border-b text-left">
                    <th class="py-3">Nama</th>
                    <th class="py-3">Divisi</th>
                    <th class="py-3">Tanggal</th>
                    <th class="py-3">Check In</th>
                    <th class="py-3">Check Out</th>
                    <th class="py-3">Jam Kerja</th>
                    <th class="py-3">Status</th>
                </tr>
            </thead>

            <tbody>

                @forelse($kehadiran as $item)
                        <tr class="border-b hover:bg-slate-50 {{ $item['status'] === 'telat' ? 'bg-red-50' : '' }}">

                            <td class="py-3 font-medium">
                                {{ $item['nama'] }}
                            </td>

                            <td class="py-3 text-slate-600">
                                {{ $item['divisi'] }}
                            </td>

                            <td class="py-3">
                                {{ $item['tanggal'] }}
                            </td>

                            <td class="py-3">
                                {{ $item['check_in']
                    ? \Carbon\Carbon::parse($item['check_in'])->format('H:i')
                    : '-' 
                                        }}
                            </td>

                            <td class="py-3">
                                {{ $item['check_out']
                    ? \Carbon\Carbon::parse($item['check_out'])->format('H:i')
                    : '-' 
                                        }}
                            </td>

                            {{-- 🔥 JAM KERJA --}}
                            <td class="py-3">
                                @if($item['check_in'] && $item['check_out'])
                                    @php
                                        $start = strtotime($item['check_in']);
                                        $end = strtotime($item['check_out']);
                                        $diff = $end - $start;

                                        $jam = floor($diff / 3600);
                                        $menit = floor(($diff % 3600) / 60);
                                    @endphp

                                    {{ $jam }}j {{ $menit }}m
                                @else
                                    <span class="text-yellow-600">Belum selesai</span>
                                @endif
                            </td>

                            <td class="py-3">
                                <x-status :status="$item['status']" />
                            </td>

                        </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-6 text-slate-500"> 
                            Belum ada data kehadiran
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

@endsection