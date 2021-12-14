@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
            
    <div class="card col-md-6">
        <br>
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title text-center">Buat Kode Surat Permohonan</h3>
        </div>
        <hr>

                <div class="card-body">
                <form action="/adm-surat-permohonan/simpan" method="post">
                    {{ csrf_field() }}

                
                    <input type="hidden" class="form-control" name="id_surat" id="id_surat" value="{{ $det->id }}" readonly=""  >
                    <br>
                <div class="mb-3">
                <label for="kode_surat" class="form-label">Kode Surat</label>
                <input type="text" class="form-control" name="kode_surat" id="kode_surat" value="{{ $kode }}" readonly=""  >
                </div>
    
                <br> 

                <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                <a href="/adm-surat-permohonan/detail/{{ $det->id }}" class="btn btn-secondary">Kembali</a>
                </form>
                
            </div>
        
    </div>
</div>
@endsection
