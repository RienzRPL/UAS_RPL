<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratPengajuan;
use App\Models\Permohonan;
use App\Models\Berita;
use App\Models\kegiatan;
use App\Models\undangan;
use App\Models\tugas;
use Auth;
use PDF;

class MahasiswaController extends Controller
{
    // public function index()
    // {
    //     $srt_pengajuan = SuratPengajuan::paginate(5);
    //     return view('mahasiswa.index', ['srt' => $srt_pengajuan]);
    // }

    // public function tambah_srt_pengajuan()
    // {
    //     $auth = Auth::user()->id;
    // 	$detil_stat= SuratPengajuan::where([
    //         ['id_user', '=', $auth],
    //         ])->get();

    //     return view('mahasiswa.create');
    // }

    // Surat Permohonan
    public function tampil_srt_permohonan()
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Permohonan::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_permohonan = Permohonan::get();

        return view('mahasiswa.permohonan.index',compact('dt','srt_permohonan'));
    }

    public function simpan_permohonan(Request $request)
    {   
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $id = Auth::user()->id;

        Permohonan::create([
            'id_user' => $id,
            'nama_mitra' => $request->nama_mitra,
            'alamat_mitra' => $request->alamat_mitra,
            'anggota' => $request->anggota,
            'tgl_kirim' => $request->tgl_kirim,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/surat-permohonan');
    }
    
    public function edit_permohonan($id)
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Permohonan::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_permohonan = Permohonan::find($id);

        return view('mahasiswa.permohonan.edit',compact('dt','srt_permohonan'));
    }

    public function update_permohonan($id, Request $request)
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Permohonan::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_permohonan = Permohonan::find($id);
        $srt_permohonan->nama_mitra = $request->nama_mitra;
        $srt_permohonan->alamat_mitra = $request->alamat_mitra;
        $srt_permohonan->anggota = $request->anggota;
        $srt_permohonan->tgl_kirim = $request->tgl_kirim;
        $srt_permohonan->keterangan = $request->keterangan;
        $srt_permohonan->save();
        return view('mahasiswa.permohonan.index',compact('dt','srt_permohonan'));
    }
    // Surat Permohonan

    //Surat Kegiatan
    public function tampil_srt_kegiatan()
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

         // MEMBUAT KODE SURAT OTOMATIS
         $getRow = Kegiatan::orderBy('id', 'DESC')->get();
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
        
        $auth = Auth::user()->id;
    	$dt= Kegiatan::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_kegiatan = Kegiatan::get();

        return view('mahasiswa.kegiatan.index',compact('dt','srt_kegiatan','kode'));
    }

    public function simpan_kegiatan(Request $request)
    {   
        $count = Kegiatan::where('kode_surat',$request->input('kode_surat'))->count();

        if($count>0){
            // Session::flash('message', 'Already exist!');
            // Session::flash('message_type', 'danger');
            return redirect ('/surat-kegiatan');
        }

        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $id = Auth::user()->id;

        Kegiatan::create([
            'id_user' => $id,
            'kode_surat' => $request->kode_surat,
            'nama_mitra' => $request->nama_mitra,
            'alamat_mitra' => $request->alamat_mitra,
            'anggota' => $request->anggota,
            'tgl_kirim' => $request->tgl_kirim,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/surat-kegiatan');
    }
    
    public function edit_kegiatan($id)
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Kegiatan::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_kegiatan = Kegiatan::find($id);

        return view('mahasiswa.kegiatan.edit',compact('dt','srt_kegiatan'));
    }

    public function update_kegiatan($id, Request $request)
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Kegiatan::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_kegiatan = Kegiatan::find($id);
        $srt_kegiatan->nama_mitra = $request->nama_mitra;
        $srt_kegiatan->alamat_mitra = $request->alamat_mitra;
        $srt_kegiatan->anggota = $request->anggota;
        $srt_kegiatan->tgl_kirim = $request->tgl_kirim;
        $srt_kegiatan->keterangan = $request->keterangan;
        $srt_kegiatan->save();
        return view('mahasiswa.kegiatan.index',compact('dt','srt_kegiatan'));
    }

    public function cetak_kegiatan($id)
    {
        $kegiatan = Kegiatan::find($id);
        $datas = $kegiatan->get();
        $pdf = PDF::loadView('mahasiswa.kegiatan.surat', compact('kegiatan'));
        return $pdf->stream('surat_kegiatan_'.$kegiatan->id_user.'.pdf');
    }
    //Surat Kegiatan

    //Surat Undangan
    public function tampil_srt_undangan()
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Undangan::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_undangan = Undangan::get();

        return view('mahasiswa.undangan.index',compact('dt','srt_undangan'));
    }

    public function simpan_undangan(Request $request)
    {   
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $id = Auth::user()->id;

        Undangan::create([
            'id_user' => $id,
            'nama_mitra' => $request->nama_mitra,
            'alamat_mitra' => $request->alamat_mitra,
            'anggota' => $request->anggota,
            'tgl_kirim' => $request->tgl_kirim,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/surat-undangan');
    }
    
    public function edit_undangan($id)
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Undangan::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_undangan = Undangan::find($id);

        return view('mahasiswa.undangan.edit',compact('dt','srt_undangan'));
    }

    public function update_undangan($id, Request $request)
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Undangan::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_undangan = Undangan::find($id);
        $srt_undangan->nama_mitra = $request->nama_mitra;
        $srt_undangan->alamat_mitra = $request->alamat_mitra;
        $srt_undangan->anggota = $request->anggota;
        $srt_undangan->tgl_kirim = $request->tgl_kirim;
        $srt_undangan->keterangan = $request->keterangan;
        $srt_undangan->save();
        return view('mahasiswa.undangan.index',compact('dt','srt_undangan'));
    }
    //Surat Undangan

    //Surat Tugas
    public function tampil_srt_tugas()
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Tugas::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_tugas = Tugas::get();

        return view('mahasiswa.tugas.index',compact('dt','srt_tugas'));
    }

    public function simpan_tugas(Request $request)
    {   
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $id = Auth::user()->id;

        Tugas::create([
            'id_user' => $id,
            'nama_mitra' => $request->nama_mitra,
            'alamat_mitra' => $request->alamat_mitra,
            'anggota' => $request->anggota,
            'tgl_kirim' => $request->tgl_kirim,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/surat-tugas');
    }
    
    public function edit_tugas($id)
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Tugas::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_tugas = Tugas::find($id);

        return view('mahasiswa.tugas.edit',compact('dt','srt_tugas'));
    }

    public function update_tugas($id, Request $request)
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Tugas::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_tugas = Tugas::find($id);
        $srt_tugas->nama_mitra = $request->nama_mitra;
        $srt_tugas->alamat_mitra = $request->alamat_mitra;
        $srt_tugas->anggota = $request->anggota;
        $srt_tugas->tgl_kirim = $request->tgl_kirim;
        $srt_tugas->keterangan = $request->keterangan;
        $srt_tugas->save();
        return view('mahasiswa.tugas.index',compact('dt','srt_tugas'));
    }
    //Surat Tugas

    //Surat Berita
    public function tampil_srt_berita()
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Berita::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_berita = Berita::get();

        return view('mahasiswa.berita.index',compact('dt','srt_berita'));
    }

    
    public function simpan_berita(Request $request)
    {   
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $id = Auth::user()->id;

        Berita::create([
            'id_user' => $id,
            'nama_mitra' => $request->nama_mitra,
            'alamat_mitra' => $request->alamat_mitra,
            'anggota' => $request->anggota,
            'tgl_kirim' => $request->tgl_kirim,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/surat-berita-acara');
    }
    
    public function edit_berita($id)
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Berita::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_berita = Berita::find($id);

        return view('mahasiswa.berita.edit',compact('dt','srt_berita'));
    }

    public function update_berita($id, Request $request)
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Dosen'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Berita::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_berita = Berita::find($id);
        $srt_berita->nama_mitra = $request->nama_mitra;
        $srt_berita->alamat_mitra = $request->alamat_mitra;
        $srt_berita->anggota = $request->anggota;
        $srt_berita->tgl_kirim = $request->tgl_kirim;
        $srt_berita->keterangan = $request->keterangan;
        $srt_berita->save();
        return view('mahasiswa.berita.index',compact('dt','$srt_berita'));
    }
    //Surat Berita


    // public function simpan(Request $request)
    // {   
    //     // Membatasi hak akses user
    //     if(Auth::user()->role == 'Admin') {
    //         return redirect()->to('/home');
    //     }elseif(Auth::user()->role == 'Dosen'){
    //         return redirect()->to('/home');
    //     }
    //     $id = Auth::user()->id;
        
    //     // $this->validate($request,[
    //         // 'user_id' => 'required',
    //         // 'nama_mitra' => 'required',
    //         // 'alamat_mitra' => 'required',
    //         // 'jenis_surat' => 'required',
    //         // 'tujuan_surat' => 'required',
    //         // 'tgl_kirim' => 'required',
    //         // 'keterangan' => 'required',
    //     // ]);


    //     SuratPengajuan::create([
    //         'id_user' => $id,
    //         'nama_mitra' => $request->nama_mitra,
    //         'alamat_mitra' => $request->alamat_mitra,
    //         'jenis_surat' => $request->jenis_surat,
    //         'tujuan_surat' => $request->tujuan_surat,
    //         'tgl_kirim' => $request->tgl_kirim,
    //         'keterangan' => $request->keterangan
    //     ]);
    //     return redirect('/home');
    // }
}
