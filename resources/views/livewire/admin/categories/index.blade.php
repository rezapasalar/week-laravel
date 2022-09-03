@section('title', 'گروه ها')

<div>
    @livewire('admin.categories.create')

    @livewire('admin.categories.edit')
        
    <div class="mt-4 overflow-auto">
        <table class="w-full">
            
            @livewire('admin.table-title', ['titles' => ['نام فارسی', 'نام انگلیسی', 'اقدامات']])

            <tbody>
                @forelse($categories as $category)
                    @livewire('admin.categories.item', ['category' => $category, 'index' => $loop->index], key(rand() * $category->id))
                @empty
                    <tr><td colspan="3" class="p-3 text-center">{{ __('response.empty_data') }}</td></tr>
                @endforelse
            </tbody>
            
        </table>
    </div>
</div>