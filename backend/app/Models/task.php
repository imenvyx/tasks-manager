<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'is_done'];

    protected $casts = [
        'is_done' => 'boolean',
    ];

    public function keywords(): BelongsToMany
    {
        return $this->belongsToMany(Keyword::class, 'keyword_task')->withTimestamps();
    }
}
