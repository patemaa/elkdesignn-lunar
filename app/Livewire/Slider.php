<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Lunar\Models\Collection as CollectionModel;

class Slider extends Component
{
    public $images = [];
    public $type = 'default';

    public function mount()
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

    public function render()
    {
        if ($this->type === 'image-slider') {
            return view('livewire.image-slider');
        }
        return view('livewire.slider');
    }
}
