<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projekty extends Model
{
    use HasFactory;

    // Pokud se název tabulky liší od názvu modelu v množném čísle, můžeš to specifikovat
    protected $table = 'projekty';

    // Definuj, které sloupce mohou být hromadně přiřazovány
    protected $fillable = [
        'nazev',
        'popis',
        'datum_zahajeni',
        'datum_ukonceni',
        'Mnozstvi_casu',
        'planovane_naklady',
        'uzivatel_id',
        'rozpocet',
    ];

    // Definování vztahu, že projekt může mít více úkolů
    public function ukoly()
    {
        return $this->hasMany(Ukoly::class, 'id_projektu');
    }
}
