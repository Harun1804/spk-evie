<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
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

    public function form($id = null){
        $kriteriaFind = Kriteria::find($id);
  
        if ($kriteriaFind) {
          session()->flashInput($kriteriaFind->toArray());
          $action = route('kriteria.update',$id);
          $method = 'PUT';
        }else{
          $action = route('kriteria.store');
          $method = 'POST';
        }
  
        return view('datadasar.form_kriteria',compact('action','method'));
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    public function save($id = null){
        if ($id) {
          $kriteria = Kriteria::find($id);
        }else{
          $kriteria = new Kriteria;
        }
  
        $kriteria->kode = request('kode');
        $kriteria->nama_kriteria = request('nama_kriteria');
        $kriteria->attribute = request('attribute');
        $kriteria->bobot = request('bobot');
        $kriteria->save();
  
        session()->put('controller','kriteria');
  
        // return redirect()->route('input.normalisasi');
        return redirect()->route('datadasar.kriteria');
      }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
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
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return $this->save($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();

      return redirect()->back();
    }
}
