<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'session_id',
        'commande_user_id',
        'date_commande',
        'mode_paiement_id',
        'expedition_id',
        'statut_commande_id',
        'prix_totale'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function mode_paiement() {
        return $this->belongsTo(Mode_paiement::class);
    }

    public function expedition() {
        return $this->belongsTo(Expedition::class);
    }

    public function statut_commande() {
        return $this->belongsTo(Statut_commande::class);
    }

}
