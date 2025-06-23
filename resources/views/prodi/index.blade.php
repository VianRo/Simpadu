
@extends('template.main')

@section('content')
<div class="container mt-5 bg-dark text-light rounded-4 py-4">
    <h1 class="text-center mb-4">Data Program Studi</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('prodi.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>

    <div class="card bg-secondary text-light">
        <div class="card-header bg-dark text-white">
            <h3 class="card-title">Daftar Prodi</h3>
        </div>
        <div class="card-body bg-dark text-light">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-dark">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kaprodi</th>
                            <th>Jurusan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodi as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->Nama }}</td>
                            <td>{{ $p->Kaprodi }}</td>
                            <td>{{ $p->Jurusan }}</td>
                            <td>
                                <a href="{{ route('prodi.edit', $p->Id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('prodi.destroy', $p->Id) }}" method="POST" style="display:inline;">
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
        </div>
    </div>
</div>
@endsection