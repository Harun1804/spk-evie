<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasil';

    public $fillable = ['kriteria_id','alternatif_id','nilai'];

    public function alternatif(){
      return $this->belongsTo('App\Alternatif');
    }

    public function kriteria(){
      return $this->belongsTo('App\Kriteria');
    }

    public function scopeBerdasarkanKriteria($query){
      $query->orderBy('kriteria_id')->groupBy('kriteria_id');
    }

    public function scopeBerdasarkanAlternatif($query){
      $query->orderBy('alternatif_id')->groupBy('alternatif_id');
    }

    public function scopeKriteriaAlternatif($query,$kode){
      $query->where('kriteria_id',$kode)
            ->join('kriteria','hasil.kriteria_id','=','kriteria.id')
            ->join('alternatif','hasil.alternatif_id','=','alternatif.id');
    }

    public function scopeKondisiAlternatif($query,$id){
      $query->where('alternatif_id',$id)
            ->orderBy('kriteria_id');
    }

    public function scopeKondisiKriteria($query,$kriteria_id,$alternatif_id,$keyword){
      $query->where('kriteria_id',$kriteria_id)
            ->where('alternatif_id',$alternatif_id);
    }
}
