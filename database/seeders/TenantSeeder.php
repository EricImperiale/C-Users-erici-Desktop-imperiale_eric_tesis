<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tenants')->insert([
            [
                'name' => 'Luis',
                'surname' => 'Martínez',
                'id' => '29584712',
                'tin' => '21295847123',
                'email' => 'luis@example.com',
                'address' => 'Calle Principal 789',
                'province' => 'Mendoza',
                'city' => 'Mendoza',
                'country' => 'Argentina',
                'zip_code' => 5500,
                'area_code' => 261,
                'mobile_phone' => '28745123',
                'date_of_birth' => '1980-02-18',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ana',
                'surname' => 'Rodríguez',
                'id' => '37549823',
                'tin' => '21375498231',
                'email' => 'ana@example.com',
                'address' => 'Avenida Central 456',
                'province' => 'Córdoba',
                'city' => 'Córdoba',
                'country' => 'Argentina',
                'zip_code' => 5000,
                'area_code' => 351,
                'mobile_phone' => '28598231',
                'date_of_birth' => '1975-06-25',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            /*
            [
                'name' => 'Diego',
                'surname' => 'García',
                'id' => '41569784',
                'tin' => '21415697841',
                'email' => 'diego@example.com',
                'address' => 'Avenida Principal 123',
                'province' => 'Buenos Aires',
                'city' => 'La Plata',
                'country' => 'Argentina',
                'zip_code' => 1900,
                'area_code' => 11,
                'mobile_phone' => '29798456',
                'date_of_birth' => '1992-10-07',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sofía',
                'surname' => 'López',
                'id' => '28541739',
                'tin' => '21285417391',
                'email' => 'sofia@example.com',
                'address' => 'Calle Central 789',
                'province' => 'Buenos Aires',
                'city' => 'Buenos Aires',
                'country' => 'Argentina',
                'zip_code' => 1000,
                'area_code' => 11,
                'mobile_phone' => '28517391',
                'date_of_birth' => '1988-09-12',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lucas',
                'surname' => 'Fernández',
                'id' => '30589214',
                'tin' => '21305892147',
                'email' => 'lucas@example.com',
                'address' => 'Avenida Norte 456',
                'province' => 'Salta',
                'city' => 'Salta',
                'country' => 'Argentina',
                'zip_code' => 4400,
                'area_code' => 387,
                'mobile_phone' => '31589214',
                'date_of_birth' => '1983-04-30',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carolina',
                'surname' => 'Díaz',
                'id' => '32569874',
                'tin' => '21325698743',
                'email' => 'carolina@example.com',
                'address' => 'Calle Sur 789',
                'province' => 'Tucumán',
                'city' => 'San Miguel de Tucumán',
                'country' => 'Argentina',
                'zip_code' => 4000,
                'area_code' => 381,
                'mobile_phone' => '32598743',
                'date_of_birth' => '1995-12-15',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Martín',
                'surname' => 'López',
                'id' => '30584763',
                'tin' => '21305847631',
                'email' => 'martin@example.com',
                'address' => 'Calle Este 789',
                'province' => 'Mendoza',
                'city' => 'Mendoza',
                'country' => 'Argentina',
                'zip_code' => 5500,
                'area_code' => 261,
                'mobile_phone' => '30584763',
                'date_of_birth' => '1976-07-28',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ana',
                'surname' => 'Martínez',
                'id' => '39584728',
                'tin' => '21395847283',
                'email' => 'ana.m@example.com',
                'address' => 'Avenida Oeste 456',
                'province' => 'Córdoba',
                'city' => 'Córdoba',
                'country' => 'Argentina',
                'zip_code' => 5000,
                'area_code' => 351,
                'mobile_phone' => '39584728',
                'date_of_birth' => '1987-11-05',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Diego',
                'surname' => 'Martínez',
                'id' => '33584791',
                'tin' => '21335847912',
                'email' => 'diego.m@example.com',
                'address' => 'Calle Este 789',
                'province' => 'Mendoza',
                'city' => 'Mendoza',
                'country' => 'Argentina',
                'zip_code' => 5500,
                'area_code' => 261,
                'mobile_phone' => '33584791',
                'date_of_birth' => '1991-02-14',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lucía',
                'surname' => 'García',
                'id' => '41598273',
                'tin' => '21415982731',
                'email' => 'lucia@example.com',
                'address' => 'Avenida Principal 123',
                'province' => 'Buenos Aires',
                'city' => 'La Plata',
                'country' => 'Argentina',
                'zip_code' => 1900,
                'area_code' => 11,
                'mobile_phone' => '41598273',
                'date_of_birth' => '1982-09-18',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Julia',
                'surname' => 'López',
                'id' => '28598274',
                'tin' => '21285982743',
                'email' => 'julia@example.com',
                'address' => 'Calle Norte 789',
                'province' => 'Buenos Aires',
                'city' => 'Buenos Aires',
                'country' => 'Argentina',
                'zip_code' => 1000,
                'area_code' => 11,
                'mobile_phone' => '28598274',
                'date_of_birth' => '1984-05-22',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gabriel',
                'surname' => 'Sánchez',
                'id' => '30584792',
                'tin' => '21305847923',
                'email' => 'gabriel@example.com',
                'address' => 'Calle Oeste 456',
                'province' => 'Buenos Aires',
                'city' => 'La Plata',
                'country' => 'Argentina',
                'zip_code' => 1900,
                'area_code' => 11,
                'mobile_phone' => '30584792',
                'date_of_birth' => '1979-08-17',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'María',
                'surname' => 'Hernández',
                'id' => '32598714',
                'tin' => '21325987147',
                'email' => 'maria.h@example.com',
                'address' => 'Avenida Sur 789',
                'province' => 'Córdoba',
                'city' => 'Córdoba',
                'country' => 'Argentina',
                'zip_code' => 5000,
                'area_code' => 351,
                'mobile_phone' => '32598714',
                'date_of_birth' => '1987-12-29',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Juan',
                'surname' => 'Hernández',
                'id' => '41582736',
                'tin' => '21415827361',
                'email' => 'juan.h@example.com',
                'address' => 'Avenida Norte 456',
                'province' => 'Salta',
                'city' => 'Salta',
                'country' => 'Argentina',
                'zip_code' => 4400,
                'area_code' => 387,
                'mobile_phone' => '41582736',
                'date_of_birth' => '1986-04-03',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laura',
                'surname' => 'Gómez',
                'id' => '38597421',
                'tin' => '21385974213',
                'email' => 'laura@example.com',
                'address' => 'Calle Principal 789',
                'province' => 'Mendoza',
                'city' => 'Mendoza',
                'country' => 'Argentina',
                'zip_code' => 5500,
                'area_code' => 261,
                'mobile_phone' => '38597421',
                'date_of_birth' => '1974-11-11',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pablo',
                'surname' => 'Fernández',
                'id' => '31584792',
                'tin' => '21315847923',
                'email' => 'pablo@example.com',
                'address' => 'Calle Este 789',
                'province' => 'Mendoza',
                'city' => 'Mendoza',
                'country' => 'Argentina',
                'zip_code' => 5500,
                'area_code' => 261,
                'mobile_phone' => '31584792',
                'date_of_birth' => '1992-07-08',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carla',
                'surname' => 'Gutiérrez',
                'id' => '30584712',
                'tin' => '21305847123',
                'email' => 'carla@example.com',
                'address' => 'Calle Oeste 456',
                'province' => 'Buenos Aires',
                'city' => 'La Plata',
                'country' => 'Argentina',
                'zip_code' => 1900,
                'area_code' => 11,
                'mobile_phone' => '30584712',
                'date_of_birth' => '1981-09-24',
                'country_phone_code_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],*/
        ]);
    }
}