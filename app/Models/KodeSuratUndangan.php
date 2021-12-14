<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeSuratUndangan extends Model
{
    use HasFactory;

    protected $table = 'kode_surat_undangan';
    protected $fillable = ['id_surat','kode_surat'];
}
