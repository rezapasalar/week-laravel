@section('title', 'تماس با ما')

<div>
    @livewire('admin.contacts.show')

    <div class="w-full md:w-3/12 ml-4 relative z-0">
        <select wire:model="select" class="bg-[left_.5rem] bg-gray-50 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full p-2 rounded border-gray-300 z-0">
            <option value="0">همه</option>
            <option value="1">پیام های کاربران</option>
            <option value="2">پیام های مدیریت</option>
        </select>

        <div wire:loading wire:target="select" style="top: 5px" class="absolute left-2 bg-gray-50 rounded-full border-4 border-b-gray-300 border-x-gray-300 dark:border-b-gray-700 dark:border-x-gray-700 border-t-indigo-600 animate-spin h-8 w-8 hidden"></div>
    </div>
        
    <div class="mt-4 overflow-auto">
        <table class="w-full">
            
            @livewire('admin.table-title', ['titles' => ['نام', 'موضوع', 'تاریخ ثبت', 'اقدامات']])

            <tbody>
                @forelse($contacts as $contact)
                    @livewire('admin.contacts.item', ['contact' => $contact, 'index' => $loop->index], key(rand() * $contact->id))
                @empty
                    <tr><td colspan="10" class="p-3 text-center">{{ __('response.empty_data') }}</td></tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <div dir="ltr" class="mt-8">
        {!! $contacts->links() !!}
    </div>
</div>