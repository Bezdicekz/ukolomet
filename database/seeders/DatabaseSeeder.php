<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Projekty;
use App\Models\Ukoly;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{

    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('cs_CZ');
        // Vytvoříme 5 uživatelů
        User::factory(5)->create()->each(function ($user) {
            // Každému uživateli vytvoříme 5 projektů
            Projekty::factory(5)->create([
                'uzivatel_id' => $user->id,
            ])->each(function ($projekt) {
                // Každému projektu vytvoříme 10 úkolů
                Ukoly::factory(10)->create([
                    'id_projektu' => $projekt->id,
                    'id_uzivatele' => $projekt->uzivatel_id,
                ]);
            });
        });
    }
}
