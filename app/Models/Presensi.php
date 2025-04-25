<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'presensi_akademik';
    protected $primaryKey = 'id_presensi';
    protected $fillable = [
        'hari', 'tanggal', 'status_kehadiran', 'nim', 'kode_mk'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matkul::class, 'kode_mk', 'kode_mk');
    }
}
