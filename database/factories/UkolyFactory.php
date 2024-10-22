<?php

namespace Database\Factories;

use App\Models\Ukoly;
use Illuminate\Database\Eloquent\Factories\Factory;

class UkolyFactory extends Factory
{
    protected $model = Ukoly::class;

    public function definition()
    {
        return [
            'nazev' => $this->faker->sentence(2),
            'popis' => $this->faker->paragraph,
            'id_uzivatele' => null, // Toto se nastaví v seederu
            'id_projektu' => null, // Toto se nastaví v seederu
            'id_nadrazeneho_ukolu' => null,
            'celkovy_cas_ukolu' => $this->faker->randomFloat(2, 1, 10), // např. 1 až 10
            'datum_zahajeni' => $this->faker->date(),
            'planovany_datum_ukonceni' => $this->faker->date(),
            'datum_ukonceni' => null,
            'stav' => $this->faker->randomElement(['plánováno', 'probíhá', 'dokončeno']),
            'rozpocet' => $this->faker->randomFloat(2, 100, 1000), // např. 100 až 1000
        ];
    }
}
