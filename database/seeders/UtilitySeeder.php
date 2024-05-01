<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('utilities')->insert([
            [
                'utility_id' => 1,
                'name' => 'Luz',
            ],
            [
                'utility_id' => 2,
                'name' => 'Agua',
            ],
            [
                'utility_id' => 3,
                'name' => 'Gas',
            ],
            [
                'utility_id' => 4,
                'name' => 'Electricidad',
            ],
        ]);
    }
}
