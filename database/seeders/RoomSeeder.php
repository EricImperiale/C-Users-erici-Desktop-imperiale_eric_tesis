<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'room_id' => 1,
                'name' => 'Altillo',
            ],
            [
                'room_id' => 2,
                'name' => 'Balcón',
            ],
            [
                'room_id' => 3,
                'name' => 'Cocina',
            ],
            [
                'room_id' => 4,
                'name' => 'Comedor',
            ],
            [
                'room_id' => 5,
                'name' => 'Living',
            ],
            [
                'room_id' => 6,
                'name' => 'Patio',
            ],
            [
                'room_id' => 7,
                'name' => 'Dormitorio',
            ],
            [
                'room_id' => 8,
                'name' => 'Jardín',
            ],
            [
                'room_id' => 9,
                'name' => 'Lavadero',
            ],
            [
                'room_id' => 10,
                'name' => 'Terraza',
            ],
            [
                'room_id' => 11,
                'name' => 'Gimnasio',
            ],
        ]);
    }
}
