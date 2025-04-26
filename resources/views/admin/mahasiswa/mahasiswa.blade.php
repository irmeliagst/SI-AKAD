@extends("template.layout")
@section("title", "Mahasiswa")
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h1 class="mb-4">Daftar Mahasiswa</h1>

    <div class="card">
        <div class="card-body">
            <div class="mt-4 mb-4">
                <!-- Button trigger modal -->
                <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#basicModal">
                    Add
                </button>

                <!-- Modal -->
                <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Add Mahasiswa</h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('mahasiswa.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" name="nim" class="form-control" placeholder="NIM" required>
                                                    <label>NIM</label>
                                                </div>
                                            </div>
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                                                    <label>Nama</label>
                                                </div>
                                            </div>
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                                                    <label>Alamat</label>
                                                </div>
                                            </div>
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="number" name="nohp" class="form-control" placeholder="No Hp" required>
                                                    <label>No Hp</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="number" name="semester" class="form-control" placeholder="Semester" required>
                                                    <label>Semester</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <select name="golongan" id="golongan" class="form-select">
                                                        <option value="">-- Pilih GOLONGAN --</option>
                                                        @foreach($golongan as $g)
                                                        <option value="{{ $g->id_gol }}">{{ $g->nama_gol }}</option> <!-- Use the name for display -->
                                                        @endforeach
                                                    </select>
                                                    <label for="golongan">Golongan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Semester</th>
                            <th>Golongan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswa as $index => $item)
                        <div class="modal fade" id="EditModal{{ $item->nim }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Add Mahasiswa</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('mahasiswa.update', $item->nim) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-floating form-floating-outline">
                                                            <input type="text" name="nim" class="form-control" placeholder="NIM" value="{{ $item->nim }}" required>
                                                            <label>NIM</label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-floating form-floating-outline">
                                                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $item->nama }}" required>
                                                            <label>Nama</label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-floating form-floating-outline">
                                                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $item->alamat }}" required>
                                                            <label>Alamat</label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-floating form-floating-outline">
                                                            <input type="number" name="nohp" class="form-control" placeholder="No Hp" value="{{ $item->nohp }}" required>
                                                            <label>No Hp</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-floating form-floating-outline">
                                                            <input type="number" name="semester" class="form-control" placeholder="Semester" value="{{ $item->semester }}" required>
                                                            <label>Semester</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-6 mt-2">
                                                        <div class="form-floating form-floating-outline">
                                                            <select name="id_gol" id="is_gol" class="form-select">
                                                                <option value="">-- Pilih GOLONGAN --</option>
                                                                @foreach($golongan as $g)
                                                                <option value="{{ $g->id_gol }}">{{ $g->nama_gol }}</option> <!-- Use the name for display -->
                                                                @endforeach
                                                            </select>
                                                            <label for="id_gol">Golongan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->nohp }}</td>
                            <td>{{ $item->semester }}</td>
                            <td>{{ optional($item->golongan)->nama_gol ?? '-' }}</td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#EditModal{{$item->nim }}">
                                    Edit
                                </button>
                                <form action="{{ route('mahasiswa.destroy', $item->nim) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @if($mahasiswa->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data mahasiswa.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection