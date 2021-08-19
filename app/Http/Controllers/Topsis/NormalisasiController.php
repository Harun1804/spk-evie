<?php

namespace App\Http\Controllers\Topsis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kriteria;
use App\Normalisasi;
use App\Supports\Logika;

class NormalisasiController extends Controller
{
    public function __construct(Logika $logika){
      $this->logika = $logika;
    }

    public function index(){
      $kriteria     = Kriteria::berdasarkan()->get();
      $normalisasi  = Normalisasi::berdasarkanAlternatif()->get();
      $nilai        = $this->logika->normalisasi('topsis');

      return view('normalisasi.index',compact(
        'kriteria','normalisasi','nilai'
      ));
    }
}
