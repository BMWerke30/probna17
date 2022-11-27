<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public const STATUS_NOT_CONFIRMED = 0;

    public const STATUS_CONFIRMED = 1;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'day_in',
        'day_out',
        'status',
        'room_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }


}
