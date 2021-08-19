<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/index', 'HomeController@index')->name('index');
//alternatif dan kriteria
Route::get('/index/Kriteria-dan-Alternative', 'AlternatifController@index')->name('datadasar.kriteria');
//kriteria
Route::resource('kriteria','KriteriaController');
Route::get('/index/Kriteria/hapus/{id}', 'KriteriaController@destroy')->name('kriteria.destroy');
//alternatif
Route::get('/index/Kriteria-dan-Alternative/Form-Alternatif', 'AlternatifController@create')->name('datadasar.form_alternatif');
Route::resource('alternatif','AlternatifController');
Route::get('/index/Alternatif/hapus/{id}', 'AlternatifController@destroy')->name('alternatif.destroy');
//matriks
Route::get('/index/Matriks', 'MatriksController@index')->name('datadasar.matriks');
Route::resource('matriks','MatriksController');
//Hasil Analisa
Route::get('/Hasil-Analisa', 'AnalisaController@index')->name('analisa.index');
//Normalisasi
Route::get('/Normalisasi', 'NormalisasiController@index')->name('normalisasi.index');
//Hasil Akhir
Route::get('/hasil_akhir', 'HasilAkhirController@index')->name('hasil_akhir.index');

Route::get('data/matriks','DataController@dataMatriks')->name('data.matriks');
Route::get('data/input','DataController@index')->name('input.index');
