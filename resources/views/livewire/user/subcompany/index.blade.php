@section('title', __('menu.subcompany'))

<div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8 my-required-star">
    <div class="p-4 mb-8 bg-blue-100 dark:bg-gray-800 rounded-0 md:rounded-lg text-gray-500 dark:text-gray-300 leading-8 text-justify">
        <h1 class="text-xl text-red-600 mb-2">{{ __('app.novin_gol_asal') }}</h1>
        {{ __('subcompany.intro') }}
    </div>

    <img class="w-full mb-8 rounded-0 md:rounded-lg" src="{{ asset('images/subcompany/1.png') }}" alt="{{ __('app.novin_gol_asal') }}">

    <div class="p-4 mb-8 bg-blue-100 dark:bg-gray-800 rounded-0 md:rounded-lg text-gray-500 dark:text-gray-300 leading-8 text-justify">{{ __('subcompany.description') }}</div>

    <div class="flex flex-col md:flex-row gap-8">
        <img class="w-full md:w-6/12 rounded-0 md:rounded-lg lozad" data-src="{{ asset('images/subcompany/2.png') }}" alt="{{ __('app.novin_gol_asal') }}" alt="{{ __('app.novin_gol_asal') }}">
        <img class="w-full md:w-6/12 rounded-0 md:rounded-lg lozad" data-src="{{ asset('images/subcompany/3.png') }}" alt="{{ __('app.novin_gol_asal') }}" alt="{{ __('app.novin_gol_asal') }}">
    </div>
</div>
