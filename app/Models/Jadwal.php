<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal_akademik';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = ['hari', 'kode_mk', 'id_ruang', 'id_gol'];

    public function matakuliah()
    {
        return $this->belongsTo(Matkul::class, 'kode_mk', 'kode_mk');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_gol');
    }
}
