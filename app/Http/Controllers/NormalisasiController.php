<?php

namespace App\Http\Controllers;

use App\Kriteria;
use App\Normalisasi;
use App\Alternatif;
use App\Supports\Logika;
use Illuminate\Http\Request;

class NormalisasiController extends Controller
{
    public function __construct(Logika $logika){
        $this->logika = $logika ;
      }

      public function index(){
        $alternatifs = Alternatif::orderBy('id','asc')->get();
        $this->logika->normalisasi();
        $kriteria   = Kriteria::berdasarkan()->get();
        $matriks = Alternatif::with(['keputusan' => function ($query) {
            $query->orderBy('kriteria_id','asc');
            $query->with('sub_kriteria.kriteria');
        }])->get();
        // $matriks    = Hasil::berdasarkanAlternatif()->get();
        $nilai      = '' ;

        return view('normalisasi.index',compact(
          'kriteria','matriks','nilai','alternatifs'
        ));
      }
}
