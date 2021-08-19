<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Keputusan;
use App\Hasil;
use App\Kriteria;
use App\Normalisasi;
use Illuminate\Http\Request;
use App\SubKriteria;


use App\Supports\Logika;
use Normalizer;

class MatriksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Logika $logika){
        $this->logika = $logika;
      }

    public function index()
    {
      //perhitungan normalisasi
      $this->logika->normalisasi();
        // return $keputusan = Keputusan::all();
        $kriteria   = Kriteria::berdasarkan()->get();
        $matriks = Alternatif::with(['keputusan' => function ($query) {
            $query->orderBy('kriteria_id','asc');
            $query->with('sub_kriteria.kriteria');
        }])->get();
        // $matriks    = Hasil::berdasarkanAlternatif()->get();
        $nilai      = '' ;

        return view('datadasar.matriks',compact('nilai','kriteria','matriks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $action = '';
      $method = '';
      $alternatif = [];
      $hasil = '';
      $kriteria = Kriteria::with('sub_kriteria')->get();
      $nilai = '';
      $alternatif_id = '';
      return view('datadasar.create',compact(
        'action','method','alternatif','hasil','kriteria','nilai','alternatif_id'
      ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $alternatif = Alternatif::create(
        [
          'nama_lengkap'=>$request->nama_lengkap,
          'nik'=>$request->nik,
          'no_kk'=>$request->no_kk,
        ]
      );

      $sub_kriterias =  SubKriteria::whereIn('id',$request->kriteria)->with('kriteria')->get();

      foreach ($sub_kriterias as $key => $sub_kriteria) {
        Keputusan::create(
          [
            'alternatif_id'      => $alternatif->id,
            'kriteria_id'      => $sub_kriteria->kriteria->id,
            'bobot_kriteria'=>$sub_kriteria->kriteria->bobot,
            'sub_kriteria_id'  => $sub_kriteria->id,
            'bobot_sub_kriteria'  =>$sub_kriteria->bobot,
          ],
        );
      }
      $this->logika->normalisasi();
      return redirect()->route('matriks.index');
      // return $request->all();
        // return $this->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alternatif =  Alternatif::findOrFail($id);
        $alternatif->delete();
        return redirect()->route('matriks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $alternatif =  Alternatif::findOrFail($id);
       $keputusan = Keputusan::whereAlternatifId($alternatif->id)->get();
       $sub_kriteria_s = $keputusan->pluck('sub_kriteria_id')->toArray();
       $kriteria = Kriteria::with('sub_kriteria')->get();

       return view('datadasar.edit',compact(
         'alternatif','kriteria','sub_kriteria_s'
       ));


        // return $this->form($id);
    }


    public function form($id = null){
        $hasilFind = Hasil::where('alternatif_id',$id)->get();

        if (count($hasilFind)) {
          session()->flashInput($hasilFind->toArray());
          $action = Route('matriks.update',$id);
          $method = "PUT";
        }else{
          $action = Route('matriks.store');
          $method = "POST";
        }

        $alternatif     = Alternatif::all();
        $alternatif_id  = $id;
        $kriteria       = Kriteria::orderBy('kode')->get();
        $hasil          = Hasil::kriteriaAlternatif($id)->get();
        $nilai          = $this->logika->inputan($id,'no-ajax');

        return view('datadasar.form_matriks',compact(
          'action','method','alternatif','hasil','kriteria','nilai','alternatif_id'
        ));
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alternatif =  Alternatif::findOrFail($id);
        $alternatif->update(
          [
            'nama_lengkap'=>$request->nama_lengkap,
            'nik'=>$request->nik,
            'no_kk'=>$request->no_kk,
          ]
        );

        $sub_kriterias =  SubKriteria::whereIn('id',$request->kriteria)->with('kriteria')->get();
        Keputusan::whereAlternatifId($alternatif->id)->delete();

        foreach ($sub_kriterias as $key => $sub_kriteria) {
          Keputusan::create(
            [
              'alternatif_id'      => $alternatif->id,
              'kriteria_id'      => $sub_kriteria->kriteria->id,
              'bobot_kriteria'=>$sub_kriteria->kriteria->bobot,
              'sub_kriteria_id'  => $sub_kriteria->id,
              'bobot_sub_kriteria'  =>$sub_kriteria->bobot,
            ],
          );
        }
        $this->logika->normalisasi();
        return redirect()->route('matriks.index');

    }

    public function save($id = null){
        $hasil = [];

        $array = request('nilai');

        // input data ke table hasil
        foreach ($array as $index => $item) {
          $nilai = $item;
          $kriteria_id = $index;
          $alternatif_id = request('alternatif');

          $hasil = Hasil::FirstOrCreate(compact('alternatif_id','kriteria_id'));
          $hasil->nilai = $nilai;
          $hasil->save();
        }

        session()->put('controller','matriks');

        return redirect()->route('input.index');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasil = Hasil::where('alternatif_id',$id);
      $hasil->delete();
      $normalisasi = Normalisasi::where('alternatif_id',$id);
      $normalisasi->delete();

      return redirect()->back();
    }
}
