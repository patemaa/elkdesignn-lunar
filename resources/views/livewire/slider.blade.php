<section>
    <div class="splide max-w-screen mx-auto" aria-label="Beautiful Images Slider" id="slider2">
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
