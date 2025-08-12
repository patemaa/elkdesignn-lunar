<section class="bg-neutral-100 min-h-screen">
    <div class="max-w-(--breakpoint-2xl) px-4 py-12 mx-auto sm:px-6 lg:px-12">
        <div class="grid items-start grid-cols-1 gap-8 md:grid-cols-[70%_30%]">
            <div class="grid grid-cols-1 gap-4">
                <!-- Desktop Grid -->
                <div class="hidden md:grid grid-cols-2 gap-4">
                    @foreach ($this->images as $image)
                        <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-xl w-full"
                             wire:key="image_{{ $image->id }}">
                            <img loading="lazy"
                                 class="object-cover rounded-xl aspect-square h-full w-full cursor-crosshair"
                                 src="{{ $image->getUrl() }}"
                                 alt="{{ $this->product->translateAttribute('name') }}" />
                        </div>
                    @endforeach
                </div>

                <!-- Mobile Slider -->
                <div class="md:hidden">
                    <div class="swiper" id="productImageSlider">
                        <div class="swiper-wrapper">
                            @foreach ($this->images as $image)
                                <div class="swiper-slide" wire:key="mobile_image_{{ $image->id }}">
                                    <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-xl w-full">
                                        <img loading="lazy"
                                             class="object-cover rounded-xl aspect-square h-full w-full cursor-crosshair"
                                             src="{{ $image->getUrl() }}"
                                             alt="{{ $this->product->translateAttribute('name') }}" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

            <div class="py-6 px-6 lg:sticky lg:top-10 bg-white rounded shadow">
                <div class="flex items-center justify-between">
                    <h1 class="text-5xl">
                        {{ $this->product->translateAttribute('name') }}
                    </h1>
                </div>

                <p class="mt-6 font-normal">This seamless pattern is available for licensing for commercial use.</p>

                <button onclick="my_modal_2.showModal()"
                        class="btn w-full border border-black bg-white hover:bg-gray-100 flex px-6 py-8 rounded transition duration-300 justify-between cursor-pointer mt-4 text-xl">
                    <div class="justify-items-start flex space-x-4 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z"/>
                        </svg>
                        <p>Read License Terms</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                    </svg>
                </button>
                    <x-license-terms/>

                <p class="text-xl mt-5">
                    Please choose a license type:
                </p>
                <div class="dropdown w-full">
                    <label tabindex="0"
                           class="btn w-full border border-black bg-white hover:bg-gray-100 flex px-6 py-8 rounded transition duration-300 justify-between cursor-pointer mt-4 text-xl">
                        Please choose a license type:
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-full mt-1">
                        <li><a class="py-5 text-lg">Standard Commercial License</a></li>
                        <li><a class="py-5 text-lg">Extended Commercial License</a></li>
                    </ul>
                </div>

                <form class="mt-4">
                    <x-product-price class="ml-4 font-xl font-bold"
                                     :variant="$this->variant"/>

                    <div class=" mt-8">
                        <livewire:components.add-to-cart :purchasable="$this->variant"
                                                         :wire:key="$this->variant->id"/>

                    </div>
                </form>
                <div class="font-normal">
                    <p class="mt-6">
                        Upon purchase, you will gain instant access to the layered digital source file for this seamless, repeatable pattern.</p>
                    <br>
                    <p>The package includes an ultra high-resolution 6000x6000px layered Photoshop (PSD) file containing the
                        repeatable pattern, plus the individual isolated elements in PNG format with a transparent background.</p>
                    <br>
                    <p>You can easily create custom colorways by adjusting the background color. Additionally, all
                        pre-designed colorways displayed here are provided as separate high-quality JPEG files for your
                        convenience.</p>
                </div>

                <p class="font-bold text-2xl mt-6">Specifications</p>

                <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-sm p-6 max-w-lg mx-auto mt-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Product Features</h3>
                    <ul class="space-y-4">
                        <li class="flex justify-between items-center pb-2 border-b border-gray-200 last:border-b-0 last:pb-0">
                            <span class="font-semibold text-gray-600">File Format</span>
                            <span class="text-gray-900 font-medium text-right">Layered PSD & JPEG</span>
                        </li>
                        <li class="flex justify-between items-center pb-2 border-b border-gray-200 last:border-b-0 last:pb-0">
                            <span class="font-semibold text-gray-600">Isolated Elements</span>
                            <span class="text-gray-900 font-medium text-right">Included as PNG</span>
                        </li>
                        <li class="flex justify-between items-center pb-2 border-b border-gray-200 last:border-b-0 last:pb-0">
                            <span class="font-semibold text-gray-600">Resolution</span>
                            <span class="text-gray-900 font-medium text-right">Seamless Tile – 6000 pixels</span>
                        </li>
                        <li class="flex justify-between items-center pb-2 border-b border-gray-200 last:border-b-0 last:pb-0">
                            <span class="font-semibold text-gray-600">Print Size (300DPI)</span>
                            <span class="text-gray-900 font-medium text-right">20x20 inches (~51x51 cm)</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span class="font-semibold text-gray-600">Repeat</span>
                            <span class="text-gray-900 font-medium text-right">Yes</span>
                        </li>
                    </ul>
                </div>

                <button onclick="my_modal_1.showModal()"
                        class="btn w-full border border-black bg-white hover:bg-gray-100 flex px-6 py-8 rounded transition duration-300 justify-between cursor-pointer mt-4 text-xl items-center">
                    <div class="justify-items-start flex space-x-4 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/>
                        </svg>

                        <p>Infinitely Repeatable + Seamless Tile</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                    </svg>
                </button>
                <dialog id="my_modal_1" class="modal">
                    <div class="modal-box max-w-5xl">
                        <form method="dialog"   >
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>

                            </button>
                        </form>
                        <p class="py-4">
                        <div class="container">
                            <h2 style="font-size: 1.5rem; font-weight: bold;">Infinitely Repeatable + Seamless Tile</h2>
                            <p class="mt-6">
                                In the context of digital patterns and design, "Infinitely Repeatable" and "Seamless
                                Tile" refer to the ability to use a design multiple times without visible breaks or
                                edges, creating a continuous pattern.

                                <br>
                            </p>
                            <p class="font-bold mt-6"> Here's what each term means:</p>

                            <ul class="mt-6">
                                <li> **Infinitely Repeatable: The design is specifically created to replicate itself
                                    horizontally and vertically. When placed side by side, the edges align perfectly,
                                    ensuring the pattern flows continuously without interruptions.
                                </li>
                                <li class="mt-6">
                                    **Seamless Tile: This means the design is a "tile" that can be duplicated
                                    seamlessly.
                                    The edges of the tile are crafted to match perfectly with adjacent tiles, making the
                                    joins invisible. This is essential for applications like fabric, wallpaper, or web
                                    backgrounds where the pattern needs to cover large areas smoothly.

                                </li>
                            </ul>
                            <p class="mt-6">
                                Together, "Infinitely Repeatable + Seamless Tile" ensures the pattern can be scaled and
                                extended across any surface or canvas without showing any gaps, mismatches, or breaks.
                            </p>
                        </div>
                    </div>
                </dialog>

                <button
                    class="btn w-full border border-black bg-white hover:bg-gray-100 flex px-8 py-8 rounded transition duration-300 justify-between cursor-pointer mt-4 text-xl">
                    <div class="justify-items-start flex space-x-4 ">
                        <p>Share</p>
                    </div>
                    <div class="grid grid-flow-col gap-4">
                        <a href="https://www.google.com/search?q=instagram" target="_blank" rel="noopener noreferrer">
                            <x-hugeicons-instagram class="text-black/40 hover:text-black/80 transition duration-300"/>
                        </a>
                        <a href="https://www.google.com/search?q=pinterest" target="_blank" rel="noopener noreferrer">
                            <x-hugeicons-pinterest class="text-black/40 hover:text-black/80 transition duration-300"/>
                        </a>
                        <a href="https://www.google.com/search?q=behance" target="_blank" rel="noopener noreferrer">
                            <x-hugeicons-behance-02 class="text-black/40 hover:text-black/80 transition duration-300"/>
                        </a>
                        <a href="https://www.google.com/search?q=linkedin" target="_blank" rel="noopener noreferrer">
                            <x-hugeicons-linkedin-01 class="text-black/40 hover:text-black/80 transition duration-300"/>
                        </a>
                    </div>
                </button>
            </div>
        </div>
        <x-features/>
        <x-faq/>

        @php
            \App\Livewire\Slider::addProductToRecentlyViewed($this->product->id);
        @endphp

        <div class="max-w-(--breakpoint-2xl) mx-auto mt-10">
            <livewire:slider type="recently-viewed" />
        </div>

        <div class="max-w-(--breakpoint-2xl) mx-auto mt-10">
            <livewire:slider type="image-slider"/>
        </div>
    </div>
</section>
