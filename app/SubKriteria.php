<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    protected $table = "sub_kriteria";
    protected $guarded = [];

    public function kriteria(){
      return $this->belongsTo('App\Kriteria');
    }
    public function scopeBerdasarkan($query){
        $query->orderBy('id','asc');
    }
}
