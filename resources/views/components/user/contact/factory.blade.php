<div class="md:mt-0 md:col-span-3 mb-8 md:mb-0 lg:col-span-2 rounded-0 md:rounded-lg">
    <article class="flex flex-col h-full rounded-0 md:rounded-lg bg-white dark:bg-gray-800 md:shadow">

        <div class="px-5 pt-6 pb-2 text-gray-500 dark:text-gray-100">
            <x-both.svg.factory />
            <div class="text-xl text-center mt-4">{{ __('contact.factory_title') }}</div>
        </div>

        <div class="flex flex-col flex-1 space-y-4 px-5 py-5">
            <div class="flex flex-wrap">
                <span class="text-gray-400 @fa ml-2 @else mr-2 @endfa">{{ __('fields.address') }} : </span>
                <span class="text-gray-600 dark:text-gray-200">{{ __('contact.address') }}</span>
            </div>

            <div class="flex flex-wrap">
                <span class="text-gray-400 @fa ml-2 @else mr-2 @endfa">{{ __('fields.fax') }} : </span>
                <span class="text-gray-600 dark:text-gray-200">{{ __('contact.fax') }}</span>
            </div>

            <div class="flex flex-wrap">
                <span class="text-gray-400 @fa ml-2 @else mr-2 @endfa">{{ __('fields.phone') }} : </span>
                <span class="text-gray-600 dark:text-gray-200">{{ __('contact.phone') }}</span>
            </div>

            <div class="flex flex-wrap">
                <span class="text-gray-400 @fa ml-2 @else mr-2 @endfa">{{ __('fields.quality_control_unit') }} : </span>
                <span class="text-gray-600 dark:text-gray-200">{{ __('contact.quality_control_unit') }}</span>
            </div>
        </div>
        
    </article>
</div>