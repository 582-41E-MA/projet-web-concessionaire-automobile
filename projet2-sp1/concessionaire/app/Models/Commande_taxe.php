<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande_taxe extends Model
{
    use HasFactory;
    protected $fillable = [
        'commande_id',
        'taxe_id'
      
    ];
}
