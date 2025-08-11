<form wire:submit.prevent="submit" class="flex flex-col gap-3 w-full sm:w-[500px]">
    <input
        type="email"
        wire:model.defer="email"
        placeholder="Enter your email"
        class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 transition duration-300 focus:ring-black dark:bg-gray-900 dark:border-gray-700 dark:text-white"
        required
    >

    <button
        type="submit"
        class="px-6 py-4 bg-black text-white rounded-md hover:bg-gray-800 cursor-pointer transition duration-300"
    >
        Subscribe
    </button>

    @if ($message)
        <div
            role="alert"
            class="flex items-center gap-2 mt-3 p-3 rounded border
                @if($messageType === 'success') border-green-600 bg-green-100 text-green-800
                @elseif($messageType === 'error') border-red-600 bg-red-100 text-red-800
                @elseif($messageType === 'warning') border-yellow-600 bg-yellow-100 text-yellow-800
                @endif"
        >
            @if($messageType === 'success')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            @elseif($messageType === 'error')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            @elseif($messageType === 'warning')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
            @endif

            <span>{{ $message }}</span>
        </div>
    @endif
</form>
