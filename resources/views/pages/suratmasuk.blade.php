@extends('layouts.app', [
    'namePage' => 'SuratMasuk',
    'class' => 'sidebar-mini',
    'activePage' => 'surat-masuk',
])

@section('content')
<div class="panel-header-nifa">
</div>
    <div class="row">
      <div class="col-md-12">
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status')}}
        </div>
        @elseif(session('statusHapus'))
          <div class="alert alert-danger">
          {{ session('statusHapus')}}
          </div>
        @elseif(session('statusUbah'))
          <div class="alert alert-primary">
          {{ session('statusUbah')}}
          </div>
          @elseif(session('statusDisposisi'))
          <div class="alert alert-secondary">
          {{ session('statusDisposisi')}}
          </div>
        @endif
        
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Surat Masuk</h4>
              <a class="btn btn-1 btn-round text-white pull-left" href="{{ route('suratmasuk.create') }}">Tambah Surat</a>
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Export
                </button>
              <br>
          </div>
          <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                
                <tr>
                  <th>No</th>
                  <th>No Surat</th>
                  <th>Tanggal</th>
                  <th>Pengirim</th>
                  <th>Ditunjukan</th>
                  <th>Perihal</th>
                  <th>Status</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </thead>  
              <tbody>
                @foreach ($productss as $index => $data)
                  <tr>
                    <td><center>{{ $index + $productss->firstitem()}}</center></td>
                    <td>{{ $data-> no_surat }}</td>
                    <td>{{ $data-> tanggal_surat }}</td>
                    <td>{{ $data-> pengirim }}</td>
                    <td>{{ $data-> ditujukan }}</td>
                    <td>{{ $data-> perihal }}</td>
                    <td>@if($data->status == 'Sudah Disposisi')
                          {{ $data->status }}
                        @else
                          <a href="/disposisimasuk/{{ $data->id }}">{{ $data->status }}</a>
                        @endif
                    </td>
                    <td class="text-center" style="justify-content:space-between;">
                      <a type="button" href="/detailmasuk/{{ $data->id}}" rel="tooltip" class="btn btn-info text-center" style="color: black; align-items:center;" data-original-title="" title="">Detail</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- end content-->
        </div>
       <div class="pull-right mr-5">
       {{ $productss->links('pagination::bootstrap-4') }}
       </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ekspor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('suratmasuk.ekspor') }}" method="get" class="form-group">
          <label class="mt-2" for="start_date">Tanggal Awal</label>
          <input class="mt-n1 form-control" type="date" name="start_date" id="start_date">
          <label class="mt-2" for="end_date">Tanggal Akhir</label>
          <input class="mt-n1 form-control" type="date" name="end_date" id="end_date">
          <label class="mt-2" for="type">Tipe</label>
          <select class="mt-n1 form-control" name="type" id="type">
            <option value="pdf">PDF</option>
            <option value="excel">Excel</option>
          </select>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-1">Ekspor</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection