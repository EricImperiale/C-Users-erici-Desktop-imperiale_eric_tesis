<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('property_types')->insert([
            [
                'type_id' => 1,
                'name' => 'Casa',
            ],
            [
                'type_id' => 2,
                'name' => 'Departamento',
            ],
            [
                'type_id' => 3,
                'name' => 'PH',
            ],
        ]);
    }
}
