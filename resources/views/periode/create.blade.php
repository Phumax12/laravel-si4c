@extends('main')

@section('title','Tambah periode')

@section('content')

<form action="{{ route('periode.store') }}" method="post">
    <div class="form-group mb-3">
        <label for="tahun_akademic">Tahun Akademic</label>
        <input type="text" name="tahun_akademic" class="form-control" value="{{ old ('tahun_akademic') }}">
        @error('tahun_akademic')
        <div class="text-danger">{{ $message }}</div>    
        @enderror
    </div>
    <div class="form-group">
        <label for="kode_smt">Kode Semester</label>
        <input type="text" name="kode_smt" class="form-control" value="{{ old ('kode_smt') }}">
        @error('kode_smt')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    <button type="submit" class="btn btn-primary mt-3">simpan</button>
    </form>        
@endsection