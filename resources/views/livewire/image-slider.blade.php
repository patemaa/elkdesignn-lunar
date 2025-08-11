<section>
    <div class="swiper" id="slider1">
        <div class="swiper-wrapper">
            @foreach ($images as $image)
                <div class="swiper-slide flex flex-col items-center overflow-hidden rounded-xl relative group">
                    <a href="{{ route('product.view', $image['slug']) }}" class="relative block w-full">
                        <img src="{{ $image['url'] }}"
                             alt="{{ $image['name'] }}"
                             class="w-full h-auto aspect-square object-cover rounded-xl mb-2 cursor-pointer transition duration-300" />

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/50 bg-opacity-50 flex flex-col justify-center items-center opacity-0 hover:opacity-100 transition-opacity duration-300 rounded-xl text-white px-4 text-center">
                            <div class="text-lg font-bold">{{ $image['name'] }}</div>
                            <div class="text-sm mt-1">{{ $image['year'] }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
