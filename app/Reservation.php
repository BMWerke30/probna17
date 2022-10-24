<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public $timestamps = false;
    protected $fillable = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function room()
    {
        return $this->belongsTo('App\Room');
    }


}
