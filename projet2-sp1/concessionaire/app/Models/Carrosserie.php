<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrosserie extends Model
{
    use HasFactory;
    protected $fillable = [
        'carrosserie_en',
        'carrosserie_fr'
      
    ];
}
