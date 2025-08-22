<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.     *
     * @var array<int, string>
     */
    protected $fillable = [
        'phone_number',
        'email',
        'address',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'home_cover_photo_path',
    ];


    protected $guarded = [];
}
