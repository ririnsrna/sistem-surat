@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'User Profile',
    'activePage' => 'surat-masuk',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header-nifa">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__("Disposisi Surat")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="/disposisipostmasuk/{{ $disposisi->id }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                      <div class="form-group">
                          <label>{{__(" Status")}}</label>
                          <select name="status" class="form-control" id="status" value="{{ $disposisi->status }}">
                            <option value="Belum Disposisi">Belum Disposisi</option>
                            <option value="Sudah Disposisi">Sudah Disposisi</option>
                        
                          </select>
                              @include('alerts.feedback', ['field' => 'status'])
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__("Isi Disposisi")}}</label>
                        <input type="text" name="isi_disposisi" id="isi_disposisi" class="form-control" value="{{ $disposisi->isi_disposisi }}">
                        @include('alerts.feedback', ['field' => 'isi_disposisi'])
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__("Keterangan")}}</label>
                        <select name="keterangan" class="form-control" id="keterangan" value="{{ $disposisi->keterangan }}">
                          <option value="Diproses">Diproses</option>
                          <option value="Ditolak">Ditolak</option>
                        </select>
                        @include('alerts.feedback', ['field' => 'keterangan'])
                    </div>
                </div>
              </div>
              <div class="card-footer ">
                <button type="submit" class="btn btn-info btn-round">{{__('Simpan')}}</button>
              </div>
              <hr class="half-rule"/>
            </form>
          </div>
      </div>
    </div>
    </div>
  </div>
@endsection