<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal_connexion extends Model
{
    use HasFactory;
    protected $fillable = [
        'jc_date',
        'jc_adresse_ip',
        'jc_user_id'
      
    ];
}
