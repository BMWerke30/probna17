<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Rezervado\Presenters\UserPresenter;

      public static $roles = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [    //zabezpieczenie przed mass asign asections
        'name',
        'surname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function objects()
    {
        return $this->morphedByMany('App\TouristObject','likeable');

    }

    public function photos()
    {
        return $this->morphMany('App\Photo','photoable');
    }

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }

    public function larticles()
        {
            return $this->morphedByMany('App\Article', 'likeable');
        }

        public function unotifications()
  {
      return $this->hasMany('App\Notification');
  }


  public function roles()
  {
      return $this->belongsToMany('App\Role');
  }


  
  public function hasRole(array $roles)
  {

      foreach($roles as $role)
      {

          if(isset(self::$roles[$role]))
          {
              if(self::$roles[$role])  return true;

          }
          else
          {
              self::$roles[$role] = $this->roles()->where('name', $role)->exists();
              if(self::$roles[$role]) return true;
          }

      }


      return false;

  }

}
