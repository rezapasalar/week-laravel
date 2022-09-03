@section('title', 'مقام ها')

<div>
    <div class="flex flex-wrap justify-between items-center">
        <div class="relative block w-full md:w-5/12 z-0 mb-4 md:mb-0">
            <x-jet-input type="text" class="mt-1 block w-full z-0" placeholder="متن جستجو"
                        wire:model.debance.1000ms="search" />

            <div wire:loading wire:target="search" class="absolute left-2 top-2 bg-gray-50 rounded-full border-4 border-b-gray-300 border-x-gray-300 dark:border-b-gray-700 dark:border-x-gray-700 border-t-indigo-600 animate-spin h-8 w-8"></div>
        </div>

        @livewire('admin.roles.create')
    </div>

    @livewire('admin.roles.edit')
        
    <div class="mt-5 overflow-auto">
        <table class="w-full">
            
            @livewire('admin.table-title', ['titles' => ['نام', 'برچسب', 'دسترسی ها', 'اقدامات']])

            <tbody>
                @forelse($roles as $role)
                    @livewire('admin.roles.item', ['role' => $role, 'index' => $loop->index], key(rand() * $role->id))
                @empty
                    <tr><td colspan="4" class="p-3 text-center">{{ __('response.empty_data') }}</td></tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>