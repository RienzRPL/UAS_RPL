<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AdminController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', '\App\Http\Controllers\DashController@index');

// Routing Mahasiswa   
// Route::get('/surat-pengajuan', '\App\Http\Controllers\MahasiswaController@tambah_srt_pengajuan');
Route::get('/surat-permohonan', '\App\Http\Controllers\MahasiswaController@tampil_srt_permohonan');
Route::post('/surat-permohonan/simpan', '\App\Http\Controllers\MahasiswaController@simpan_permohonan');
Route::get('/surat-permohonan/edit/{id}', '\App\Http\Controllers\MahasiswaController@edit_permohonan');
Route::post('/surat-permohonan/update/{id}', '\App\Http\Controllers\MahasiswaController@update_permohonan');

Route::get('/surat-kegiatan', '\App\Http\Controllers\MahasiswaController@tampil_srt_kegiatan');
Route::post('/surat-kegiatan/simpan', '\App\Http\Controllers\MahasiswaController@simpan_kegiatan');
Route::get('/surat-kegiatan/edit/{id}', '\App\Http\Controllers\MahasiswaController@edit_kegiatan');
Route::post('/surat-kegiatan/update/{id}', '\App\Http\Controllers\MahasiswaController@update_kegiatan');
Route::get('/surat-kegiatan/cetak/{id}', ['as' => 'mahasiswa.kegiatan.surat', 'uses' => '\App\Http\Controllers\MahasiswaController@cetak_kegiatan']);

Route::get('/surat-undangan', '\App\Http\Controllers\MahasiswaController@tampil_srt_undangan');
Route::post('/surat-undangan/simpan', '\App\Http\Controllers\MahasiswaController@simpan_undangan');
Route::get('/surat-undangan/edit/{id}', '\App\Http\Controllers\MahasiswaController@edit_undangan');
Route::post('/surat-undangan/update/{id}', '\App\Http\Controllers\MahasiswaController@update_undangan');

Route::get('/surat-tugas', '\App\Http\Controllers\MahasiswaController@tampil_srt_tugas');
Route::post('/surat-tugas/simpan', '\App\Http\Controllers\MahasiswaController@simpan_tugas');
Route::get('/surat-tugas/edit/{id}', '\App\Http\Controllers\MahasiswaController@edit_tugas');
Route::post('/surat-tugas/update/{id}', '\App\Http\Controllers\MahasiswaController@update_tugas');

Route::get('/surat-berita-acara', '\App\Http\Controllers\MahasiswaController@tampil_srt_berita');
Route::post('/surat-berita/simpan', '\App\Http\Controllers\MahasiswaController@simpan_berita');
Route::get('/surat-berita/edit/{id}', '\App\Http\Controllers\MahasiswaController@edit_berita');
Route::put('/surat-berita/update/{id}', '\App\Http\Controllers\MahasiswaController@update_berita');

Route::get('/surat-pengajuan/tambah', '\App\Http\Controllers\MahasiswaController@tambah_srt_pengajuan');
Route::post('/surat-pengajuan/simpan', '\App\Http\Controllers\MahasiswaController@simpan');

// Routing Dosen
Route::get('/surat-tugas-dsn', '\App\Http\Controllers\DosenController@tampil_srt_tugas');
Route::post('/surat-tugas-dsn/simpan', '\App\Http\Controllers\DosenController@simpan_tugas');
Route::get('/surat-tugas-dsn/edit/{id}', '\App\Http\Controllers\DosenController@edit_tugas');
Route::post('/surat-tugas-dsn/update/{id}', '\App\Http\Controllers\DosenController@update_tugas');

// Routing Admin-Surat Permohonan
Route::get('/adm-surat-permohonan', '\App\Http\Controllers\AdminController@tampil_srt_permohonan');
Route::get('/adm-surat-permohonan/detail/{id}', '\App\Http\Controllers\AdminController@detail_srt_permohonan');
Route::get('/adm-surat-permohonan/setuju/{id}', '\App\Http\Controllers\AdminController@setuju_permohonan');
Route::get('/adm-surat-permohonan/batal/{id}', '\App\Http\Controllers\AdminController@batal_permohonan');
Route::get('/adm-surat-permohonan/buat/{id}', '\App\Http\Controllers\AdminController@buat_srt_permohonan');
Route::post('/adm-surat-permohonan/simpan', '\App\Http\Controllers\AdminController@simpan_srt_permohonan');

// Routing Admin-Surat Kegiatan
Route::get('/adm-surat-kegiatan', '\App\Http\Controllers\AdminController@tampil_srt_kegiatan');
Route::get('/adm-surat-kegiatan/detail/{id}', '\App\Http\Controllers\AdminController@detail_srt_kegiatan');
Route::get('/adm-surat-kegiatan/setuju/{id}', '\App\Http\Controllers\AdminController@setuju_kegiatan');
Route::get('/adm-surat-kegiatan/batal/{id}', '\App\Http\Controllers\AdminController@batal_kegiatan');
Route::get('/adm-surat-kegiatan/buat/{id}', '\App\Http\Controllers\AdminController@buat_srt_kegiatan');
Route::post('/adm-surat-kegiatan/simpan', '\App\Http\Controllers\AdminController@simpan_srt_kegiatan');

//Routing Admin-Surat Undangan
Route::get('/adm-surat-undangan', '\App\Http\Controllers\AdminController@tampil_srt_undangan');
Route::get('/adm-surat-undangan/detail/{id}', '\App\Http\Controllers\AdminController@detail_srt_undangan');
Route::get('/adm-surat-undangan/setuju/{id}', '\App\Http\Controllers\AdminController@setuju_undangan');
Route::get('/adm-surat-undangan/batal/{id}', '\App\Http\Controllers\AdminController@batal_undangan');
Route::get('/adm-surat-undangan/buat/{id}', '\App\Http\Controllers\AdminController@buat_srt_undangan');
Route::post('/adm-surat-undangan/simpan', '\App\Http\Controllers\AdminController@simpan_srt_undangan');

// Routing Admin-Surat Berita
Route::get('/adm-surat-berita-acara', '\App\Http\Controllers\AdminController@tampil_srt_berita');
Route::get('/adm-surat-berita/detail/{id}', '\App\Http\Controllers\AdminController@detail_srt_berita');
Route::get('/adm-surat-berita/setuju/{id}', '\App\Http\Controllers\AdminController@setuju_berita');
Route::get('/adm-surat-berita/batal/{id}', '\App\Http\Controllers\AdminController@batal_berita');
Route::get('/adm-surat-berita/buat/{id}', '\App\Http\Controllers\AdminController@buat_srt_berita');
Route::post('/adm-surat-berita/simpan', '\App\Http\Controllers\AdminController@simpan_srt_berita');

// Routing Admin-Tugas
Route::get('/adm-surat-tugas', '\App\Http\Controllers\AdminController@tampil_srt_tugas');
Route::get('/adm-surat-tugas/detail/{id}', '\App\Http\Controllers\AdminController@detail_srt_tugas');
Route::get('/adm-surat-tugas/setuju/{id}', '\App\Http\Controllers\AdminController@setuju_tugas');
Route::get('/adm-surat-tugas/batal/{id}', '\App\Http\Controllers\AdminController@batal_tugas');
Route::get('/adm-surat-tugas/buat/{id}', '\App\Http\Controllers\AdminController@buat_srt_tugas');
Route::post('/adm-surat-tugas/simpan', '\App\Http\Controllers\AdminController@simpan_srt_tugas');

// Routing Admin-Tugas-Dosen
Route::get('/adm-surat-tugas-dsn', '\App\Http\Controllers\AdminController@tampil_srt_tugas_dsn');
Route::get('/adm-surat-tugas-dsn/detail/{id}', '\App\Http\Controllers\AdminController@detail_srt_tugas_dsn');
Route::get('/adm-surat-tugas-dsn/setuju/{id}', '\App\Http\Controllers\AdminController@setuju_tugas_dsn');
Route::get('/adm-surat-tugas-dsn/batal/{id}', '\App\Http\Controllers\AdminController@batal_tugas_dsn');
Route::get('/adm-surat-tugas-dsn/buat/{id}', '\App\Http\Controllers\AdminController@buat_srt_tugas_dsn');
Route::post('/adm-surat-tugas-dsn/simpan', '\App\Http\Controllers\AdminController@simpan_srt_tugas_dsn');