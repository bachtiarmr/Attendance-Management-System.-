@props(['summary'])

<div class="grid grid-cols-3 gap-6">
    @php
        $cards = [
            ['title' => 'Total Hadir (Bulan Ini)', 'value' => $summary['hadir'], 'border' => 'border-green-500'],
            ['title' => 'Total Terlambat (Bulan Ini)', 'value' => $summary['terlambat'], 'border' => 'border-red-500'],
            ['title' => 'Total Izin (Bulan Ini)', 'value' => $summary['izin'], 'border' => 'border-amber-500'],
        ];
    @endphp

    @foreach($cards as $card)
        <div class="bg-white p-6 rounded-2xl border-l-4 {{ $card['border'] }} shadow-sm">
            <p class="text-sm font-semibold text-slate-500 mb-1">{{ $card['title'] }}</p>
            <h2 class="text-2xl font-black text-slate-900">{{ $card['value'] }}</h2>
        </div>
    @endforeach
</div>