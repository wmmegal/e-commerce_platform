<?php

namespace App\Cart;

use App\Cart\Contracts\CartInterface;
use App\Models\Cart as ModelsCart;
use App\Models\User;
use App\Models\Variation;
use Illuminate\Session\SessionManager;

class Cart implements CartInterface
{
    protected $instance;

    public function __construct(protected SessionManager $session)
    {
    }

    public function exists()
    {
        return $this->session->has(config('cart.session.key'));
    }

    public function create(?User $user = null)
    {
        $instance = ModelsCart::make();

        if ($user) {
            $instance->user()->associate($user);
        }

        $instance->save();
        $this->session->put(config('cart.session.key'), $instance->uuid);
    }

    public function contents()
    {
        return $this->instance()->variations;
    }

    public function contentsCount()
    {
        return $this->contents()->count();
    }

    public function add(Variation $variation, $quantity = 1)
    {
        if ($existsVariation = $this->getVariation($variation)) {
            $quantity += $existsVariation->pivot->quantity;
        }

        $this->instance()->variations()->syncWithoutDetaching([
            $variation->id => [
                'quantity' => min($quantity, $variation->stockCount())
            ]
        ]);
    }

    public function changeQuantity(Variation $variation, $quantity)
    {
        $quantity = min($quantity, $variation->stockCount());

        $this->instance()->variations()->updateExistingPivot($variation->id, [
            'quantity' => $quantity
        ]);

        return $quantity;
    }

    public function subtotal()
    {
        return $this->instance()->variations
            ->reduce(function (int $acc, Variation $variation) {
                return $acc + ($variation->price * $variation->pivot->quantity);
            }, 0);
    }

    public function formattedSubtotal()
    {
        return money($this->subtotal());
    }

    public function remove(Variation $variation)
    {
        $this->instance()->variations()->detach($variation);
    }

    public function isEmpty()
    {
        return $this->contentsCount() === 0;
    }

    protected function getVariation(Variation $variation)
    {
        return $this->instance()->variations->find($variation->id);
    }

    protected function instance(): ModelsCart
    {
        if ($this->instance) {
            return $this->instance;
        }

        return $this->instance = ModelsCart::where('uuid', $this->session->get(config('cart.session.key')))->first();
    }

}
