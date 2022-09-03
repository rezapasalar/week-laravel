<!DOCTYPE html>
<html lang="{{ app()->currentLocale() }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('images/icon/week-fa.png') }}">

        @vite('resources/css/app.css')

    </head>
    <body class="font-vazir antialiased">
        <div class="text-gray-900">
            {{ $slot }}
        </div>

        @vite('resources/js/app.js')
    </body>
</html>
