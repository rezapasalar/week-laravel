@section('title', 'محصولات')

<div>
    <div class="flex flex-wrap justify-between items-center">

        <x-admin.products.search />

        @can('product:create')
            @livewire('admin.products.create')
        @endcan
    </div>

    @livewire('admin.products.edit')
        
    <div class="mt-4 overflow-auto">
        <table class="w-full">
            
            @livewire('admin.table-title', ['titles' => ['کد محصول', 'نام', 'وزن (گرم)', 'تعداد در کارتن', 'قیمت', 'ویو', 'کامنت', 'لایک', 'تصویر', 'اقدامات']])

            <tbody>
                @forelse($products as $product)
                    @livewire('admin.products.item', ['product' => $product, 'index' => $loop->index], key(rand() * $product->id))
                @empty
                    <tr><td colspan="10" class="p-3 text-center">{{ __('response.empty_data') }}</td></tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <div dir="ltr" class="mt-8">
        {!! $products->links() !!}
    </div>
</div>