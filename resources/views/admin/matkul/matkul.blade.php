@extends("template.layout")
@section("title", "Mata Kuliah")
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h1 class="mb-4">Daftar Mata Kuliah</h1>

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
                                <h5 class="modal-title" id="exampleModalLabel1">Add Mata Kuliah</h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('matkul.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" name="kode_mk" class="form-control" placeholder="Kode MK" required>
                                                    <label>Kode MK</label>
                                                </div>
                                            </div>
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" name="nama_mk" class="form-control" placeholder="Nama MK" required>
                                                    <label>Nama Mata Kuliah</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="number" name="sks" class="form-control" placeholder="SKS" required>
                                                    <label>SKS</label>
                                                </div>
                                            </div>
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="number" name="semester" class="form-control" placeholder="Semester" required>
                                                    <label>Semester</label>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Kode MK</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matakuliah as $index => $item)
                            <div class="modal fade" id="EditModal{{ $item->kode_mk }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Edit Matkul</h5>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('matkul.update', $item->kode_mk) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" name="kode_mk" class="form-control" placeholder="Kode MK" required value="{{ $item->kode_mk }}">
                                                                <label>Kode MK</label>
                                                            </div>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" name="nama_mk" class="form-control" placeholder="Nama MK" required value="{{ $item->nama_mk }}">
                                                                <label>Nama Mata Kuliah</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="number" name="sks" class="form-control" placeholder="SKS" required value="{{ $item->sks }}">
                                                                <label>SKS</label>
                                                            </div>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="number" name="semester" class="form-control" placeholder="Semester" required value="{{ $item->semester }}">
                                                                <label>Semester</label>
                                                            </div>
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
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->kode_mk }}</td>
                                <td>{{ $item->nama_mk }}</td>
                                <td>{{ $item->sks }}</td>
                                <td>{{ $item->semester }}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#EditModal{{ $item->kode_mk }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('matkul.destroy', $item->kode_mk) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            @if($matakuliah->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data mata kuliah.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection