@extends('layouts.main')

@section('title', 'Kegiatan')

@section('breadcrumbs')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Surat Kegiatan
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="/surat-kegiatan"> Surat Kegiatan</a></li>
        <!-- <li class="active">General Elements</li> -->
      </ol>
    </section>
@endsection

@section('content')
  <section class="content">
  <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Kegiatan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"action="/surat-kegiatan/simpan" method="post">
            {{ csrf_field() }}
              <div class="box-body">
            <div class="form-group">
                <label for="nama_mitra" class="form-label">Nama Mitra</label>
                <input type="text" class="form-control" name="nama_mitra" id="nama_mitra" placeholder="Nama mitra" >
                </div>
            <div class="form-group">
                <label for="alamat_mitra" class="form-label">Alamat Mitra</label>
                <input type="text" class="form-control" name="alamat_mitra" id="alamat_mitra" placeholder="alamat mitra" >
            </div>
            <div class="form-group">
                <label for="tgl_kirim" class="form-label">Tanggal Kirim</label>
                <input type="date" class="form-control" name="tgl_kirim" id="tgl_kirim" placeholder="tgl_kirim" >
            </div>
            <div class="form-group">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea type="text" class="form-control" name="keterangan" id="keterangan" placeholder="alamat keterangan" ></textarea>
            </div>
                <div class="form-group">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->


        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tabel Kegiatan</h3>
            </div>
            <div class="card-body">
<table class="table">
<thead>
<tr>
<th scope="col">No</th>
<th scope="col">Nama Mitra</th>
<th scope="col">Alamat Mitra</th>
<th scope="col">Tanggal Kirim</th>
<th scope="col">Status</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>
@foreach($dt as $data)
<tr>
<th scope="row">{{ $loop->iteration }}</th>
<td>{{ $data->nama_mitra }}</td>
<td>{{ $data->alamat_mitra }}</td>
<td>{{ $data->tgl_kirim->format('d-m-Y') }}</td>
<td>
@if($data->status == 0)
   <p class="text">Belum diverifikasi</p>
   @elseif($data->status == 1)
   <p class="text-success">Diterima</p>
   @elseif($data->status == 2)
   <p class="text-danger">Ditolak</p>
   @endif
</td>
<td>

@if($data->status == 0)
<a href="/surat-kegiatan/edit/{{ $data->id }}" class="btn btn-primary">Edit</a>
   @elseif($data->status == 1)
   <a href="#" class="btn btn-success">Cetak</a>
   @elseif($data->status == 2)
   <p class="text">No Action</p>
   @endif
   
</td>
</tr>
@endforeach
</tbody>
</table>

</div>
</div>
</div>
            <hr>



          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
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

