<section>
    <div class="max-w-(--breakpoint-xl) px-4 py-12 mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl text-center mb-10 uppercase">
            {{ $this->collection->translateAttribute('name') }}
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-3">
            @forelse($this->collection->products as $product)
                <x-product-card :product="$product" />
            @empty
            @endforelse
        </div>

        <div class="max-w-(--breakpoint-2xl) mx-auto mt-10">
            <livewire:slider type="recently-viewed" />
        </div>
    </div>
</section>
