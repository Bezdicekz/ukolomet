<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Projekty;
use App\Models\Ukoly;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vytvoření 5 uživatelů
        $users = User::factory(5)->create();

        foreach ($users as $user) {
            // Vytvoření 5 projektů pro každého uživatele
            $projekty = Projekty::factory(5)->create([
                'uzivatel_id' => $user->id,
            ]);

            foreach ($projekty as $projekt) {
                // Vytvoření 5 úkolů pro každý projekt
                Ukoly::factory(5)->create([
                    'id_projektu' => $projekt->id,
                    'id_uzivatele' => $user->id, // Pokud chcete mít přiřazení úkolů i k uživateli
                ]);
            }
        }
    }
}
