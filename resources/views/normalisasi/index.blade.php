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
                                <h4>Tabel Normalisasi</h4>
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
                            <li class="breadcrumb-item"><a href="#!">Tabel Normalisasi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page-body start -->
        <div class="page-body">
            <!-- Basic table card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Tabel Ternormalisasi Berbobot</h5>
                    <span>Tabel ini berisi data warga</span>
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
                                @forelse ($kriteria as $index => $item)
                                    <th>{{$item->kode}}</th>
                                  @empty

                                  @endforelse
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($matriks as $index => $item)

                                <tr>
                                    <th scope="row">{{$index + 1}}</th>
                                    <td>{{$item->nik}}</td>
                                    <td>{{$item->no_kk}}</td>
                                    <td>{{$item->nama_lengkap}}</td>
                                    @foreach ($item->keputusan as $key => $keputusan)
                                        <td>{{$keputusan->normalisasi_berbobot_hasil}}</td>
                                    @endforeach
                                </tr>

                                @empty
                                  <tr>
                                    <td colspan="{{3 + count($kriteria)}}" align="center">Data Tidak Ada</td>
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

        <!-- Page-body start -->
        <div class="page-body">
            <!-- Basic table card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Tabel Matriks Solusi Ideal Positif(A+) dan Negatif(A-)</h5>
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
                                    <th>Kriteria</th>
                                    <th>A+</th>
                                    <th>A-</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kriteria as $index => $item)

                                <tr>
                                    <th scope="row">{{$index + 1}}</th>
                                    <td>{{$item->kode}}</td>
                                    <td>{{$item->a_plus}}</td>
                                    <td>{{$item->a_min}}</td>

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

        <!-- Page-body start -->
        
        <!-- Page-body end -->


    </div>
</div>
<!-- Main-body end -->

<div id="styleSelector">

</div>
</div>

@stop
