@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        
            
        <div class="card col-md-4">
        <br>
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title text-center">Data Pengajuan Surat Tugas</h3>
        </div>
        <hr>

                <div class="card-body">
                <form action="/surat-tugas-dsn/simpan" method="post">
                    {{ csrf_field() }}

                <div class="mb-3">
                <label for="nama_mitra" class="form-label">Nama Mitra</label>
                <input type="text" class="form-control" name="nama_mitra" id="nama_mitra"  >
                </div>

                <div class="mb-3">
                <label for="lokasi_kegiatan" class="form-label">Lokasi Kegiatan</label>
                <input type="text" class="form-control" name="lokasi_kegiatan" id="lokasi_kegiatan" >
                </div>

            
                <div class="mb-3">
                <label for="tgl_pelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                <input type="date" class="form-control" name="tgl_pelaksanaan" id="tgl_pelaksanaan"  >
                </div>

                <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea type="text" class="form-control" name="keterangan" id="keterangan" ></textarea>
                </div>

                <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                <a href="/home" class="btn btn-secondary">Kembali</a>
                </form>
                
            </div>
            </div>
            </div>
        
            <div class="card col-md-8">
        <br>
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title text-center">Data Surat Tugas</h3>
        </div>
        <hr>

                <div class="card-body">
                <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Mitra</th>
                <th scope="col">Lokasi Kegiatan</th>
                <th scope="col">Tanggal Pelaksanaan</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($dt as $data)
                <tr>
                <th scope="row">{{ $loop->iteration }}</th>
               <td>{{ $data->nama_mitra }}</td>
               <td>{{ $data->lokasi_kegiatan }}</td>
               <td>{{ $data->tgl_pelaksanaan }}</td>
               <td>
                   <a href="/surat-tugas-dsn/edit/{{ $data->id }}" class="btn btn-primary">Edit</a>
                </td>
                </tr>
               @endforeach
            </tbody>
            </table>
                
            </div>
            </div>
            </div>
        

        

        
    </div>
</div>
@endsection
