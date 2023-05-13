<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaiterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('waiters')->insert([
            [
                'firstname' => "Mateusz",
                'lastname' => "Zoldak",
                'email' => "mz@mz.pl",
                'login' => "Mateusz",
                'password' => "Z1"
            ],
            [
                'firstname' => "Mateusz",
                'lastname' => "Serafin",
                'email' => "ms@ms.pl",
                'login' => "Mateusz",
                'password' => "S1"
            ],
        ]);
    }
}
