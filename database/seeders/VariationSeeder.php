<?php

namespace Database\Seeders;

use App\Models\Variation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Variation::factory()->create([
            'product_id' => 1,
            'title' => 'Black',
            'price' => 9000,
            'type' => 'color',
            'order' => 1
        ]);

        Variation::factory()->create([
            'product_id' => 1,
            'title' => 'White',
            'price' => 9000,
            'type' => 'color',
            'order' => 2
        ]);

        Variation::factory()->create([
            'product_id' => 2,
            'title' => 'Rainbow',
            'price' => 9000,
            'type' => 'color',
            'order' => 2
        ]);

        $variation_white_1 = Variation::factory()->create([
            'product_id' => 1,
            'title' => '8',
            'price' => 9000,
            'type' => 'size',
            'sku' => 'abc',
            'parent_id' => 1,
            'order' => 1
        ]);

        $variation_black_1 = Variation::factory()->create([
            'product_id' => 1,
            'title' => '9',
            'price' => 9000,
            'type' => 'size',
            'sku' => 'vas',
            'parent_id' => 1,
            'order' => 2
        ]);

        $variation_white_2 = Variation::factory()->create([
            'product_id' => 1,
            'title' => '8',
            'price' => 9000,
            'type' => 'size',
            'sku' => 'asd',
            'parent_id' => 2,
            'order' => 2
        ]);

        $variation_black_2 = Variation::factory()->create([
            'product_id' => 1,
            'title' => '9',
            'price' => 9000,
            'type' => 'size',
            'sku' => 'kas',
            'parent_id' => 2,
            'order' => 1
        ]);

        $variation_raindbow = Variation::factory()->create([
            'product_id' => 2,
            'title' => '12',
            'price' => 9000,
            'type' => 'size',
            'sku' => 'xyz',
            'parent_id' => 3,
            'order' => 1
        ]);

        $variation_white_1->addMedia('nike-white.webp')
            ->preservingOriginal()
            ->toMediaCollection();
        $variation_white_2->addMedia('nike-white.webp')
            ->preservingOriginal()
            ->toMediaCollection();

        $variation_black_1->addMedia('nike-black.jpg')
            ->preservingOriginal()
            ->toMediaCollection();
        $variation_black_2->addMedia('nike-black.jpg')
            ->preservingOriginal()
            ->toMediaCollection();
    }
}
