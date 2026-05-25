@extends('main')

@section('title', 'Mahasiswa')
    


@section('content')
<a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah mahasiswa</a>
@session('success')
    <div class="alert alert-success">{{$value}}</div>
@endsession
<h1>Data mahasiswa</h1>
<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>npm</th>
        <th>nama</th>
        <th>prodi</th>
        <th>foto</th>
    </tr>

    @foreach($mahasiswas as $key => $mahasiswa)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $mahasiswa->npm }}</td>
        <td>{{ $mahasiswa->nama }}</td>
        <td>{{ $mahasiswa->prodi->nama_prodi ?? '-' }}</td>
        <td>
            @if ($mahasiswa->foto)
                <img src="{{ asset('storage/'.$mhs->foto) }}" alt="foto" width="50">
            @else
            <span class="text-muted">tidak ada foto</span>
                
            @endif
        </td>
        <td>
            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning btn-rounded">Edit</a>
            <form method="POST" action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                    data-toggle="tooltip" title='Delete'
                    data-nama='{{ $mahasiswa->nama }}'>Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection
