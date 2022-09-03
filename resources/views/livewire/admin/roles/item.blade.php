<tr x-data="{
    async deleteHandler() {
        const result = await Swal.questionDelete();
        if(result) @this.delete();
    }
}" class="@if($index % 2) bg-gray-50 @endif hover:bg-gray-100">
    <td class="p-3 align-top truncate">{{ $role->name }}</td>
    <td class="p-3 align-top">
        <div style="width: 200px">
            {{ $role->label }}
        </div>
    </td>
    <td class="p-3 align-top">
        <div class="flex flex-wrap" style="width: 400px">
            @forelse($role->permissions as $permission)
                <div class="ml-1 mb-1 py-1 px-2 bg-gray-500 text-white rounded" style="font-size: 10px">{{ $permission->label }}</div>
            @empty
                <small class="ml-1 mb-1 py-1 px-2 bg-yellow-400 text-white rounded" style="font-size: 10px">فاقد دسترسی</small>
            @endforelse
        </div>
    </td>
    <td class="p-3 truncate align-top">
        <button x-on:click.stop="deleteHandler()" class="inline-flex items-center justify-center px-2 py-1 bg-red-600 text-sm border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">حذف</button>
        <button x-on:click.stop="$dispatch('edit:modal', { 'id': {{ $role->id }} })" class="inline-flex items-center justify-center px-2 py-1 bg-blue-600 text-sm border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">ویرایش</button>
    </td>
</tr>