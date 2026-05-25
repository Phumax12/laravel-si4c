@extends('main')

@section('title', 'Tambah mahasiswa')

@section('content')

    <form action="{{ route('mahasiswa.store') }}" method="post">
        <div class="form-group mb-3">
            <label for="npm">npm</label>
            <input type="text" name="npm" class="form-control" value="{{ old('npm') }}">
            @error('npm')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="foto">foto</label>
            <input type="file" name="foto" class="form-control" value="{{ old('foto') }}">
            @error('foto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="prodi_id" class="form-label">prodi</label>
            <select class="form-control" id="prodi_id" name="prodi_id">
                <option value="">Pilih prodi</option>
                @foreach ($prodi as $p)
                <option value="{{ $p->id }}" {{ old('prodi_id') == $p->id ? 'selected' : '' }}>{{ $p->nama_prodi}}</option>
                    
                @endforeach
            </select>
            @error('prodi_id')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror
        <button type="submit" class="btn btn-primary mt-3">simpan</button>
    </form>
@endsection
