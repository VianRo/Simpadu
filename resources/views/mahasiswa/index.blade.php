@extends('template.main')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Data Mahasiswa</h1>

    <!-- Notifikasi -->
    @if (!empty($status) && $status == 'updated')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> Data berhasil diperbarui!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (!empty($status) && $status == 'error')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i> Terjadi kesalahan saat memperbarui data.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Daftar Mahasiswa</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" id="searchInput" class="form-control" placeholder="Cari Mahasiswa...">
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <button class="btn btn-success" id="exportBtn"><i class="fas fa-file-excel"></i> Export Excel</button>
                    <button class="btn btn-secondary" id="resetBtn"><i class="fas fa-undo"></i> Reset</button>
                </div>
            </div>
            <div class="mb-2 d-flex align-items-center gap-2">
                <span id="react-badge"></span>
                <span id="dataCount"></span>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="mahasiswaTable">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Nama Prodi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->NIM }}</td>
                            <td>{{ $m->Nama }}</td>
                            <td>{{ $m->Tanggal_lahir }}</td>
                            <td>{{ $m->Telp }}</td>
                            <td>{{ $m->Email }}</td>
                            <td>{{ $m->prodi->Nama }}</td>
                            <td>
                                <!-- Action buttons (edit/delete) bisa ditambahkan di sini -->
                                <a href="" class="btn btn-warning btn-sm">Edit</a>
                                <form action="" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <nav>
                <ul class="pagination justify-content-center" id="pagination"></ul>
            </nav>
        </div>
    </div>
</div>

@endsection