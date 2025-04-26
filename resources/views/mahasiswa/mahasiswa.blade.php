@extends('mahasiswa.template.layout')

@section('content')
<div class="container mt-5">
  <h2 class="mb-4 fw-bold text-primary">Presensi Hari Ini</h2>

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @forelse($jadwal as $index => $item)
    <div class="card mb-4 shadow-sm border-0">
      <div class="card-body">
        <h5 class="card-title text-dark mb-3">
          {{ $item->matakuliah->nama_mk ?? 'Mata Kuliah Tidak Ditemukan' }}
        </h5>

        <ul class="list-unstyled mb-3 text-muted">
          <li><strong>Ruang:</strong> {{ $item->ruang->nama_ruang ?? '-' }}</li>
          <li><strong>Golongan:</strong> {{ $item->golongan->nama_gol ?? '-' }}</li>
          <li><strong>Hari:</strong> {{ $item->hari }}</li>
        </ul>

        <form action="{{ route('presensi.store') }}" method="POST" class="row g-3 align-items-center">
          @csrf
          <input type="hidden" name="nim" value="{{ auth()->guard('mahasiswa')->user()->nim }}">
          <input type="hidden" name="kode_mk" value="{{ $item->kode_mk }}">
          <input type="hidden" name="hari" value="{{ $item->hari }}">
          <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">

          <div class="col-md-6 col-sm-12">
            <label for="status_{{ $index }}" class="form-label">Status Kehadiran</label>
            <select name="status_kehadiran" id="status_{{ $index }}" class="form-select" required>
              <option value="">-- Pilih --</option>
              <option value="Hadir">Hadir</option>
              <option value="Izin">Izin</option>
              <option value="Sakit">Sakit</option>
              <option value="Alfa">Alfa</option>
            </select>
          </div>

          <div class="col-md-3 col-sm-12 d-grid mt-4 mt-md-0">
            <button type="submit" class="btn btn-success">
              <i class="bi bi-check-circle me-1"></i> Presensi
            </button>
          </div>
        </form>
      </div>
    </div>
  @empty
    <div class="alert alert-warning text-center">
      Tidak ada jadwal presensi untuk hari ini.
    </div>
  @endforelse
</div>
@endsection
