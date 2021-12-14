@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        
            
        
            <div class="card col-md-12">
        <br>
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title text-center">Detail Surat Kegiatan</h3>
        </div>
        <hr>
            
                <div class="card-body">
                <table class="table">
            <thead>
                <tr>
       
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Kode Surat</th>
                <th scope="col">Nama Mitra</th>
                <th scope="col">Alamat Mitra</th>
                <th scope="col">Anggota</th>
                <th scope="col">Tanggal Kirim</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               
                <tr>
                <td>{{ $det->id_user}}</td>    
               
                <td>
                {{ $det->kode_surat }}/B/FTI/{{ $det->tgl_kirim->format('Y') }}
                </td>  
                
               <td>{{ $det->nama_mitra }}</td>
               <td>{{ $det->alamat_mitra }}</td>
               <td>{{ $det->anggota }}</td>
               <td>{{ $det->tgl_kirim->format('d-m-Y') }}</td>
               <td>{{ $det->keterangan }}</td>
               <td>
               
                @if($det->status == 0)
                <a href="/adm-surat-kegiatan/setuju/{{ $det->id }}" class="btn btn-success">Terima</a>
               <a href="/adm-surat-kegiatan/batal/{{ $det->id }}" class="btn btn-danger">Tolak</a>
               @elseif($det->status == 1 OR $det->status == 2)
                   <p class="text">No Action</p>
                @endif
                </td>
                </tr>
               
            </tbody>
            </table>
            <a href="/adm-surat-kegiatan" class="btn btn-secondary">Kembali</a>
            </div>
            </div>
            </div>
        

        
            
        
    </div>
    
</div>
@endsection
