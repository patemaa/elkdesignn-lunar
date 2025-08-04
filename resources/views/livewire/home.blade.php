<div>
    <x-welcome-banner />

    <div class="max-w-(--breakpoint-xl) px-4 py-12 mx-auto space-y-3 sm:px-6 lg:px-8">
        @if ($this->saleCollection)
            <x-collection-sale />
        @endif

        <section>
            <h2 class="text-3xl font-bold text-center font-poiret uppercase">
                Collections
            </h2>

            <div class="grid grid-cols-2">
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
