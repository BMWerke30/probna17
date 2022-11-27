<?php

namespace App;

use App\Rezervado\Presenters\ObjectPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class TouristObject extends Model
{
    use ObjectPresenter;
    use HasFactory;

    public $timestamps = false;
    protected $table = 'objects';

    public function scopeOrdered($query)
    {
        return $query->orderBy('name', 'asc');    // ukladanie ich alfabetycznie
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function address()
    {
        return $this->hasOne('App\Address', 'object_id');
    }

    public function rooms()
    {
        return $this->hasMany('App\Room', 'object_id');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function isLiked()
    {
        return $this->users()->where('user_id', Auth::user()->id)->exists();
    }

    public function users()
    {
        return $this->morphToMany('App\User', 'likeable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
