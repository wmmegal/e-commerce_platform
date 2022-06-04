<?php

namespace Database\Seeders;

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
        Product::factory()->create([
            'title' => ' Nike product',
            'slug' => 'nike-product',
            'description' => 'Nike product description',
            'price' => '9000',
        ]);
    }
}
