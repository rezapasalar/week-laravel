<tr x-data="{}" class="@if($index % 2) bg-gray-50 @endif hover:bg-gray-100">
    <td class="p-3 text-truncate">{{ $category->name_fa }}</td>
    <td class="p-3 text-truncate">{{ $category->name_en }}</td>
    <td class="p-3 text-truncate flex items-center">
        @livewire('admin.categories.delete', ['category' => $category])
        <button x-on:click="$dispatch('edit:modal', { 'id': {{ $category->id }} })" class="inline-flex items-center justify-center px-2 py-1 bg-blue-600 text-sm border border-transparent rounded-md font-semibold text-white uppercase hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">ویرایش</button>
    </td>
</tr>