<h2>Breaking news</h2>
@foreach ($result as $item)
    {{ $item->judul }} <br/>
    {{ $item->deskripsi }} <br/>
@endforeach