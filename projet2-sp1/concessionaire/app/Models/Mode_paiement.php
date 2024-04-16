<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mode_paiement extends Model
{
    use HasFactory;
    protected $fillable = [
        'mode_paiement_en',
        'mode_paiement_fr'
      
    ];
}
