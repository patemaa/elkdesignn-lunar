<section>
    <div class="splide max-w-screen mx-auto" aria-label="Beautiful Images Slider" id="slider2">
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
            <ul class="splide__list">
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
</section>
