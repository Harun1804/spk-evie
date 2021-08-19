<?php

namespace App\Supports;

use App\Hasil;
use App\Kinerja;
use App\Pembantu;
use App\Kriteria;
use App\Alternatif;

class Topsis {
  public function __construct(){
    $this->kriteria     = Kriteria::orderBy('kode')->get();
    $this->alternatif   = Alternatif::all();
  }

  public function peringkatProses(){
    $x      = [];

    foreach ($this->alternatif as $index => $item) {
      $delta  = Pembantu::formatJenis('delta')
                        ->where('alternatif_id',$item->id)
                        ->pluck('nilai');

      // peringkat = menjumlahkan delta plus dan delta min pada topsis
      $peringkat = proses_peringkat_topsis($delta);

      $x[]   = [
        'nilai' => $peringkat,
        'alternatif' => $item->id
      ];
    }

    $hasil = proses_pengurutan($x);

    return $hasil ;
  }

  public function alphaProses($maksmin){
    $hasil = [];

    foreach ($this->kriteria as $index => $item) {
      $kinerja = Kinerja::where('kriteria_id',$item->id)->where('jenis','terbobot')->get();
      $hasil[$item->id] = nilai_maksmin($kinerja,$maksmin);
    }

    return $hasil;
  }

  public function deltaProses($jenis){
    $alphaPositif = Pembantu::formatJenis('alpha',$jenis)->pluck('nilai');

    foreach ($this->alternatif as $index => $item) {
      $terbobot         = Kinerja::where('alternatif_id',$item->id)->where('jenis','terbobot')->pluck('nilai');
      $hasil[$item->id] = proses_delta($terbobot,$alphaPositif);
    }

    return $hasil;
  }

  public function Kinerja($jenis){
    $alternatif = Alternatif::all();
    $hasil      = [];

    foreach ($alternatif as $index => $item) {
      $hasil[$item->id] = Kinerja::alternatifkriteria($item->id)
                                 ->where('jenis',$jenis)
                                 ->pluck('nilai','kriteria_id');
    }

    return $hasil ;
  }

  public function normalisasiProses(){
    $pembagi      = $this->pembagiProses();
    $normalisasi  = [];

    foreach ($pembagi as $index => $item) {
      $hasil = Hasil::where('kriteria_id',$index)->get();
      $normalisasi[] = proses_normalisasi_topsis($pembagi,$hasil);
    }

    return $normalisasi;
  }

  public function pembagiProses(){
    $pembagi = [];

    foreach ($this->kriteria as $index => $item) {
      $hasil = Hasil::where('kriteria_id',$item->id)->get() ;
      $pembagi[$item->id] = number_format(sqrt(array_sum(proses_pangkat($hasil))),5);
    }

    return $pembagi ;
  }
}
