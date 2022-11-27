<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Photo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'photoable_id',
        'photoable_type',
        'path',
    ];

    public function photoable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getStoragePathAttribute(): ?string
    {
        if(str_starts_with($this->path, 'http')){
            return $this->path;
        }

        return '/storage/' . $this->path;
    }
}
