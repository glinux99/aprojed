<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $fillable = [
        'adresse',
        'pays',
        'ville',
        'code_postal',
        'numero',
        'email',
        'users_id'
    ];
}
