@section('title', 'کامنت')

<div>
    <div class="w-full md:w-3/12 ml-4 relative z-0">
        <select wire:model="select" class="bg-[left_.5rem] bg-gray-50 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full p-2 rounded border-gray-300 z-0">
            <option value="2">همه</option>
            <option value="0">تایید نشده ها</option>
            <option value="1">تایید شده ها</option>
            <option value="3">کامنت های کاربران</option>
            <option value="4">کامنت های مدیریت</option>
        </select>

        <div wire:loading wire:target="select" style="top: 5px" class="absolute left-2 bg-gray-50 rounded-full border-4 border-b-gray-300 border-x-gray-300 dark:border-b-gray-700 dark:border-x-gray-700 border-t-indigo-600 animate-spin h-8 w-8 hidden"></div>
    </div>

    @cans(['comment:edit', 'comment:create', 'comment:read'])
        @livewire('admin.comments.show')
    @endcans
        
    <div class="mt-4 overflow-auto">
        <table class="w-full">
            
            @livewire('admin.table-title', ['titles' => ['متن', 'محصول مربوطه' ,'وضعیت' ,'تاریخ ثبت', 'اقدامات']])

            <tbody>
                @forelse($comments as $comment)
                    @livewire('admin.comments.item', ['comment' => $comment, 'index' => $loop->index], key(rand() * $comment->id))
                @empty
                    <tr><td colspan="5" class="p-3 text-center">{{ __('response.empty_data') }}</td></tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <div dir="ltr" class="mt-8">
        {!! $comments->links() !!}
    </div>
</div>