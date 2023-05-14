<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tables')->insert([
            [
                'table_number' => "1",
                'places_count' => "4",
                'is_occupied' => "1",
                'occupied_places_count' => "0",
            ],
            [
                'table_number' => "2",
                'places_count' => "4",
                'is_occupied' => "1",
                'occupied_places_count' => "2",
            ],
        ]);
    }
}
