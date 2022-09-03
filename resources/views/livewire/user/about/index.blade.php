@section('title', __('menu.about'))

<div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8 my-required-star">

    <div class="md:col-span-4 p-4 text-justify leading-8 mb-8 bg-blue-100 dark:bg-gray-800 rounded-0 md:rounded-lg text-gray-500 dark:text-gray-300">{{ __('about.intro') }}</div>

    <div class="md:grid md:grid-cols-4 md:gap-6">
        @foreach(__('about.items') as $item)
            <div class="md:mt-0 md:col-span-2 lg:col-span-1 rounded-0 md:rounded-lg shadow @if(!$loop->last) mb-8 @endif md:mb-0">
                <article class="flex flex-col h-full rounded-0 md:rounded-lg bg-white dark:bg-gray-800 shadow-sm overflow-hidden1">
                    <div class="h-48 overflow-hidden m-3 rounded-lg">
                        <img class="w-full h-full object-cover lozad" data-src="{{ asset("images/about/{$loop->index}.png") }}" alt="{{ __('app.name') }}">
                    </div>

                    <div class="flex flex-col flex-1 space-y-3">
                        <div class="px-4 flex-grow">
                            <h2 class="font-medium text-lg text-gray-600 dark:text-gray-100 leading-relaxed tracking-tight hover:underline">{{ $item['title'] }}</h2>
                            <p class="mt-2 mb-3 text-sm text-gray-500 dark:text-gray-400 text-justify leading-relaxed text-justify-">{{ $item['description'] }}</p>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach

    </div>
</div>