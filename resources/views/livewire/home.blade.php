<div class="font-nanum font-extrabold">
    <x-welcome-banner />

    <div class="max-w-(--breakpoint-xl) px-4 py-12 mx-auto space-y-3 sm:px-6 lg:px-8">
{{--        @if ($this->saleCollection)--}}
{{--            <x-collection-sale />--}}
{{--        @endif--}}

        <section>
            <div class="text-3xl text-center uppercase mb-4 justify-items-center">
                Collections
            </div>

            <div class="flex flex-wrap justify-center">
                @foreach ($this->allProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>

{{--            <div class="mt-8">--}}
{{--                {{ $this->allProducts->links() }}--}}
{{--            </div>--}}
        </section>
    </div>
</div>
