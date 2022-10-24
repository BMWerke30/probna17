<?php
namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{

    protected $quarded = [];
public $timestamps = false;
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
