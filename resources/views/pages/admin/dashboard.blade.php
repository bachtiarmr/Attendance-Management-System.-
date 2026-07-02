@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-black text-slate-900 tracking-tight">Dashboard Admin</h1>
        <p class="text-slate-500 font-medium">Monitoring performa kehadiran karyawan secara real-time</p>
    </div>

    {{-- Stats Cards --}}
    <x-admin.stats :stats="$stats" />

    {{-- Filter Bar --}}
    <x-admin.filter />

    {{-- Traffic Chart --}}
    <x-admin.traffic :traffic="$traffic" />

    {{-- Summary Details --}}
    <x-admin.summary :summary="$summary" />
@endsection