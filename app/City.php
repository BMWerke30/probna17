<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function rooms(): HasManyThrough
    {
        return $this->hasManyThrough('App\Room', 'App\TouristObject', 'city_id', 'object_id');
    }

}
