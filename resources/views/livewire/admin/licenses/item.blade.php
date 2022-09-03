<tr x-data="{
    async deleteHandler() {
        const result = await Swal.questionDelete();
        if(result) @this.delete();
    }
}" class="@if($index % 2) bg-gray-50 @endif hover:bg-gray-100">
    <td class="p-3 truncate">{{ $license->username }}</td>
    <td class="p-3 truncate flex items-center">
        {{ \Carbon\Carbon::parse($license->expires_at)->diffForHumans() }}
    </td>
    <td>
        @if($license->expires_at > now())
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-7 text-green-600 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" fill="rgba(220, 38, 38, 1)" class="w-7 text-green-600 mr-2" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="close"><rect width="24" height="24" transform="rotate(180 12 12)" opacity="0"/><path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"/></g></g></svg>
        @endif
    </td>
    <td class="p-3 truncate">
        @can('license:delete')
            <button x-on:click="deleteHandler()" class="inline-flex items-center justify-center px-2 py-1 bg-red-600 text-sm border border-transparent rounded-md font-semibold text-white uppercase hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">حذف</button>
        @endcan

        @can('license:edit')
            <button x-on:click="$dispatch('edit:modal', { 'username': '{{ $license->username }}' })" class="inline-flex items-center justify-center px-2 py-1 bg-blue-600 text-sm border border-transparent rounded-md font-semibold text-white uppercase hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">ویرایش</button>
        @endcan
    </td>
</tr>