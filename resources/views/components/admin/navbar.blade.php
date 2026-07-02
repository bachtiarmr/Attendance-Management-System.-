<nav class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center sticky top-0 z-30">

    {{-- Left side: Breadcrumb/Page Info --}}
    <div>
        <h1 class="text-lg font-black text-slate-900 tracking-tight">
            Sistem Manajemen Kehadiran
        </h1>
        <p class="text-xs font-medium text-slate-500 uppercase tracking-widest">
            Admin Dashboard
        </p>
    </div>

    {{-- Right side: User Profile & Notification --}}
    <div class="flex items-center gap-6">

        {{-- Notification Bell --}}
        <button class="relative text-slate-400 hover:text-slate-900 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            {{-- Dot Indicator --}}
            <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full border-2 border-white"></span>
        </button>

        {{-- Profile Info --}}
        <div class="flex items-center gap-4 pl-6 border-l border-slate-100">
            <div class="text-right">
                <p class="text-sm font-bold text-slate-900">{{ auth()->user()->name ?? 'Admin' }}</p>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Super Administrator</p>
            </div>
            <div
                class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center text-white font-bold shadow-lg">
                {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
            </div>
        </div>
    </div>
</nav>