<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create([
            'name' => 'Brands',
            'slug' => 'brands',
        ]);

        Category::factory()->create([
            'name' => 'Seasons',
            'slug' => 'seasons',
        ]);

        Category::factory()->create([
            'name' => 'Nike',
            'slug' => 'nike',
            'parent_id' => 1
        ]);

        Category::factory()->create([
            'name' => 'Nike new',
            'slug' => 'nike-new',
            'parent_id' => 1
        ]);

        Category::factory()->create([
            'name' => 'Summer',
            'slug' => 'summer',
            'parent_id' => 2
        ]);

        Category::factory()->create([
            'name' => 'Winter',
            'slug' => 'Winter',
            'parent_id' => 2
        ]);
    }
}
