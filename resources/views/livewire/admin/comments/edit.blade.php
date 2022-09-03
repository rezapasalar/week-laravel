<div>
    @cans(['comment:edit', 'comment:read'])
        @if($comment->parent_id)
            <div class="mt-8 border rounded p-4 shadow-sm mb-6 relative">
                <span class="text-sm text-blue-600 absolute bg-white px-1 truncate" style="top: -11px">کامنت کاربر</span>

                <div class="mr-2 mb-1">
                    <div dir="{{ $comment->isFa() ? 'rtl' : 'ltr' }}" class="mr-1 mb-1">{{ \App\Models\Comment::find($comment->parent_id)->body }}</div>
                </div>
            </div>
        @endif

        <div x-data="{body: @entangle('comment.body').defer}" >
            <div class="col-span-6 sm:col-span-4 mt-5">
                <div class="flex justify-between">
                    <x-jet-label for="body" value="{{ $comment->parent_id ? 'متن پاسخ مدیر' : 'متن کامنت کاربر' }}" class="my-required" />
                    <span x-text="body ? enToFa(256 - body.length) : enToFa('256')" class="text-gray-300 text-sm"></span>
                </div>
                <textarea x-model="body" maxLength="256" wire:model.defer="comment.body" rows="4" class="bg-gray-50 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" dir="{{ $comment->isFa() ? 'rtl' : 'ltr' }}"></textarea>
                <x-jet-input-error for="comment.body" class="mt-2" />
            </div>

            @can('comment:edit')
                <div class="text-left">
                    <x-jet-button class="mt-6" wire:click="update" wire:loading.attr="disabled">
                        ویرایش
                    </x-jet-button>
                </div>
            @endcan
            
        </div>
    @endcans
</div>