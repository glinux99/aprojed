<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'categorie',
        'unite',
        'qte_min',
        'remboursable',
        'prix',
        'remise',
        'qte',
        'description',
        'stocks_visible',
        'alert',
        'expedition',
        'est_livraison'
    ];
}
