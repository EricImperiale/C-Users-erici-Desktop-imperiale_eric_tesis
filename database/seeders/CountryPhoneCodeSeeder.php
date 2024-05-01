<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryPhoneCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('country_phone_codes')->insert([
            [
                'country_phone_code_id' => 1,
                'country_phone_code' => '(+54)',
                'name' => 'Argentina',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_phone_code_id' => 2,
                'country_phone_code' => '(+56)',
                'name' => 'Chile',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_phone_code_id' => 3,
                'country_phone_code' => '(+598)',
                'name' => 'Uruguay',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_phone_code_id' => 4,
                'country_phone_code' => '(+595)',
                'name' => 'Paraguay',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_phone_code_id' => 5,
                'country_phone_code' => '(+55)',
                'name' => 'Brazil',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_phone_code_id' => 6,
                'country_phone_code' => '(+51)',
                'name' => 'Peru',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_phone_code_id' => 7,
                'country_phone_code' => '(+58)',
                'name' => 'Venezuela',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_phone_code_id' => 8,
                'country_phone_code' => '(+57)',
                'name' => 'Colombia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_phone_code_id' => 9,
                'country_phone_code' => '(+52)',
                'name' => 'Mexico',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_phone_code_id' => 10,
                'country_phone_code' => '(+1)',
                'name' => 'Estados Unidos',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_phone_code_id' => 11,
                'country_phone_code' => '(+1)',
                'name' => 'Canada',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_phone_code_id' => 12,
                'country_phone_code' => '(+500)',
                'name' => 'Islas Malvinas',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
