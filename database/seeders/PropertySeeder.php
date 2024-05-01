<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->insert([
            [

                'full_address' => 'Calle Principal 567',
                'neighborhood' => 'Barrio Residencial',
                'address' => 'Calle Principal 567',
                'province' => 'Buenos Aires',
                'city' => 'La Plata',
                'zip_code' => 1900,
                'rooms' => 4,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'garages' => 2,
                'covered_area' => 200,
                'total_area' => 300,
                'age' => 10,
                'rent_price' => '25000',
                'expenses' => '3000',
                'description' => 'Amplia casa en un barrio residencial tranquilo',
                'floor' => null,
                'department' => null,
                'is_professional_use' => false,
                'is_brand_new' => false,
                'latitude' => -34.9205,
                'longitude' => -57.9536,
                'owner_id' => 1,
                'type_id' => 1,
                'currency_id' => 1,
                'status_id' => 2,
            ],
            [

                'full_address' => 'Calle Belgrano 345',
                'neighborhood' => 'Palermo',
                'address' => 'Calle Belgrano 345',
                'province' => 'Ciudad Autónoma de Buenos Aires',
                'city' => 'Ciudad Autónoma de Buenos Aires',
                'zip_code' => 7600,
                'rooms' => 2,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'garages' => 1,
                'covered_area' => 80,
                'total_area' => 90,
                'age' => 5,
                'rent_price' => '18000',
                'expenses' => '2500',
                'description' => 'Departamento moderno en el corazón de la ciudad',
                'floor' => 7,
                'department' => 'C',
                'is_professional_use' => false,
                'is_brand_new' => false,
                'latitude' => -38.0055,
                'longitude' => -57.5426,
                'owner_id' => 1,
                'type_id' => 2,
                'currency_id' => 1,
                'status_id' => 2,
            ],
            [

                'full_address' => 'Calle Belgrano 345',
                'neighborhood' => 'Palermo',
                'address' => 'Calle Belgrano 345',
                'province' => 'Ciudad Autónoma de Buenos Aires',
                'city' => 'Ciudad Autónoma de Buenos Aires',
                'zip_code' => 1425,
                'rooms' => 3,
                'bedrooms' => 2,
                'bathrooms' => 1,
                'garages' => 0,
                'covered_area' => 100,
                'total_area' => 120,
                'age' => 8,
                'rent_price' => '20000',
                'expenses' => '1800',
                'description' => 'PH acogedor en una de las zonas más buscadas de la ciudad',
                'floor' => null,
                'department' => null,
                'is_professional_use' => false,
                'is_brand_new' => false,
                'latitude' => -34.5895,
                'longitude' => -58.4168,
                'owner_id' => 1,
                'type_id' => 3,
                'currency_id' => 1,
                'status_id' => 2,
            ],
        ]);
    }
}
