<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'table_id' => "1",
                'order_status' => "1",
            ],
            [
                'table_id' => "1",
                'order_status' => "2",
            ],
        ]);
    }
}
