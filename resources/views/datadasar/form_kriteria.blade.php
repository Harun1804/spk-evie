@extends('layouts.admin')

@section('title', 'Kriteria dan Alternatif')

@section('content')
<div class="pcoded-inner-content">

    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-header card">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="icofont icofont-file-code bg-c-blue"></i>
                            <div class="d-inline">
                                <h4>Kriteria</h4>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb-title">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="icofont icofont-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Alternatif dan Kriteria</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Form Kriteria</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page-header end -->

            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-right">
                                <ul class="list-unstyled"><li><a href="{{route('datadasar.kriteria')}}">
                                    <i class="icofont icofont-simple-left"></i></a></li>
                                </ul>
                                </div>
                                <h5>Form Kriteria</h5>
                                <span></span>
                                <div class="card-header-right"><i
                                    class="icofont icofont-spinner-alt-5"></i></div>

                                    <div class="card-header-right">
                                        <i class="icofont icofont-spinner-alt-5"></i>
                                    </div>

                                </div>
                                <div class="card-block">
                                    <h4 class="sub-title">Form Kriteria</h4>
                                    <form method="POST" action="{{$action}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="{{$method}}">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Kriteria</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="nama_kriteria" name="nama_kriteria" class="form-control"
                                                placeholder="Masukan Nama Kriteria..." value="{{old('nama_kriteria')}}">
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Atribut</label>
                                                <div class="col-sm-10">
                                                    <select name="attribute" class="form-control">
                                                        <option value="Benefit" {{old('attribute') == 'Benefit'? 'selected':''}}>Benefit</option>
                                                        <option value="Cost" {{old('attribute') == 'Cost'?'selected':''}}>Cost</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Bobot</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="bobot" name="bobot" class="form-control"
                                                    placeholder="Masukan Bobot..." value="{{old('bobot')}}">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-round" >Tambah Data</button>
                                                </form>
                                                
                                        <!-- Basic Form Inputs card end -->
                                    
                                    </div>
                                </div>
                        </div>
                          <!-- Page body end -->
                        </div>
                    </div>
                    <!-- Main-body end -->
                    <div id="styleSelector">

                    </div>
                </div>
            </div>
                            
@stop