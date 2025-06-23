@extends('template.main')

@section('content')
<div class="container mt-5 bg-dark text-light rounded-4 py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 bg-secondary text-light">
                <div class="card-header bg-dark text-white d-flex align-items-center">
                    <i class="bi bi-person-plus-fill me-2"></i>
                    <h4 class="mb-0">Tambah Mahasiswa</h4>
                </div>
                <div class="card-body bg-dark text-light">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="NIM" class="form-label">NIM</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary @error('NIM') is-invalid @enderror" 
                                id="NIM" name="NIM" value="{{ old('NIM') }}" required>
                            @error('NIM')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary @error('Nama') is-invalid @enderror" 
                                id="Nama" name="Nama" value="{{ old('Nama') }}" required>
                            @error('Nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control bg-dark text-light border-secondary @error('Tanggal_lahir') is-invalid @enderror" 
                                id="Tanggal_lahir" name="Tanggal_lahir" value="{{ old('Tanggal_lahir') }}" required>
                            @error('Tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Telp" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary @error('Telp') is-invalid @enderror" 
                                id="Telp" name="Telp" value="{{ old('Telp') }}" required>
                            @error('Telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control bg-dark text-light border-secondary @error('Email') is-invalid @enderror" 
                                id="Email" name="Email" value="{{ old('Email') }}" required>
                            @error('Email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control bg-dark text-light border-secondary @error('Password') is-invalid @enderror" 
                                id="Password" name="Password" required>
                            @error('Password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Id" class="form-label">Program Studi</label>
                            <select class="form-select bg-dark text-light border-secondary @error('Id') is-invalid @enderror" 
                                id="Id" name="Id" required>
                                <option value="">Pilih Program Studi</option>
                                @foreach($prodi as $p)
                                    <option value="{{ $p->Id }}" {{ old('Id') == $p->Id ? 'selected' : '' }}>
                                        {{ $p->Nama }} - {{ $p->Jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Foto" class="form-label">Foto</label>
                            <input type="file" class="form-control bg-dark text-light border-secondary @error('Foto') is-invalid @enderror" 
                                id="Foto" name="Foto" accept="image/*" required>
                            @error('Foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4 shadow-sm">
                                <i class="bi bi-save me-1"></i> Simpan
                            </button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary px-4 shadow-sm">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
@endsection