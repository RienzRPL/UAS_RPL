<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeSuratTugas extends Model
{
    use HasFactory;

    protected $table = 'kode_surat_tugas';
    protected $fillable = ['id_surat','kode_surat'];
}
