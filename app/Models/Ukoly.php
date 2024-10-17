<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukoly extends Model
{
    use HasFactory;

    protected $table = 'ukoly'; // Explicitní definice tabulky

    // sloupce otevřená pro zápis
    protected $fillable = [
        'nazev',
        'popis',
        'id_uzivatele',
        'id_projektu',
        'id_nadrazeneho_ukolu',
        'celkovy_cas_ukolu',
        'datum_zahajeni',
        'planovany_datum_ukonceni',
        'datum_ukonceni',
        'stav',
        'rozpocet',
    ];

    // Výpočet celkového času úkolů v projektu
    public static function celkovyCasUkoluProProjekt($projektId)
    {
        return self::where('id_projektu', $projektId)->sum('celkovy_cas_ukolu');
    }

    // Výpočet celkové ceny úkolů v projektu
    public static function celkovaCenaProjektu($projektId)
    {
        return self::where('id_projektu', $projektId)->sum('rozpocet');
    }

    // Definování vztahu, že více úkolů má stejný projekt
    public function projekt()
    {
        return $this->belongsTo(Projekty::class, 'id_projektu');
    }
}
