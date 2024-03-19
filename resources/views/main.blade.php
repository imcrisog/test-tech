<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Tickets | @yield('title') </title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.7/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    @yield('css')
</head>
<body class="bg-slate-800 text-white">
    
    @yield('body')

    @yield('js')
</body>
</html>