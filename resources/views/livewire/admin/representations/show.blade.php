<div>
    <x-jet-dialog-modal wire:model="showRepresentationModal">
        <x-slot name="title">
            درخواست نمایندگی
        </x-slot>

        <x-slot name="content" class="overflow-auto">

            <div class="border rounded p-4 shadow-sm relative mt-8">
                <label class="text-sm text-gray-400 absolute bg-white px-1 truncate" style="top: -11px">نام و نام خانوادگی</label>
                <div dir="{{ $representation->isFa() ? 'rtl' : 'ltr' }}" class="text-md mr-2">{{ $representation->name }}</div>
            </div>

            <div class="mt-4 border rounded p-4 shadow-sm relative">
                <label class="text-sm text-gray-400 absolute bg-white px-1 truncate" style="top: -11px">نام شرکت / فروشگاه</label>
                <div dir="{{ $representation->isFa() ? 'rtl' : 'ltr' }}" class="text-md mr-2">{{ $representation->company_name }}</div>
            </div>

            <div class="mt-4 border rounded p-4 shadow-sm relative">
                <label class="text-sm text-gray-400 absolute bg-white px-1 truncate" style="top: -11px">شهر</label>
                <div dir="{{ $representation->isFa() ? 'rtl' : 'ltr' }}" class="text-md mr-2">{{ $representation->city }}</div>
            </div>

            <div class="mt-4 border rounded p-4 shadow-sm relative">
                <label class="text-sm text-gray-400 absolute bg-white px-1 truncate" style="top: -11px">تلفن</label>
                <div dir="{{ $representation->isFa() ? 'rtl' : 'ltr' }}" class="text-md mr-2">{{ $representation->phone }}</div>
            </div>

            <div class="mt-4 border rounded p-4 shadow-sm relative">
                <label class="text-sm text-gray-400 absolute bg-white px-1 truncate" style="top: -11px">آدرس</label>
                <div dir="{{ $representation->isFa() ? 'rtl' : 'ltr' }}" class="text-md mr-2">{{ $representation->address }}</div>
            </div>

            <div class="mt-4 border rounded p-4 shadow-sm relative">
                <label class="text-sm text-gray-400 absolute bg-white px-1 truncate" style="top: -11px">توضیحات</label>
                <div dir="{{ $representation->isFa() ? 'rtl' : 'ltr' }}" class="text-md mr-2">
                    @if($representation->description != '')
                        {!! str_replace(array("\\r\\n","\\r","\\n"), "<br>", $representation->description) !!}
                    @else
                        -
                    @endif
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="text-left">
                <x-jet-button wire:click="$toggle('showRepresentationModal')" wire:loading.attr="disabled">
                    بستن
                </x-jet-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <script>
        window.addEventListener('show:modal', ({detail: {id}}) => @this.open(id));
    </script>
</div>