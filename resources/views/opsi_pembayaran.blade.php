@extends('layouts.master')
@section('title', 'Data siswa')

@section('css')
 <!-- base:css -->
 <link rel="stylesheet" href="{{ asset('Dashboard/vendors/mdi/css/materialdesignicons.min.css') }} ">
 <link rel="stylesheet" href="{{ asset('Dashboard/vendors/base/vendor.bundle.base.css') }} ">
 <!-- endinject -->
 <!-- plugin css for this page -->
 <!-- End plugin css for this page -->
 <!-- inject:css -->
 <link rel="stylesheet" href="{{ asset('Dashboard/css/style.css') }} ">
 <!-- endinject -->
@endsection    
@section('content')
@include('layouts.navbar')
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="template-demo mt-4">
                <button type="button" class="btn btn-primary btn-lg btn-block">Pembayaran Bangunan</button>
                <button type="button" class="btn btn-success btn-lg btn-block">Pembayaran SPP</button>
                <button type="button" class="btn btn-info btn-lg btn-block">Pembayaran Buku</button>
                <button type="button" class="btn btn-warning btn-lg btn-block">Pembayaran Baju</button>
                <button type="button" class="btn btn-danger btn-lg btn-block">Pembayaran Konsumsi</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection   

@section('js')
    <!-- base:js -->
<script src="{{ asset('Dashboard/vendors/base/vendor.bundle.base.js') }} "></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('Dashboard/js/template.js') }} "></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{ asset('Dashboard/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('Dashboard/vendors/select2/select2.min.js') }}"></script>
<!-- End plugin js for this page -->
<script src="{{ asset('Dashboard/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('Dashboard/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('Dashboard/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js') }}"></script>
<script src="{{ asset('Dashboard/vendors/justgage/raphael-2.1.4.min.js') }} "></script>
<script src="{{ asset('Dashboard/vendors/justgage/justgage.js') }} "></script>
<!-- Custom js for this page-->
<script src="{{ asset('Dashboard/js/dashboard.js') }}"></script>
<script src="{{ asset('Dashboard/js/file-upload.js') }}"></script>
<script src="{{ asset('Dashboard/js/typeahead.js') }}"></script>
<script src="{{ asset('Dashboard/js/select2.js') }}"></script>
<!-- End custom js for this page-->
@endsection