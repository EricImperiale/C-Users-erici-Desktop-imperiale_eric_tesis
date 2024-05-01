<?php

namespace Database\Seeders;

use App\Models\PropertyType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);
        $this->call(CountryPhoneCodeSeeder::class);
        $this->call(OwnerSeeder::class);
        $this->call(TenantSeeder::class);
        $this->call(GuarantorSeeder::class);

        $this->call(CurrencyTypeSeeder::class);
        $this->call(PropertyStatusSeeder::class);
        $this->call(PropertyTypeSeeder::class);
        $this->call(UtilitySeeder::class);
        $this->call(RoomSeeder::class);

        $this->call(PropertySeeder::class);
    }
}
