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
            'nazev' => $this->faker->sentence(),
            'popis' => $this->faker->paragraph(),
            'datum_zahajeni' => $this->faker->date(),
            'datum_ukonceni' => $this->faker->optional()->date(),
            'Mnozstvi_casu' => $this->faker->numberBetween(10, 500),
            'planovane_naklady' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
