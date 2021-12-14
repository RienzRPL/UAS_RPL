<?php

namespace App\Http\Controllers;
use App\Models\tugasdos;
use Auth;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function tampil_srt_tugas()
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Mahasiswa'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Tugasdos::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_tugas = Tugasdos::get();

        return view('dosen.tugasdos.index',compact('dt','srt_tugas'));
    }

    
    public function simpan_tugas(Request $request)
    {   
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Mahasiswa'){
            return redirect()->to('/home');
        }

        $id = Auth::user()->id;

        Tugasdos::create([
            'id_user' => $id,
            'nama_mitra' => $request->nama_mitra,
            'lokasi_kegiatan' => $request->lokasi_kegiatan,
            'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/surat-tugas-dsn');
    }
    
    public function edit_tugas($id)
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Mahasiswa'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Tugasdos::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_tugas = Tugasdos::find($id);

        return view('dosen.tugasdos.edit',compact('dt','srt_tugas'));
    }

    public function update_tugas($id, Request $request)
    {
        // Membatasi hak akses user
        if(Auth::user()->role == 'Admin') {
            return redirect()->to('/home');
        }elseif(Auth::user()->role == 'Mahaiswa'){
            return redirect()->to('/home');
        }

        $auth = Auth::user()->id;
    	$dt= Tugasdos::where([
            ['id_user', '=', $auth],
            ])->get();
        $srt_tugas = Tugasdos::find($id);
        $srt_tugas->nama_mitra = $request->nama_mitra;
        $srt_tugas->lokasi_kegiatan = $request->lokasi_kegiatan;
        $srt_tugas->tgl_pelaksanaan = $request->tgl_pelaksanaan;
        $srt_tugas->keterangan = $request->keterangan;
        $srt_tugas->save();
        return view('dosen.tugasdos.index',compact('dt','srt_tugas'));
    }
}
