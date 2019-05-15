<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Keputusan extends Model
{
  //
  protected $guarded = [];

  public function realisasi()
  {
    return $this->belongsTo('App\Model\RealisasiWawancara', 'result_realization_id');
  }
}
