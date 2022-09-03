<div>
    <div class="py-6 shadow rounded-0 md:rounded-lg bg-white dark:bg-gray-700 space-y-3 mb-6">
        <div class="pb-4 mx-4 border-b border-solid border-gray-800 border-opacity-10">
            <span class="text-md text-gray-600 dark:text-gray-100 font-bold">{{ __('products.product_category') }}</span>
        </div>

        <div>
            @foreach(\App\Models\Category::orderBy('name_' . app()->currentLocale(), 'ASC')->get() as $category) 
                <div id="{{ $category->slug }}" onclick="activeCategory(this)" class="category-row flex items-center justify-between hover:bg-gray-100 dark:hover:bg-gray-800/30 hover:text-gray-500 dark:hover:text-gray-300 transation-all duration-300">
                    <label class="px-4 py-2 flex items-center space-x-2 @fa space-x-reverse @endfa }} w-full">
                        <input @click="loadingWorkSpace = true; Livewire.emit('setFilter', $event.target.value)" class="flex-0 cursor-pointer form-radio w-4 h-4 rounded-full border border-gray-300 bg-gray-100" type="radio" name="filter" :value="'{{ $category->slug }}'">
                        <span class="cursor-pointer text-gray-500 dark:text-gray-300 font-medium ml-2 flex-1">@fa {{ $category->name_fa }} @else {{ $category->name_en }} @endfa</span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="py-6 shadow rounded-0 md:rounded-lg bg-white dark:bg-gray-700 space-y-4 mb-6">
        <div class="pb-4 mx-4 border-b border-solid border-gray-800 border-opacity-10">
            <span class="text-md text-gray-600 dark:text-gray-100 font-bold">{{ __('products.grouping') }}</span>
        </div>

        <div>
            <div id="latest" onclick="activeCategory(this)" class="category-row px-4 py-2 flex items-center justify-between hover:bg-gray-100 dark:hover:bg-gray-800/30 hover:text-gray-500 dark:hover:text-gray-300 transation-all duration-300 cursor-pointer">
                <label class="flex items-center space-x-2 @fa space-x-reverse @endfa }}">
                    <input @click="loadingWorkSpace = true; Livewire.emit('setFilter', $event.target.value)" class="cursor-pointer form-radio w-4 h-4 rounded-full border border-gray-300 bg-gray-100" type="radio" name="filter" value="latest">
                    <span class="cursor-pointer text-gray-500 dark:text-gray-300 font-medium">{{ __('products.recent_products') }}</span>
                </label>
            </div>

            <div id="view_count" onclick="activeCategory(this)" class="category-row px-4 py-2 flex items-center justify-between hover:bg-gray-100 dark:hover:bg-gray-800/30 hover:text-gray-500 dark:hover:text-gray-300 transation-all duration-300 cursor-pointer">
                <label class="flex items-center space-x-2 @fa space-x-reverse @endfa }}">
                    <input @click="loadingWorkSpace = true; Livewire.emit('setFilter', $event.target.value)" class="cursor-pointer form-radio w-4 h-4 rounded-full border border-gray-300 bg-gray-100" type="radio" name="filter" value="view_count">
                    <span class="cursor-pointer text-gray-500 dark:text-gray-300 font-medium">{{ __('products.most_viewed') }}</span>
                </label>
            </div>
        </div>
    </div>

    <div class="py-4 shadow rounded-0 md:rounded-lg bg-white dark:bg-gray-700 mb-6">
        <a class="flex items-center justify-center text-gray-500 dark:text-gray-300 px-4" target="_blank" href="{{ asset('pdf/catalog.pdf') }}">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" fill="currentColor" viewBox="0 0 485.403 485.403" class="w-6 h-6 @fa ml-2 @else mr-2 @endfa" xml:space="preserve">
                <g><g><path d="M395.444,267.441l-0.1,0.5c-0.2,0.8,0,1.2-0.4,2.4c-0.4,2-1,4.1-1.8,6c-3.2,7.7-9.9,14.3-18.1,17.4    c-4.8,1.8-8.7,2.3-16.4,2.9c-6.7,0.7-12.6,1.7-17.6,2.9c-9.9,2.4-15.7,5.8-14.6,10.4c1,4.1,7,7.7,16.6,10.4    c4.8,1.3,10.5,2.5,17,3.3c1.6,0.2,3.3,0.4,5,0.6c1.9,0.1,4.3,0.2,6.5,0.2c4.5-0.2,9.3-0.9,14.1-2.5c17.1-5.4,31.9-18.6,38.9-35.7    c0.8-2.1,1.7-4.3,2.3-6.5l0.9-3.3c0.3-1.2,0.5-2.5,0.7-3.8c0.2-1.2,0.4-2.7,0.5-3.7l0.2-2.7l0.1-1.3l0.1-0.7v-1.4l0.1-2.7    l0.5-21.3c0.7-28.4,1.1-56.8,1-85.1l-0.5-68.3l-0.2-17.1c0-0.6,0-1.5-0.1-2.5l-0.2-2.8c-0.1-1.9-0.4-3.7-0.7-5.6    c-0.5-3.7-1.6-7.4-2.8-10.9c-5-14.3-15.2-26.4-28.1-33.9c-6.5-3.8-13.4-6.3-21-7.7c-2-0.3-4.2-0.6-6.1-0.8l-4.3-0.1h-1.8h-1.1    h-2.1l-4.3,0.1l-34,0.6l-68.3,1.1c-40.8-2.9-81.9-4.6-123.1-5.6l-7.7-0.2c-1.1-0.1-3.1,0-4.8,0.1c-1.8,0.1-3.6,0.1-5.3,0.4    c-7.1,0.7-14.1,2.8-20.6,5.8c-13.1,6-24,16.5-31,29.2c-1.7,3.2-3.2,6.5-4.4,10c-0.7,1.7-1.1,3.5-1.6,5.2s-0.9,3.5-1.2,5.7    l-0.4,3.1c-0.1,1-0.3,2.2-0.3,2.7l-0.2,3.9l-0.2,8.6l-0.1,31c0.1,41.4,0.2,82.9,0.3,124.3v31.1v1.9l0.1,2.6    c0.1,1.8,0.1,3.6,0.4,5.4c0.5,3.6,1.1,7.2,2.1,10.7c2,7,5,13.7,9,19.7c8.2,12,20,21.5,33.7,26.4c1.7,0.7,3.4,1.2,5.2,1.7    c1.9,0.4,3.3,1,5.5,1.3c2.1,0.3,4.1,0.6,6.2,0.9l3.9,0.2l1,0.1h2h1.9h3.9l7.7,0.1c7.4,0.1,18.9-3.4,22.5-5.8    c7.2-4.9-2.2-9-16.1-12.1c-5.8-1.3-11.7-2.5-17.7-3.6c-1.6-0.3-2.9-0.5-4.5-0.9c-1.5-0.4-3.1-0.6-4.4-1.1c-2.7-0.9-5.4-2-8-3.3    c-10.3-5.4-18.1-14.6-21.7-25c-1.8-5.2-2.5-10.6-2.1-16c0.4-6.8,0.8-13.6,1.3-20.5c0.8-14,1.3-28.2,1.6-42.4    c0.8-34.3,1.5-68.5,2.3-102.8l0.6-25.7l0.1-3.2v-1.6l0,0l0.1-0.8c0.1-2.1,0.3-4.7,0.6-5.2c0.1-0.9,0.5-2.2,0.9-3.6    c0.4-1.3,1-2.6,1.5-3.9c4.7-10.1,15.1-17,25.7-17.7h2h1h1.6l6.4,0.1l12.9,0.2l25.8,0.3c17.2,0.1,34.4,0.2,51.6,0.2    c34.4,0,68.8-0.3,103.3-1.2l25.6,0.6c8,0.3,18.9,0.1,21.6,1.2c8,1.9,15.1,7.3,19,14.4c2,3.5,3.2,7.4,3.6,11.4l0.1,3v4.9l-0.1,10.1    c-0.2,27.1-0.3,54.1-0.2,81.1c0.1,27,0.4,54,0.9,81l0.4,19.3l-0.1,2.5L395.444,267.441z"/><path d="M258.144,480.741L258.144,480.741l0.2-0.1l0.4-0.2c2-1.2,4-2.5,6-3.8c3.9-2.6,7.7-5.4,11.3-8.3    c7.3-5.8,14.1-12.2,20.8-18.8c13.3-13.1,25.8-27.1,39.8-39.4c1.2-1.1,0.6-5.4-0.5-7.7c-2.3-4.6-6.7-6-11.2-6    c-14.6,0.1-26.8,5.8-36.7,14c-9.7,8-19.5,16-29.2,24.1c1.1-9.4,2.1-18.7,1.9-28.1c-0.4-21.4-2.4-42.7-3.7-64.1    c11.5-38.3,4.9-77.4,7.3-116.1c0.1-1.7-3.4-4.4-5.8-5.3c-4.9-1.7-9,0.5-12.1,3.8c-10.3,10.8-14.8,23.9-16,37.3    c-2.9,32.1-7.3,64.3-4,96.6c-0.4,4-0.8,8-1.1,12c-1.2,18.6-1.8,37.2-0.4,55.8c-12.8-13.9-26.5-26.9-42-38    c-5.7-4.1-13-4.9-19.1,1.9c-5.5,6.2-6.4,14-2,19.7c7.8,10.2,15.5,20.6,24.7,29.5c7.4,7.1,15.1,14,22.8,20.7l11.7,10.1l5.8,5    l2.9,2.5l1.5,1.3c-0.1-0.1,2.3,2.3,4.3,3.2c3.6,2.4,8.1,3.5,12.6,2.9c2.2-0.3,4.5-1,6.5-2.2c0.6-0.3,1.3-0.8,1.9-1.3l0.4-0.3    l0.1-0.1l0.2-0.1l0.1-0.1l0,0C257.144,481.741,258.244,480.641,258.144,480.741z M254.244,457.041l-0.3-0.2l-0.3-0.3    c0.1,0.1,0.2,0.1,0.3,0.2L254.244,457.041C254.444,457.141,254.244,457.041,254.244,457.041z"/></g></g>
            </svg>
            <span class="font-medium">{{ __('products.download_catalog') }}</span>
        </a>
    </div>

    <script>
        const categoryRows = document.querySelectorAll('.category-row');

        const activeCategory = (e) => {
            categoryRows.forEach(item => {
                item.classList.remove('bg-gray-200');
                item.classList.remove('dark:bg-gray-800/60');
            });
            e.classList.add('bg-gray-200');
            e.classList.add('dark:bg-gray-800/60');
        }

        window.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const filterQueryString = urlParams.get('filter');
            console.log(filterQueryString)

            if (!filterQueryString) {
                const categoryRow = document.querySelector('.category-row');
                categoryRow.classList.add('bg-gray-200');
                categoryRow.classList.add('dark:bg-gray-800/60');
                categoryRow.querySelector('input').setAttribute('checked');
            } else {
                const filter = document.getElementById(filterQueryString);
                filter.querySelector('input').setAttribute('checked');
                filter.classList.add('bg-gray-200');
                filter.classList.add('dark:bg-gray-800/60');
            }
        })
    </script>
</div>