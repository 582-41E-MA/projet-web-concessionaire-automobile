<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxe extends Model
{
    use HasFactory;
    protected $fillable = [
        'taxe_province_id',
        'taxe_nom',
        'taxe_rate'   
    ];
}
