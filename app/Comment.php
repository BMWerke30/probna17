<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  use Rezervado\Presenters\CommentPresenter;
  public $timestamps = false;

  public function commentable()
  {
      return $this->morphTo();
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function photos()
  {
      return $this->morphMany('App\Photo','photoable');
  }

}
