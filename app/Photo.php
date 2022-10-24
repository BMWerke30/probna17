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









}
