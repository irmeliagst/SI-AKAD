<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $primaryKey = 'nip';
    public $incrementing = false; // karena primary key bukan auto-increment
    protected $keyType = 'string';

    protected $fillable = ['nip', 'nama', 'alamat', 'nohp'];
}
