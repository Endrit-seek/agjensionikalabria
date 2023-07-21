<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Street;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    protected $cities = [
        "Prishtina",
        "Prizren",
        "Ferizaj",
        "Pejë",
        "Gjakovë",
        "Gjilan",
        "Mitrovicë",
        "Podujeva",
        "Vushtrri",
        "Suharekë",
        "Rahovec",
        "Drenas",
        "Lipjan",
        "Malishevë",
        "Kamenicë",
        "Viti",
        "Deçan",
        "Istog",
        "Klinë",
        "Skenderaj",
        "Dragash",
        "Fushë Kosovë",
        "Kaçanik",
        "Mitrovica Veriore",
        "Shtime",
        "Obiliq",
        "Leposaviq",
        "Graçanicë",
        "Han i Elezit",
        "Zveçan",
        "Shtërpcë",
        "Novobërdë",
        "Zubin Potok",
        "Junik",
        "Mamusha",
        "Ranillug",
        "Kllokoti",
        "Parteshi",
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach($this->cities as $city) {
            City::create(['name' => $city]);
        }
    }
}
