<footer class="footer footer-horizontal footer-center bg-base-300 text-base-content font-bold px-4 flex-col">
    <div class="pt-12 px-4">
        <div class="max-w-screen-lg mx-auto flex flex-col sm:flex-row items-center justify-between gap-8">
            <div class="text-center sm:text-left">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">
                    New Artwork Notification
                </h2>
                <p class="text-gray-600 font-medium">
                    Never miss a new release. Subscribe to receive an email notification whenever I release a new artwork.
                </p>
                <p class="text-gray-400 italic font-medium">
                    * No newsletter, promotion, sales, or spam.
                </p>
            </div>

            <livewire:subscribe-form />
        </div>
    </div>
    <div class="flex space-x-3">
        <img src="{{ asset('storage/15/logo-straight.png') }}" alt="Logo" class="h-[100px] w-auto" loading="lazy">

        <p>
            <span>Copyright ©2025</span>
            <span class="hidden sm:inline"> - All rights reserved by </span>
            <a href="/" class="hidden sm:inline">Elk Design</a>
        </p>

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
    </div>
</footer>
