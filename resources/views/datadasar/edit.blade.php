@extends('layouts.admin')

@section('title', 'Matriks')

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
                                <h4>Matriks</h4>
                                <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span>
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
                                <li class="breadcrumb-item"><a href="#!">Form Components</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Form Components</a>
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
                                    <ul class="list-unstyled"><li><a href="{{route('datadasar.matriks')}}"><i class="icofont icofont-simple-left"></i></a></li></ul>
                                    </div>
                                <h5>Basic Form Inputs</h5>
                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                <div class="card-header-right"><i
                                    class="icofont icofont-spinner-alt-5"></i></div>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-spinner-alt-5"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <h4 class="sub-title">Form Alternatif</h4>
                                    <form method="POST" action="{{route('matriks.update',$alternatif->id)}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="nama_lengkap" value="{{$alternatif->nama_lengkap}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">NIK</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="nik" value="{{$alternatif->nik}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">NO KK</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="no_kk" value="{{$alternatif->no_kk}}">
                                                </div>
                                            </div>

                                                @forelse ($kriteria as $index => $item)
                                                  <div class="form-group row">
                                                  <label class="col-sm-2 col-form-label" for="nilai_{{$item->id}}">{{$item->nama_kriteria}}</label>
                                                  <div class="col-sm-10">
                                                      <select name="kriteria[]"  class="form-control">
                                                          <option value=""> ======   Pilih ======</option>
                                                          @foreach ($item->sub_kriteria as $index => $sub_kriteria)
                                                            <option value="{{$sub_kriteria->id}}"

                                                              @if( in_array($sub_kriteria->id,$sub_kriteria_s) )
                                                              selected
                                                              @endif
                                                              >{{$sub_kriteria->nama}}</option>
                                                          @endforeach
                                                        </select>
                                                  </div>
                                                    </div>
                                                    @empty


                                                    @endforelse

                                            <button type="submit" class="btn btn-primary btn-round" >Update Data</button>
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
