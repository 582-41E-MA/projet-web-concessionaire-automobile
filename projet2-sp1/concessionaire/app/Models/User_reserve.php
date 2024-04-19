<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_reserve extends Model
{
    use HasFactory;
    protected $fillable = [
        'ur_user-id',
        'ur_voiture_id',
        'date_reserver'
    ];
}
