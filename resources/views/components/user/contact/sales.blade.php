<div class="md:mt-0 md:col-span-3 mb-8 md:mb-0 lg:col-span-2 rounded-0 md:rounded-lg">
    <article class="flex flex-col h-full rounded-0 md:rounded-lg bg-white dark:bg-gray-800 md:shadow">

        <div class="px-5 pt-6 pb-2 text-gray-500 dark:text-gray-100">
            <x-both.svg.sales />
            <div class="text-xl text-center mt-4">{{ __('contact.sales_office_title') }}</div>
        </div>

        <div class="flex flex-col flex-1 space-y-4 px-5 py-5">
            <div class="flex flex-wrap">
                <span class="text-gray-400 @fa ml-2 @else mr-2 @endfa">{{ __('fields.country_sale_unit') }} : </span>
                <span class="text-gray-600 dark:text-gray-200">{{ __('contact.country_sale_unit') }}</span>
            </div>

            <div class="flex flex-wrap">
                <span class="text-gray-400 @fa ml-2 @else mr-2 @endfa">{{ __('fields.shops_unit') }} : </span>
                <span class="text-gray-600 dark:text-gray-200">{{ __('contact.shops_unit') }}</span>
            </div>

            <div class="flex flex-wrap">
                <span class="text-gray-400 @fa ml-2 @else mr-2 @endfa">{{ __('fields.export_unit') }} : </span>
                <span class="text-gray-600 dark:text-gray-200">{{ __('contact.export_unit') }}</span>
            </div>

            <div class="flex flex-wrap">
                <span class="text-gray-400 @fa ml-2 @else mr-2 @endfa">{{ __('fields.whatsapp') }} : </span>
                <span class="text-gray-600 dark:text-gray-200">{{ __('contact.whatsapp') }}</span>
            </div>

            <div class="flex flex-wrap">
                <span class="text-gray-400 @fa ml-2 @else mr-2 @endfa">{{ __('fields.state_sale_unit') }} : </span>
                <span class="text-gray-600 dark:text-gray-200">{{ __('contact.state_sale_unit') }}</span>
            </div>

            <div class="flex flex-wrap">
                <span class="text-gray-400 @fa ml-2 @else mr-2 @endfa">{{ __('fields.tehran_sale_unit') }} : </span>
                <span class="text-gray-600 dark:text-gray-200">{{ __('contact.tehran_sale_unit') }}</span>
            </div>
        </div>
        
    </article>
</div>