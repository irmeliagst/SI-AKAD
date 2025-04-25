@extends('mahasiswa.template.layout')

@section('content')
<div class="container mt-4">
  <h2 class="mb-4">Presensi Hari Ini</h2>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @forelse($jadwal as $index => $item)
    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">{{ $item->matakuliah->nama_mk ?? 'Mata Kuliah Tidak Ditemukan' }}</h5>
        <p class="card-text mb-2">
          <strong>Ruang:</strong> {{ $item->ruang->nama_ruang ?? '-' }}<br>
          <strong>Golongan:</strong> {{ $item->golongan->nama_gol ?? '-' }}<br>
          <strong>Hari:</strong> {{ $item->hari }}
        </p>

        <form action="{{ route('presensi.store') }}" method="POST" class="row g-2 align-items-end">
          @csrf
          <input type="hidden" name="nim" value="{{ auth()->user()->nim }}">
          <input type="hidden" name="kode_mk" value="{{ $item->kode_mk }}">
          <input type="hidden" name="hari" value="{{ $item->hari }}">
          <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">

          <div class="col-md-4">
            <label for="status_{{ $index }}" class="form-label">Status Kehadiran</label>
            <select name="status_kehadiran" id="status_{{ $index }}" class="form-select" required>
              <option value="">-- Pilih --</option>
              <option value="Hadir">Hadir</option>
              <option value="Izin">Izin</option>
              <option value="Sakit">Sakit</option>
              <option value="Alfa">Alfa</option>
            </select>
          </div>

          <div class="col-auto mt-4">
            <button type="submit" class="btn btn-success">Presensi</button>
          </div>
        </form>
      </div>
    </div>
  @empty
    <div class="alert alert-warning">
      Tidak ada jadwal presensi untuk hari ini.
    </div>
  @endforelse
</div>
@endsection
