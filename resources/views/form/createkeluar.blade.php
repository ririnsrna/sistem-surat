@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'User Profile',
    'activePage' => 'surat-keluar',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__("Tambah Surat")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('suratkeluar.save') }}" autocomplete="off"
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
                                <input type="text" name="no_surat" id="no_surat" class="form-control" value="{{ old('no_surat') ?? $no_surat . '/' }}">
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

@push('js')
<script type="text/javascript">
    $('#jenis_surat').on('change', function() {
      var a=new Date();var a=a.getMonth()+1
      var year=new Date();var year=year.getFullYear();
      switch (a){
      case 1:bulan="I";break
      case 2:bulan="II";break
      case 3:bulan="III";break
      case 4:bulan="IV";break
      case 5:bulan="V";break
      case 6:bulan="VI";break
      case 7:bulan="VII";break
      case 8:bulan="VIII";break
      case 9:bulan="IX";break
      case 10:bulan="X";break
      case 11:bulan="XI";break
      case 12:bulan="XII"
      }
      // No surat/bulan romawi/tahun/urutan-SMKN1CIOMAS
      var input_value = $('#jenis_surat option:selected').val().split(" - ");
      var random_urutan = {{ (!isset($data->id)) ? "1" :  $data->id+1}}
      console.log(input_value);
      if (input_value[0] == "421.5"){
        $('#no_surat').val("421.5/"+bulan+"/"+year+"/"+random_urutan+"-SMK1CIOMAS");
      }else if (input_value[0] == "421.7"){
        $('#no_surat').val("421.7/"+bulan+"/"+year+"/"+random_urutan+"-SMK1CIOMAS");
      }else if (input_value[0] == "422.4"){
        $('#no_surat').val("422.4/"+bulan+"/"+year+"/"+random_urutan+"-SMK1CIOMAS");
      }else if (input_value[0] == "423.5"){
        $('#no_surat').val("423.5/"+bulan+"/"+year+"/"+random_urutan+"-SMK1CIOMAS");
      }else if (input_value[0] == "424.2"){
        $('#no_surat').val("424.2/"+bulan+"/"+year+"/"+random_urutan+"-SMK1CIOMAS");
      }else if (input_value[0] == "424"){
        $('#no_surat').val("424/"+bulan+"/"+year+"/"+random_urutan+"-SMK1CIOMAS");
      }else if (input_value[0] == "424.1"){
        $('#no_surat').val("424.1/"+bulan+"/"+year+"/"+random_urutan+"-SMK1CIOMAS");
      }else if (input_value[0] == "425.3"){
        $('#no_surat').val("425.3/"+bulan+"/"+year+"/"+random_urutan+"-SMK1CIOMAS");
      }else if (input_value[0] == "429"){
        $('#no_surat').val("429/"+bulan+"/"+year+"/"+random_urutan+"-SMK1CIOMAS");
      }else if (input_value[0] == "421.76"){
        $('#no_surat').val("421.76/"+bulan+"/"+year+"/"+random_urutan+"-SMK1CIOMAS");
      }else if (input_value[0] == "423.7"){
        $('#no_surat').val("423.7/"+bulan+"/"+year+"/"+random_urutan+"-SMK1CIOMAS");
      }else if (input_value[0] == "423.8"){
        $('#no_surat').val("423.8/"+bulan+"/"+year+"/"+random_urutan+"-SMK1CIOMAS");
      }else if (input_value[0] == "425.2"){
        $('#no_surat').val("425.2/"+bulan+"/"+year+"/"+random_urutan+"-SMK1CIOMAS");
      }else{
        $('#no_surat').val("NOSURATERR");
      }
    });

   
  </script>
@endpush