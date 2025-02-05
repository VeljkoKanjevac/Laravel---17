<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\WeatherModel;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = CitiesModel::all();

        foreach ($cities as $city) {

            $userWeather = WeatherModel::where(['city_id' => $city->id])->first();

            if ($userWeather !== null)
            {
                $this->command->getOutput()->info("Grad sa ovim imenom vec postoji");
                continue;
            }
            WeatherModel::create([
                'city_id' => $city->id,
                'temperature' => rand(15,30),
            ]);
        }
    }
}
