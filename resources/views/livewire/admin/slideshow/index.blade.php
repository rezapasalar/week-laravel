@section('title', 'اسلاید شو')

<div>
    @can('slideshow:edit')
        @livewire('admin.slideshow.edit')
    @endcan

    @can('slideshow:create')
        @livewire('admin.slideshow.create')
    @endcan

    <x-jet-button @click="$dispatch('create:modal')">
        تصویر جدید
    </x-jet-button>

    <div class="grid grid-cols-4 gap-4 mt-4">

        @forelse(\File::allFiles(storage_path('app/public/slideshow-photos')) as $file)
            @livewire('admin.slideshow.item', ['filename' => $file->getFilename(), 'size' => $file->getSize()], key(rand()))
        @empty
            <x-both.alert.stylized class="col-span-4 -mt-0" message="تصویری یافت نشد." />
        @endforelse

    </div>
</div>