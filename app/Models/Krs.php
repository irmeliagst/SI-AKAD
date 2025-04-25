<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;
    protected $table = 'krs';
    public $incrementing = false;
    protected $primaryKey = null;
    protected $keyType = 'string';
    protected $fillable = ['nim', 'kode_mk'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matkul::class, 'kode_mk', 'kode_mk');
    }
}
