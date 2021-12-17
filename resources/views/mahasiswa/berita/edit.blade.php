@extends('layouts.navbar')

@section('title', 'Ubah Berita')

@section('breadcrumbs')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
      <li><a href="/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="/surat-berita"> Surat Berita</a></li>
        <!-- <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li> -->
      </ol>
    </section>
@endsection

@section('content')
  <section class="content">
  <div class="container">
    <div class="row">
        
            
        <div class="card col-md-12">
        <br>
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title text-center"> Edit Data Pengajuan Surat Berita</h3>
        </div>
        <hr>

                <div class="card-body">
                <form action="/surat-berita/update/{{ $srt_berita->id }}" method="POST">
                @method('put')
                    {{ csrf_field() }}

                <input type="hidden" class="form-control" name="id" id="id" value="{{ $srt_berita->id }}">
                <div class="mb-3">
                <label for="nama_mitra" class="form-label">Nama Mitra</label>
                <input type="text" class="form-control" name="nama_mitra" id="nama_mitra" value="{{ $srt_berita->nama_mitra }}" >
                </div>

                <div class="mb-3">
                <label for="alamat_mitra" class="form-label">Alamat Mitra</label>
                <input type="text" class="form-control" name="alamat_mitra" id="alamat_mitra" value="{{ $srt_berita->alamat_mitra }}" >
                </div>

                <div class="mb-3">
                <label for="tgl_kirim" class="form-label">Tanggal Kirim</label>
                <input type="date" class="form-control" name="tgl_kirim" id="tgl_kirim" value="{{ $srt_berita->tgl_kirim }}"  >
                </div>

                <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea type="text" class="form-control" name="keterangan" id="keterangan" value="{{ $srt_berita->keterangan }}"></textarea>
                </div>

                <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                <a href="/surat-berita" class="btn btn-secondary">Kembali</a>
                </form>
                
            </div>
            </div>
            </div>
  </section>
</div>

<!-- Footer -->
<footer class="main-footer">
    <!-- <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div> -->
    <strong>Copyright &copy; {{date('Y')}} <a href="">APSURSI</a>.</strong> All rights
    reserved.
  </footer>
  
@endsection

