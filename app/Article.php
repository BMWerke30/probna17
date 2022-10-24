<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{

    use Rezervado\Presenters\ArticlePresenter;

    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function users()
    {
        return $this->morphToMany('App\User','likeable');
    }

    public function comments()
    {
        return $this->morphToMany('App\Comment','commentable');
    }

    public function object()
    {
        return $this->belongsTo('App\TouristObject','object_id');
    }
    public function isLiked()
    {
        return $this->users()->where('user_id',Auth::user()->id)->exists();
    }

}