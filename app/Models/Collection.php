<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Lunar\Models\Collection as LunarCollection;

class Collection extends LunarCollection
{
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'collection_product');
    }

    public function getFirstProductImageUrlAttribute()
    {
        $product = $this->products()->with('media')->first();

        return $product?->thumbnail?->getUrl('small') ?? null;
    }
}
