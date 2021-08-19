<?php

namespace App\Http\Controllers;

use App\Kinerja;
use App\Normalisasi;
use App\Pembantu;
use App\Peringkat;
use App\Supports\Logika;
use App\Supports\Helpers;
use App\Supports\Topsis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function __construct(Logika $logika,Topsis $topsis){
        $this->logika = $logika;
        $this->topsis = $topsis;
      }

      public function index(){
        $this->inputNormalisasi();
       $this->inputKinerja();
   
       if($this->jenis('nama') == 'topsis') {
         $this->inputAlphaPositif();
         $this->inputAlphaNegatif();
         $this->inputDeltaPositif();
         $this->inputDeltaNegatif();
       }
   
       $this->inputPeringkat();
       return $this->jalur();
     }

     public function dataMatriks(){
        $id = request('alter');
        $nilai  = $this->logika->inputan($id,'ajax');
    
        return $nilai ;
      }

      public function jalur(){
        if (session()->get('controller') == 'matriks') {
          return redirect()->route('matriks.index');
        }
        else if (session()->get('controller') == 'kriteria') {
          return redirect()->route('kriteria.index');
        }
      }

      public function jenis($jenis){
        // nama metode yang di pakai
        $nama = Auth::user()->nama;
        if ($jenis == 'nama') {
          return $nama ;
        }elseif($jenis == 'status'){
          // function inutKinerja
          if ($nama == 'saw') {
            return 'kinerja';
          }else{
            return 'terbobot';
          }
        }
      }

      public function inputNormalisasi(){
        if ($this->jenis('nama') == 'topsis') {
          $normalisasiProses = $this->logika->normalisasiProses();
        }elseif($this->jenis('nama') == 'saw'){
          $normalisasiProses  = $this->topsis->normalisasiProses();
        }
        
        
        // return $normalisasiProses;
    
        foreach ($normalisasiProses as $index => $item) {
          foreach ($item as $key => $value) {
            $nilai      = $value['nilai'];
            $kriteria   = $value['kriteria'];
            $alternatif = $value['alternatif'];
    
            $normalisasi = Normalisasi::FirstOrCreate([
              'jenis'         => $this->jenis('nama'),
              'kriteria_id'   =>$kriteria,
              'alternatif_id' =>$alternatif
            ]);
            $normalisasi->nilai = $nilai;
            $normalisasi->save();
          }
        }
      }

      public function inputKinerja(){
        $kinerjaProses  = $this->logika->kinerjaProses($this->jenis('nama'));
        $kinerja        = [];
    
        foreach ($kinerjaProses as $key => $value) {
          foreach ($value as $index => $item) {
            $nilai          = $item['nilai'];
            $kriteria_id    = $item['kriteria'];
            $alternatif_id  = $item['alternatif'];
            $jenis          = $this->jenis('status');
    
            $kinerja        = Kinerja::firstOrCreate(compact('alternatif_id','kriteria_id','jenis'));
            $kinerja->nilai = $nilai;
            $kinerja->save();
          }
        }
      }

      public function inputPeringkat(){
        $jenis = $this->jenis('nama') ;
        if ($jenis == 'saw') {
          $peringkatProses = $this->logika->peringkatProses();
        }elseif($jenis == 'topsis'){
          $peringkatProses = $this->topsis->peringkatProses();
        }
    
        foreach ($peringkatProses as $key => $value) {
          $nilai      = $value['nilai'];
          $rengking   = $value['rengking'];
          $alternatif_id = $value['alternatif'];
    
          $peringkat = Peringkat::firstOrCreate([
            'jenis' => $jenis,
            'alternatif_id' => $alternatif_id
          ]);
          $peringkat->nilai = $nilai;
          $peringkat->peringkat = $rengking;
          $peringkat->save();
        }
      }
    
    // start SUPPORTS pembantu
      public function inputPembantu($data,$format,$jenis){
        // alpha = kreteria_id dan delta = alternatif_id
        if ($format == 'alpha') {
          $atribut = 'kriteria_id';
        }else{
          $atribut = 'alternatif_id';
        }
        foreach ($data as $index => $item) {
          $pembantu = Pembantu::firstOrCreate([
            $atribut      => $index,
            'jenis'       => $jenis,
            'format'      => $format
          ]);
          $pembantu->nilai = $item;
          $pembantu->save();
        }
      }
    //end SUPPORTS pembantu alpha dan delta
    
      public function inputAlphaPositif(){
        $data = $this->topsis->alphaProses('maksimal');
    
        $this->inputPembantu($data,'alpha','positif');
      }
    
      public function inputAlphaNegatif(){
        $data   = $this->topsis->alphaProses('minimal');
    
        $this->inputPembantu($data,'alpha','negatif');
      }
    
      public function inputDeltaPositif(){
        $jenis  = 'positif';
    
        $data   = $this->topsis->deltaProses($jenis);
        $this->inputPembantu($data,'delta',$jenis);
      }
    
      public function inputDeltaNegatif(){
        $jenis  = 'negatif';
    
        $data   = $this->topsis->deltaProses($jenis);
        $this->inputPembantu($data,'delta',$jenis);
      }
}
