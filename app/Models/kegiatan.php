<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    protected $fillable = ['id_user','kode_surat','nama_mitra','alamat_mitra','anggota','tgl_kirim','keterangan','status'];
    protected $dates = ['tgl_kirim'];

}
