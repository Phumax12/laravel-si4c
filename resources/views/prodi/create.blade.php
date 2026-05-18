@extends('main')

@section('title', 'Tambah periode')

@section('content')

    <form action="{{ route('prodi.store') }}" method="post">
        <div class="form-group mb-3">
            <label for="nama_prodi">nama prodi</label>
            <input type="text" name="nama_prodi" class="form-control" value="{{ old('nama_prodi') }}">
            @error('nama_prodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="singkatan">Singkatan</label>
            <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan') }}">
            @error('singkatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kaprodi">kaprodi</label>
            <input type="text" name="kaprodi" class="form-control" value="{{ old('kaprodi') }}">
            @error('kaprodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="fakultas_id" class="form-label">fakulta</label>
            <select class="form-control" id="fakultas_id" name="fakultas_id">
                <option value="">Pilih fakultas</option>
                @foreach ($fakultas as $f)
                <option value="{{ $f->id }}" {{ old('fakultas_id') == $f->id ? 'selected' : '' }}>{{ $f->nama}}</option>
                    
                @endforeach
            </select>
            @error('fakultas_id')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror
        <button type="submit" class="btn btn-primary mt-3">simpan</button>
    </form>
@endsection
