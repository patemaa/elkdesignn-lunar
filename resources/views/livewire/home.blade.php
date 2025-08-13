<div class="font-extrabold">
    <x-welcome-banner />

    <x-notification/>

    @if (session('notification'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                window.dispatchEvent(new CustomEvent('show-notification', {
                    detail: {
                        message: "{{ session('notification.message') }}",
                        type: "{{ session('notification.type') }}",
                        // İsteğe bağlı olarak 'link' ekleyebilirsiniz
                    }
                }));
            });
        </script>
    @endif

    <livewire:slider />

    <div class="max-w-screen-2xl px-4 py-12 mx-auto space-y-8 sm:px-6 lg:px-8">

        @if ($this->saleCollection)
            <x-collection-sale />
        @endif

        <!-- Collections Başlık -->
        <section>
            <div class="text-2xl sm:text-3xl text-center uppercase mt-10 mb-6 tracking-wide">
                Collections
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-3">
                @foreach ($collectionGroups as $group)
                    @foreach ($group->collections as $collection)
                        @php
                            $randomProduct = $collection->products->random();
                            $imageUrl = $randomProduct?->thumbnail?->getUrl();
                        @endphp

                        <a href="/collections/{{ $collection->defaultUrl?->slug }}"
                           class="block group relative overflow-hidden rounded-xl aspect-square">
                            @if ($imageUrl)
                                <img src="{{ $imageUrl }}"
                                     alt="{{ $collection->translate('name') }}"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />

                                <div class="absolute inset-0 bg-black/50 hover:bg-black/20 transition duration-300 flex items-center justify-center px-4 text-white text-center">
                                    <h3 class="text-lg sm:text-2xl md:text-7xl font-semibold uppercase">{{ $collection->translateAttribute('name') }}</h3>
                                </div>
                            @else
                                <div class="w-full flex items-center justify-center text-gray-500"></div>
                                <div class="absolute inset-0 bg-black/20 hover:bg-black/10 transition duration-300 flex items-center justify-center px-4 text-white text-center">
                                    <h3 class="text-lg sm:text-2xl md:text-4xl font-semibold uppercase">{{ $collection->translateAttribute('name') }}</h3>
                                </div>
                            @endif
                        </a>
                    @endforeach
                @endforeach
            </div>
        </section>

        <!-- Recently Viewed Slider -->
        <div class="mt-16">
            <livewire:slider type="recently-viewed" />
        </div>

        <!-- Image Slider -->
        <div class="mt-12">
            <livewire:slider type="image-slider"/>
        </div>
    </div>
</div>
