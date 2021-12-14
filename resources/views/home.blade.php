@extends('layouts.main')

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <!-- <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li> -->
      </ol>
    </section>
@endsection

@section('content')
  <section class="content">
  <div class="row">
  @if(auth()->user()->role == 'Mahasiswa')
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$permohonan->count()}}</h3>

              <p>Surat permohonan</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$berita->count()}}</h3>

              <p>Surat berita</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$kegiatan->count()}}</h3>

              <p>Surat kegiatan</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>{{$undangan->count()}}</h3>

              <p>Surat undangan</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$tugas->count()}}</h3>

              <p>Surat tugas</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        @endif
        @if(auth()->user()->role == 'Admin')
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$admpermohonan->count()}}</h3>

              <p>Surat permohonan</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$admberita->count()}}</h3>

              <p>Surat berita</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$admkegiatan->count()}}</h3>

              <p>Surat kegiatan</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>{{$admundangan->count()}}</h3>

              <p>Surat undangan</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$admtugas->count()}}</h3>

              <p>Surat Tugas</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$admtugasdos->count()}}</h3>

              <p>Surat Tugas Dosen</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        @endif
        @if(auth()->user()->role == 'Dosen')
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$tugasdos->count()}}</h3>

              <p>Surat Tugas Dosen</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        @endif
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

