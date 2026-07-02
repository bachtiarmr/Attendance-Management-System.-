@extends('layouts.auth')

@section('title', 'Login | Présent')

@section('content')
    {{-- Container utama dengan background yang lebih soft --}}
    <div class="flex items-center justify-center min-h-screen w-full px-4 bg-slate-50 relative overflow-hidden">

        {{-- Efek dekorasi background (opsional, halus dan corporate) --}}
        <div
            class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40">
        </div>
        <div
            class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-slate-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40">
        </div>

        <div class="flex flex-col md:flex-row items-center gap-10 lg:gap-16 max-w-5xl w-full relative z-10">

            {{-- Brand di kiri --}}
            <div class="flex-1 text-center md:text-left">
                {{-- Badge kecil biar kelihatan kayak sistem perusahaan beneran --}}
                <div
                    class="inline-block px-3 py-1 mb-4 rounded-full bg-slate-200 text-slate-700 text-xs font-bold tracking-widest uppercase">
                    Portal Présent
                </div>

                {{-- Logo/Brand --}}
                <h1 class="text-6xl lg:text-7xl font-extrabold text-slate-900 tracking-tight mb-2">
                    présent<span class="text-blue-600">.</span>
                </h1>

                <p class="text-slate-600 mt-2 text-xl font-medium">Sistem Manajemen Kehadiran</p>
                <p class="text-slate-400 mt-4 text-sm max-w-md mx-auto md:mx-0 leading-relaxed">
                    Kelola data absensi, perizinan, dan pemantauan kinerja karyawan secara terintegrasi dan efisien.
                </p>
            </div>

            {{-- Form login di kanan --}}
            <div
                class="bg-white w-full md:w-[420px] p-8 sm:p-10 rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100">
                <div class="mb-8 text-center md:text-left">
                    <h2 class="text-2xl font-bold text-slate-800">Selamat Datang</h2>
                    <p class="text-slate-500 text-sm mt-1">Silakan masuk ke akun Anda</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-5">
                        <label class="text-sm font-semibold text-slate-700 block mb-1.5">Email Akses</label>
                        <input type="email" name="email" placeholder="contoh@perusahaan.com" value="{{ old('email') }}"
                            required
                            class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none transition bg-slate-50 focus:bg-white">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-8 relative">
                        <label class="text-sm font-semibold text-slate-700 block mb-1.5">Kata Sandi</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Masukkan Kata Sandi" required
                                class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none transition bg-slate-50 focus:bg-white">

                            {{-- SVG Eye Icon --}}
                            <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
                                <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Button --}}
                    <button type="submit"
                        class="w-full bg-slate-800 text-white py-3 rounded-lg hover:bg-slate-900 transition-all duration-200 text-sm font-semibold shadow-md hover:shadow-lg flex justify-center items-center gap-2">
                        Masuk Sistem
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </form>

            </div>
        </div>
    </div>
    {{-- Script JS buat toggle password --}}
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eye-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 012.355-3.645M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 17.657L6.343 6.343" />`;
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }
    </script>
@endsection