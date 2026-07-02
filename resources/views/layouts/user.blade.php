@extends('layouts.app')

@section('body')
    <div class="flex min-h-screen">
        {{-- SIDEBAR --}}
        <aside class="w-64 bg-white border-r border-slate-200 p-6 flex flex-col h-screen sticky top-0">
            <h2 class="text-2xl font-black text-slate-900 mb-10 tracking-tight pl-2">présent<span
                    class="text-blue-600">.</span></h2>

            <nav class="space-y-2 flex-grow">
                @php $links = [
                    ['name' => 'Absen', 'route' => 'user.dashboard'],
                    ['name' => 'Laporan Absensi', 'route' => 'user.laporan'],
                    ['name' => 'Perizinan', 'route' => 'user.izin'],
                ]; @endphp

             @foreach($links as $link)
                <a href="{{ route($link['route']) }}" 
                       class="flex items-center px-4 py-3 rounded-xl font-semibold transition-all duration-200 
                       {{ request()->routeIs($link['route']) ? 'bg-slate-900 text-white shadow-lg shadow-slate-200' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                       {{ $link['name'] }}
                    </a>
            @endforeach
            </nav>


            {{-- LOGOUT (GARANG STYLE) --}}
            <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                @csrf
                <button class="w-full text-center px-4 py-3 rounded-xl border-2 border-red-500 text-red-500 font-bold hover:bg-red-500 hover:text-white transition-all duration-200 uppercase tracking-widest text-xs">
                    Logout
                </button>
            </form>
        </aside>

        {{-- CONTENT --}}
        <main class="flex-1">
            <nav class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center sticky top-0 z-10">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Dashboard</h1>
                </div>

                                    <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-sm font-bold text-slate-900">{{ auth()->user()->name }}</p>
                <p class="text-xs text-slate-500 font-medium">{{ auth()->user()->divisi->nama_divisi ?? 'Staff' }}</p>
                    </div>
                </div>
            </nav>

            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
@endsection