<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratPengajuan;
use App\Models\Permohonan;
use App\Models\Berita;
use App\Models\kegiatan;
use App\Models\undangan;
use App\Models\tugas;
use App\Models\tugasdos;
use App\Models\User;
use App\Models\KodeSuratPermohonan;
use Auth;

class AdminController extends Controller
{
    // SURAT PERMOHONAN
    public function tampil_srt_permohonan()
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Mahasiswa') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Permohonan::where([
            ['id_user', '=', $auth],
            ])->get();

        $srt_permohonan = Permohonan::get();

        return view('admin.mahasiswa.permohonan.index',compact('dt','srt_permohonan'));
    }

    public function detail_srt_permohonan($id)
    {
        $det = Permohonan::find($id);

        $kd = KodeSuratPermohonan::join('permohonan', 'permohonan.id', '=' , 'kode_surat_permohonan.id_surat')
        ->where('id_surat', $id)
        ->get(['kode_surat_permohonan.kode_surat']);


        return view ('admin.mahasiswa.permohonan.detail', compact('det','kd'));
    }

    public function setuju_permohonan($id)
    {
        Permohonan::where('id', '=', $id)->update(['status' => 1]);
        return redirect()->back();
    }

    public function batal_permohonan($id)
    {
        Permohonan::where('id', '=', $id)->update(['status' => 2]);
        return redirect()->back();
    }

    public function buat_srt_permohonan($id)
    {
        $det = Permohonan::find($id);

        // MEMBUAT KODE SURAT OTOMATIS
        $getRow = KodeSuratPermohonan::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        $lastId = $getRow->first();
        $kode = "001";
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "00".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "00".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "".''.($lastId->id + 1);
            } 
        }
        return view ('admin.mahasiswa.permohonan.tambah', compact('det','kode'));
    }

    public function simpan_srt_permohonan(Request $request)
    {
        $count = KodeSuratPermohonan::where('kode_surat',$request->input('kode_surat'))->count();

        if($count>0){
            // Session::flash('message', 'Already exist!');
            // Session::flash('message_type', 'danger');
            return redirect ('/adm-surat-permohonan');
        }

        KodeSuratPermohonan::create([
            'id_surat' => $request->id_surat,
            'kode_surat' => $request->kode_surat
        ]);

        return redirect ('/adm-surat-permohonan');


    }

    //  ------------------------------------
    // SURAT KEGIATAN
    public function tampil_srt_kegiatan()
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Mahasiswa') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Kegiatan::where([
            ['id_user', '=', $auth],
            ])->get();

        $srt_kegiatan = Kegiatan::get();

        return view('admin.mahasiswa.kegiatan.index',compact('dt','srt_kegiatan'));
    }

    public function detail_srt_kegiatan($id)
    {
        $det = Kegiatan::find($id);

        $kd = KodeSuratKegiatan::join('kegiatan', 'kegiatan.id', '=' , 'kode_surat_kegiatan.id_surat')
        ->where('id_surat', $id)
        ->get(['kode_surat_kegiatan.kode_surat']);


        return view ('admin.mahasiswa.kegiatan.detail', compact('det','kd'));
    }

    public function setuju_kegiatan($id)
    {
        Kegiatan::where('id', '=', $id)->update(['status' => 1]);
        return redirect()->back();
    }

    public function batal_kegiatan($id)
    {
        Kegiatan::where('id', '=', $id)->update(['status' => 2]);
        return redirect()->back();
    }

    public function buat_srt_kegiatan($id)
    {
        $det = Kegiatan::find($id);

        // MEMBUAT KODE SURAT OTOMATIS
        $getRow = KodeSuratKegiatan::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        $lastId = $getRow->first();
        $kode = "001";
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "00".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "00".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "".''.($lastId->id + 1);
            } 
        }
        return view ('admin.mahasiswa.kegiatan.tambah', compact('det','kode'));
    }

    public function simpan_srt_kegiatan(Request $request)
    {
        $count = KodeSuratKegiatan::where('kode_surat',$request->input('kode_surat'))->count();

        if($count>0){
            // Session::flash('message', 'Already exist!');
            // Session::flash('message_type', 'danger');
            return redirect ('/adm-surat-kegiatan');
        }

        KodeSuratKegiatan::create([
            'id_surat' => $request->id_surat,
            'kode_surat' => $request->kode_surat
        ]);

        return redirect ('/adm-surat-kegiatan');


    }

    // ------------------------
    // SURAT UNDANGAN
    public function tampil_srt_undangan()
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Mahasiswa') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Undangan::where([
            ['id_user', '=', $auth],
            ])->get();

        $srt_undangan = Undangan::get();

        return view('admin.mahasiswa.undangan.index',compact('dt','srt_undangan'));
    }

    public function detail_srt_undangan($id)
    {
        $det = Undangan::find($id);

        $kd = KodeSuratUndangan::join('undangan', 'undangan.id', '=' , 'kode_surat_undangan.id_surat')
        ->where('id_surat', $id)
        ->get(['kode_surat_undangan.kode_surat']);


        return view ('admin.mahasiswa.undangan.detail', compact('det','kd'));
    }

    public function setuju_undangan($id)
    {
        Undangan::where('id', '=', $id)->update(['status' => 1]);
        return redirect()->back();
    }

    public function batal_undangan($id)
    {
        Undangan::where('id', '=', $id)->update(['status' => 2]);
        return redirect()->back();
    }

    public function buat_srt_undangan($id)
    {
        $det = Undangan::find($id);

        // MEMBUAT KODE SURAT OTOMATIS
        $getRow = KodeSuratUndangan::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        $lastId = $getRow->first();
        $kode = "001";
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "00".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "00".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "".''.($lastId->id + 1);
            } 
        }
        return view ('admin.mahasiswa.undangan.tambah', compact('det','kode'));
    }

    public function simpan_srt_undangan(Request $request)
    {
        $count = KodeSuratUndangan::where('kode_surat',$request->input('kode_surat'))->count();

        if($count>0){
            // Session::flash('message', 'Already exist!');
            // Session::flash('message_type', 'danger');
            return redirect ('/adm-surat-undangan');
        }

        KodeSuratUndangan::create([
            'id_surat' => $request->id_surat,
            'kode_surat' => $request->kode_surat
        ]);

        return redirect ('/adm-surat-undangan');
    }

    // ------------------------------------
    // SURAT BERITA
    public function tampil_srt_berita()
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Mahasiswa') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Berita::where([
            ['id_user', '=', $auth],
            ])->get();

        $srt_berita = Berita::get();

        return view('admin.mahasiswa.berita.index',compact('dt','srt_berita'));
    }

    public function detail_srt_berita($id)
    {
        $det = Berita::find($id);

        $kd = KodeSuratBerita::join('berita', 'berita.id', '=' , 'kode_surat_berita.id_surat')
        ->where('id_surat', $id)
        ->get(['kode_surat_berita.kode_surat']);


        return view ('admin.mahasiswa.berita.detail', compact('det','kd'));
    }

    public function setuju_berita($id)
    {
        Berita::where('id', '=', $id)->update(['status' => 1]);
        return redirect()->back();
    }

    public function batal_berita($id)
    {
        Berita::where('id', '=', $id)->update(['status' => 2]);
        return redirect()->back();
    }

    public function buat_srt_berita($id)
    {
        $det = Berita::find($id);

        // MEMBUAT KODE SURAT OTOMATIS
        $getRow = KodeSuratBerita::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        $lastId = $getRow->first();
        $kode = "001";
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "00".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "00".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "".''.($lastId->id + 1);
            } 
        }
        return view ('admin.mahasiswa.berita.tambah', compact('det','kode'));
    }

    public function simpan_srt_berita(Request $request)
    {
        $count = KodeSuratBerita::where('kode_surat',$request->input('kode_surat'))->count();

        if($count>0){
            // Session::flash('message', 'Already exist!');
            // Session::flash('message_type', 'danger');
            return redirect ('/adm-surat-berita');
        }

        KodeSuratBerita::create([
            'id_surat' => $request->id_surat,
            'kode_surat' => $request->kode_surat
        ]);

        return redirect ('/adm-surat-berita');
    }

    // ---------------------------
    // SURAT TUGAS
    public function tampil_srt_tugas()
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Mahasiswa') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Tugas::where([
            ['id_user', '=', $auth],
            ])->get();

        $srt_tugas = Tugas::get();

        return view('admin.mahasiswa.tugas.index',compact('dt','srt_tugas'));
    }

    public function detail_srt_tugas($id)
    {
        $det = Tugas::find($id);

        $kd = KodeSuratTugas::join('tugas', 'tugas.id', '=' , 'kode_surat_tugas.id_surat')
        ->where('id_surat', $id)
        ->get(['kode_surat_tugas.kode_surat']);


        return view ('admin.mahasiswa.tugas.detail', compact('det','kd'));
    }

    public function setuju_tugas($id)
    {
        Tugas::where('id', '=', $id)->update(['status' => 1]);
        return redirect()->back();
    }

    public function batal_tugas($id)
    {
        Tugas::where('id', '=', $id)->update(['status' => 2]);
        return redirect()->back();
    }

    public function buat_srt_tugas($id)
    {
        $det = Tugas::find($id);

        // MEMBUAT KODE SURAT OTOMATIS
        $getRow = KodeSuratTugas::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        $lastId = $getRow->first();
        $kode = "001";
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "00".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "00".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "".''.($lastId->id + 1);
            } 
        }
        return view ('admin.mahasiswa.tugas.tambah', compact('det','kode'));
    }

    public function simpan_srt_tugas(Request $request)
    {
        $count = KodeSuratTugas::where('kode_surat',$request->input('kode_surat'))->count();

        if($count>0){
            // Session::flash('message', 'Already exist!');
            // Session::flash('message_type', 'danger');
            return redirect ('/adm-surat-tugas');
        }

        KodeSuratTugas::create([
            'id_surat' => $request->id_surat,
            'kode_surat' => $request->kode_surat
        ]);

        return redirect ('/adm-surat-tugas');
    }

    // ------------------------
    // SURAT TUGAS-DOSEN
    public function tampil_srt_tugas_dsn()
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Mahasiswa') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Tugasdos::where([
            ['id_user', '=', $auth],
            ])->get();

        $srt_tugas = Tugasdos::get();

        return view('admin.dosen.tugasdos.index',compact('dt','srt_tugas'));
    }

    public function detail_srt_tugas_dsn($id)
    {
        $det = Tugasdos::find($id);

        $kd = KodeSuratTugasdos::join('tugasdos', 'tugasdos.id', '=' , 'kode_surat_tugasdos.id_surat')
        ->where('id_surat', $id)
        ->get(['kode_surat_tugasdos.kode_surat']);


        return view ('admin.dosen.tugasdos.detail', compact('det','kd'));
    }

    public function setuju_tugas_dsn($id)
    {
        Tugasdos::where('id', '=', $id)->update(['status' => 1]);
        return redirect()->back();
    }

    public function batal_tugas_dsn($id)
    {
        Tugasdos::where('id', '=', $id)->update(['status' => 2]);
        return redirect()->back();
    }

    public function buat_srt_tugas_dsn($id)
    {
        $det = Tugasdos::find($id);

        // MEMBUAT KODE SURAT OTOMATIS
        $getRow = KodeSuratTugasdos::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        $lastId = $getRow->first();
        $kode = "001";
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "00".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "00".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "".''.($lastId->id + 1);
            } 
        }
        return view ('admin.dosen.tugasdos.tambah', compact('det','kode'));
    }

    public function simpan_srt_tugas_dsn(Request $request)
    {
        $count = KodeSuratTugasdos::where('kode_surat',$request->input('kode_surat'))->count();

        if($count>0){
            // Session::flash('message', 'Already exist!');
            // Session::flash('message_type', 'danger');
            return redirect ('/adm-surat-tugas-dsn');
        }

        KodeSuratTugasdos::create([
            'id_surat' => $request->id_surat,
            'kode_surat' => $request->kode_surat
        ]);

        return redirect ('/adm-surat-tugas-dsn');
    }

}
