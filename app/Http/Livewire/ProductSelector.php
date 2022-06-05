<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductSelector extends Component
{
    public Product $product;
    public $initialVariation;

    public function mount()
    {
        $this->initialVariation = $this->product->variations
            ->sortBy('order')
            ->groupBy('type')
            ->first();
    }

    public function render()
    {
        return view('livewire.product-selector');
    }
}
