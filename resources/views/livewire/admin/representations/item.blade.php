<tr x-data="{
    async deleteHandler() {
        const result = await Swal.questionDelete();
        if(result) @this.delete();
    }
}" class="@if($index % 2) bg-gray-50 @endif hover:bg-gray-100 cursor-pointer"
    x-on:click="$dispatch('show:modal', { 'id': {{ $representation->id }} })">
    <td class="p-3 truncate" style="max-width: 150px">
        <div class="flex items-center">
            @if(!$representation->read_at)
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
            <span>{{ $representation->name }}</span>
        </div>
    </td>
    <td class="p-3 truncate" style="max-width: 150px">{{ $representation->city }}</td>
    <td class="p-3 truncate" style="max-width: 150px">{{ $representation->phone }}</td>
    <td class="p-3 truncate">{{ $representation->created_at }}</td>
    <td class="p-3 truncate">
        @can('representation:delete')
            <button x-on:click.stop="deleteHandler()" class="inline-flex items-center justify-center px-2 py-1 bg-red-600 text-sm border border-transparent rounded-md font-semibold text-white uppercase hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">حذف</button>
        @endcan

        @can('representation:edit')
            <button x-on:click.stop="$dispatch('edit:modal', { 'id': {{ $representation->id }} })" class="inline-flex items-center justify-center px-2 py-1 bg-blue-600 text-sm border border-transparent rounded-md font-semibold text-white uppercase hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">ویرایش</button>
        @endcan
    </td>
</tr>