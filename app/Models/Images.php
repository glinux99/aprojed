<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable=[
            'config_site_id' ,
            'images',
            'documents',
            'lien',
            'video',
            'pub_images',
            'user_id',
            'center_images',
            'produit_id',
            'categorie_id',
            'actualite_id'

    ];
}
