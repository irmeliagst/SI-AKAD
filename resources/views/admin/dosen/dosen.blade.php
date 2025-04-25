@extends("template.layout")
@section("title", "Dosen")
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h1 class="mb-4">Daftar Dosen</h1>

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
                                <h5 class="modal-title" id="exampleModalLabel1">Add Dosen</h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formAddDataDosen" action="{{route('dosen.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col mb-6 mt-2">
                                            <div class="form-floating form-floating-outline">
                                                <input name="nip" type="text" id="nip" class="form-control" placeholder="Enter NIP" />
                                                <label for="nameBasic">NIP</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6 mt-2">
                                            <div class="form-floating form-floating-outline">
                                                <input name="nama" type="text" id="nama" class="form-control" placeholder="Enter Nama" />
                                                <label for="nameBasic">Nama</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6 mt-2">
                                            <div class="form-floating form-floating-outline">
                                                <input name="alamat" type="text" id="alamat" class="form-control" placeholder="Enter Alamat" />
                                                <label for="nameBasic">Alamat</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col mb-2">
                                            <div class="form-floating form-floating-outline">
                                                <input
                                                    name="nohp"
                                                    type="nohp"
                                                    id="nohp"
                                                    class="form-control"
                                                    placeholder="082x xxxx xxx" />
                                                <label for="nohp">No Telepon</label>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button> -->
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
                            <th>NIP</th>
                            <th>Nama Dosen</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dosen as $index => $item)
                        <div class="modal fade" id="EditModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Add Dosen</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('dosen.update', $item->nip) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col mb-6 mt-2">
                                                    <div class="form-floating form-floating-outline">
                                                        <input name="nip" type="text" id="nip" class="form-control" placeholder="Enter NIP" value="{{ $item->nip }}" />
                                                        <label for="nameBasic">NIP</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-6 mt-2">
                                                    <div class="form-floating form-floating-outline">
                                                        <input name="nama" type="text" id="nama" class="form-control" placeholder="Enter Nama" value="{{ $item->nama }}" />
                                                        <label for="nameBasic">Nama</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-6 mt-2">
                                                    <div class="form-floating form-floating-outline">
                                                        <input name="alamat" type="text" id="alamat" class="form-control" placeholder="Enter Alamat" value="{{ $item->alamat }}" />
                                                        <label for="nameBasic">Alamat</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-4">
                                                <div class="col mb-2">
                                                    <div class="form-floating form-floating-outline">
                                                        <input
                                                            name="nohp"
                                                            type="nohp"
                                                            id="nohp"
                                                            class="form-control"
                                                            placeholder="082x xxxx xxx"
                                                            value="{{ $item->nohp }}" />
                                                        <label for="nohp">No Telepon</label>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button> -->
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat ?? '-' }}</td>
                            <td>{{ $item->nohp ?? '-' }}</td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#EditModal{{ $item->id }}">
                                    Edit
                                </button>
                                <form action="{{ route('dosen.destroy', $item->nip) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @if($dosen->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data dosen.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection