<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::factory()->create([
            'title' => ' Nike product',
            'slug' => 'nike-product',
            'description' => 'Nike product description',
            'price' => '9000',
        ]);
        $product->categories()->attach(3);

        $product->addMedia('nike-white.webp')
            ->preservingOriginal()
            ->toMediaCollection();
        $product->addMedia('nike-black.jpg')
            ->preservingOriginal()
            ->toMediaCollection();

        Product::factory(10)->create()->each(function ($product) {
            $product->categories()->attach(3);
        });
    }
}
