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
                'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20(2).jpg',
            ];

            $imageGroups = array_chunk($images, 2);
            ?>

            <div class="mt-8 sm:absolute sm:right-0 sm:top-0 sm:mt-0">
                <div class="flex flex-col">
                    @foreach ($imageGroups as $imageGroup)
                    <div class="gap-8 first:flex last:sm:flex last:hidden">
                        @foreach ($imageGroup as $image)
                        <img class="object-cover w-48 h-48 rounded-lg lg:h-72 lg:w-72 odd:mt-8"
                             src="{{ $image }}"
                             loading="lazy" />
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
