<div class="my-required-star">
    <x-jet-dialog-modal wire:model="showContactModal">
        <x-slot name="title">
            <div dir="{{ $contact->isFa() ? 'rtl' : 'ltr' }}" class="break-all flex">
                @if($contact->parent_id)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 text-blue-500 {{ $contact->isFa() ? 'ml-2' : 'mr-2' }}">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                    </svg>
                @endif
                
                <span class="truncate">{{ $contact->subject }}</span>
            </div>
        </x-slot>

        <x-slot name="content">

            @if($contact->parent_id)
                @php 
                    $message = \App\Models\Contact::find($contact->parent_id);
                @endphp

                <div class="my-6 border rounded p-4 shadow-sm relative">
                    <span class="text-sm text-blue-600 absolute bg-white px-1 truncate" style="top: -11px">پیام کاربر</span>

                    <div class="mr-2 mb-4" dir="{{ $message->isFa() ? 'rtl' : 'ltr' }}">
                        <span class="text-lg break-all">{{ $message->name }}</span>
                        <span class="mr-1 text-md text-gray-500 break-all"> [{{ $message->email }}] </span>
                    </div>

                    <div class="mr-2 mb-1" dir="{{ $message->isFa() ? 'rtl' : 'ltr' }}">
                        <div class="mr-1 mb-1">{{ $message->body }}</div>
                    </div>
                </div>
            @endif

            <div class="mt-4 border rounded p-4 mb-2 shadow-sm relative">
                <span class="text-sm text-blue-600 absolute bg-white px-1 truncate" style="top: -11px">{{ $contact->parent_id ? 'پیام مدیریت' : 'پیام کاربر' }}</span>
                
                <div class="mr-2 mb-4" dir="{{ $contact->isFa() ? 'rtl' : 'ltr' }}">
                    <span class="text-lg break-all">{{ $contact->name }}</span>
                    <span class="mr-1 text-md text-gray-500 break-all"> [{{ $contact->email }}] </span>
                </div>

                <div class="mr-2 break-all" dir="{{ $contact->isFa() ? 'rtl' : 'ltr' }}">
                    {{ $contact->body }}
                </div>
            </div>

            @can('contact:create')
                @if(!$contact->parent_id)
                    <div x-data="{body: @entangle('body').defer}" class="col-span-6 sm:col-span-4 mt-5 mb-2">
                        <div class="flex justify-between">
                            <x-jet-label for="body" value="متن پاسخ" class="my-required" />
                            <span x-text="body ? enToFa(512 - body.length) : enToFa('512')"" class="text-gray-300 text-sm"></span>
                        </div>
                        <textarea x-model="body" maxLength="512" wire:model.defer="body" rows="4" class="bg-gray-50 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" dir="{{ $contact->isFa() ? 'rtl' : 'ltr' }}"></textarea>
                        <x-jet-input-error for="body" class="mt-2" />
                    </div>
                @endif
            @endcan
        </x-slot>

        <x-slot name="footer">
            <div class="@if($contact->isFa()) text-left @else text-rigth @endif">
                <x-jet-secondary-button wire:click="cancel" wire:loading.attr="disabled">
                    انصراف
                </x-jet-secondary-button>

                @if(!$contact->parent_id)
                    @can('contact:create')
                        <x-jet-button wire:click="submit" wire:loading.attr="disabled">
                            ارسال
                        </x-jet-button>
                    @endcan
                @endif
            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <script>
        window.addEventListener('show:modal', ({detail: {id}}) => @this.open(id));
    </script>
</div>