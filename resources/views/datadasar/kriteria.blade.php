@extends('layouts.admin')

@section('title', 'Kriteria dan Alternatif')

@section('content')<div class="pcoded-inner-content">
    <!-- Main-body start -->
    
    <div class="main-body">
        <div class="page-wrapper">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <!-- Page-header start -->
            <div class="page-header card">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="icofont icofont-table bg-c-blue"></i>
                            <div class="d-inline">
                                <h4>Tabel Kriteria dan Alternatif</h4>
                                <span>Halaman Ini Berisi Data Tabel Kriteria dan Alternatif</span>
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
                            <li class="breadcrumb-item"><a href="#!">Tabel Kriteria dan Alternatif</a>
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
                    <h5>Tabel Kriteria</h5>
                    <div class="card-header-right">    
                        <ul class="list-unstyled card-option">        
                            <li><i class="icofont icofont-simple-left "></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><a href="{{route('kriteria.create')}}"><i class="icofont icofont-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kriteria</th>
                                    <th>Atribut</th>
                                    <th>Bobot</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kriteria as $i => $k)
                                <tr>
                                    <th>{{$i + 1}}</th>
                                    <td>{{$k->nama_kriteria}}</td>
                                    <td>{{$k->attribute}}</td>
                                    <td>{{$k->bobot}}</td>
                                    <td><a href="{{route('kriteria.edit',$k->id)}}">Edit</a>  |
                                        <a href="{{route('kriteria.destroy',$k->id)}}">Hapus</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td>Tidak Ada Data</td>
                                </tr>
                             @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Basic table card end -->

            <!-- Basic table card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Tabel Alternatif</h5>
                    <span>Tabel ini berisi data warga</span>
                    <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><a href="{{route('datadasar.form_alternatif')}}"><i class="icofont icofont-plus"></i></a></li>    </ul></div>
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
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($alternatif as $index => $item)
                                <tr>
                                    <th scope="row">{{$index + 1}}</th>
                                    <td>{{$item->nik}}</td>
                                    <td>{{$item->no_kk}}</td>
                                    <td>{{$item->nama_lengkap}}</td>
                                    <td><a href="{{route('alternatif.edit',$item->id)}}">Edit</a>  |  
                                        <a href="{{route('alternatif.destroy',$item->id)}}" data-method="DELETE" data-confirm="Anda yakin akan menghapus data ini?">Hapus</a></td>
                                </tr>
                                @empty
                                    <tr>
                                        <td>Tidak Ada Data</td>
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