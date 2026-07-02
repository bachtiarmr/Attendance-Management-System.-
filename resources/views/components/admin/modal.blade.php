@props(['id'])

{{-- Overlay Backdrop --}}
<div id="{{ $id }}"
    class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-sm transition-all duration-300">

    {{-- Modal Box --}}
    <div class="bg-white w-full max-w-lg rounded-3xl p-8 shadow-2xl transform transition-all duration-300 scale-95"
        id="{{ $id }}-box">
        {{ $slot }}
    </div>

</div>