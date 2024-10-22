<?php

namespace Database\Factories;

use App\Models\Ukoly;
use Illuminate\Database\Eloquent\Factories\Factory;

class UkolyFactory extends Factory
{
    protected $model = Ukoly::class;

    public function definition()
    {
        // Možnosti pro stav úkolu
        $statuses = ['novy', 'v_procesu', 'dokonceny'];

        return [
            'nazev' => $this->faker->sentence(),
            'popis' => $this->faker->paragraph(),
            'id_uzivatele' => \App\Models\User::factory(),
            'id_projektu' => \App\Models\Projekty::factory(),
            'celkovy_cas_ukolu' => $this->faker->numberBetween(1, 100),
            'datum_zahajeni' => $this->faker->date(),
            'planovany_datum_ukonceni' => $this->faker->date(),
            'datum_ukonceni' => $this->faker->optional()->date(),
            'stav' => $statuses[array_rand($statuses)],
            'rozpocet' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
