@section('title', 'تنظیمات')

<div>
    <header class="text-xl mb-7">فرم تنظیمات</header>

    <main>
        <div class="mt-4">
            <x-jet-label>نام اپ فارسی</x-jet-label>
            <x-jet-input type="text" class="mt-1 block w-full md:w-5/12"
                        wire:model.defer="setting.app_name_fa"
                        wire:keydown.enter="edit" />

            <x-jet-input-error for="setting.app_name_fa" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-jet-label>نام اپ انگلیسی</x-jet-label>
            <x-jet-input type="text" class="mt-1 block w-full md:w-5/12"
                        wire:model.defer="setting.app_name_en"
                        wire:keydown.enter="edit" dir="ltr" />

            <x-jet-input-error for="setting.app_name_en" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-jet-label>قیمت پایه دلار به ریال</x-jet-label>
            <x-jet-input type="text" class="mt-1 block w-full md:w-5/12"
                        wire:model.defer="setting.dollar"
                        wire:keydown.enter="edit"
                        dir="ltr" />

            <x-jet-input-error for="setting.dollar" class="mt-2" />
        </div>

        <div class="mt-4">
            <label class="switch relative inline-block w-12 h-7">
                <input type="checkbox" wire:model="setting.allow_comment">
                <span class="slider cursor-pointer inset-0 absolute round rounded-full"></span>
            </label>

            @if($setting->allow_comment)
                <label class="mr-2 text-gray-500">بستن کامنت محصولات</label>
            @else
                <label class="mr-2 text-gray-500">مجوز کامنت محصولات</label>
            @endif

            <x-jet-input-error for="setting.allow_comment" class="mt-2" />
        </div>

        <div class="mt-4">
            <label class="switch relative inline-block w-12 h-7">
                <input type="checkbox" wire:model="setting.allow_email">
                <span class="slider cursor-pointer inset-0 absolute round rounded-full"></span>
            </label>

            @if($setting->allow_email)
                <label class="mr-2 text-gray-500">بستن ارسال ایمیل در فرم تماس با ما</label>
            @else
                <label class="mr-2 text-gray-500">مجوز ارسال ایمیل در فرم تماس با ما</label>
            @endif

            <x-jet-input-error for="setting.allow_email" class="mt-2" />
        </div>

        <div class="mt-4">
            <label class="switch relative inline-block w-12 h-7">
                <input type="checkbox" wire:model="setting.allow_employment_form">
                <span class="slider cursor-pointer inset-0 absolute round rounded-full"></span>
            </label>

            @if($setting->allow_employment_form)
                <label class="mr-2 text-gray-500">بستن فرم استخدام</label>
            @else
                <label class="mr-2 text-gray-500">باز کردن فرم استخدام</label>
            @endif

            <x-jet-input-error for="setting.allow_email" class="mt-2" />
        </div>

        <div class="mt-4">
            <label class="switch relative inline-block w-12 h-7">
                <input type="checkbox" wire:model="setting.allow_representation_form">
                <span class="slider cursor-pointer inset-0 absolute round rounded-full"></span>
            </label>

            @if($setting->allow_representation_form)
                <label class="mr-2 text-gray-500">بستن فرم نمایندگی</label>
            @else
                <label class="mr-2 text-gray-500">باز کردن فرم نمایندگی</label>
            @endif

            <x-jet-input-error for="setting.allow_email" class="mt-2" />
        </div>
    </main>

    <footer class="mt-7 w-full md:w-5/12">
        <div class="text-left">
            <x-jet-button wire:click="edit" wire:loading.attr="disabled">
                ذخیره
            </x-jet-button>
        </div>
    </footer>
</div>