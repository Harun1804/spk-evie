@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-header card">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                            <div class="d-inline">
                                <h4>Sistem Pendukung Keputusan Bantuan Bedah Rumah</h4>
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            <div class="page-body">
                <div class="row">
                   
                    

                    <!-- Statestics Start -->
                    <div class="col-md-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Data Warga</h5>
                                <div class="card-header-left ">
                                </div>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($alternatifs as $index => $alternatif)
            
                                              <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$alternatif->nik}}</td>
                                                <td>{{$alternatif->no_kk}}</td>
                                                <td>{{$alternatif->nama_lengkap}}</td>
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
                </div>
            </div>

            <div id="styleSelector">

            </div>
        </div>
    </div>
@stop