<x-admin.global.form-modal type="create" wireTarget="photo" subject="product" description="برای ثبت محصول به نکاتی دقت کنید, وزن محصول را حتما به گرم نوشته, قیمت محصول را به ریال ثبت کرده و عرض تصویر محصول 550 پیکسل و ارتفاع محصول 420 میباشد.">
    <x-both.form.select-group name="product.category_id">
        <x-slot name="options">
            @foreach(\App\Models\Category::latest()->get() as $category)
                <option value="{{ $category->id }}">{{ $category->name_fa }} - {{ $category->name_en }}</option>
            @endforeach
        </x-slot>
    </x-both.form.select-group>
    <x-both.form.input-group name="product.code" label="کد محصول" action="create" />
    <x-both.form.input-group name="product.name_fa" action="create" />
    <x-both.form.input-group name="product.name_en" action="create" dir="ltr" />
    <x-both.form.input-group name="product.weight" action="create" dir="ltr" />
    <x-both.form.input-group name="product.number" label="تعداد در کارتن" action="create" dir="ltr" />
    <x-both.form.input-group name="product.price" action="create" dir="ltr" />
    <div class="mb-4" x-data="{photoPreview: null}" x-init="
        window.addEventListener('close:createProduct', () => {
            photoPreview = null;
            $refs.photo.files = [];
        })
    ">
        <x-jet-label>تصویر</x-jet-label>
        <x-jet-input x-ref="photo" type="file" class="hidden" wire:model.defer="photo"
                     x-on:change="
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        }
                        if ($refs.photo.files[0].type.includes('image/')) {
                            reader.readAsDataURL($refs.photo.files[0]);
                        }
                    " />

        
        <x-jet-secondary-button class="w-full mt-1 py-3 justify-center bg-gray-50" x-on:click="$refs.photo.click()">انتخاب تصویر محصول</x-jet-secondary-button>

        <div class="mt-3 flex justify-center" x-show="photoPreview">
            <span id="photoProductFileReander" class="block w-40 h-40 bg-cover bg-no-repeat bg-center" x-bind:style="'background-image: url(\'' + photoPreview + '\');'"></span>
        </div>

        <x-jet-input-error for="photo" class="mt-2" />
    </div>
</x-admin.global.form-modal>