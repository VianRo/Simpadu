@extends('template.main')

@section('content')
<div class="container mt-5">
    <h2>Tambah Mahasiswa</h2>
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="NIM" class="form-label">NIM</label>
            <input type="text" class="form-control @error('NIM') is-invalid @enderror" 
                id="NIM" name="NIM" value="{{ old('NIM') }}" required>
            @error('NIM')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('Nama') is-invalid @enderror" 
                id="Nama" name="Nama" value="{{ old('Nama') }}" required>
            @error('Nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('Tanggal_lahir') is-invalid @enderror" 
                id="Tanggal_lahir" name="Tanggal_lahir" value="{{ old('Tanggal_lahir') }}" required>
            @error('Tanggal_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Telp" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control @error('Telp') is-invalid @enderror" 
                id="Telp" name="Telp" value="{{ old('Telp') }}" required>
            @error('Telp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control @error('Email') is-invalid @enderror" 
                id="Email" name="Email" value="{{ old('Email') }}" required>
            @error('Email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control @error('Password') is-invalid @enderror" 
                id="Password" name="Password" required>
            @error('Password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Id" class="form-label">Program Studi</label>
            <select class="form-select @error('Id') is-invalid @enderror" 
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
            <input type="file" class="form-control @error('Foto') is-invalid @enderror" 
                id="Foto" name="Foto" accept="image/*" required>
            @error('Foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection