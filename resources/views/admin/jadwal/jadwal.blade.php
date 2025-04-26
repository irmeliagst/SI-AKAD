@extends("template.layout")
@section("title", "Jadwal")
@section("content")
<div class="container-xxl flex-grow-1 container-p-y">
    <h1 class="mb-4">Jadwal Akademik</h1>

    <div class="card">
        <div class="card-body">
            <div class="mt-4 mb-4">
                <button type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#basicModal">
                    Add</button>

                <!-- Modal Add -->
                <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Add Jadwal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formAddDataJadwal" action="{{ route('jadwal.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col mb-6 mt-2">
                                            <div class="form-floating form-floating-outline">
                                                <input name="hari" type="text" id="hari" class="form-control" placeholder="Hari" />
                                                <label for="nameBasic">Hari</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col mb-6 mt-2">
                                            <div class="form-floating form-floating-outline">
                                                <select name="kode_mk" id="kode_mk" class="form-select">
                                                    <option value="">-- Pilih Mata Kuliah --</option>
                                                    @foreach($matkul as $mk)
                                                    <option value="{{ $mk->kode_mk }}">{{ $mk->nama_mk }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="kode_mk">Nama Mata Kuliah</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col mb-6 mt-2">
                                            <div class="form-floating form-floating-outline">
                                                <select name="id_ruang" id="id_ruang" class="form-select">
                                                    <option value="">-- Pilih Ruang --</option>
                                                    @foreach($ruang as $r)
                                                    <option value="{{ $r->id_ruang }}">{{ $r->nama_ruang }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="id_ruang">Ruang</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col mb-6 mt-2">
                                            <div class="form-floating form-floating-outline">
                                                <select name="id_gol" id="id_gol" class="form-select">
                                                    <option value="">-- Pilih Golongan --</option>
                                                    @foreach($golongan as $g)
                                                    <option value="{{ $g->id_gol }}">{{ $g->nama_gol }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="id_gol">Golongan</label>
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

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Hari</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Nama Mata Kuliah</th>
                                <th>Ruang</th>
                                <th>Golongan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwal as $index => $item)
                            <!-- Modal Edit -->
                            <div class="modal fade" id="EditModal{{ $item->id_jadwal }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Edit Jadwal</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('jadwal.update', $item->id_jadwal) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col mb-6 mt-2">
                                                        <div class="form-floating form-floating-outline">
                                                            <input name="hari" type="text" id="hari" class="form-control" placeholder="Hari" value="{{ $item->hari }}" />
                                                            <label for="nameBasic">Hari</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col mb-6 mt-2">
                                                        <div class="form-floating form-floating-outline">
                                                            <select name="kode_mk" id="kode_mk" class="form-select">
                                                                <option value="">-- Pilih Kode Mata Kuliah --</option>
                                                                @foreach($matkul as $m)
                                                                <option value="{{ $m->kode_mk }}" {{ $item->kode_mk == $m->kode_mk ? 'selected' : '' }}>{{ $m->nama_mk }}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="kode_mk">Kode Mata Kuliah</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col mb-6 mt-2">
                                                        <div class="form-floating form-floating-outline">
                                                            <select name="id_ruang" id="id_ruang" class="form-select">
                                                                <option value="">-- Pilih Ruang --</option>
                                                                @foreach($ruang as $r)
                                                                <option value="{{ $r->id_ruang }}" {{ $item->id_ruang == $r->id_ruang ? 'selected' : '' }}>{{ $r->nama_ruang }}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="id_ruang">Ruang</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col mb-6 mt-2">
                                                        <div class="form-floating form-floating-outline">
                                                            <select name="id_gol" id="id_gol" class="form-select">
                                                                <option value="">-- Pilih Golongan --</option>
                                                                @foreach($golongan as $g)
                                                                <option value="{{ $g->id_gol }}" {{ $item->id_gol == $g->id_gol ? 'selected' : '' }}>{{ $g->nama_gol }}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="id_gol">Golongan</label>
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
                            <!-- Tabel Jadwal -->
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->hari }}</td>
                                <td>{{ $item->kode_mk }}</td>
                                <td>{{ $item->matakuliah->nama_mk ?? '-' }}</td>
                                <td>{{ $item->ruang->nama_ruang ?? '-' }}</td>
                                <td>{{ $item->golongan->nama_gol ?? '-' }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button type="button"
                                        class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#EditModal{{ $item->id_jadwal }}">
                                        Edit</button>
                                    <form action="{{ route('jadwal.destroy', $item->id_jadwal) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            @if($jadwal->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data jadwal.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
