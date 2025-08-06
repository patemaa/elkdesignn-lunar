<form id="search-form" {{ $attributes->merge(['class' => 'w-full relative flex flex-row-reverse items-center gap-2']) }} action="{{ route('search.view') }}">
    <button id="search-button" type="button" class="p-2 text-black hover:scale-110 transition rounded-md hover:bg-gray-50 cursor-pointer">
        <span class="sr-only">Toggle Search Input</span>
        <svg xmlns="http://www.w3.org/2000/svg"
             class="size-6"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>

    </button>

    <input name="term"
           id="search-input"
           type="search"
           placeholder="Search for products"
           class="h-10 w-0 opacity-0 text-sm border-2 border-gray-100 rounded-lg transition-all duration-300 px-3  focus:ring focus:outline-none focus:ring-black"
           value="{{ $this->term }}" />
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const searchButton = document.getElementById('search-button');

        searchButton.addEventListener('click', function() {
            const isOpen = searchInput.classList.contains('w-full');

            if (isOpen) {
                searchInput.classList.remove('w-full', 'opacity-100');
                searchInput.classList.add('w-0', 'opacity-0');
            } else {
                searchInput.classList.remove('w-0', 'opacity-0');
                searchInput.classList.add('w-full', 'opacity-100');
                searchInput.focus();
            }
        });
    });
</script>
