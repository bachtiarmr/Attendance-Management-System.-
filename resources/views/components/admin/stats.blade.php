@props(['stats'])

<div class="grid grid-cols-5 gap-6 mb-8">
    @php
        $items = [
            ['title' => 'Total Karyawan', 'value' => $stats['total_karyawan'], 'color' => 'blue'],
            ['title' => 'Hadir Hari Ini', 'value' => $stats['hadir'], 'color' => 'green'],
            ['title' => 'Sedang Izin', 'value' => $stats['izin'], 'color' => 'amber'],
            ['title' => 'Terlambat', 'value' => $stats['terlambat'], 'color' => 'red'],
            ['title' => 'Tidak Hadir', 'value' => $stats['alpa'], 'color' => 'gray'],
        ];
    @endphp

    @foreach($items as $item)
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">{{ $item['title'] }}</p>
            <h3 class="text-3xl font-black text-slate-900">{{ $item['value'] }}</h3>
        </div>
    @endforeach
</div>