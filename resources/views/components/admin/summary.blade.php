@props(['summary'])

<<<<<<< HEAD
<div class="grid grid-cols-3 gap-6">
=======
<div class="grid grid-cols-4 gap-6">
    @php
        $cards = [
            ['title' => 'Total Hadir (Bulan Ini)', 'value' => $summary['hadir'], 'border' => 'border-green-500'],
            ['title' => 'Total Terlambat (Bulan Ini)', 'value' => $summary['terlambat'], 'border' => 'border-red-500'],
            ['title' => 'Total Izin (Bulan Ini)', 'value' => $summary['izin'], 'border' => 'border-amber-500'],
            ['title' => 'Total Tidak Hadir (Bulan Ini)', 'value' => $summary['alpa'], 'border' => 'border-gray-500'],
        ];
    @endphp
>>>>>>> d9ab3cbcc48faa649be3822073a24b29e165c6a4

    <div class="bg-white p-4 rounded-xl border">
        <p class="text-sm text-slate-500">Total Hadir</p>
        <h2 class="text-2xl font-semibold">{{ $summary['hadir'] }}</h2>
    </div>

    <div class="bg-white p-4 rounded-xl border">
        <p class="text-sm text-slate-500">Total Terlambat</p>
        <h2 class="text-2xl font-semibold">{{ $summary['terlambat'] }}</h2>
    </div>

    <div class="bg-white p-4 rounded-xl border">
        <p class="text-sm text-slate-500">Total Izin</p>
        <h2 class="text-2xl font-semibold">{{ $summary['izin'] }}</h2>
    </div>

</div>