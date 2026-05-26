@extends('main')

@section('title','edit mahasiswa')

@section('content')

<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="post" enctype="multipart/form-data">
    
    @method('PUT')
    @csrf
    <div class="form-group mb-3">
        <label for="npm">npm</label>
        <input type="text" name="npm" class="form-control" value="{{ old ('npm') ?? $mahasiswa->npm }}">
        @error('npm')
        <div class="text-danger">{{ $message }}</div>    
        @enderror
    </div>
    <div class="form-group">
        <label for="nama">nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old ('nama') ?? $mahasiswa->nama }}">
        @error('nama')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    <div class="form-group">
        <label for="foto">foto</label>
        <input type="file" name="foto" class="form-control"value="{{ old ('foto') ?? $mahasiswa->foto }}">
        @error('foto')
        <div class="text-danger">{{ $message }}</div>
        @enderror
       @if ($mahasiswa->foto)
                <img src="{{ asset('storage/'.$mahasiswa->foto) }}" alt="foto" width="50">
            @else
            <span class="text-muted">tidak ada foto</span>
                
            @endif
    <div class="form-group">
       <label for="prodi_id" class="form-label">prodi</label>
            <select class="form-control" id="prodi_id" name="prodi_id">
                <option value="">Pilih prodi</option>
                @foreach ($prodis as $p)
                <option value="{{ $p->id }}" {{ old('prodi_id') == $p->id ? 'selected' : '' }}>{{ $p->nama_prodi}}</option>
                    
                @endforeach
            </select>
            @error('prodi_id')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror
    <button type="submit" class="btn btn-primary mt-3">simpan</button>
    </form>        
@endsection