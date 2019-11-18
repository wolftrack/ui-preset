<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ mix('js/app.js') }}"></script>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
