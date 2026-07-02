<form action="{{ route('admin.karyawan.store') }}" method="POST" class="space-y-5">
    @csrf

    <h2 class="text-xl font-black text-slate-900 mb-6">Tambah Data Karyawan</h2>

    {{-- Nama --}}
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap</label>
        <input type="text" name="name" required placeholder="Contoh: Yanuar Abdullah"
            class="w-full border border-slate-300 rounded-xl p-3 text-sm focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition">
    </div>

    {{-- Email --}}
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email (Untuk Login)</label>
        <input type="email" name="email" required placeholder="Contoh: yanuar@present.com"
            class="w-full border border-slate-300 rounded-xl p-3 text-sm focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition">
    </div>

    {{-- Password --}}
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Password Default</label>
        <input type="password" name="password" required placeholder="••••••••"
            class="w-full border border-slate-300 rounded-xl p-3 text-sm focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition">
    </div>

    {{-- Divisi --}}
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Divisi</label>
        <select name="divisi_id" required
            class="w-full border border-slate-300 rounded-xl p-3 text-sm focus:ring-2 focus:ring-slate-900 outline-none transition bg-white">
            <option value="" disabled selected>Pilih Divisi...</option>
            @foreach($divisis as $d)
                <option value="{{ $d->id }}">{{ $d->nama_divisi }}</option>
            @endforeach
        </select>
    </div>

    {{-- Buttons --}}
    <div class="pt-4 flex gap-3">
        <button type="submit"
            class="flex-1 bg-slate-900 text-white py-3 rounded-xl font-bold hover:bg-slate-800 transition">
            Simpan Karyawan
        </button>
        <button type="button" onclick="closeModal()"
            class="px-6 py-3 rounded-xl border border-slate-300 font-semibold text-slate-600 hover:bg-slate-50 transition">
            Batal
        </button>
    </div>
</form>
