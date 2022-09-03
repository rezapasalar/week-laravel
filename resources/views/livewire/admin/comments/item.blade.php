<tr x-data="{
    async deleteHandler() {
        const result = await Swal.questionDelete();
        if(result) @this.delete();
    }
}" class="@if($index % 2) bg-gray-50 @endif hover:bg-gray-100 cursor-pointer"
    x-on:click="$dispatch('show:modal', { 'id': {{ $comment->id }} })">
    <td class="p-3 truncate" style="max-width: 150px">
        <div class="flex items-center">
            @if(!$comment->read_at)
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" fill="rgba(37,99,235,1)" x="0px" y="0px" width="12px" height="12px" class="ml-2" viewBox="0 0 120 120" enable-background="new 0 0 120 120" xml:space="preserve">
                        <circle cx="60" cy="60.834" r="54.167"/>
                    </svg>
                </div>
            @else
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" fill="transparent" x="0px" y="0px" width="12px" height="12px" class="ml-2" viewBox="0 0 120 120" enable-background="new 0 0 120 120" xml:space="preserve">
                        <circle cx="60" cy="60.834" r="54.167"/>
                    </svg>
                </div>
            @endif
            <span>{{ $comment->body }}</span>
        </div>
    </td>

    <td class="p-3 flex">
        @if($comment->parent_id)
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 text-blue-500 ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
            </svg>
        @endif

        <span style="max-width: 150px" class="truncate {{ !$comment->parent_id ? 'mr-7' : '' }}">{{ $comment->product->name_fa }}</span>
    </td>

    <td class="p-3 truncate" style="max-width: 150px">
        @if ($comment->approved)
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-7 text-green-500 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-7 text-gray-300 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
            </svg>
        @endif
    </td>

    <td class="p-3 truncate">{{ $comment->created_at }}</td>

    <td class="p-3 truncate">
        @can('comment:delete')
            <button x-on:click.stop="deleteHandler()" class="inline-flex items-center justify-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">حذف</button>
        @endcan

        @can('comment:upproved')
            @if($comment->approved)
                <button wire:click.stop="toggleApproved" wire:loading.attr="disabled" class="inline-flex items-center justify-center px-2 py-1 bg-gray-800 text-sm border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">عدم تایید</button>
            @else
                <button wire:click.stop="toggleApproved" wire:loading.attr="disabled" class="inline-flex items-center justify-center px-2 py-1 bg-blue-600 text-sm border border-transparent rounded-md font-semibold text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">تایید</button>
            @endif
        @endcan
    </td>
</tr>