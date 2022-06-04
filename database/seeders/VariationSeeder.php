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
            'price' => 0,
            'type' => 'color',
            'order' => 1
        ]);

        Variation::factory()->create([
            'product_id' => 1,
            'title' => 'White',
            'price' => 0,
            'type' => 'color',
            'order' => 2
        ]);

        Variation::factory()->create([
            'product_id' => 1,
            'title' => '8',
            'price' => 0,
            'type' => 'size',
            'sku' => 'abc',
            'parent_id' => 1,
            'order' => 1
        ]);

        Variation::factory()->create([
            'product_id' => 1,
            'title' => '9',
            'price' => 0,
            'type' => 'size',
            'sku' => 'vas',
            'parent_id' => 1,
            'order' => 2
        ]);

        Variation::factory()->create([
            'product_id' => 1,
            'title' => '8',
            'price' => 0,
            'type' => 'size',
            'sku' => 'asd',
            'parent_id' => 2,
            'order' => 2
        ]);

        Variation::factory()->create([
            'product_id' => 1,
            'title' => '9',
            'price' => 0,
            'type' => 'size',
            'sku' => 'kas',
            'parent_id' => 2,
            'order' => 1
        ]);
    }
}
