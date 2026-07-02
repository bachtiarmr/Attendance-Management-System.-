<nav class="bg-white border-b px-8 py-4 flex justify-between items-center sticky top-0 z-20">
    <div>
        <h1 class="text-lg font-bold text-slate-800 tracking-tight">Dashboard User</h1>
        <p class="text-xs text-slate-500 font-medium uppercase tracking-widest">présent portal</p>
    </div>
    <div class="flex items-center gap-4">
        <div class="text-right">
            <p class="text-sm font-bold text-slate-800">{{ auth()->user()->name }}</p>
            <p class="text-xs text-slate-500">{{ auth()->user()->divisi->nama_divisi ?? 'Tanpa Divisi' }}</p>
        </div>
        <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-600">
            {{ substr(auth()->user()->name, 0, 1) }}
        </div>
    </div>
</nav>