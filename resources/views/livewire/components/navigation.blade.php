<header class=" sticky top-0 z-50 border-b border-none"
        x-data="{ scrolled: false, lastScrollY: 0 }"
        x-init="lastScrollY = window.scrollY; window.addEventListener('scroll', () => {
            scrolled = window.scrollY > lastScrollY && window.scrollY > 10;
            lastScrollY = window.scrollY;
        })">
    <div class="flex items-center justify-between h-20 px-4 mx-auto  sm:px-6 lg:px-8 transition-transform duration-300 ease-in-out bg-white/50 w-full"
         :class="{ '-translate-y-full': scrolled, 'translate-y-0': !scrolled }">
        <div class="flex items-center">
            <a class="flex items-center shrink-0"
               href="{{ url('/') }}"
               wire:navigate
            >
                <span class="sr-only">Home</span>

                    <x-brand.logo class="w-auto h-6 text-indigo-600" />
            </a>

            <nav class="hidden lg:flex gap-4 absolute left-1/2 transform -translate-x-1/2">
                @foreach ($this->collections as $collection)
                    <a class="
                        text-lg transition-all duration-300 uppercase relative z-0
                        after:content-[''] after:absolute after:inset-0
                        after:-z-10 after:scale-x-0
                        after:bg-black/80 after:rounded-lg
                        after:text-white
                        after:transition-transform after:duration-600
                        hover:text-white hover:after:scale-x-100
                        px-3 py-2
                    "
                       href="{{ route('collection.view', $collection->defaultUrl->slug) }}"
                       wire:navigate
                    >
                        {{ $collection->translateAttribute('name') }}
                    </a>
                @endforeach
            </nav>

        </div>

        <div class="flex items-center justify-between flex-1 ml-4 lg:justify-end">
            <x-header.search class="max-w-sm mr-4" />

            <div class="flex items-center -mr-2 sm:-mr-4 lg:mr-0">
{{--                <x-account/>--}}

                @livewire('components.cart')

                <div x-data="{ mobileMenu: false }">
                    <button x-on:click="mobileMenu = !mobileMenu"
                            class="grid shrink-0 w-16 h-16 border-l border-gray-100 lg:hidden">
                        <span class="sr-only">Toggle Menu</span>

                        <span class="place-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </span>
                    </button>

                    <div x-cloak
                         x-transition
                         x-show="mobileMenu"
                         class="absolute right-0 top-auto z-50 w-screen p-4 sm:max-w-xs">
                        <ul x-on:click.away="mobileMenu = false"
                            class="p-6 space-y-4 bg-white border border-gray-100 shadow-xl rounded-xl">
                            @foreach ($this->collections as $collection)
                                <li>
                                    <a class="text-sm font-medium"
                                       href="{{ route('collection.view', $collection->defaultUrl->slug) }}"
                                       wire:navigate
                                    >
                                        {{ $collection->translateAttribute('name') }}
                                    </a>
                                </li>
                            @endforeach
                                <hr>
                                <li class="flex font-medium text-sm">
                                    <a href="/login">Login</a>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
