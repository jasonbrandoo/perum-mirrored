<?php

namespace App\Helpers;

class Comma 
{
  public static function removeComma($number)
  {
    return intval(preg_replace('/[^\d.]/', '', $number));
  }
}
