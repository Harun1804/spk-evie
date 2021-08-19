@extends('layouts.admin')

@section('title', 'Hasil Analisa')

@section('content')<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-header card">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="icofont icofont-table bg-c-blue"></i>
                            <div class="d-inline">
                                <h4>Tabel Hasil Akhir</h4>
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
                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!"></a>Tabel Hasil Akhir</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page-body start -->


        <!-- Page-body start -->
        

        <!-- Page-body start -->
        <div class="page-body">
            <!-- Basic table card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Tabel Hasil Akhir</h5>
                    <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left "></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                       
                            </ul>
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th>NIK</th>
                                  <th>No. KK</th>
                                  <th>Nama Lengkap</th>
                                  <th>D+</th>
                                  <th>D-</th>
                                  <th>V</th>
                                  <th>Rank</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($alternatifs as $index => $alternatif)

                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$alternatif->nik}}</td>
                                    <td>{{$alternatif->no_kk}}</td>
                                    <td>{{$alternatif->nama_lengkap}}</td>
                                    <td>{{$alternatif->d_plus}}</td>
                                    <td>{{$alternatif->d_min}}</td>
                                    <td>{{$alternatif->v}}</td>
                                    <td>{{$alternatif->rank}}</td>
                                  </tr>

                                @empty
                                  <tr>
                                    <td colspan="{{1 + count($kriteria)}}" align="center">Data Tidak Ada</td>
                                  </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<!-- Basic table card end -->

        </div>
        <!-- Page-body end -->


    </div>
</div>
<!-- Main-body end -->

<div id="styleSelector">

</div>
</div>

@stop
