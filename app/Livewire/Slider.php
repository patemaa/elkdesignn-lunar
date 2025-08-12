<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Carbon;

class Slider extends Component
{
    public $images = [];
    public $type = 'default';

    public function mount()
    {
        if ($this->type === 'recently-viewed') {
            $this->loadRecentlyViewed();
        } elseif ($this->type === 'image-slider') {
            $this->loadAllProducts();
        } else {
            $this->loadAllProducts();
        }
    }

    protected function loadAllProducts()
    {
        $this->images = Product::with('thumbnail')
            ->get()
            ->map(function ($product) {
                return [
                    'url'  => $product->thumbnail?->getUrl(),
                    'name' => $product->translateAttribute('name'),
                    'year' => Carbon::parse($product->created_at)->year,
                    'slug' => $product->defaultUrl?->slug,
                ];
            })
            ->filter(fn ($item) => !empty($item['url']))
            ->values()
            ->toArray();
    }

    protected function loadRecentlyViewed()
    {
        $viewedIds = json_decode(request()->cookie('recently_viewed', '[]'), true);

        if (empty($viewedIds)) {
            $this->images = [];
            return;
        }

        $this->images = Product::with('thumbnail')
            ->whereIn('id', $viewedIds)
            ->orderByRaw("FIELD(id, " . implode(',', $viewedIds) . ")")
            ->get()
            ->map(function ($product) {
                return [
                    'url'  => $product->thumbnail?->getUrl(),
                    'name' => $product->translateAttribute('name'),
                    'year' => Carbon::parse($product->created_at)->year,
                    'slug' => $product->defaultUrl?->slug,
                ];
            })
            ->filter(fn ($item) => !empty($item['url']))
            ->values()
            ->toArray();
    }

    public static function addProductToRecentlyViewed($productId)
    {
        $viewed = json_decode(request()->cookie('recently_viewed', '[]'), true);

        $viewed = array_diff($viewed, [$productId]);
        array_unshift($viewed, $productId);
        $viewed = array_slice($viewed, 0, 10);

        cookie()->queue('recently_viewed', json_encode($viewed), 60 * 24 * 7);
    }

    public function render()
    {
        if ($this->type === 'recently-viewed') {
            return view('livewire.recently-viewed-slider');
        }

        if ($this->type === 'image-slider') {
            return view('livewire.image-slider');
        }

        return view('livewire.slider');
    }
}
