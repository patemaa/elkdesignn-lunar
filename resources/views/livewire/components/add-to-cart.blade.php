<div>
    <div>
        <button type="submit"
                class="w-full px-6 py-4 text-center text-white bg-black rounded-lg hover:bg-black/90 cursor-pointer"
                wire:click.prevent="addToCart">
            Add to Cart
        </button>
    </div>

    @if ($errors->has('quantity'))
        <div class="p-2 mt-4 text-xs font-medium text-center text-red-700 rounded bg-red-50"
             role="alert">
            @foreach ($errors->get('quantity') as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
</div>
