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

    
}
