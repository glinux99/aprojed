<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSite extends Model
{
    use HasFactory;
    protected $fillable = [
        'presentation',
        'culture',
        'adresse',
        'facebook',
        'instagrame',
        'twitter',
        'whatsapp',
        'rccm',
        'bp',
        'linkdin',
        'youtube',
        'publicite_txt',
        'email',
        'numeropv',
        'telegram',
    ];
}
