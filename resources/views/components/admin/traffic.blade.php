@props(['traffic'])

<div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 mb-8">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-lg font-bold">Grafik Kehadiran Mingguan</h2>
        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Senin - Jumat</span>
    </div>

    <div class="flex items-end justify-between h-48 gap-4 px-2">
        @foreach($traffic as $item)
            <div class="flex flex-col items-center group w-full">
                {{-- Bar --}}
                <div class="w-full bg-slate-100 rounded-t-lg hover:bg-slate-800 transition-all duration-300 relative"
                    style="height: {{ $item['jumlah'] > 0 ? ($item['jumlah'] * 2) : 10 }}px">

                    <span
                        class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-900 text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition">
                        {{ $item['jumlah'] }}
                    </span>
                </div>
                {{-- Label Hari --}}
                <span class="text-xs font-bold mt-3 text-slate-500 group-hover:text-slate-900">{{ $item['hari'] }}</span>
            </div>
        @endforeach
    </div>
</div>