<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('property_statuses')->insert([
            [
                'status_id' => 1,
                'name' => 'Disponible',
            ],
            [
                'status_id' => 2,
                'name' => 'En Reparación',
            ],
        ]);
    }
}
