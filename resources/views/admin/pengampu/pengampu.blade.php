@extends("template.layout")
@section("title", "Pengampu")
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h1 class="mb-4">Daftar Pengampu</h1>

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
                                <h5 class="modal-title" id="exampleModalLabel1">Add Pengampu</h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('pengampu.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col mb-6 mt-2">
                                            <div class="form-floating form-floating-outline">
                                                <select name="kode_mk" id="kode_mk" class="form-select">
                                                    <option value="">-- Pilih Kode Mata Kuliah --</option>
                                                    @foreach($matkul as $m)
                                                    <option value="{{ $m->kode_mk }}">{{ $m->kode_mk }} - {{ $m->nama_mk }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="kode_mk">Pengampu</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6 mt-2">
                                            <div class="form-floating form-floating-outline">
                                                <select name="nip" id="nip" class="form-select">
                                                    <option value="">-- Pilih NIP --</option>
                                                    @foreach($dosen as $d)
                                                    <option value="{{ $d->nip }}">{{ $d->nip }} - {{ $d->nama_dosen }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="nip">Pengampu</label>
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
                            <th>Kode Mata Kuliah</th>
                            <th>NIP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengampu as $index => $item)
                        <div class="modal fade" id="EditModal{{ $item->kode_mk }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Add Pengampu</h5>
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
                                            <div class="row">
                                                <div class="col mb-6 mt-2">
                                                    <div class="form-floating form-floating-outline">
                                                        <select name="kode_mk" id="kode_mk" class="form-select">
                                                            <option value="">-- Pilih Kode Mata Kuliah --</option>
                                                            @foreach($pengampu as $p)
                                                            <option value="{{ $p->kode_mk }}">{{ $p->nip }}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="kode_mk">Pengampu</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col mb-6 mt-2">
                                                    <div class="form-floating form-floating-outline">
                                                        <select name="nip" id="nip" class="form-select">
                                                            <option value="">-- Pilih NIP --</option>
                                                            @foreach($pengampu as $p)
                                                            <option value="{{ $p->nip }}">{{ $p->kode_mk }}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="nip">Pengampu</label>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->telepon }}</td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#basicModal">
                                    Edit
                                </button>
                                <form action="{{ route('pengampu.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @if($pengampu->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data pengampu.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection