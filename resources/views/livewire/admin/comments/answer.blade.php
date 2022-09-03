<div class="mb-2">
    @can('comment:create')
        @if(!$comment->parent_id)
            <div x-data="{body: @entangle('body').defer}">
                <div class="col-span-6 sm:col-span-4 mt-5">
                    <div class="flex justify-between">
                        <x-jet-label for="body" value="متن پاسخ مدیر" class="my-required" />
                        <span x-text="body ? enToFa(256 - body.length) : enToFa('256')"" class="text-gray-300 text-sm"></span>
                    </div>
                    <textarea x-model="body" maxLength="256" wire:model.defer="body" rows="4" class="bg-gray-50 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" dir="{{ $comment->isFa() ? 'rtl' : 'ltr' }}"></textarea>
                    <x-jet-input-error for="body" class="mt-2" />
                </div>

                
                <div class="text-left">
                    <x-jet-button class="mt-6" wire:click="answer" wire:loading.attr="disabled">
                        ثبت
                    </x-jet-button>
                </div>
            </div>
        @endif
    @endcan
</div>