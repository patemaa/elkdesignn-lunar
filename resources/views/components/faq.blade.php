<div class="container mx-auto px-4 py-12">
    <div class="flex flex-col md:flex-row gap-10">

        <!-- Sol kısım: Başlık -->
        <div class="w-full md:w-1/3">
            <h2 class="text-4xl font-bold leading-snug">
                Frequently Asked Questions
            </h2>
            <p class="mt-4 text-gray-400 text-sm leading-relaxed">
                Common questions and answers about our artwork and licensing.
            </p>
        </div>

        <!-- Sağ kısım: Accordion -->
        <div class="w-full md:w-2/3 space-y-3">
            @foreach ([
                ['q' => 'How does licensing work?', 'a' => 'Standard and Extended Non-exclusive Licensing allows you to use my artwork for your commercial projects under specific terms.'],
                ['q' => 'Do you offer custom or commissioned work?', 'a' => 'No, I do not offer custom work at this time.'],
                ['q' => 'What types of projects can I use the licensed artwork for?', 'a' => 'The licensed artwork can be used for a variety of commercial projects.'],
                ['q' => 'Are there restrictions on how I can use the artwork?', 'a' => 'Yes, there are restrictions such as no resale or sublicensing as-is.'],
                ['q' => 'What file formats do you provide?', 'a' => 'Ultra high-resolution PSD, JPEG, and PNG formats in RGB color mode.'],
                ['q' => 'Can I modify the artwork?', 'a' => 'Yes, modifications are permitted under the licensing terms.'],
                ['q' => 'What happens if I need additional usage rights later?', 'a' => 'You can purchase a new license if you need more rights.'],
                ['q' => 'Do you offer discounts for bulk licensing?', 'a' => 'No, each license is priced individually.']
            ] as $index => $item)
                <div class="border border-none shadow rounded-lg overflow-hidden ">
                    <input type="checkbox" id="faq-{{ $index }}" class="hidden peer">
                    <label for="faq-{{ $index }}"
                           class="bg-white block px-6 py-4 cursor-pointer font-medium transition-colors duration-300 peer-checked:border-l-4 peer-checked:border-white">
                        {{ $item['q'] }}
                    </label>
                    <div class="max-h-0 overflow-hidden text-sm px-6 transition-all duration-500 ease-in-out peer-checked:max-h-40 peer-checked:py-4 bg-white">
                        {{ $item['a'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
