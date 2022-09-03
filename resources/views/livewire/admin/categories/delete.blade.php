<div>
    <div class="ml-1">
        <button wire:click="open" wire:loading.attr="disabled" class="inline-flex items-center justify-center px-2 py-1 bg-red-600 text-sm border border-transparent rounded-md font-semibold text-white uppercase hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">
            حذف
        </button>
    </div>

    <x-jet-dialog-modal wire:model="deleteCategoryModal">
        <x-slot name="title">
            فرم حذف گروه
        </x-slot>

        <x-slot name="content">
        آیا مطمئن هستید که می خواهید گروه را حذف کنید؟ پس از حذف گروه، تمام منابع و محصولات مربوط به این گروه برای همیشه حذف می شوند. لطفاً رمز عبور خود را وارد کنید تا تأیید کنید که می خواهید گروه را برای همیشه حذف کنید.

            <div class="mt-4">
                <x-jet-input type="password" class="mt-1 block w-full"
                            placeholder="رمز عبور"
                            wire:model.defer="password"
                            wire:keydown.enter="delete" dir="ltr" />

                <x-jet-input-error for="password" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
          <div class="text-left">
                <x-jet-secondary-button wire:click="cancel" wire:loading.attr="disabled">
                    انصراف
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                    حذف
                </x-jet-danger-button>
          </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>
