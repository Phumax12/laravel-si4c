<h2>data periode</h2>
@foreach ($result as $item)
    {{ $item->tahun_akademic }} - {{ $item->kode_smt }} <br/>
@endforeach