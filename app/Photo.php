<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  public $timestamps = false;
  //protected $table = 'photos';

  public function photoable()
  {
      return $this->morphTo();
  } // dotad dzialaja obrazki

  public function getPathAttribute($value)
  {
      return asset("storage/{$value}");
  }


  public function getStoragepathAttribute()
  {
      return $this->original['path'];
  }


  public static function imageRules($request,$type)
  {
      for ( $i = 0; $i <= count($request->file($type))-1 ; $i++ )
      {
        $rules["$type.$i"] = 'image|max:4000';
      }

      return $rules;
  }

}
