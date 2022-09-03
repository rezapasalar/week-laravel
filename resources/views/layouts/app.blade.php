<!DOCTYPE html>
<html lang="{{ app()->currentLocale() }}" dir="{{ app()->currentLocale() == 'fa' ? 'rtl' : 'ltr' }}" class="{{ cache()->get('darkmode') ?? 'light' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        @fa
            <link rel="icon" type="image/png" href="{{ asset('images/icon/week-fa.png') }}">
        @else
            <link rel="icon" type="image/png" href="{{ asset('images/icon/week-en.png') }}">
        @endfa

        @vite('resources/css/app.css')

        @livewireStyles
    </head>
    <body class="font-vazir antialiased overflow-y-hidden bg-gray-100 dark:bg-gray-900">
        <x-jet-banner />

        <div x-data="{
            loadingWorkSpace: false,
            enToFa(value, split = false) {
                return split ? new Number(value).toLocaleString('fa-ir') : new Number(value).toLocaleString('fa-ir').replaceAll('٬', '');
            }
        }"
            x-init="
                window.addEventListener('loading:work:space', () => loadingWorkSpace = false);
                
                document.addEventListener('DOMContentLoaded', () => {
                    document.body.classList.remove('overflow-y-hidden');
                    $refs.loading.classList.add('hidden');
                    $dispatch('scroll:top');
                })
            "
            class="min-h-screen my-slow-motion overflow-y-hidden">

            @include('layouts.user.sections.loading')

            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @include('layouts.user.sections.footer')
            
            @include('layouts.user.sections.scrolltop')
            
        </div>

        @stack('modals')

        @vite('resources/js/app.js')

        @livewireScripts
    </body>
</html>
