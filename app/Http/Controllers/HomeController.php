<?php

namespace App\Http\Controllers;
use App\Models\SuratPengajuan;
use App\Models\Permohonan;
use App\Models\Berita;
use App\Models\kegiatan;
use App\Models\undangan;
use App\Models\tugas;
use App\Models\tugasdos;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {

    //     return view('home');
    // }

    public function index()
    {
        $auth = Auth::user()->id;

        // Mahasiswa
    	$permohonan= Permohonan::where([
            ['id_user', '=', $auth],
            ])->get();
        
        $berita= Berita::where([
            ['id_user', '=', $auth],
            ])->get();
        
        $kegiatan= Kegiatan::where([
            ['id_user', '=', $auth],
            ])->get();

        $undangan= Undangan::where([
            ['id_user', '=', $auth],
            ])->get();

        $tugas= Tugas::where([
            ['id_user', '=', $auth],
            ])->get();

        // DOSEN
        $tugasdos= Tugasdos::where([
            ['id_user', '=', $auth],
            ])->get();

        // ADMIN
        $admpermohonan = Permohonan::get();
        $admundangan = Undangan::get();
        $admberita = Berita::get();
        $admkegiatan = Kegiatan::get();
        $admtugas = Tugas::get();
        $admtugasdos = Tugasdos::get();
        return view('home',compact('permohonan','berita','tugas','kegiatan','undangan','tugasdos','admpermohonan','admundangan','admberita','admkegiatan','admtugas','admtugasdos'));
    }

    
}
