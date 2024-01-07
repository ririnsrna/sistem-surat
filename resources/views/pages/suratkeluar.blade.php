@extends('layouts.app', [
    'namePage' => 'SuratKeluar',
    'class' => 'sidebar-mini',
    'activePage' => 'surat-keluar',
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
            <h4 class="card-title">Surat Keluar</h4>
            <a class="btn btn-1 btn-round text-white pull-left" href="{{ route('suratkeluar.create') }}">Tambah Surat</a><br>
            <form class="pull-right" method="get">
                <div class="row">
                    <div class="col-12">
                        <div class="input-group">
                            <input type="date" name="date" id="date" style="width: 200px; height:40px;">
                            <input type="date" name="date_end" id="date_end"  class="ml-2 mr-2" style="width: 200px; height:40px;">
                            <button type="submit" style="width: 80px; height:40px; background-color: #0000FF; color: #fff; border : 1px">Submit</button>                                        
                            <button type="submit" style="width: 80px; height:40px; border : 1px">Refresh</button>                                        
                        </div>
                    </div>
                </div>
            </form>
            <br>
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
                  <th>Tanggal</th>
                  {{-- <th>Status</th> --}}
                  <th>Pengirim</th>
                  <th>Ditujukan</th>
                  <th>Perihal</th>
                  <th class="">Actions</th>
                </tr>
              </thead>  
              <tbody>
                @foreach ($products as $index => $data)
                    
               
                                  <tr>
                    <td><center>{{ $index + $products->firstitem()}}</center></td>
                    <td>{{ $data-> no_surat }}</td>
                    <td>{{ $data-> tanggal_surat }}</td>
                    <td>{{ $data-> pengirim }}</td>
                    <td>{{ $data-> ditujukan }}</td>
                    <td>{{ $data-> perihal }}</td>
                      <td class="" style="display:flex; justify-content:space-between;">
                        <a type="button" href="/detailkeluar/{{ $data->id}}" rel="tooltip" class="btn btn-info text-center  " style="color: black; align-items:center;" data-original-title="" title="">Detail
                          <i class=""></i>
                        </a>
                      </td>
                       
                  </tr>
                  @endforeach
                              </tbody>
                             
            </table>

          </div>
        
          <!-- end content-->
        </div>
       <div class="pull-right mr-5">
       {{ $products->links('pagination::bootstrap-4') }}
       </div>
        <!--  end card  -->
      </div>
      
    
      <!-- end col-md-12 -->
      
      
   
      
    </div>
    
@endsection