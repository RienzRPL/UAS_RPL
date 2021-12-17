<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    protected $fillable = ['id_user','nama_mitra','alamat_mitra','tgl_kirim','keterangan'];
    protected $dates = ['tgl_kirim'];
}
