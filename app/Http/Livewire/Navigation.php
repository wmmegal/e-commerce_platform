<?php

namespace App\Http\Livewire;

use App\Cart\Contracts\CartInterface;
use App\Models\Product;
use Livewire\Component;

class Navigation extends Component
{
    public $searchQuery = '';

    protected $listeners = [
        'updated.cart' => '$refresh'
    ];

    public function getCartProperty(CartInterface $cart)
    {
        return $cart;
    }

    public function clearSearch()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
        $products = Product::search($this->searchQuery)->get();

        return view('livewire.navigation', [
            'products' => $products
        ]);
    }
}
