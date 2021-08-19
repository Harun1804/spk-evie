<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keputusan extends Model
{
    protected $table = 'keputusan';
    protected $guarded = [];

    public function sub_kriteria(){
      return $this->belongsTo('App\SubKriteria');
    }


}
