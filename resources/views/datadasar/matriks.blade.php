@extends('layouts.admin')

@section('title', 'Matriks')

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
                                <h4>Tabel Matriks</h4>
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
                            <li class="breadcrumb-item"><a href="#!">Tabel Matriks</a>
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
                    <h5>Tabel Matriks</h5>
                    <span></span>
                    <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left "></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><a href="{{route('matriks.create')}}"><i class="icofont icofont-plus"></i></a></li>
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
                                    <th>{{$item->nama_kriteria}}</th>
                                  @empty

                                  @endforelse
                                  <th class="action">Opsi</th>
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
                                        <td>{{$keputusan->sub_kriteria->nama}}</td>
                                    @endforeach
                                    <td><a href="{{route('matriks.edit',$item->id)}}">Edit</a>  |  <a href="{{route('matriks.destroy',$item->id)}}">Hapus</a></td>
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
    </div>
</div>
<!-- Main-body end -->

<div id="styleSelector">

</div>
</div>

@stop
