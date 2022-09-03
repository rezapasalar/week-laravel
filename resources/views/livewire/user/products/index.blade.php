@section('title', __('menu.products'))

<div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8" wire:init="loadProducts">

    <div class="lg:grid lg:grid-cols-6 lg:gap-6">

        <div class="lg:col-span-1 mb-7 lg:mb-0">
            @livewire('user.products.filters', ['filter' => $filter])
        </div>

        <div class="lg:col-span-5 my-products">

            @if($readyToLoad)
                @if($products->count())

                    @livewire('user.products.show')

                    <div class="relative grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 grid-flow-row gap-6">

                        <div :style="{display: (loadingWorkSpace ? 'block' : 'none')}" class="absolute inset-0 bg-gray-200/75 dark:bg-gray-900/75 z-50 rounded-0 md:rounded-lg my-slow-motion-500 shadow-sm flex justify-center">
                            <div class="rounded-full border-4 border-b-gray-300 border-x-gray-300 dark:border-b-gray-700 dark:border-x-gray-700 border-t-red-600 animate-spin h-8 w-8 mx-auto mt-8"></div>
                        </div>

                        @foreach($products as $product)
                            @livewire('user.products.item', ['product' => $product, 'filter' => $filter], key(rand() * $product->id))
                        @endforeach
                        
                    </div>
                    
                @else
                    <x-both.alert.weekilize class="mt-0" :message="__('response.empty_data')" />
                @endif
            @else
                <x-both.alert.weekilize class="mt-0" :loading="true" :message="__('products.fetch')" />
            @endif

        </div>
        
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => setTimeout(() => window.history.pushState({}, null, location.href.split('&')[0])))
    </script>
</div>