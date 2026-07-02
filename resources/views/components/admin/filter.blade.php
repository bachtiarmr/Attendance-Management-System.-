<div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm mb-8 flex items-center gap-4">
    <div class="flex-1">
        <h3 class="text-sm font-bold text-slate-800">Filter Data</h3>
    </div>
    <form action="{{ route('admin.dashboard') }}" method="GET" class="flex gap-3">
        <input type="date" name="start_date"
            class="bg-slate-50 border border-slate-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-slate-900 outline-none">
        <input type="date" name="end_date"
            class="bg-slate-50 border border-slate-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-slate-900 outline-none">
        <button type="submit"
            class="bg-slate-900 text-white px-6 py-2 rounded-lg text-sm font-bold hover:bg-slate-800 transition">
            Filter
        </button>
    </form>
</div>