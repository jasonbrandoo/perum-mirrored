<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cicilan extends Model
{
  //
  use SoftDeletes;

  protected $guarded = [];

  protected $table = 'cicilan';

  protected $dates = ['deleted_at'];

  public function surat()
  {
    return $this->hasMany('App\Model\SuratPesanan', 'id');
  }
}
