@if (session()->has('success') || session()->has('error'))
    <div id="toast-message" class="fixed top-5 right-5 z-[100] p-4 rounded-2xl shadow-2xl text-white font-bold flex items-center gap-3 transition-all duration-500 transform translate-x-0 
            {{ session()->has('success') ? 'bg-green-600' : 'bg-red-600' }}">

        <span>{{ session()->get('success') ?? session()->get('error') }}</span>

        <button onclick="closeToast()" class="hover:text-slate-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <script>
        // Ilang otomatis setelah 3 detik
        setTimeout(() => {
            closeToast();
        }, 3000);

        function closeToast() {
            const toast = document.getElementById('toast-message');
            toast.classList.add('opacity-0', 'translate-x-full');
            setTimeout(() => toast.remove(), 500);
        }
    </script>
@endif