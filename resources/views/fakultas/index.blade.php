<h2>data fakultas</h2>
@foreach ($result as $item)
    {{ $item->nama }} - {{ $item->singkatan }} - {{ $item->dekan }} <br/>
@endforeach