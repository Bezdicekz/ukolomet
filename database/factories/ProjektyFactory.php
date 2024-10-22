<?php

namespace Database\Factories;

use App\Models\Projekty;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjektyFactory extends Factory
{
    protected $model = Projekty::class;

    public function definition()
    {
        return [
            'nazev' => $this->faker->sentence(3),
            'popis' => $this->faker->paragraph,
            'datum_zahajeni' => $this->faker->date(),
            'datum_ukonceni' => $this->faker->date(),
            'Mnozstvi_casu' => $this->faker->randomFloat(2, 1, 100), 
            'planovana_naklady' => $this->faker->randomFloat(2, 1000, 10000), 
            'uzivatel_id' => null, 
        ];
    }
}
