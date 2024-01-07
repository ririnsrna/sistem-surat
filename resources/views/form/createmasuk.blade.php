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
            <h5 class="title">{{__("Tambah Surat")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('suratmasuk.save') }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
              <div class="row">
              </div>
               <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__("No Surat")}}</label>
                                <input type="text" name="no_surat" class="form-control" value="{{ old('no_surat') }}">
                                @include('alerts.feedback', ['field' => 'no_surat'])
                        </div>
                       
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__("Tanggal Surat")}}</label>
                      <input type="datetime-local" name="tanggal_surat" class="form-control" value="{{ old('tanggal_surat') }}">
                      @include('alerts.feedback', ['field' => 'tanggal_surat'])
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Pengirim")}}</label>
                                <input type="text" name="pengirim" class="form-control" value="{{ old('pengirim') }}">
                                @include('alerts.feedback', ['field' => 'pengirim'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Ditujukan")}}</label>
                                <input type="text" name="ditujukan" class="form-control" value="{{ old('ditujukan') }}">
                                @include('alerts.feedback', ['field' => 'ditujukan'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Perihal")}}</label>
                                <input type="text" name="perihal" class="form-control" value="{{ old('perihal') }}">
                                @include('alerts.feedback', ['field' => 'perihal'])
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                      <div class="form-group" class="">
                          <label>{{__(" File Surat")}}</label>
                              <input type="file" name="file" class="form-control" value="{{ old('file') }}">
                              @include('alerts.feedback', ['field' => 'file'])
                      </div>
                  </div>
              </div>
                <div class="row" style="display: none;">
                  <div class="col-md-7 pr-1">
                      <div class="form-group">
                          <label>{{__(" Status")}}</label>
                              <input type="text" name="status" class="form-control" value="Belum Disposisi">
                              <input type="text" name="keterangan" class="form-control" value="A">
                           
                              <input type="text" name="tanggapan" class="form-control" value="B">
                              @include('alerts.feedback', ['field' => 'status'])
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