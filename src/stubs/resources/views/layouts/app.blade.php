<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials._head')
<body>
<div id="app">
    <main>
        @yield('content')
    </main>
</div>
</body>
</html>
