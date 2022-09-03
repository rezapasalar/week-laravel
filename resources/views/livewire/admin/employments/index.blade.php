@section('title', 'استخدام')

<div>
    <x-admin.employments.search />

    @livewire('admin.employments.show')
        
    <div class="mt-4 overflow-auto">
        <table class="w-full">
            
            @livewire('admin.table-title', ['titles' => ['نام و نام خانوادگی', 'جنسیت', 'سال تولد', 'تحصیلات', 'موبایل', 'تاریخ درخواست', 'اقدامات']])

            <tbody>
                @forelse($employments as $employment)
                    @livewire('admin.employments.item', ['employment' => $employment, 'index' => $loop->index], key(rand() * $employment->id))
                @empty
                    <tr><td colspan="10" class="p-3 text-center">{{ __('response.empty_data') }}</td></tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <div dir="ltr" class="mt-8">
        {!! $employments->links() !!}
    </div>
</div>