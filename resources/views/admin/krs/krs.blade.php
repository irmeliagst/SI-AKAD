@extends("template.layout")
@section("title", "Krs")
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h1 class="mb-4">Daftar KRS Mahasiswa</h1>

    <div class="card">
        <div class="card-body">
            <div class="mt-4 mb-4">
                <!-- Button trigger modal -->
                <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#addKrsModal">
                    Add
                </button>

                <!-- Modal for Adding KRS -->
                <div class="modal fade" id="addKrsModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Add KRS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('krs.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- Input NIM -->
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <select name="nim" id="nim" class="form-control" required>
                                                        <option value="">-- Pilih NIM --</option>
                                                        @foreach($mahasiswa as $mhs)
                                                        <option value="{{ $mhs->nim }}" data-nama="{{ $mhs->nama }}">{{ $mhs->nim }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label>NIM</label>
                                                </div>
                                            </div>
                                            <!-- Input Nama Mahasiswa -->
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required readonly>
                                                    <label>Nama</label>
                                                </div>
                                            </div>
                                            <!-- Input Kode MK -->
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <select name="kode_mk" id="kode_mk" class="form-control" required>
                                                        <option value="">-- Pilih Kode MK --</option>
                                                        @foreach($mataKuliah as $mk)
                                                        <option value="{{ $mk->kode_mk }}" data-nama="{{ $mk->nama_mk }}">{{ $mk->kode_mk }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label>Kode Mata Kuliah</label>
                                                </div>
                                            </div>
                                            <!-- Input Nama MK -->
                                            <div class="col mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" name="nama_mk" id="nama_mk" class="form-control" placeholder="Nama MK" required readonly>
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

            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($krs as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->mahasiswa->nama ?? '-' }}</td>
                            <td>{{ $item->kode_mk }}</td>
                            <td>{{ $item->matakuliah->nama_mk ?? '-' }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editKrsModal{{ $item->nim }}">
                                    Edit
                                </button>

                                <!-- Modal for Editing KRS -->
                                <div class="modal fade" id="editKrsModal{{ $item->nim }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit KRS</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('krs.update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="nim" value="{{ $item->nim }}">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <div class="form-floating form-floating-outline">
                                                                    <input type="text" name="nim" class="form-control" value="{{ $item->nim }}" readonly>
                                                                    <label>NIM</label>
                                                                </div>
                                                            </div>
                                                            <div class="col mb-3">
                                                                <div class="form-floating form-floating-outline">
                                                                    <input type="text" name="nama" class="form-control" value="{{ $item->mahasiswa->nama }}" readonly>
                                                                    <label>Nama</label>
                                                                </div>
                                                            </div>
                                                            <div class="col mb-3">
                                                                <div class="form-floating form-floating-outline">
                                                                    <input type="text" name="kode_mk" class="form-control" value="{{ $item->kode_mk }}" readonly>
                                                                    <label>Kode Mata Kuliah</label>
                                                                </div>
                                                            </div>
                                                            <div class="col mb-3">
                                                                <div class="form-floating form-floating-outline">
                                                                    <input type="text" name="nama_mk" class="form-control" value="{{ $item->matakuliah->nama_mk }}" readonly>
                                                                    <label>Nama Mata Kuliah</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <div class="form-floating form-floating-outline">
                                                                    <input type="number" name="sks" class="form-control" value="{{ $item->sks }}" required>
                                                                    <label>SKS</label>
                                                                </div>
                                                            </div>
                                                            <div class="col mb-3">
                                                                <div class="form-floating form-floating-outline">
                                                                    <input type="number" name="semester" class="form-control" value="{{ $item->semester }}" required>
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
                            </td>
                        </tr>
                        @endforeach

                        @if($krs->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data KRS.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ketika NIM dipilih
        document.getElementById('nim').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var namaMahasiswa = selectedOption.getAttribute('data-nama');
            document.getElementById('nama').value = namaMahasiswa;
        });

        // Ketika Kode MK dipilih
        document.getElementById('kode_mk').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var namaMk = selectedOption.getAttribute('data-nama');
            document.getElementById('nama_mk').value = namaMk;
        });
    });
</script>
@endsection
@endsection
