<?php

namespace App\Rezervado\Presenters;


trait UserPresenter {

      public function getFullNameAttribute()
      {

          return $this->name.' '.$this->surname;

      }

}
