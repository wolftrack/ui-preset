<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials._head')
<body class="bg-black">
<div id="app" class="bg-cover-image h-screen bg-cover">
    <main class="h-full flex justify-center items-center">
        @yield('content')
    </main>
</div>
</body>
</html>
