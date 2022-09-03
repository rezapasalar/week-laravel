<div x-data="{
    async deleteHandler() {
        const result = await Swal.questionDelete();
        if(result) @this.delete();
    }
}" class="shadow border bg-white rounded-md col-span-4 md:col-span-2 lg:col-span-1 h-100">
    <img class="rounded-t-md " src='{{ asset("storage/slideshow-photos/{$filename}?" . rand()) }}'>

    <div class="flex p-3 ">
        <span class="ml-2">حجم: </span>
        <span class="text-red-600">{{ enToFa(round($size / 1024)) }} کیلو بایت</span>
    </div>

    @cans(['slideshow:edit', 'slideshow:delete'])
        <div class="p-3 mt-4 bg-gray-100">
            @can('slideshow:edit')
                <x-jet-secondary-button @click="$dispatch('edit:modal', {filename: '{{ $filename }}'})" class="text-xs px-2 py-1">
                    ویرایش
                </x-jet-secondary-button>
            @endcan

            @can('slideshow:delete')
                <x-jet-secondary-button x-on:click="deleteHandler()" class="text-xs px-2 py-1">
                    حذف
                </x-jet-secondary-button>
            @endcan
        </div>
    @endcans
</div>