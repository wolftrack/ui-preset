<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wolftrack</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body class="font-sans leading-none text-grey-darkest antialiased">
@inertia
</body>
</html>
