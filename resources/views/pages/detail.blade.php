@extends('layouts.app', [
    'namePage' => 'DetailKeluar',
    'class' => 'sidebar-mini',
    'activePage' => '',
])

@section('content')
<div class="panel-header-nifa">
</div>

<div class="container mt-5">


<div class="card" style="width: 50rem;">
    <div class="card-body d-flex">
    <embed type="application/pdf" src="../assets/file/{{ $data->file }}" width="600" height="400"></embed>
        <ul style="list-style: none;">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
            <li class="mb-3">No Surat : {{ $data->no_surat }}</li>
            <li class="mb-3">Tanggal Surat : {{ $data->tanggal_surat }}</li>
            <li class="mb-3">Pengirim : {{ $data->pengirim }}</li>
            <li class="mb-3">Ditujukan : {{ $data->ditujukan }}</li>
            <li class="mb-3">Perihal : {{ $data->perihal }}</li>
            <li class="mb-3">Status : {{ $data->status }}</li>
            <li class="mb-3">File : {{ $data->file }}</li>
        </ul>
      </div>
      <div class="container d-flex" style="justify-content:center; align-items:center;">
        <a href="/updatemasuk/{{ $data->id}}" class="btn btn-success " tooltip="" style="color: white;" data-original-title="" title="">Edit</a> 
        <form method="post">
          <a type="button" href="/deletemasuk/{{ $data->id}}" rel="tooltip" class="btn btn-danger ml-3" style="color: white;" data-original-title="" title="">
            Hapus
          </a>
        </form>   
        <button type="submit" class="bg-success btn ml-3"><a class="text-white " href="{{ asset('assets/file') }}/{{ $data-> file }}" download>Download</a></button>
      </div>
        <a href="/suratmasuk" class="bg-warning btn ml-3">Kembali</a>
      </div>
    </center>
  </div>
</div>
</center>
@endsection