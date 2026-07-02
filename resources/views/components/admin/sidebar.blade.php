<aside class="w-64 bg-white border-r border-slate-200 min-h-screen p-6 sticky top-0 flex flex-col">
    {{-- Logo --}}
    <h2 class="text-2xl font-black text-slate-900 mb-10 tracking-tight pl-2">
        présent<span class="text-blue-600">.</span>
    </h2>

    <nav class="space-y-2 flex-grow">
        @php 
                        $links = [
                ['name' => 'Dashboard', 'route' => 'admin.dashboard'],
                ['name' => 'Karyawan', 'route' => 'admin.karyawan.index'],
                ['name' => 'Divisi', 'route' => 'admin.divisi.index'],
                ['name' => 'Kehadiran', 'route' => 'admin.kehadiran.index'],
                ['name' => 'Izin', 'route' => 'admin.izin.index'],
            ]; 
        @endphp

        @foreach($links as $link)
                <a href="{{ route($link['route']) }}" 
                   class="flex items-center px-4 py-3 rounded-xl font-semibold transition-all duration-200 
                   {{ request()->routeIs($link['route']) || (isset($link['active_pattern']) && request()->is($link['active_pattern']))
            ? 'bg-slate-900 text-white shadow-lg shadow-slate-200'
            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                {{ $link['name'] }}
                </a>
        @endforeach
    </nav>

    {{-- LOGOUT (STYLE GARANG) --}}
    <form method="POST" action="{{ route('logout') }}" class="mt-auto pt-6 border-t border-slate-100">
        @csrf
        <button class="w-full text-center px-4 py-3 rounded-xl border-2 border-red-500 text-red-500 font-bold hover:bg-red-500 hover:text-white transition-all duration-200 uppercase tracking-widest text-xs">
            Logout
        </button>
    </form>
</aside>