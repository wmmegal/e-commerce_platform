<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use function Clue\StreamFilter\fun;

class ProductBrowser extends Component
{
    use WithPagination;

    public Category $category;
    public $queryFilters = [];

    public function mount()
    {
        $this->queryFilters = $this->category->products->pluck('variations')
            ->flatten()
            ->groupBy('type')
            ->keys()
            ->mapWithKeys(fn($key) => [$key => []])
            ->toArray();
    }

    public function render()
    {
        $search = Product::search('', function ($meilisearch, string $query, array $options) {
            $filters = collect($this->queryFilters)
                ->filter(fn($flter) => !empty($flter))
                ->map(function ($value, $key) {
                    return collect($value)->map(fn($value) => $key.' ="'.$value.'"');
                })
                ->flatten()
                ->join(' AND ');

            $options['facetsDistribution'] = ['size', 'color'];

            if ($filters) {
                $options['filter'] = $filters;
            }

            return $meilisearch->search($query, $options);
        })->raw();

        $products = $this->category->products
            ->find(collect($search['hits'])->pluck('id'));

        return view('livewire.product-browser', [
            'products' => $products,
            'filters' => $search['facetsDistribution']
        ]);
    }
}
