<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  //protected $table = 'cities';
 //   use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    //protected $table = 'table_name';
    public function rooms() {
      return $this->hasManyThrough('App\Room', 'App\TouristObject','city_id','object_id');
  }

}
