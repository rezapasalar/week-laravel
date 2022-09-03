<div x-data="{first_select: 0, second_select: null, loading: false}" x-init="
    window.addEventListener('loading:work:space', () => loading = false);

    $watch('first_select', () => {
        second_select = null;

        if (first_select == 0) {
            loading = true;
            @this.searchHandler(first_select, second_select);
        }
    })

    $watch('second_select', () => {
        if (second_select != null && second_select >= 0) {
            loading = true;
            @this.searchHandler(first_select, second_select);
        }
    })
" class="md:flex items-center">
    <div class="w-full md:w-3/12 ml-4 relative z-0">
        <select x-model="first_select" class="bg-[left_.5rem] focus:ring bg-gray-50 focus:ring-indigo-200 focus:ring-opacity-50 w-full p-2 rounded border-gray-300 z-0">
            <option value="0">همه</option>
            <option value="1">جنسیت</option>
            <option value="2">سال تولد</option>
            <option value="3">تحصیلات</option>
            <option value="4">نام یا کد ملی</option>|
        </select>

        <div :style="{display: (loading && second_select == null ? 'block' : 'none'), top: '5px'}" class="absolute left-2 bg-gray-50 rounded-full border-4 border-b-gray-300 border-x-gray-300 dark:border-b-gray-700 dark:border-x-gray-700 border-t-indigo-600 animate-spin h-8 w-8 hidden"></div>
    </div>

    <div :style="'display: ' + (first_select == 1 ? 'block' : 'none')" class="w-full md:w-3/12 mt-4 md:mt-0 ml-4 hidden my-slow-motion relative z-0">
        <select x-model="second_select" class="bg-[left_.5rem] focus:ring bg-gray-50 focus:ring-indigo-200 focus:ring-opacity-50 w-full p-2 rounded border-gray-300 z-0">
            <option selected>انتخاب نمایید</option>
            <option value="0">زن</option>
            <option value="1">مرد</option>
        </select>

        <div :style="{display: (loading ? 'block' : 'none'), top: '5px'}" class="absolute left-2 bg-gray-50 rounded-full border-4 border-b-gray-300 border-x-gray-300 dark:border-b-gray-700 dark:border-x-gray-700 border-t-indigo-600 animate-spin h-8 w-8 hidden"></div>
    </div>

    <div :style="'display: ' + (first_select == 2 ? 'block' : 'none')" class="w-full md:w-3/12 mt-4 md:mt-0 ml-4 hidden my-slow-motion relative z-0">
        <select x-model="second_select" class="bg-[left_.5rem] focus:ring bg-gray-50 focus:ring-indigo-200 focus:ring-opacity-50 w-full p-2 rounded border-gray-300 z-0">
            <option selected>انتخاب نمایید</option>
            @foreach(range(1390, 1330) as $year)
                <option value="{{ $year }}">{{ $year }}</option>
            @endforeach
        </select>

        <div :style="{display: (loading ? 'block' : 'none'), top: '5px'}" class="absolute left-2 bg-gray-50 rounded-full border-4 border-b-gray-300 border-x-gray-300 dark:border-b-gray-700 dark:border-x-gray-700 border-t-indigo-600 animate-spin h-8 w-8 hidden"></div>
    </div>

    <div :style="'display: ' + (first_select == 3 ? 'block' : 'none')" class="w-full md:w-3/12 mt-4 md:mt-0 ml-4 hidden my-slow-motion relative z-0">
        <select x-model="second_select" class="bg-[left_.5rem] focus:ring bg-gray-50 focus:ring-indigo-200 focus:ring-opacity-50 w-full p-2 rounded border-gray-300 z-0">
            <option selected>انتخاب نمایید</option>
            <option value="4">لیسانس</option>
            <option value="3">فوق دیپلم</option>
            <option value="2">دیپلم</option>
            <option value="1">سیکل</option>
        </select>

        <div :style="{display: (loading ? 'block' : 'none'), top: '5px'}" class="absolute left-2 bg-gray-50 rounded-full border-4 border-b-gray-300 border-x-gray-300 dark:border-b-gray-700 dark:border-x-gray-700 border-t-indigo-600 animate-spin h-8 w-8 hidden"></div>
    </div>

    <div :style="'display: ' + (first_select == 4 ? 'flex' : 'none')" class="justify-center items-center w-full md:w-3/12 mt-4 md:mt-0 ml-4 hidden my-slow-motion relative z-0">
        <x-jet-input type="text" class="block w-full z-0" placeholder="متن جستجو"
            wire:model.debounce.1000ms="search" />

        <div wire:loading wire:target="search" style="top: 5px" class="absolute left-2 top-2 bg-gray-50 rounded-full border-4 border-b-gray-300 border-x-gray-300 dark:border-b-gray-700 dark:border-x-gray-700 border-t-indigo-600 animate-spin h-8 w-8"></div>
    </div>
</div>