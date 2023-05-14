<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_items')->insert([
            [
                'order_id' => "1",
                'meal_id' => "1",
                'amount' => "1",
            ],
            [
                'order_id' => "1",
                'meal_id' => "2",
                'amount' => "3",
            ],
        ]);
    }
}
