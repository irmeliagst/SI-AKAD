@extends("template.layout")
@section("title", "Golongan")
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h1 class="mb-4">Daftar Golongan</h1>
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
                                <h5 class="modal-title" id="exampleModalLabel1">Add Golongan</h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('golongan.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="number" name="id_gol" class="form-control" placeholder="Id Golongan" required>

                                                    <label>ID Golongan</label>
                                                </div>
                                            </div>
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" name="nama_gol" class="form-control" placeholder="Golongan" required>
                                                    <label>Golongan</label>
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
                            <th>Nama Golongan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($golongan as $index => $item)
                        <div class="modal fade" id="EditModal{{ $item->id_gol }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Edit Golongan</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('golongan.update', $item->id_gol) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-floating form-floating-outline">
                                                            <input type="number" name="id_gol" class="form-control" placeholder="Id Golongan" value="{{ $item->id_gol }}" required>
                                                            <label>ID Golongan</label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-floating form-floating-outline">
                                                            <input type="text" name="nama_gol" class="form-control" placeholder="Nama Gol" value="{{ $item->nama_gol }}" required>
                                                            <label>Golongan</label>
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
                <td>{{ $item->nama_gol }}</td>
                <td>
                    <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#EditModal{{ $item->id_gol }}">
                        Edit
                    </button>
                    <form action="{{ route('golongan.destroy', $item->id_gol) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach

            @if($golongan->isEmpty())
            <tr>
                <td colspan="3" class="text-center">Tidak ada data golongan.</td>
            </tr>
            @endif
            </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection