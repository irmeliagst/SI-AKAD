<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Presensi extends Migration
{
    public function up(): void
    {
        // Tabel Golongan
        Schema::create('golongan', function (Blueprint $table) {
            $table->id('id_gol');
            $table->string('nama_gol', 100);
            $table->timestamps();
        });

        // Tabel Mahasiswa
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->string('nama', 100);
            $table->text('alamat')->nullable();
            $table->string('nohp', 20)->nullable();
            $table->integer('semester')->nullable();
            $table->unsignedBigInteger('id_gol')->nullable();
            $table->foreign('id_gol')->references('id_gol')->on('golongan')->onDelete('set null');
            $table->timestamps();
        });

        // Tabel Ruang
        Schema::create('ruang', function (Blueprint $table) {
            $table->id('id_ruang');
            $table->string('nama_ruang', 100);
            $table->timestamps();
        });

        // Tabel Matakuliah
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->string('kode_mk', 20)->primary();
            $table->string('nama_mk', 100);
            $table->integer('sks')->nullable();
            $table->integer('semester')->nullable();
            $table->timestamps();
        });

        // Tabel Dosen
        Schema::create('dosen', function (Blueprint $table) {
            $table->string('nip', 20)->primary();
            $table->string('nama', 100);
            $table->text('alamat')->nullable();
            $table->string('nohp', 20)->nullable();
            $table->timestamps();
        });

        // Tabel Pengampu
        Schema::create('pengampu', function (Blueprint $table) {
            $table->string('kode_mk', 20);
            $table->string('nip', 20);
            $table->primary(['kode_mk', 'nip']);
            $table->foreign('kode_mk')->references('kode_mk')->on('matakuliah')->onDelete('cascade');
            $table->foreign('nip')->references('nip')->on('dosen')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel Jadwal Akademik
        Schema::create('jadwal_akademik', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->string('hari', 20);
            $table->string('kode_mk', 20);
            $table->unsignedBigInteger('id_ruang');
            $table->unsignedBigInteger('id_gol');
            $table->foreign('kode_mk')->references('kode_mk')->on('matakuliah')->onDelete('cascade');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruang')->onDelete('cascade');
            $table->foreign('id_gol')->references('id_gol')->on('golongan')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel KRS
        Schema::create('krs', function (Blueprint $table) {
            $table->string('nim', 20);
            $table->string('kode_mk', 20);
            $table->primary(['nim', 'kode_mk']);
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('kode_mk')->references('kode_mk')->on('matakuliah')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel Presensi Akademik
        Schema::create('presensi_akademik', function (Blueprint $table) {
            $table->id('id_presensi');
            $table->string('hari', 20);
            $table->date('tanggal');
            $table->enum('status_kehadiran', ['Hadir', 'Izin', 'Sakit', 'Alfa']);
            $table->string('nim', 20);
            $table->string('kode_mk', 20);
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('kode_mk')->references('kode_mk')->on('matakuliah')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presensi_akademik');
        Schema::dropIfExists('krs');
        Schema::dropIfExists('jadwal_akademik');
        Schema::dropIfExists('pengampu');
        Schema::dropIfExists('dosen');
        Schema::dropIfExists('matakuliah');
        Schema::dropIfExists('ruang');
        Schema::dropIfExists('mahasiswa');
        Schema::dropIfExists('golongan');
    }
}
