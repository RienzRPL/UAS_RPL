@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        
            
        <div class="card col-md-12">
        <br>
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title text-center"> Edit Data Pengajuan Surat Kegiatan</h3>
        </div>
        <hr>

                <div class="card-body">
                <form action="/surat-kegiatan/update/{{ $srt_kegiatan->id }}" method="POST">
                    {{ csrf_field() }}

                <input type="hidden" class="form-control" name="id" id="id" value="{{ $srt_kegiatan->id }}">
                <div class="mb-3">
                <label for="nama_mitra" class="form-label">Nama Mitra</label>
                <input type="text" class="form-control" name="nama_mitra" id="nama_mitra" value="{{ $srt_kegiatan->nama_mitra }}" >
                </div>

                <div class="mb-3">
                <label for="alamat_mitra" class="form-label">Alamat Mitra</label>
                <input type="text" class="form-control" name="alamat_mitra" id="alamat_mitra" value="{{ $srt_kegiatan->alamat_mitra }}" >
                </div>

                <div class="mb-3"> 
                <label for="anggota" class="form-label">Anggota</label>
                <input type="text" class="form-control" name="anggota" id="anggota" value="{{ $srt_kegiatan->anggota }}">
                </div>

                <div class="mb-3">
                <label for="tgl_kirim" class="form-label">Tanggal Kirim</label>
                <input type="date" class="form-control" name="tgl_kirim" id="tgl_kirim" value="{{ $srt_kegiatan->tgl_kirim }}"  >
                </div>

                <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea type="text" class="form-control" name="keterangan" id="keterangan" value="{{ $srt_kegiatan->keterangan }}"></textarea>
                </div>

                <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                <a href="/surat-kegiatan" class="btn btn-secondary">Kembali</a>
                </form>
                
            </div>
            </div>
            </div>
        
        
    </div>
</div>
@endsection
