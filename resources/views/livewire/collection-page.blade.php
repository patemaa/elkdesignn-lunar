<section>
    <div class="max-w-(--breakpoint-xl) px-4 py-12 mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-center font-nanum mb-10">
            {{ $this->collection->translateAttribute('name') }}
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2">
            @forelse($this->collection->products as $product)
                <x-product-card :product="$product" />
            @empty
            @endforelse
        </div>
    </div>
</section>
