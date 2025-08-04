<section>
    <div class="p-8 overflow-hidden border-4 border-gray-900 rounded-lg">
        <div class="sm:py-32 sm:relative">
            <div>
                <h2 class="text-3xl font-extrabold sm:text-5xl">
                    {{ $this->saleCollection->translateAttribute('name') }}
                </h2>

                @if ($this->saleCollection->translateAttribute('description'))
                    <p class="mt-1 text-lg font-medium">
                        {!! $this->saleCollection->translateAttribute('description') !!}
                    </p>
                @endif

                <a href="{{ route('collection.view', $this->saleCollection->defaultUrl->slug) }}"
                   class="inline-block px-5 py-3 mt-6 text-sm font-medium text-white bg-black rounded-lg hover:ring-1 hover:ring-black"
                   wire:navigate
                >
                    Shop the Sale
                </a>
            </div>

{{--            <div class="mt-8 sm:absolute sm:right-0 sm:top-0 sm:mt-0">--}}
{{--                <div class="flex flex-col">--}}
{{--                    @foreach ($this->saleCollectionImages as $imageGroup)--}}
{{--                        <div class="gap-8 first:flex last:sm:flex last:hidden">--}}
{{--                            @foreach ($imageGroup as $image)--}}
{{--                                <img class="object-cover w-48 h-48 rounded-lg lg:h-72 lg:w-72 odd:mt-8"--}}
{{--                                     src="{{ $image->getUrl('medium') }}"--}}
{{--                                     loading="lazy" />--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}

            <?php
            $images = [
                'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20(1).jpg',
                'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20(4).jpg',
                'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20_-min.jpg',
                'https://i.pinimg.com/736x/e1/9e/c8/e19ec8cd949cc98c53b02bfcfcb5927c.jpg',
                'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20(2).jpg',
                'https://www.tashistudio.com/modules/freepatterns/views/img/Luxury%20Bloom%20Preview%20Images%20(5).jpg',
                'https://i.pinimg.com/736x/cc/da/31/ccda312b1afdb980bc15423465e43eca.jpg',
                'https://i.pinimg.com/736x/fe/c0/7f/fec07f2ba6ad86bacc436077900e2275.jpg',
                'https://i.pinimg.com/736x/39/08/9c/39089c454669b65fc67a1cd5e54a22e5.jpg',
                'https://mediajamshidi.com/cdn/shop/files/SpringWaltz-114-09.jpg?crop=center&height=940&v=1743323564&width=940',
            ];

            $chunkSize = ceil(count($images) / 3);
            $imageChunks = array_chunk($images, $chunkSize);

            $column1 = $imageChunks[0] ?? [];
            $column2 = $imageChunks[1] ?? [];
            $column3 = $imageChunks[2] ?? [];
            ?>

            <div class="mt-8 sm:absolute sm:right-0 sm:top-0 sm:mt-0 flex gap-6">
                <div class="relative w-64 h-[450px] overflow-hidden rounded-lg">
                    <div class="marquee-up flex flex-col gap-6">
                        @foreach ($column1 as $image)
                            <img class="object-cover w-64 h-64 rounded-lg transform transition-transform duration-200 hover:scale-105 cursor-pointer"
                                 src="{{ $image }}" loading="lazy" />
                        @endforeach
                        @foreach ($column1 as $image)
                            <img class="object-cover w-64 h-64 rounded-lg transform transition-transform duration-200 hover:scale-105 cursor-pointer"
                                 src="{{ $image }}" loading="lazy" />
                        @endforeach
                    </div>
                </div>

                <div class="relative w-64 h-[450px] overflow-hidden rounded-lg">
                    <div class="marquee-down flex flex-col gap-6">
                        @foreach ($column2 as $image)
                            <img class="object-cover w-64 h-64 rounded-lg transform transition-transform duration-200 hover:scale-105 cursor-pointer"
                                 src="{{ $image }}" loading="lazy" />
                        @endforeach
                        @foreach ($column2 as $image)
                            <img class="object-cover w-64 h-64 rounded-lg transform transition-transform duration-200 hover:scale-105 cursor-pointer"
                                 src="{{ $image }}" />
                        @endforeach
                    </div>
                </div>

                <div class="relative w-64 h-[450px] overflow-hidden rounded-lg">
                    <div class="marquee-up flex flex-col gap-6">
                        @foreach ($column3 as $image)
                            <img class="object-cover w-64 h-64 rounded-lg transform transition-transform duration-200 hover:scale-105 cursor-pointer"
                                 src="{{ $image }}" loading="lazy" />
                        @endforeach
                        @foreach ($column3 as $image)
                            <img class="object-cover w-64 h-64 rounded-lg transform transition-transform duration-200 hover:scale-105 cursor-pointer"
                                 src="{{ $image }}" loading="lazy" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
