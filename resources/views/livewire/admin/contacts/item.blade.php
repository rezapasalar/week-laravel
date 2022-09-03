<tr x-data="{
    async deleteHandler() {
        const result = await Swal.questionDelete();
        if(result) @this.delete();
    }
}" class="@if($index % 2) bg-gray-50 @endif hover:bg-gray-100 cursor-pointer"
    x-on:click="$dispatch('show:modal', { 'id': {{ $contact->id }} })">
    <td class="p-3 truncate" style="max-width: 150px">
        <div class="flex items-center">
            @if(!$contact->read_at)
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
            <span>{{ $contact->name }}</span>
        </div>
    </td>
    <td class="p-3 flex">
        @if($contact->parent_id)
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 text-blue-500 ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
            </svg>
        @endif

        <span style="max-width: 150px" class="truncate {{ !$contact->parent_id ? 'mr-7' : '' }}">{{ $contact->subject }}</span>
    </td>
    <td class="p-3 truncate">{{ $contact->created_at }}</td>
    <td class="p-3 truncate">
        @can('contact:delete')
            <button x-on:click.stop="deleteHandler()" class="inline-flex items-center justify-center px-2 py-1 bg-red-600 text-sm border border-transparent rounded-md font-semibold text-white uppercase hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">حذف</button>
        @endcan
    </td>
</tr>