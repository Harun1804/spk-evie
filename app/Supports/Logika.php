<?php

namespace App\Supports ;

use App\Hasil;
use App\Kinerja;
use App\Kriteria;
use App\Alternatif;
use App\Keputusan;
use App\Normalisasi;

use DB;
class Logika {

  public function __construct(Kriteria $kriteria,Alternatif $alternatif){
    $this->kriteria   = Kriteria::orderBy('kode')->get();
    $this->alternatif = Alternatif::all();
  }

  public function normalisasi()
  {
    $hasil_kriterias = DB::select("SELECT kriteria_id, SQRT(sum(bobot_sub_kriteria*bobot_sub_kriteria)) AS total FROM keputusan
GROUP BY kriteria_id");

    foreach ($hasil_kriterias as $hasil_kriteria) {
      Kriteria::whereId($hasil_kriteria->kriteria_id)->update([
        'bobot_normalisasi'=>$hasil_kriteria->total
      ]);
    }

    $hasil_normalisasis = DB::select("SELECT k.id ,k.kriteria_id
, (case when kr.attribute ='Cost' then ((SELECT min(bobot_sub_kriteria) FROM keputusan WHERE kriteria_id = kr.id)/ k.bobot_sub_kriteria) ELSE (k.bobot_sub_kriteria/(SELECT max(bobot_sub_kriteria) FROM keputusan WHERE kriteria_id = kr.id)) END) AS tmp_r
, ((case when kr.attribute ='Cost' then ((SELECT min(bobot_sub_kriteria) FROM keputusan WHERE kriteria_id = kr.id)/ k.bobot_sub_kriteria) ELSE (k.bobot_sub_kriteria/(SELECT max(bobot_sub_kriteria) FROM keputusan WHERE kriteria_id = kr.id)) END)* kr.bobot) AS tmp_normalisasi
FROM keputusan AS k, kriteria AS kr
WHERE k.kriteria_id=kr.id");

    foreach ($hasil_normalisasis as $hasil_normalisasi) {
      Keputusan::whereId($hasil_normalisasi->id)->update([
        'r_hasil'=>$hasil_normalisasi->tmp_r,
        'normalisasi_berbobot_hasil'=>$hasil_normalisasi->tmp_normalisasi
      ]);
    }

    //menentukan a+ dan a-
    $hasil_as = DB::select("SELECT kr.id , kr.attribute,MIN(k.normalisasi_berbobot_hasil) AS minimal ,MAX(k.normalisasi_berbobot_hasil) AS maksimal
FROM keputusan AS k, kriteria AS kr
WHERE k.kriteria_id=kr.id
GROUP BY k.kriteria_id");

    foreach ($hasil_as as  $hasil_a) {
      // Kriteria::whereId($hasil_a->id)->update()
      $a_plus = 0;
      $a_min = 0;

      //menentukan a+
      if ($hasil_a->attribute == 'Benefit') {
        $a_plus = $hasil_a->maksimal;
        $a_min = $hasil_a->minimal;
      }else{
        $a_plus = $hasil_a->minimal;
        $a_min = $hasil_a->maksimal;
      }



      Kriteria::whereId($hasil_a->id)->update([
        'a_min' =>$a_min,
        'a_plus' =>$a_plus,
      ]);
    }

    //menentukan d+ dan d-
    $hasil_ds = DB::select("SELECT kp.alternatif_id, kp.normalisasi_berbobot_hasil,kr.a_plus,kr.a_plus
        , SQRT(SUM(POWER((kp.normalisasi_berbobot_hasil- kr.a_plus),2))) AS d_plus
        , SQRT(SUM(POWER((kp.normalisasi_berbobot_hasil- kr.a_min),2))) AS d_min
        FROM keputusan AS kp, kriteria AS kr
        WHERE kp.kriteria_id=kr.id
        GROUP BY kp.alternatif_id");


    foreach ($hasil_ds as $hasil_d) {
      Alternatif::whereId($hasil_d->alternatif_id)->update([
        'd_min'=>$hasil_d->d_min,
        'd_plus'=>$hasil_d->d_plus,
        'v'=>($hasil_d->d_min/($hasil_d->d_min+$hasil_d->d_plus)),
      ]);
    }

    $alternatifs = Alternatif::orderBy('v','desc')->get();
    $rank=1;
    foreach ($alternatifs as $alternatif) {
      Alternatif::whereId($alternatif->id)->update([
        'rank'=>$rank
      ]);
      $rank++;
    }

      }
}
