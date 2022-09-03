<tr x-data="{
    async deleteHandler() {
        const result = await Swal.questionDelete();
        if(result) @this.delete();
    }
}" class="@if($index % 2) bg-gray-50 @endif hover:bg-gray-100">
    <td class="p-3 truncate" style="height: 100px">{{ enToFa($product->code) }}</td>
    <td class="p-3" style="max-width: 150px">
        <div class="break-normal" style="width: 150px">{{ $product->name_fa }}</div>
        <small class="break-normal" style="width: 150px">{{ $product->name_en }}</small>
    </td>
    <td class="p-3 truncate">{{ enToFa($product->weight) }}</td>
    <td class="p-3 truncate">{{ enToFa($product->number) }}</td>
    <td class="p-3 truncate">{{ enToFa($product->price) }}</td>
    <td class="p-3 truncate">{{ enToFa($product->view_count) }}</td>
    <td class="p-3 truncate">{{ enToFa($product->comment_count) }}</td>
    <td class="p-3 truncate">{{ enToFa($product->like) }}</td>
    <td class="p-3 truncate" style="min-width: 150px !important">
        <img src="{{ asset('storage/product-photos/' . $product->photo_path . '?' . rand()) }}" width="100">
    </td>
    <td class="p-3 truncate">
        @can('product:delete')
            <button x-on:click="deleteHandler()" class="inline-flex items-center justify-center px-2 py-1 bg-red-600 text-sm border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">حذف</button>
        @endcan

        @can('product:edit')
            <button x-on:click="$dispatch('edit:modal', { 'id': {{ $product->id }} })" class="inline-flex items-center justify-center px-2 py-1 bg-blue-600 text-sm border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">ویرایش</button>
        @endcan
    </td>
</tr>