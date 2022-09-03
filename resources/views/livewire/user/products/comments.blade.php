<div wire:init="loadComments">
    @if(getSettings()->allow_comment ?? 1)
        @livewire('user.products.comment-form', ['product' => $product])

        @if($readyToLoad)
            <div class="pt-4 space-y-4 mb-6" id="comment-body">
                <h4 class="font-bold text-gray-600 dark:text-gray-400 mb-2">{{ __('comment.comments') }}</h4>

                @forelse($comments as $comment)
                    <div class="p-3 border dark:border-0 rounded-lg {{ $loop->index % 2 ? 'bg-blue-50 dark:bg-gray-700/30' : 'bg-gray-50 dark:bg-gray-900/30'}}">
                        <div dir="{{ $comment->isFa() ? 'rtl' : 'ltr' }}">
                            <div class="break-all text-sm text-gray-500 dark:text-gray-300">{{ $comment->body }}</div>

                                @foreach($comment->childs()->whereApproved(1)->get() as $child)
                                    <div class="break-all text-sm p-6 text-gray-500 dark:text-gray-300">
                                        <small class="text-red-600">{{ $comment->locale == 'fa' ? ' مدیر سایت' : 'Admin ' }}</small>
                                        <span>{{ $child->body }}</span>
                                    </div>
                                @endforeach

                            <div dir="{{ app()->currentLocale() == 'fa' ? 'rtl' : 'ltr' }}" class="@if($comment->isFa()) text-left @else text-right @endif text-xs text-gray-400 pt-2">@fa {{ enToFa($comment->created_at) }} @else {{ $comment->created_at}} @endfa</div>
                        </div>
                    </div>
                @empty
                    <x-both.alert.weekilize bg="bg-gray-200 dark:bg-gray-900" :message="__('comment.empty')" />
                @endforelse

                <div>
                    {{ $comments->links('vendor.livewire.simple-tailwind') }}
                </div>
            </div>
        @else
            <x-both.alert.weekilize bg="bg-gray-200 dark:bg-gray-900" class="mb-6" :loading="true" :message="__('comment.fetch')" />
        @endif
    @endif
</div>