<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\View\View;
use Livewire\Component;
use Lunar\Models\Collection;
use Lunar\Models\CollectionGroup;
use Lunar\Models\Url;
use Livewire\WithPagination;

class Home extends Component
{
    public $collectionGroups;

    public function mount()
    {
        $this->collectionGroups = CollectionGroup::with([
            'collections.products.media'
        ])->get();
    }
    /**
     * Return the sale collection.
     */
    public function getSaleCollectionProperty(): Collection | null
    {
        return Url::whereElementType((new Collection)->getMorphClass())->whereSlug('sale')->first()?->element ?? null;
    }

    /**
     * Return all images in sale collection.
     */
    public function getSaleCollectionImagesProperty()
    {
        if (! $this->getSaleCollectionProperty()) {
            return null;
        }

        $collectionProducts = $this->getSaleCollectionProperty()
            ->products()->inRandomOrder()->limit(4)->get();

        $saleImages = $collectionProducts->map(function ($product) {
            return $product->thumbnail;
        });

        return $saleImages->chunk(2);
    }

    protected $paginationTheme = 'tailwind';

    public function getAllProductsProperty()
    {
        return Product::with('thumbnail')->get();
    }

    public function getAllProductsImagesProperty()
    {
        $products = $this->getAllProductsProperty(); // tüm ürünler (with thumbnail)

        $images = $products->map(fn($product) => [
            'product' => $product,
            'thumbnail' => $product->thumbnail,
        ])->filter(fn($item) => $item['thumbnail'] !== null);

        return $images->chunk(ceil($images->count() / 3));
    }

    public function render(): View
    {
        return view('livewire.home');
    }
}
