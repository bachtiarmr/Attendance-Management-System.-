<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel | Présent</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50 text-slate-800">
    <x-toast />
    <div class="flex min-h-screen">
        <x-admin.sidebar />
        <div class="flex-1">
            <x-admin.navbar />
            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        const modalBox = document.getElementById(modalId + '-box');

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // Timeout biar animasinya smooth
        setTimeout(() => {
            modalBox.classList.remove('scale-95');
            modalBox.classList.add('scale-100');
        }, 10);
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        const modalBox = document.getElementById(modalId + '-box');

        modalBox.classList.remove('scale-100');
        modalBox.classList.add('scale-95');

        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300);
    }
</script>

</html>