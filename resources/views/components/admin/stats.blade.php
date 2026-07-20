@props(['stats'])

<<<<<<< HEAD
<div class="grid grid-cols-4 gap-6 mb-8">
=======
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
>>>>>>> d9ab3cbcc48faa649be3822073a24b29e165c6a4

    <x-admin.card title="Total Karyawan" :value="$stats['total_karyawan']" />
    <x-admin.card title="Hadir Hari Ini" :value="$stats['hadir']" />
    <x-admin.card title="Sedang Izin" :value="$stats['izin']" />
    <x-admin.card title="Terlambat" :value="$stats['terlambat']" />

</div>