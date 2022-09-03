<div>
    <x-jet-dialog-modal wire:model="createImageModal">
        <x-slot name="title">
            ثبت تصویر جدید
        </x-slot>

        <x-slot name="content">
            <ul class="mb-4 list-disc list-inside">
                <li>فرمت تصویر باید jpg, jpeg, png باشد.</li>
                <li>عرض تصویر باید 1500 و ارتفاع 800 باشد.</li>
                <li>حداکثر حجم تصویر 512 کیلوبایت میباشد.</li>
            </ul>

            <div class="pb-2" x-data="{photoPreview: ''}" x-init="
                window.addEventListener('close:createPhotoSlideshow', () => {
                    photoPreview = '';
                    $refs.photo.files = null;
                })
            ">
                <x-jet-input x-ref="photo" type="file" class="hidden"
                            wire:model.defer="photo"
                            x-on:change="
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                }
                                
                                if ($refs.photo.files[0].type.includes('image/')) {
                                    reader.readAsDataURL($refs.photo.files[0]);
                                }
                            " />

                <x-jet-secondary-button x-on:click="$refs.photo.click()">
                    انتخاب تصویر
                </x-jet-secondary-button>                

                <div class="flex items-center justify-center mx-auto" x-show="photoPreview">
                    <img class="border w-5/5 h-full mt-5" :src="photoPreview" alt="">
                </div>

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="text-left space-x-reverse space-x-2">
                <x-jet-secondary-button wire:click="cancel" wire:loading.attr="disabled">
                    انصراف
                </x-jet-secondary-button>

                <x-jet-button wire:click="create" wire:loading.attr="disabled" wire:target="photo">
                    ثبت
                </x-jet-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <script>
        window.addEventListener('create:modal', (e) => @this.open());
    </script>
</div>