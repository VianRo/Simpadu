
@extends('template.main')

@section('content')
<div class="container mt-5 bg-dark text-light rounded-4 py-4">
    <h2>Tambah Program Studi</h2>
    <form action="{{ route('prodi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Nama" class="form-label">Nama Prodi</label>
            <input type="text" class="form-control @error('Nama') is-invalid @enderror" id="Nama" name="Nama" value="{{ old('Nama') }}" required>
            @error('Nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Kaprodi" class="form-label">Kaprodi</label>
            <input type="text" class="form-control @error('Kaprodi') is-invalid @enderror" id="Kaprodi" name="Kaprodi" value="{{ old('Kaprodi') }}" required>
            @error('Kaprodi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control @error('Jurusan') is-invalid @enderror" id="Jurusan" name="Jurusan" value="{{ old('Jurusan') }}" required>
            @error('Jurusan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection