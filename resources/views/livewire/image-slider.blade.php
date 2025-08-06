<?php
//$images = [
//    'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20(1).jpg',
//    'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20(4).jpg',
//    'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20_-min.jpg',
//    'https://i.pinimg.com/736x/e1/9e/c8/e19ec8cd949cc98c53b02bfcfcb5927c.jpg',
//    'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20(2).jpg',
//    'https://www.tashistudio.com/modules/freepatterns/views/img/Luxury%20Bloom%20Preview%20Images%20(5).jpg',
//    'https://i.pinimg.com/736x/cc/da/31/ccda312b1afdb980bc15423465e43eca.jpg',
//    'https://i.pinimg.com/736x/fe/c0/7f/fec07f2ba6ad86bacc436077900e2275.jpg',
//    'https://i.pinimg.com/736x/39/08/9c/39089c454669b65fc67a1cd5e54a22e5.jpg',
//    'https://mediajamshidi.com/cdn/shop/files/SpringWaltz-114-09.jpg?crop=center&height=940&v=1743323564&width=940',
//];
//?><!---->


<section>

    <div class="text-3xl text-center mb-4 justify-items-center font-nanum font-bold">
        Creator's Pick
    </div>

{{--    <div class="splide max-w-screen-3xl mx-auto" aria-label="Beautiful Images Slider" id="slider1">--}}
{{--        <div class="splide__arrows">--}}
{{--            <button class="splide__arrow splide__arrow--prev custom-arrow left-0">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-360" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--            <button class="splide__arrow splide__arrow--next custom-arrow right-0">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--        <div class="splide__track">--}}
{{--            <ul class="splide__list gap-3">--}}
{{--                @foreach ($images as $image)--}}
{{--                    <li class="splide__slide">--}}
{{--                        <div class="aspect-w-1 aspect-h-1">--}}
{{--                            <img src="{{ $image }}" alt="Image" class="w-[400px] h-[400px] object-cover rounded-xl cursor-pointer">--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}

        <div class="splide max-w-screen mx-auto" aria-label="Beautiful Images Slider" id="slider1">
            <div class="splide__arrows">
                <button class="splide__arrow splide__arrow--prev custom-arrow left-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-360" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <button class="splide__arrow splide__arrow--next custom-arrow right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
            <div class="splide__track">
                <ul class="splide__list gap-3">
                    @foreach ($images as $image)
                        <li class="splide__slide">
                            <div class="aspect-w-1 aspect-h-1">
                                <img src="{{ $image }}" alt="Image" class="w-[400px] h-[400px] object-cover rounded-xl">
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

</>

