<aside class="w-64 bg-white border-r min-h-screen p-6 sticky top-0">
    <h2 class="text-2xl font-extrabold text-slate-900 mb-10 tracking-tight pl-4">présent<span
            class="text-blue-600">.</span></h2>
    <nav class="space-y-2 text-sm">
        @php $links = [
            ['name' => 'Absen', 'route' => 'user.dashboard'],
            ['name' => 'Laporan Absensi', 'route' => 'user.laporan'],
            ['name' => 'Perizinan', 'route' => 'user.izin'],
        ]; @endphp
                @foreach($links as $link)
                    <a href="{{ route($link['route']) }}" class="flex items-center px-4 py-2.5 rounded-xl font-medium transition {{ request()->routeIs($link['route']) ? 'bg-slate-900 text-white shadow-lg shadow-slate-200' : 'text-slate-600 hover:bg-slate-50' }}">
                        {{ $link['name'] }}
                    </a>
                @endforeach


                           <div class="pt-6 border-t mt-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left px-4 py-2.5 rounded-xl text-red-500 font-medium hover:bg-red-50 transition">
                    Logout
                </button>
            </form>
        </div>
    </nav>
</aside>