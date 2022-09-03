<div class="my-slow-motion shadow rounded-0 md:rounded-lg min-h-[371px]">
    <article class="flex flex-col h-full rounded-0 md:rounded-lg bg-white dark:bg-gray-800 shadow-sm overflow-hidden">
        <img x-on:click="$dispatch('show:modal', { 'id': {{ $product->id }} })" wire:ignore class="w-full h-full object-cover lozad cursor-pointer" alt="{{ $product->name_fa }} - {{ $product->name_en }}" data-src="{{ asset('storage/product-photos/' . $product->photo_path) }}">
    
        <div x-on:click="$dispatch('show:modal', { 'id': {{ $product->id }} })" class="p-2 text-center text-gray-500 dark:text-gray-100 cursor-pointer">
            <h2 class="font-medium text-sm leading-relaxed tracking-tight h-[2.2rem]">
                {{ $product['name_' . app()->currentLocale()] }}
            </h2>
        </div>

        <div>
            <div class="bg-gray-200 dark:bg-gray-700 text-gray-500 dark:text-gray-100 rounded-0 md:rounded-lg py-3 px-5 ">
                <div class="flex justify-between items-center">
      
                    <div class="flex items-baseline font-bold flex-row-reverse text-tiny">
                        <div class="flex items-center space-x-1 space-x-reverse">

                            @if(!\App\Models\Like::whereIpAddress(request()->ip())->whereProductId($product->id)->exists())
                                <svg viewBox="0 0 24 24" stroke="currentColor" fill="none" class="w-6 h-6 hover:text-red-600 cursor-pointer" wire:click="like">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            @else
                                <svg viewBox="0 0 24 24" stroke="currentColor" fill="currentColor" class="w-6 h-6 hover:text-red-500 cursor-pointer text-red-600" wire:click="like">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            @endif

                            <span class="mr-1">@fa {{ enToFa($product->like) }} @else {{ $product->like }} @endfa</span>

                        </div>
                    </div>
                
                    <span>@fa {{ enToFa($product->code) }} @else {{ $product->code }} @endfa</span>

                </div>
            </div>
        </div>
    </article>
</div>