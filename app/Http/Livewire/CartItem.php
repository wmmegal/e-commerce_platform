<?php

namespace App\Http\Livewire;

use App\Cart\Contracts\CartInterface;
use App\Models\Variation;
use Livewire\Component;

class CartItem extends Component
{
    public Variation $variation;
    public $quantity;

    public function mount()
    {
        $this->quantity = $this->variation->pivot->quantity;
    }

    public function updatedQuantity($quantity)
    {
        $quantity = $quantity > 0 ? $quantity : 1;
        $this->quantity = min($quantity, $this->variation->stockCount());

        app(CartInterface::class)->changeQuantity($this->variation, $this->quantity);

        $this->emit('updated.cart');

        $this->dispatchBrowserEvent('notification', [
            'body' => 'Quantity updated',
        ]);
    }

    public function remove(CartInterface $cart)
    {
        $cart->remove($this->variation);

        $this->emit('updated.cart');

        $this->dispatchBrowserEvent('notification', [
            'body' => $this->variation->product->title.' was removed',
        ]);
    }

    public function render()
    {
        return view('livewire.cart-item');
    }
}
