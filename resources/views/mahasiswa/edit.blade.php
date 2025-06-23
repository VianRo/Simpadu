@extends('template.main')

@section('content')
<div class="container mt-5 bg-dark text-light rounded-4 py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg border-0 bg-secondary text-light rounded-4">
                <div class="card-header bg-dark text-white rounded-top-4">
                    <h3 class="mb-0">Edit Mahasiswa</h3>
                </div>
                <div class="card-body p-4 bg-dark text-light">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('mahasiswa.update', $mahasiswa->NIM) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="Nama" class="form-label fw-semibold">Nama</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary @error('Nama') is-invalid @enderror"
                                id="Nama" name="Nama" value="{{ old('Nama', $mahasiswa->Nama) }}" required>
                            @error('Nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                            <input type="date" class="form-control bg-dark text-light border-secondary @error('Tanggal_lahir') is-invalid @enderror"
                                id="Tanggal_lahir" name="Tanggal_lahir" value="{{ old('Tanggal_lahir', $mahasiswa->Tanggal_lahir) }}" required>
                            @error('Tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Telp" class="form-label fw-semibold">Nomor Telepon</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary @error('Telp') is-invalid @enderror"
                                id="Telp" name="Telp" value="{{ old('Telp', $mahasiswa->Telp) }}" required>
                            @error('Telp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control bg-dark text-light border-secondary @error('Email') is-invalid @enderror"
                                id="Email" name="Email" value="{{ old('Email', $mahasiswa->Email) }}" required>
                            @error('Email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label fw-semibold">Password <span class="text-muted">(Kosongkan jika tidak diubah)</span></label>
                            <input type="password" class="form-control bg-dark text-light border-secondary @error('Password') is-invalid @enderror"
                                id="Password" name="Password">
                            @error('Password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Id" class="form-label fw-semibold">Program Studi</label>
                            <select class="form-select bg-dark text-light border-secondary @error('Id') is-invalid @enderror"
                                id="Id" name="Id" required>
                                <option value="">Pilih Program Studi</option>
                                @foreach($prodi as $p)
                                    <option value="{{ $p->Id }}" {{ old('Id', $mahasiswa->Id) == $p->Id ? 'selected' : '' }}>
                                        {{ $p->Nama }} - {{ $p->Jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Foto" class="form-label fw-semibold">Foto <span class="text-muted">(Kosongkan jika tidak diubah)</span></label>
                            <input type="file" class="form-control bg-dark text-light border-secondary @error('Foto') is-invalid @enderror"
                                id="Foto" name="Foto" accept="image/*">
                            @error('Foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            @if($mahasiswa->Foto)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $mahasiswa->Foto) }}" width="100" class="rounded shadow-sm border">
                                </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-success px-4">Update</button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary px-4">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection