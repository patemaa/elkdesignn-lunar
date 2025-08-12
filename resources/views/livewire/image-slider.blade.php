<section>
    <h2 class="text-3xl font-bold mb-4">You may also like</h2>
    <div class="swiper" id="slider1">
        <div class="swiper-wrapper">
            @foreach ($images as $image)
                <div class="swiper-slide flex flex-col items-center overflow-hidden rounded-xl">
                    <div class="aspect-square overflow-hidden rounded-xl">
                        <a href="{{ route('product.view', $image['slug']) }}">
                            <img src="{{ $image['url'] }}"
                                 alt="{{ $image['name'] }}"
                                 class="w-full h-auto aspect-square object-cover rounded-xl mb-2 cursor-pointer hover:scale-105  transition duration-600">
                        </a>
                    </div>
                    {{-- Buradaki kodu güncelliyoruz --}}
                    <div class="flex-col md:flex-row md:space-x-5 flex items-center justify-between px-5 font-bold">
                        <div class="text-center text-sm ">
                            <a href="{{ route('product.view', $image['slug']) }}">
                                {{ $image['name'] }}
                            </a>
                        </div>
                        <div class="text-xs text-gray-500">
                            {{ $image['year'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
