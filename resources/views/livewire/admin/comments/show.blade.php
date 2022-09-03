<div class="my-required-star">
    <x-jet-dialog-modal wire:model="showCommentModal">
        <x-slot name="title">
            @if($comment->parent_id)
                ویرایش
            @else
                ویرایش / پاسخ
            @endif
        </x-slot>

        <x-slot name="content" class="overflow-auto">
            @livewire('admin.comments.edit', ['comment' => $comment], key($comment->id * rand()))

            @livewire('admin.comments.answer', ['comment' => $comment], key($comment->id * rand()))
            
        </x-slot>

        <x-slot name="footer">
            <div class="text-right">
                <x-jet-secondary-button wire:click="cancel" wire:loading.attr="disabled">
                    انصراف
                </x-jet-secondary-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <script>
        window.addEventListener('show:modal', ({detail: {id}}) => @this.open(id));
    </script>
</div>