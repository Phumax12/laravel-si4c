@extends('main')

@section('title','periode')

@section('content')
    
<a href="{{ route('periode.create') }}" class="btn btn-primary mb-3">Tambah Periode</a>
<h1>Data Periode</h1>

<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Tahun akademic</th>
        <th>Kode Semester</th>
    </tr>
    @foreach ($result as $key => $item )
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $item->tahun_akademic }}</td>
        <td>{{ $item->kode_smt }}</td>
    </tr>
        
    @endforeach
</table>
@endsection
    
