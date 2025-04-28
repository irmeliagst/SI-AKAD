<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    
    use HasFactory;
    protected $table = 'presensi_akademik   '; // nama tabel di database
    protected $fillable = [
        'nim', 'kode_mk', 'hari', 'tanggal', 'status_kehadiran'
    ];
}
