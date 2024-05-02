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
        'date_arrivee',
        'employe_id',
        'prix_base',
        'taux_augmenter',
        'prix_paye',
        'pays_id',
        'commande_id'
    ];
    // public function marque() {
    //     return $this->belongsTo(Ville::class);
    // }

    public function photos() {
        return $this->hasMany(Photo::class, 'photo_voiture_id'); 
    }
    public function carrosserie(){
        return $this->belongsTo(carrosserie::class);
    }
    public function pays(){
        return $this->belongsTo(Pays::class);
    }
    public function modele(){
        return $this->belongsTo(Modele::class);
    }
    public function user_reserve(){
        return $this->hasOne(user_reserve::class, 'ur_voiture_id');
    }
}
