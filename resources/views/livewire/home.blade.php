<div class="font-extrabold">
    <x-welcome-banner />

    <livewire:slider />


    <div class="max-w-(--breakpoint-2xl) px-4 py-12 mx-auto space-y-3 sm:px-6 lg:px-8">
        @if ($this->saleCollection)
            <x-collection-sale />
        @endif

        <section>
            <div class="text-3xl text-center uppercase justify-items-center mt-15 mb-5">
                Collections
            </div>

            <div class="grid grid-cols-2">
                @foreach ($collectionGroups as $group)
                    @foreach ($group->collections as $collection)
                        @php
                            $randomProduct = $collection->products->random();
                            $imageUrl = $randomProduct?->thumbnail?->getUrl();
                        @endphp

                        <a href="/collections/{{ $collection->defaultUrl?->slug }}" class="block group relative overflow-hidden rounded-xl aspect-[1/1]">
                            @if ($imageUrl)
                                <img src="{{ $imageUrl }}"
                                     alt="{{ $collection->translate('name') }}"
                                     class="w-full h-full object-cover transition-transform duration-600 scale-105 group-hover:scale-120" />

                                <div class="absolute inset-0 bg-black/50 hover:bg-black/10 transition duration-300 flex items-center justify-center px-4 text-white text-center">
                                    <h3 class="text-lg sm:text-6xl font-semibold uppercase">{{ $collection->translateAttribute('name') }}</h3>
                                </div>
                            @else
                                <div class="w-full flex items-center justify-center text-gray-500"></div>
                                <div class="absolute inset-0 bg-black/20 hover:bg-black/10 transition duration-300 flex items-center justify-center px-4 text-white text-center">
                                    <h3 class="text-lg sm:text-6xl font-semibold uppercase">{{ $collection->translateAttribute('name') }}</h3>
                                </div>
                            @endif
                        </a>
                    @endforeach
                @endforeach
            </div>

        </section>
            <div class="text-3xl text-center mb-4 justify-items-center font-bold mt-10">
                Creator's Choice
            </div>
            <livewire:slider type="image-slider" />
    </div>
</div>
