@extends('layouts.app', [
    'namePage' => 'SuratMasuk',
    'class' => 'sidebar-mini',
    'activePage' => 'disposisi',
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
        @endif
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Disposisi</h4>
            <div class="col-12 mt-2">
                                        </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Surat</th>
                  <th>Perihal</th>
                  <th>Ditujukan</th>
                  <th>Isi Disposisi</th>
                  <th>Keterangan</th>
                  <th class="text-right">Actions</th>
                </tr>
              </thead>  
              <tbody>
                @foreach ($disposisi as $index => $data)
                    
               
                                  <tr>
                    <td><center>{{ $index + $disposisi->firstitem()}}</center></td>
                    <td>{{ $data-> no_surat }}</td>
                    <td>{{ $data-> perihal }}</td>
                    <td>{{ $data-> ditujukan }}</td>
                    <td>{{ $data-> isi_disposisi }}</td>
                    <td>{{ $data-> keterangan }}</td>
                      <td class="text-center" style=" justify-content:space-between;">
                      <form method="post">
                        <a type="button" href="/deletedisposisi/{{ $data->id}}" rel="tooltip" class="btn btn-danger " style="color: black;" data-original-title="" title="">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                  </tr>
                  @endforeach
                              </tbody>
                             
            </table>

          </div>
        
          <!-- end content-->
        </div>
       <div class="mx-5 pull-right">
       {{ $disposisi->links('pagination::bootstrap-4') }}
       </div>
        <!--  end card  -->
      </div>
      
      <!-- end col-md-12 -->
      
    </div>
    
@endsection