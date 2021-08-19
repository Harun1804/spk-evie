<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Normalisasi extends Model
{
    protected $table = 'normalisasi';

    public $fillable = ['kriteria_id','alternatif_id','jenis','nilai'];

    public function alternatif(){
      return $this->belongsTo('App\Alternatif');
    }

    public function kriteria(){
      return $this->belongsTo('App\Kriteria');
    }

    public function scopeKondisiJenis($query,$jenis){
      $query->where('jenis',$jenis);
    }

    public function scopeBerdasarkanAlternatif($query){
      $query->orderBy('alternatif_id')->groupBy('alternatif_id');
    }

    public function scopeALternatifKriteria($query,$id){
      $query->where('alternatif_id',$id)
            ->orderBy('kriteria_id');
    }

}
