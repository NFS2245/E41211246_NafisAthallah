<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    use HasFactory;
    protected $table = 'pengalaman_kerja';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_saham', 'kode_saham', 'tahun_masuk', 'tahun_keluar'
    ];
}