<tr x-data="{
    async deleteHandler() {
        const result = await Swal.questionDelete();
        if(result) @this.delete();
    }
}" class="@if($index % 2) bg-gray-50 @endif hover:bg-gray-100">
    <td class="p-3 truncate">{{ $user->name }}</td>
    <td class="p-3 truncate">{{ $user->email }}</td>
    <td class="p-3 flex items-center justify-content flex-wrap" style="max-width: 400px">
        @forelse($user->roles as $role)
            <small class="ml-1 mb-1 py-1 px-2 bg-gray-500 text-white rounded truncate" style="font-size: 10px">{{ $role->name }}</small>
        @empty
            <small class="ml-1 mb-1 py-1 px-2 bg-yellow-400 text-white rounded truncate" style="font-size: 10px">فاقد مقام</small>
        @endforelse
    </td>
    <td class="p-3 truncate">{{ $user->created_at }}</td>
    <td class="p-3 truncate">
        <button x-on:click="deleteHandler()" class="inline-flex items-center justify-center px-2 py-1 bg-red-600 text-sm border border-transparent rounded-md font-semibold text-white uppercase hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">حذف</button>
        <button x-on:click="$dispatch('edit:modal', { 'id': {{ $user->id }} })" class="inline-flex items-center justify-center px-2 py-1 bg-blue-600 text-sm border border-transparent rounded-md font-semibold text-white uppercase hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">ویرایش</button>
    </td>
</tr>