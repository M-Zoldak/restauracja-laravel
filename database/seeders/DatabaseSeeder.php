<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(DishCategorySeeder::class);
        // $this->call(DishSeeder::class);
        // $this->call(OrderSeeder::class);
        // $this->call(OrderItemSeeder::class);
        // $this->call(TableSeeder::class);
        // $this->call(WaiterSeeder::class);
        $this->call(UserSeeder::class);
    }
}
