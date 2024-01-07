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
            <h5 class="title">{{__("Edit Surat Masuk")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="/updatepostmasuk/{{ $data->id }}" autocomplete="off"
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
                                <input type="text" name="no_surat" class="form-control" value="{{ $data->no_surat }}">
                                @include('alerts.feedback', ['field' => 'no_surat'])
                        </div>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__("Jenis Surat")}}</label>
                            <label>{{__("Jenis Surat")}}</label>
                            <select name="jenis_surat" class="form-control" id="" value="{{ $data->jenis_surat }}">
                              <option value="Sekolah Kejuruan">Sekolah Kejuruan</option>
                              <option value="Osis / Kesiswaan">Osis / Kesiswaan</option>
                              <option value="Keuangan / SPP">Keuangan / SPP</option>
                              <option value="Kurikulum / Pengajaran">Kurikulum / Pengajaran</option>
                              <option value="Tata Usaha">Tata Usaha</option>
                              <option value="Kepegawaian">Kepegawaian</option>
                              <option value="Guru / Pegawai">Guru / Pegawai</option>
                              <option value="Sarana / Prasarana">Sarana / Prasarana</option>
                              <option value="Pendidikan dan Latihan, Penataan, Simposium, LKG">Pendidikan dan Latihan, Penataan, Simposium, LKG</option>
                              <option value="Ekstrakurikuler">Ekstrakurikuler</option>
                              <option value="Ujian, UAS, UTS">Ujian, UAS, UTS</option>
                              <option value="PKL, Prakerin, Humas">PKL, Prakerin, Humas</option>
                              <option value="Perpustakaan, Buku">Perpustakaan, Buku</option>
                            </select>
                                
                                @include('alerts.feedback', ['field' => 'jenis_surat'])
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__("Tanggal Surat")}}</label>
                      <input type="date" name="tanggal_surat" class="form-control" value="{{ $data->tanggal_surat }}">
                      @include('alerts.feedback', ['field' => 'tanggal_surat'])
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Pengirim")}}</label>
                                <input type="text" name="pengirim" class="form-control" value="{{ $data->pengirim }}">
                                @include('alerts.feedback', ['field' => 'pengirim'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Ditujukan")}}</label>
                                <input type="text" name="ditujukan" class="form-control" value="{{ $data->ditujukan }}">
                                @include('alerts.feedback', ['field' => 'ditujukan'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Perihal")}}</label>
                                <input type="text" name="perihal" class="form-control" value="{{ $data->perihal }}">
                                @include('alerts.feedback', ['field' => 'perihal'])
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                      <div class="form-group" class="">
                          <label>{{__(" File Surat")}}</label>
                              <input type="file" name="file" class="form-control" value="">
                              @include('alerts.feedback', ['field' => 'file'])
                      </div>
                  </div>
              </div>
                <div class="row" style="display: none;">
                  <div class="col-md-7 pr-1">
                      <div class="form-group">
                          <label>{{__(" Status")}}</label>
                              <input type="text" name="status" class="form-control" value="Belum Disposisi">
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