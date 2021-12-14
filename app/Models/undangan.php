<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class undangan extends Model
{
    use HasFactory;

    protected $table = 'undangan';
    protected $fillable = ['id_user','nama_mitra','alamat_mitra','anggota','tgl_kirim','keterangan'];
    protected $dates = ['tgl_kirim'];
}
