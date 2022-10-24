<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TouristObject extends Model
{

  protected $table = 'objects';
  public $timestamps = false;

  use Rezervado\Presenters\ObjectPresenter;


    public function scopeOrdered($query)
    {
        return $query->orderBy('name','asc');    // ukladanie ich alfabetycznie
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo','photoable');
    }

    public function users()
    {
        return $this->morphToMany('App\User','likeable');
    }

    public function address()
      {
          return $this->hasOne('App\Address','object_id');
      }

      public function rooms()
        {
            return $this->hasMany('App\Room','object_id');
        }

        public function comments()
          {
              return $this->morphMany('App\Comment','commentable');
          }
        public function larticles()
        {
            return $this->hasMany('App\Article','object_id');
        }

        public function isLiked()
        {
            return $this->users()->where('user_id',Auth::user()->id)->exists();
        }

}
