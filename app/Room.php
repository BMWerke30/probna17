<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'room_number',
        'room_size',
        'price',
        'description',
        'object_id',
    ];

    public $timestamps = false;

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function object(): BelongsTo
    {
        return $this->belongsTo(TouristObject::class, 'object_id');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

}
