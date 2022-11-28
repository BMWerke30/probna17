<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    public const ADMIN = 'admin';
    public const OWNER = 'owner';
    public const TOURIST = 'tourist';

    public $timestamps = false;
    protected $guarded = [];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany('App\User');
    }
}
