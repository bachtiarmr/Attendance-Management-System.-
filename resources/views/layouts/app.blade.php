<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Présent')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50 text-slate-900 font-sans antialiased">
    <x-toast />
    @yield('body')

</body>

</html>