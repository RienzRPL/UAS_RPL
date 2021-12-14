@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        
            
        <div class="card col-md-4">
        <br>
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title text-center">Data Pengajuan Surat Berita</h3>
        </div>
        <hr>

                <div class="card-body">
                <form action="/surat-berita/simpan" method="post">
                    {{ csrf_field() }}

                <div class="mb-3">
                <label for="nama_mitra" class="form-label">Nama Mitra</label>
                <input type="text" class="form-control" name="nama_mitra" id="nama_mitra"  >
                </div>

                <div class="mb-3">
                <label for="alamat_mitra" class="form-label">Alamat Mitra</label>
                <input type="text" class="form-control" name="alamat_mitra" id="alamat_mitra" >
                </div>

                <div class="mb-3">
                <label for="anggota" class="form-label">Anggota</label>
                <input type="text" class="form-control" name="anggota" id="anggota" >
                </div>

                <div class="mb-3">
                <label for="tgl_kirim" class="form-label">Tanggal Kirim</label>
                <input type="date" class="form-control" name="tgl_kirim" id="tgl_kirim"  >
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
          <h3 class="box-title text-center">Data Surat Berita</h3>
        </div>
        <hr>

                <div class="card-body">
                <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Mitra</th>
                <th scope="col">Alamat Mitra</th>
                <th scope="col">Anggota</th>
                <th scope="col">Tanggal Kirim</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($dt as $data)
                <tr>
                <th scope="row">{{ $loop->iteration }}</th>
               <td>{{ $data->nama_mitra }}</td>
               <td>{{ $data->alamat_mitra }}</td>
               <td>{{ $data->anggota }}</td>
               <td>{{ $data->tgl_kirim }}</td>
               <td>
                   <a href="/surat-berita/edit/{{ $data->id }}" class="btn btn-primary">Edit</a>
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
