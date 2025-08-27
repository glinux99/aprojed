<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Article extends Model
{
    use HasFactory, Sluggable;
    //
    protected $fillable = [
        'id',
        'title',
        'slug',
        'content',
        'cover_photo_path',
        'source',
        'category_id',
        'user_id',
        'content_fb',
        'publicate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'title', 'id'
            ]
            ];
    }
}
