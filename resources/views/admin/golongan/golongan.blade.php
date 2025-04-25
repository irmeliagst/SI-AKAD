@extends("template.layout")
@section("title", "Golongan")
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h1 class="mb-4">Daftar Golongan</h1>

    <a href="{{ route('golongan.create') }}" class="btn btn-success mb-3">+ Tambah Golongan</a>

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
                                <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-6 mt-2">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                                            <label for="nameBasic">Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-4">
                                    <div class="col mb-2">
                                        <div class="form-floating form-floating-outline">
                                            <input
                                                type="email"
                                                id="emailBasic"
                                                class="form-control"
                                                placeholder="xxxx@xxx.xx" />
                                            <label for="emailBasic">Email</label>
                                        </div>
                                    </div>
                                    <div class="col mb-2">
                                        <div class="form-floating form-floating-outline">
                                            <input type="date" id="dobBasic" class="form-control" />
                                            <label for="dobBasic">DOB</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">Save changes</button>
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
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_gol }}</td>
                            <td>
                                <a href="{{ route('golongan.edit', $item->id_gol) }}" class="btn btn-sm btn-primary">Edit</a>
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