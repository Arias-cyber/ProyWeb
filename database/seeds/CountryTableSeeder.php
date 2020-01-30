<?php

use Illuminate\Database\Seeder;
use App\Country;
class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create(); //creamos una instancia de faker para obtener el generador de datos de prueba
        for ($i=0; $i < 10; $i++) {  // generar 50 artículos
            Country::create([
                'name' => $faker->sentence, // un título de prueba
            ]);
        }
    }
}
