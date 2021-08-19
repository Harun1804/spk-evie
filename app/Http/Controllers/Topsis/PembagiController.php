<?php

namespace App\Http\Controllers\Topsis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kriteria;

use App\Supports\Topsis;

class PembagiController extends Controller
{
    public function __construct(Topsis $topsis){
      return $this->topsis = $topsis;
    }

    public function index(){;
      $kriteria = Kriteria::all();
      $pembagi  = $this->topsis->pembagiProses();

      return view('pembagi.index',compact('kriteria','pembagi'));
    }
}
