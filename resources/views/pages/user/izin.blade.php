@extends('layouts.user')

@section('title', 'Perizinan')

@section('content')
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-2xl font-bold text-slate-800 mb-6">Pengajuan & Riwayat Izin</h1>

        {{-- FORM IZIN --}}
        <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm mb-8">
            <form method="POST" action="{{ route('user.izin.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Alasan Izin</label>
                    <textarea name="alasan" rows="3" required
                        class="w-full border border-slate-300 rounded-xl p-4 text-sm focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition"
                        placeholder="Contoh: Sakit, keperluan mendesak, atau cuti tahunan..."></textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Surat Bukti <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">
                        <input type="file" name="file" required accept=".jpg, .jpeg, .png, .pdf"
                            class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-slate-900 file:text-white hover:file:bg-slate-800 transition cursor-pointer">

                        {{-- Helper Text --}}
                        <p class="mt-2 text-[11px] text-slate-400">
                            Format: <span class="font-bold text-slate-600">JPG, PNG, atau PDF</span> | Maksimal: <span
                                class="font-bold text-slate-600">2MB</span>
                        </p>
                    </div>

                    @error('file')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-slate-900 text-white py-3 rounded-xl font-bold hover:bg-slate-800 transition">
                    Kirim Pengajuan
                </button>
            </form>
        </div>

        {{-- LIST IZIN --}}
        <div class="space-y-4">
            <h2 class="text-lg font-bold text-slate-800">Riwayat Pengajuan</h2>

            @forelse($izin as $item)
                <div
                    class="bg-white p-5 rounded-xl border border-slate-200 flex justify-between items-center hover:shadow-sm transition">
                    <div>
                        <p class="font-bold text-slate-800 text-sm">
                            {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}
                        </p>
                        <p class="text-xs text-slate-500 mt-1">{{ $item->alasan }}</p>

                        @if($item->file)
                            <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                class="inline-block mt-3 text-[10px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-2 py-1 rounded">
                                📎 Lihat Lampiran
                            </a>
                        @endif
                    </div>

                    <div class="shrink-0">
                        {{-- Pake component status lu --}}
                        <x-status :status="$item->status" />
                    </div>
                </div>
            @empty
                <div class="text-center py-10 bg-slate-50 rounded-xl border border-dashed border-slate-300">
                    <p class="text-sm text-slate-400">Belum ada riwayat izin yang diajukan.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection