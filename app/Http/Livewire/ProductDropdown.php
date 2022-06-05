<?php

namespace App\Http\Livewire;

use App\Models\Variation;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;

/**
 * @property mixed $selectedVariationModel
 */
class ProductDropdown extends Component
{
    public $variations;
    public $selectedVariation;

    public function getSelectedVariationModelProperty()
    {
        if (!$this->selectedVariation) {
            return;
        }

        return Variation::find($this->selectedVariation);
    }

    #[NoReturn] public function updatedSelectedVariation()
    {

    }

    public function render()
    {
        return view('livewire.product-dropdown');
    }
}
