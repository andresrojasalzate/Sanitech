<!doctype html>
<html lang="es">

<head>
    @vite(['resources/sass/main.scss'])

    <title>@yield('title')</title>
</head>

<body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')
</body>

</html>