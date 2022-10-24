<?php

namespace App\Rezervado\Interfaces;

// interfejs to zbior metod ktory musi posiadac klasa, ktora implementuje wybrany interfejs

interface FrontendRepositoryInterface {

  public function getObjectsForMainPage();
  public function getObject($id);



}
