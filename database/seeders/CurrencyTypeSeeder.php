<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currency_types')->insert([
            [
                'currency_id' => 1,
                'name' => 'Pesos argentinos',
                'alpha3' => 'ARS',
            ],
            [
                'currency_id' => 2,
                'name' => 'Dólares',
                'alpha3' => 'USD',
            ],
            [
                'currency_id' => 3,
                'name' => 'Euros',
                'alpha3' => 'EUR',
            ],
        ]);
    }
}
