<div>
    @if($showProductModal)
        <x-jet-dialog-modal wire:model="showProductModal" maxWidth="3xl" type="product">
            <x-slot name="title" class="text-center">
                <div class="flex justify-between items-center">    
                    <span class="font-bold text-white">{{ $product['name_' . app()->getLocale()] }}</span>
                    <svg @click="window.history.pushState({}, null, location.href.split('&')[0])" wire:click="$toggle('showProductModal')" wire:loading.attr="disabled" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="41.756px" height="41.756px" viewBox="0 0 41.756 41.756" style="enable-background:new 0 0 41.756 41.756;" xml:space="preserve" fill="white" class="w-4 h-4 cursor-pointer"><g><path d="M27.948,20.878L40.291,8.536c1.953-1.953,1.953-5.119,0-7.071c-1.951-1.952-5.119-1.952-7.07,0L20.878,13.809L8.535,1.465   c-1.951-1.952-5.119-1.952-7.07,0c-1.953,1.953-1.953,5.119,0,7.071l12.342,12.342L1.465,33.22c-1.953,1.953-1.953,5.119,0,7.071   C2.44,41.268,3.721,41.755,5,41.755c1.278,0,2.56-0.487,3.535-1.464l12.343-12.342l12.343,12.343   c0.976,0.977,2.256,1.464,3.535,1.464s2.56-0.487,3.535-1.464c1.953-1.953,1.953-5.119,0-7.071L27.948,20.878z"/></g></svg>
                </div>
            </x-slot>

            <x-slot name="content">
                @livewire('user.products.information', ['product' => $product], key(rand()))
                @livewire('user.products.comments', ['product' => $product], key(rand()))
            </x-slot>

            <x-slot name="footer">
                <div class="@fa text-left @else text-right @endfa">
                    <x-jet-danger-button @click="window.history.pushState({}, null, location.href.split('&')[0])" wire:click="$toggle('showProductModal')" wire:loading.attr="disabled">{{ __('button.close') }}</x-jet-danger-button>
                </div>
            </x-slot>
        </x-jet-dialog-modal>
    @endif

    <script>
        window.addEventListener('show:modal', ({detail: {id}}) => @this.open(id));
    </script>
</div>
