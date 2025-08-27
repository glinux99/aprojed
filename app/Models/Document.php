<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'original_name',
        'description',
        'documentable_id',
        'documentable_type',

    ];

    public function documentable()
    {
        return $this->morphTo();
    }

    public function article(): BelongsTo // This relationship is likely redundant if using morphTo
    {
        return $this->belongsTo(Article::class);
    }
}
