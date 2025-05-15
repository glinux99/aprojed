<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chariot extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'produit_id',
        'images',
        'qte'
    ];
}
