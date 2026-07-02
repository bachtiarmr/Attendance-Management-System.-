@extends('layouts.user')

@section('content')
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-2xl font-bold text-slate-800 mb-6">Absensi Hari Ini</h1>

        <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
            {{-- Status Card --}}
            <div class="flex items-center justify-between mb-8 pb-6 border-b border-slate-100">
                <div>
                    <p class="text-sm text-slate-500 font-medium">Status Kehadiran</p>
                    <div class="mt-2">
                        @if($today)
                            <span
                                class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold uppercase tracking-wider">Hadir</span>
                        @else
                            <span
                                class="px-3 py-1 bg-slate-100 text-slate-600 rounded-full text-xs font-bold uppercase tracking-wider">Belum
                                Absen</span>
                        @endif
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm text-slate-500">Tanggal</p>
                    <p class="text-sm font-bold text-slate-800">{{ now()->format('d M Y') }}</p>
                </div>
            </div>

            {{-- Time Grid --}}
            <div class="grid grid-cols-2 gap-4 mb-8">
                <div class="bg-slate-50 p-4 rounded-xl border">
                    <p class="text-xs text-slate-400 mb-1">Check In</p>
                    <p class="text-lg font-bold text-slate-800">
                        {{ $today && $today->check_in ? \Carbon\Carbon::parse($today->check_in)->format('H:i') : '--:--' }}
                    </p>
                </div>
                <div class="bg-slate-50 p-4 rounded-xl border">
                    <p class="text-xs text-slate-400 mb-1">Check Out</p>
                    <p class="text-lg font-bold text-slate-800">
                        {{ $today && $today->check_out ? \Carbon\Carbon::parse($today->check_out)->format('H:i') : '--:--' }}
                    </p>
                </div>
            </div>

            {{-- Buttons --}}
            <form method="POST" action="{{ route('user.checkin') }}">
                @csrf
                <button {{ $today ? 'disabled' : '' }}
                    class="w-full bg-slate-900 text-white py-3 rounded-lg hover:bg-slate-800 transition disabled:opacity-50 disabled:cursor-not-allowed font-semibold">
                    Check In
                </button>
            </form>

            <form method="POST" action="{{ route('user.checkout') }}" class="mt-3">
                @csrf
                <button {{ !$today || $today->check_out ? 'disabled' : '' }}
                    class="w-full bg-slate-800 text-white py-3 rounded-lg hover:bg-slate-700 transition disabled:opacity-50 disabled:cursor-not-allowed font-semibold">
                    Check Out
                </button>
            </form>
        </div>
    </div>
@endsection