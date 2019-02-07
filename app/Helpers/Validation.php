<?php

namespace App\Helpers;

class Validation 
{
  public static function cheker()
  {
    return 'regex:/^[0-9]{1,3}(,[0-9]{3})*\,[0-9]+$/';
  }
}
