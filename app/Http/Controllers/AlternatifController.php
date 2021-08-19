<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kriteria;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        return view('datadasar.kriteria',['alternatif' => $alternatif, 'kriteria' =>$kriteria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->form();
    }

    public function form($id = null){
        $alternatifFind = Alternatif::find($id);
  
        if ($alternatifFind){
            session()->flashInput($alternatifFind->toArray());
            $action   = route('alternatif.update',$id);
            $method   = 'PUT';
        }else{
            $action   = route('alternatif.store');
            $method   = 'POST';
        }
  
        return view('datadasar.form_alternatif',compact('action','method'));
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->form($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return $this->save($id);
    }

    public function save($id = null){
        if ($id) {
          $alternatif = Alternatif::find($id);
        }else{
          $alternatif = new Alternatif;
          $alternatif->kode = rand(100,900);
        }

        $alternatif->nik = request('nik');
        $alternatif->no_kk = request('no_kk');
        $alternatif->nama_lengkap = request('nama_lengkap');
        $alternatif->save();
  
        return redirect()->route('datadasar.kriteria');
      }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alternatif = Alternatif::find($id);
        $alternatif->delete();
        return redirect()->action([AlternatifController::class, 'index'])->with('status', 'Data Berhasil Dihapus');
    }
}
