<div class="swiper slideshow">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">

        <!-- Slides -->
        @foreach(\File::allFiles(public_path('/storage/slideshow-photos')) as $image)
            <div class="swiper-slide pb-0 md:pb-8">
                @if($loop->first)
                    <img src='{{ asset("storage/slideshow-photos/{$image->getFilename()}") }}'>
                @else
                    <img class="lozad" data-src='{{ asset("storage/slideshow-photos/{$image->getFilename()}") }}'>
                @endif
            </div>
        @endforeach

    </div>

    <!-- If we need pagination -->
    {{--<div class="swiper-pagination"></div>--}}

    <!-- If we need navigation buttons -->
    <div class="hidden md:block swiper-button-prev"></div>
    <div class="hidden md:block swiper-button-next"></div>

    <!-- If we need scrollbar -->
    {{--<div class="swiper-scrollbar"></div>--}}
</div>