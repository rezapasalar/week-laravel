<x-user.global.form-step x-ref="step5">
    <div
        x-data="{photoPreview: ''}"
        x-init="
            window.addEventListener('close:employmentProduct', () => {
                photoPreview = '';
                $refs.photo.files = null;
            })
    ">
        <x-jet-input x-ref="photo" type="file" class="hidden"
                    wire:model.defer="photo"
                    x-on:change="
                        const reader = new FileReader();
                        reader.onload = ({target: {result}}) => {
                            photoPreview = result;
                        }
                        if ($refs.photo.files[0].type.includes('image/')) reader.readAsDataURL($refs.photo.files[0]);
                    " />

        <ul class="text-gray-500 dark:text-gray-300 list-disc list-inside">
            <li>لطفا سعی کنید تصویر 4 * 3 آپلود کنید.</li>
            <li>حداکثر عرض و ارتفاع تصویر 800 * 800 پیکسل می باشد.</li>
            <li>حداکثر حجم یا سایز تصویر 300 کیلوبایت می باشد.</li>
        </ul>

        <div class="mt-6 flex items-center justify-center border dark:border-gray-700 mx-auto w-[150px] h-[200px]" -x-show="photoPreview">
            <span id="photoProductFileReander" class="block w-40 h-40 bg-cover bg-no-repeat bg-center"x-bind:style="'background-image: url(\'' + photoPreview + '\');'"></span>
        </div>

        <div class="text-center">
            <x-jet-secondary-button class="mt-4 justify-center bg-gray-100 w-[150px]" x-on:click="$refs.photo.click()">انتخاب تصویر پرسنلی</x-jet-secondary-button>
        </div>

        <x-jet-input-error for="photo" class="text-center pt-4" />
    </div>
</x-user.global.form-step>
