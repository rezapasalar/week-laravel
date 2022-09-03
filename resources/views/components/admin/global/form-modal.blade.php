@php
    $modalName = $type . ucfirst($subject) . "Modal";
    $subject = __("fields.{$subject}");
@endphp

<div>
    @if($type == 'create')
        <div>
            <x-jet-button wire:click="open" wire:loading.attr="disabled">{{ $subject }} جدید</x-jet-button>
        </div>
    @endif
    <x-jet-dialog-modal wire:model="{{ $modalName }}">
        <x-slot name="title">
            فرم 
            {{ 
                $type == 'create' 
                    ? "{$subject} جدید"
                    : "ویرایش {$subject}"
            }}
        </x-slot>
        <x-slot name="content">
            <div class="pb-5">{{ $description ?? '' }}</div>
            {{ $slot }}
        </x-slot>
        <x-slot name="footer">
            <div class="text-left space-x-reverse space-x-2">
                <x-jet-secondary-button wire:click="cancel" wire:loading.attr="disabled">انصراف</x-jet-secondary-button>
                <x-jet-button wire:click="{{ $type }}" wire:loading.attr="disabled" wire:target="{{ $wireTarget ?? null }}">{{ $type == 'create' ? 'ثبت' : 'ویرایش' }}</x-jet-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
    @if($type == 'edit')
        <script>
            window.addEventListener('edit:modal', e => @this.open(e.detail["{{ $fieldNameForOpenEditModal ?? 'id'}}"]));
        </script>
    @endif
</div>