<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    protected $fillable = [
        'annee',
        'description_en',
        'description_fr',
        'modele_id',
        'carrosserie_id',
        'date-arrivee',
        'employe_id',
        'prix_base',
        'taux_augmenter',
        'prix_paye',
        'pays_id',
        'commande_id'
    ];
}
