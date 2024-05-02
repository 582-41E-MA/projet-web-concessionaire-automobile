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
        'statut_id'
    ];
}
