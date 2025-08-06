<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Slider extends Component
{
    public $images = [];
    public $type = 'default';

    public function mount()
    {
        $this->images = Product::with('thumbnail')
            ->get()
            ->map(function ($product) {
                return $product->thumbnail?->getUrl('medium');
            })
            ->filter()
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
