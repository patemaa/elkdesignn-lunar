<footer class="footer sm:footer-horizontal footer-center bg-base-300 text-base-content font-nanum font-bold px-4 ">
{{--    <div class="pt-12 px-4">--}}
{{--        <div class="max-w-screen-lg mx-auto flex flex-col sm:flex-row items-center justify-between gap-8">--}}
{{--            <div class="text-center sm:text-left">--}}
{{--                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-white mb-2">--}}
{{--                    Stay in touch--}}
{{--                </h2>--}}
{{--                <p class="text-gray-600 dark:text-gray-300">--}}
{{--                    Want to hear about updates and offers? Leave your email below.--}}
{{--                </p>--}}
{{--            </div>--}}

{{--            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">--}}
{{--                @csrf--}}
{{--                <input--}}
{{--                    type="email"--}}
{{--                    name="email"--}}
{{--                    required--}}
{{--                    placeholder="Enter your email"--}}
{{--                    class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black dark:bg-gray-900 dark:border-gray-700 dark:text-white"--}}
{{--                >--}}
{{--                <button--}}
{{--                    type="submit"--}}
{{--                    class="px-6 py-2 bg-black text-white rounded-md hover:bg-gray-800 transition"--}}
{{--                >--}}
{{--                    Subscribe--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="flex space-x-3">
        <img src="{{ asset('storage/15/logo-straight.png') }}" alt="Logo" class="h-[100px] w-auto" loading="lazy">

        <p>Copyright ©2025 - All right reserved by <a href="/"> Elkdesign</a></p>

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
