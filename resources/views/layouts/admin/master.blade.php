<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <link rel="icon" type="image/png" href="{{ asset('images/icon/week-fa.png') }}">

        @vite('resources/css/app.css')

        @livewireStyles 
    </head>
    <body class="font-vazir antialiased">
        <div x-data="{
                loadingWorkSpace: false,
                isSidebarOpen: true,
                currentSidebarTab: null,
                isSettingsPanelOpen: false,
                isSubHeaderOpen: false,
                watchScreen() {
                    this.isSidebarOpen =!(window.innerWidth <= 1024) && true;
                },
                enToFa(value, split = false) {
                    return split ? new Number(value).toLocaleString('fa-ir') : new Number(value).toLocaleString('fa-ir').replaceAll('٬', '')
                }
            }" x-init="
                window.addEventListener('loading:work:space', () => loadingWorkSpace = false);
            " @resize.window="watchScreen()">

                @livewire('admin.layouts.sections.sidebar')

                <!-- Back dark -->
                <div x-show="isSidebarOpen" @click="isSidebarOpen = false" class="fixed inset-0 z-10 bg-black bg-opacity-50 lg:hidden" style="top: 60px !important"></div>

                <div x-bind:class="{'my-container-margin': isSidebarOpen}" class="relative my-container my-container-margin">
                    
                    @include('layouts.admin.sections.navbar')

                    <main class=" p-4 container-fluid mx-auto" style="min-height: calc(100vh - 120px); margin-top: 60px">
                        {{ $slot }}
                    </main>

                    @include('layouts.admin.sections.footer')

                    <div :style="{display: loadingWorkSpace ? 'flex' : 'none'}" class="flex justify-center absolute inset-0 bg-black bg-opacity-50 hidden"></div>

                </div>
        </div>

        @vite('resources/js/app.js')

        @livewireScripts
    </body>
</html>