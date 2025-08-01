<div class="sm:relative"
     x-data="{
         linesVisible: @entangle('linesVisible').live
     }">
    <button class="grid w-16 h-16 transition border-l border-gray-100 lg:border-l-transparent hover:opacity-75"
            x-on:click="linesVisible = !linesVisible">
        <span class="sr-only">Cart</span>

        <span class="place-self-center">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                stroke="currentColor" class="size-6 cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
            </svg>
        </span>
    </button>

    <div
        class="absolute inset-x-0 top-auto z-50 w-screen max-w-sm px-6 py-8 mx-auto mt-4 bg-white border border-gray-100 shadow-xl sm:left-auto rounded-xl"
        x-show="linesVisible"
        x-on:click.away="linesVisible = false"
        x-transition
        x-cloak>
        <button class="absolute text-black transition-transform top-3 right-3 hover:scale-110"
                type="button"
                aria-label="Close"
                x-on:click="linesVisible = false">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-4 h-4 cursor-pointer"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

    </div>
</div>
