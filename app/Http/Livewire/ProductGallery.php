<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductGallery extends Component
{
    public Product $product;
    public $selectedImgUrl;

    public function mount()
    {
        $this->selectedImgUrl = $this->product->getFirstMediaUrl();
    }

    public function selectImgUrl($url)
    {
        $this->selectedImgUrl = $url;
    }

    public function render()
    {
        return view('livewire.product-gallery');
    }
}
