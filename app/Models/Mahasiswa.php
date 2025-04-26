<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Authenticatable
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim'; // Ganti id ke nim

    public $incrementing = false; // Jika nim bukan auto-increment
    protected $keyType = 'string'; // Jika nim berupa string
    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'nohp',
        'semester',
        'golongan',
    ];
}
