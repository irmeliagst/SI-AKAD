@extends("template.layout")
@section("title", "Ruang")
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h1 class="mb-4">Daftar Ruang</h1>

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
                                <h5 class="modal-title" id="exampleModalLabel1">Add Ruang</h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('ruang.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" name="id_ruang" class="form-control" placeholder="ID Ruang" required>
                                                    <label>Id Ruang</label>
                                                </div>
                                            </div>
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" name="nama_ruang" class="form-control" placeholder="Nama Ruang" required>
                                                    <label>Nama Ruang</label>
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
                                <th>Nama Ruang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ruang as $index => $item)
                            <div class="modal fade" id="EditModal{{ $item->id_ruang }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Add Ruang</h5>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('ruang.update', $item->id_ruang) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" name="id_ruang" class="form-control" placeholder="ID Ruang" value="{{ $item->id_ruang }}" required>
                                                                <label>Id Ruang</label>
                                                            </div>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" name="nama_ruang" class="form-control" placeholder="Nama Ruang" value="{{ $item->nama_ruang }}" required>
                                                                <label>Nama Ruang</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_ruang }}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#EditModal{{ $item->id_ruang }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('ruang.destroy', $item->id_ruang) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus ruang ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            @if($ruang->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data ruang.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection