<section>
    <div class="swiper" id="slider1">
        <div class="swiper-wrapper">
            @foreach ($images as $image)
                <div class="swiper-slide flex flex-col items-center overflow-hidden rounded-xl">
                    <a href="{{ route('product.view', $image['slug']) }}">
                        <img src="{{ $image['url'] }}"
                             alt="{{ $image['name'] }}"
                             class="w-full h-auto aspect-square object-cover rounded-xl mb-2 cursor-pointer hover:scale-102 transition duration-300"></a>
                    <div class=" flex space-x-5 items-center justify-between px-5 font-bold">
                        <div class="text-center text-sm ">
                            {{ $image['name'] }}
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
