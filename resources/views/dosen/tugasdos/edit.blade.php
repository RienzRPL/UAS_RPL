@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        
            
        <div class="card col-md-12">
        <br>
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title text-center"> Edit Data Pengajuan Surat Tugas</h3>
        </div>
        <hr>

                <div class="card-body">
                <form action="/surat-tugas-dsn/update/{{ $srt_tugas->id }}" method="POST">
                    {{ csrf_field() }}

                <input type="hidden" class="form-control" name="id" id="id" value="{{ $srt_tugas->id }}">
                <div class="mb-3">
                <label for="nama_mitra" class="form-label">Nama Mitra</label>
                <input type="text" class="form-control" name="nama_mitra" id="nama_mitra" value="{{ $srt_tugas->nama_mitra }}" >
                </div>

                <div class="mb-3">
                <label for="lokasi_kegiatan" class="form-label">Lokasi Kegiatan </label>
                <input type="text" class="form-control" name="lokasi_kegiatan" id="lokasi_kegiatan" value="{{ $srt_tugas->lokasi_kegiatan }}" >
                </div>

                <div class="mb-3">
                <label for="tgl_pelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                <input type="date" class="form-control" name="tgl_pelaksanaan" id="tgl_pelaksanaan" value="{{ $srt_tugas->tgl_pelaksanaan }}"  >
                </div>

                <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea type="text" class="form-control" name="keterangan" id="keterangan" value="{{ $srt_tugas->keterangan }}"></textarea>
                </div>

                <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                <a href="/surat-tugas-dsn" class="btn btn-secondary">Kembali</a>
                </form>
                
            </div>
            </div>
            </div>
        
        
    </div>
</div>
@endsection
