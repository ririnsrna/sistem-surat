@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
  <div class="panel-header-nifa">
  </div>
  <div class="content">
    <h3>SELAMAT DATANG TU!!</h3>
    <div class="row">
      <div class="col-lg-4">
        <div class="card card-chart bg-warning">
          <div class="card-header">
           
            <h4 class="card-title">Surat Masuk</h4>
           
          </div>
          <div class="card-body">
          
            <div class="card-number">
            
              <h2>{{ $countmasuk }}</h2>
              <i class="fa-regular fa-envelope fa-5x icon-pojok"></i>
            </div>
          </div>
          
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card card-chart bg-info">
          <div class="card-header">
            <h4 class="card-title">Surat Keluar</h4>
            
          </div>
          <div class="card-body">
            <div class="card-number">

              <h2>{{ $countkeluar }}</h2>
              <i class="fa-regular fa-envelope-open fa-5x icon-pojok"></i>
            </div>
          </div>
          
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card card-chart">
          <div class="card-header">
      
            <h4 class="card-title">Disposisi</h4>
          </div>
          <div class="card-body">
            <div class="card-number">
              <h2>{{ $countdisposisi }}</h2>
              <i class="fa-regular fa-envelope fa-5x icon-pojok"></i>
            </div>
          </div>
        
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
@endpush