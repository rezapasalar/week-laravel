<!DOCTYPE html>
<html lang="{{ app()->currentLocale() }}" dir="{{ app()->currentLocale() == 'fa' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-red-600 dark:bg-gray-900 sm:items-center sm:pt-0">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                    <div class="px-4 text-lg {{ app()->currentLocale() == 'fa' ? 'border-l' : 'border-r' }} text-white border-white">
                        @yield('code')
                    </div>

                    <div class="{{ app()->currentLocale() == 'fa' ? 'mr-4' : 'ml-4' }} text-lg text-white uppercase">
                        @yield('message')
                    </div>
                </div>

                <div class="text-center mt-10">
                    <a href="{{ app('router')->has('home') ? route('home') : url('/') }}" class="bg-white text-gray-600 uppercase tracking-wide py-1 px-3 text-sm border-2 border-grey-light hover:border-grey rounded-lg">
                        {{ __('button.go_home') }}
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
