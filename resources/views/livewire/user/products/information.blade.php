<div class="flex flex-col-reverse md:flex-row justify-between items-cente pb-4 relative mt-6 mb-6">
    <div>
        <div class="mb-1">
            <span class="text-gray-500 dark:text-gray-400">{{ __('products.product_code') }} : </span>
            <span class="text-gray-700 dark:text-gray-100 @fa mr-1 @else ml-1 @endfa">@fa {{ enToFa($product->code) }} @else {{ $product->code }} @endfa</span>
        </div>

        <div class="mb-1">
            <span class="text-gray-500 dark:text-gray-400">{{ __('products.weight') }} : </span>
            <span class="text-gray-700 dark:text-gray-100 @fa mr-1 @else ml-1 @endfa">@fa {{ enToFa($product->weight) }} @else {{ $product->weight }} @endfa</span>
        </div>

        <div class="mb-1">
            <span class="text-gray-500 dark:text-gray-400">{{ __('products.box_number') }} : </span>
            <span class="text-gray-700 dark:text-gray-100 @fa mr-1 @else ml-1 @endfa">@fa {{ enToFa($product->number) }} @else {{ $product->number }} @endfa</span>
        </div>

        <div class="mb-1">
            <span class="text-gray-500 dark:text-gray-400">{{ __('products.price') }} : </span>
            @if(license())
                @php $license = true; @endphp
                <span class="text-gray-700 dark:text-gray-100 @fa mr-1 @else ml-1 @endfa">
                    @fa
                        {{ enToFa(number_format($product->price)) }} ریال
                    @else
                        {{ round($product->price / (getSettings()->dollar ?? 1), 3) }} USD
                    @endfa
                </span>
            @else
                <span class="text-gray-700 dark:text-gray-100 @fa mr-1 @else ml-1 @endfa">******</span>
                @php $license = false; @endphp
            @endif
        </div>

        @if(!$license)
            @livewire('user.products.license')
        @endif
    </div>

    <img width="400" class="-mx-auto object-cover" alt="{{ $product->name_fa }}-{{ $product->name_en }}" src="{{ asset('storage/product-photos/' . $product->photo_path) }}">
    
</div>