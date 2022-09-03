<div>
    <x-jet-dialog-modal wire:model="showEmploymentModal">
        <x-slot name="title">
            درخواست استخدام
        </x-slot>

        <x-slot name="content" class="overflow-auto">

            <div class="border rounded p-4 shadow-sm relative mt-8">
                <label class="text-sm text-gray-400 absolute bg-white text-right px-1 truncate" style="top: -11px">اطلاعات فردی</label>

                <div class="flex flex-col-reverse md:flex-row justify-between items-center">
                    <div class="mx-auto md:mx-0 mt-2">
                        <div class="text-center md:text-right mr-2 mb-1 break-all">
                            <span>{{ $employment->gender == 'مرد' ? 'آقای' : 'خانم' }}</span>
                            <span class="mr-1 break-all">{{ $employment->first_name }}</span>
                            <span class="mr-1 break-all">{{ $employment->last_name }}</span>
                        </div>
                        <div class="text-center md:text-right mr-2 mb-1">
                            <span>متولد</span>
                            <span class="mr-1">{{ $employment->year }}</span>
                        </div>
                        <div class="text-center md:text-right mr-2 mb-1">
                            <span>کد ملی</span>
                            <span class="mr-1">{{ $employment->code }}</span>
                        </div>
                        
                        @if($employment->military_status != 0)
                            <div class="mr-2 mb-1">
                                <span>{{ config('employment')['military_status'][$employment->military_status] ?? '' }}</span>
                            </div>
                        @endif
                        <div class="text-center md:text-right mr-2">
                            {{ $employment->marital_status }}
                        </div>
                        @if($employment->father_job)
                            <div class="text-center md:text-right mr-2">
                                <span>شغل پدر</span>
                                <span class="mr-1 break-all">{{ $employment->father_job }}</span>
                            </div>
                        @endif
                    </div>

                    <div>
                        @if ($employment->photo_path)
                            @if(\File::exists('storage/employment-photos/' . $employment->photo_path))
                                <img src="{{ asset('storage/employment-photos/' . $employment->photo_path) }}" width="150" class="mx-auto">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" width="150" fill="rgba(107, 114, 128, 1)" xml:space="preserve">
                                    <g><g><circle cx="256" cy="114.526" r="114.526"/></g></g><g><g><path d="M256,256c-111.619,0-202.105,90.487-202.105,202.105c0,29.765,24.13,53.895,53.895,53.895h296.421    c29.765,0,53.895-24.13,53.895-53.895C458.105,346.487,367.619,256,256,256z"/></g></g>
                                </svg>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-4 border rounded p-4 shadow-sm relative">
                <label class="text-sm text-gray-400 absolute bg-white px-1 truncate" style="top: -11px">تحصیلات</label>
                <div class="mr-2 mb-1">{{ config('employment')['education'][$employment->education] ?? '' }}</div>
                <div class="mr-2">
                    <span>رشته تحصیلی</span>
                    <span class="mr-1">{{ $employment->field ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4 border rounded p-4 shadow-sm relative">
                <label class="text-sm text-gray-400 absolute bg-white px-1 truncate" style="top: -11px">اطلاعات شغلی</label>
 
                <div class="mr-2 mb-1">
                    <span>تمایل به کار در بخش</span>
                    <span class="mr-1 mb-1">{{ config('employment')['willingness_work'][$employment->willingness_work] ?? '' }}</span>
                </div>
                <div class="mr-2 mb-1">
                    <span>نام ضامن</span>
                    <span class="mr-1 mb-1">{{ $employment->name_guarantor ?? '-' }}<span>
                </div>
                <div class="mr-2 mb-1">
                    <span>سابقه کار</span>
                    <span class="mr-1 mb-1">{{ $employment->work_experience ? 'دارم' : 'ندارم' }}</span>
                </div>
                @if($employment->work_experience_description)
                    <div class="mr-2 break-all">
                        {!! str_replace(array("\\r\\n","\\r","\\n"), "<br>", $employment->work_experience_description) !!}
                    </div>
                @endif
            </div>

            <div class="mt-4 border rounded p-4 shadow-sm relative">
                <label class="text-sm text-gray-400 absolute bg-white px-1 truncate" style="top: -11px">اطلاعات تماس</label>
 
                <div class="mr-2 mb-1">
                    {{ $employment->mobile }}
                </div>
                <div class="mr-2 mb-1">
                    {{ $employment->phone }}
                </div>
                @if($employment->address)
                    <div class="mr-2 mb-1 break-all">
                        {{ $employment->address }}
                    </div>
                @endif
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="text-left">
                <x-jet-button wire:click="$toggle('showEmploymentModal')" wire:loading.attr="disabled">
                    بستن
                </x-jet-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <script>
        window.addEventListener('show:modal', ({detail: {id}}) => @this.open(id));
    </script>
</div>