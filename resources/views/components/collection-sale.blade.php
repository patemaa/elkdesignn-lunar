<section>
    <div class="p-8 overflow-hidden border-2 shadow-xl border-black/80 rounded-lg">
        <div class="sm:py-32 sm:relative">
            <div>
                <h2 class="text-4xl font-extrabold sm:text-5xl">
                    {{ $this->saleCollection->translateAttribute('name') }}
                </h2>

                @if ($this->saleCollection->translateAttribute('description'))
                    <p class="mt-1 text-xl font-medium">
                        {!! $this->saleCollection->translateAttribute('description') !!}
                    </p>
                @endif

                <a href="{{ route('collection.view', $this->saleCollection->defaultUrl->slug) }}"
                   class="inline-block px-5 py-3 mt-6 font-bold  text-white bg-black rounded-lg hover:ring-2 hover:ring-black transition duration-300"
                   wire:navigate
                >
                    Shop the Sale
                </a>
            </div>

            @php
                $imageChunks = $this->allProductsImages ?? collect();
                $column1 = $imageChunks->get(0, collect());
                $column2 = $imageChunks->get(1, collect());
                $column3 = $imageChunks->get(2, collect());
            @endphp

            <div class="mt-8 sm:absolute sm:right-0 sm:top-0 sm:mt-0 flex gap-6">

                <div class="relative w-64 h-[450px] overflow-hidden rounded-xl">
                    <div class="marquee-up flex flex-col gap-6">
                        @foreach ($column1 as $item)
                            <a href="{{ route('product.view', $item['product']->defaultUrl->slug) }}">
                                <img class="object-cover w-64 h-64 rounded-lg transition-transform duration-200 hover:scale-105 cursor-pointer"
                                     src="{{ $item['thumbnail']->getUrl('medium') }}" loading="lazy" />
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="relative w-64 h-[450px] overflow-hidden rounded-lg">
                    <div class="marquee-down flex flex-col gap-6">
                        @foreach ($column2 as $item)
                            <a href="{{ route('product.view', $item['product']->defaultUrl->slug) }}">
                                <img class="object-cover w-64 h-64 rounded-lg transition-transform duration-200 hover:scale-105 cursor-pointer"
                                     src="{{ $item['thumbnail']->getUrl('medium') }}" loading="lazy" />
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="relative w-64 h-[450px] overflow-hidden rounded-lg">
                    <div class="marquee-up flex flex-col gap-6">
                        @foreach ($column3 as $item)
                            <a href="{{ route('product.view', $item['product']->defaultUrl->slug) }}">
                                <img class="object-cover w-64 h-64 rounded-lg transition-transform duration-200 hover:scale-105 cursor-pointer"
                                     src="{{ $item['thumbnail']->getUrl('medium') }}" loading="lazy" />
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
