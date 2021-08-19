<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = "kriteria";
    protected $guarded = [];

    public function hasil(){
        return $this->hasMany('App\Hasil');
      }

      public function sub_kriteria(){
          return $this->hasMany('App\SubKriteria');
        }

    public function scopeBerdasarkan($query){
        $query->orderBy('id','asc');
    }
}
