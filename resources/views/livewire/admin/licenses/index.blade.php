@section('title', 'لایسنس')

<div>
    @can('license:create')
        @livewire('admin.licenses.create')
    @endcan

    @can('license:edit')
        @livewire('admin.licenses.edit')
    @endcan
        
    <div class="mt-4 overflow-auto">
        <table class="w-full">
            
            @livewire('admin.table-title', ['titles' => ['نام کاربری', 'تاریخ انقضا' ,'وضعیت' ,'اقدامات']])

            <tbody wire:poll.keep-alive.61000ms>
                @forelse($licenses as $license)
                    @livewire('admin.licenses.item', ['license' => $license, 'index' => $loop->index], key(rand()))
                @empty
                    <tr><td colspan="3" class="p-3 text-center">{{ __('response.empty_data') }}</td></tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>