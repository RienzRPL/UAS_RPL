@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        
            
        
            <div class="card col-md-12">
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
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Tanggal Kirim</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($srt_berita as $data)
                <tr>
                <th scope="row">{{ $loop->iteration }}</th>

                <td>{{ $data->id_user}}</td>
       
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
               <a href="/adm-surat-berita/edit/{{ $data->id }}" class="btn btn-primary">Detail</a>
               
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
