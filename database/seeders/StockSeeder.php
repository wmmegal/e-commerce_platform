<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stock::factory()->create([
            'variation_id' => 3,
            'amount' => 10
        ]);

        Stock::factory()->create([
            'variation_id' => 3,
            'amount' => -2
        ]);
    }
}
