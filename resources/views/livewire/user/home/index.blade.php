@section('title', __('app.week_food_industries'))

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    @include('layouts.user.sections.slideshow')

    <div class="md:grid md:grid-cols-4 md:gap-6 pb-8">

        <div class="md:col-span-3">
            <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow rounded-0 md:rounded-t-lg min-h-[500px]">
                <h1 class="text-2xl text-red-600 pt-4 leading-10 text-center">{{ __('home.title') }}</h1>
                <h5 class="text-xl mt-8 leading-10 text-gray-500 dark:text-gray-300 text-justify">{{ __('home.description') }}</h5>
            </div>
        </div>

        <div>
            <img class="w-full rounded-0 md:rounded-md" src="{{ asset('images/home/home.png') }}" alt="{{ __('app.name') }}">
        </div>

    </div>
</div>