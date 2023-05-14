<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dishes')->insert([
            [
                'category_id' => "1",
                'name' => "Coca-Cola",
                'price' => "1.99",
                'ingredients' => "Sugar",
                'description' => "Soft drink",
                'is_available' => "1",
            ],
            [
                'category_id' => "2",
                'name' => "Big-Mac",
                'price' => "3.99",
                'ingredients' => "Bun, beef, lettuce, tomatoes, pickles, sauces",
                'description' => "The tastiest",
                'is_available' => "1",
            ],
        ]);
    }
}
