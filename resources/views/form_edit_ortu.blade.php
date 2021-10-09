@extends('layouts.master')
@section('title', 'Edit Data Ortu')

@section('css')
 <!-- base:css -->
 <link rel="stylesheet" href="{{ asset('Dashboard/vendors/mdi/css/materialdesignicons.min.css') }} ">
 <link rel="stylesheet" href="{{ asset('Dashboard/vendors/base/vendor.bundle.base.css') }} ">
 <!-- endinject -->
 <!-- plugin css for this page -->
 <link rel="stylesheet" href="{{ asset('Dashboard/vendors/select2/select2.min.css') }}">
 <link rel="stylesheet" href="{{ asset('Dashboard/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
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
                    <h4 class="card-title">Edit Data Ortu</h4>
                    <form class="forms-sample">
                    <div class="form-group">
                        <label for="nama_ortu">Nama Ortu</label>
                        <input type="text" class="form-control" id="nama_ortu" placeholder="Nama ortu">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="no.hp">No.Hp</label>
                        <input type="text" class="form-control" id="no.hp" placeholder="Nomor Hp">
                    </div>
                    <div class="form-group">
                        <label>Nama Anak</label>
                        <select class="js-example-basic-multiple w-100" multiple="multiple">
                          <option value="herman">Herman</option>
                          <option value="messy">Messy</option>
                          <option value="richard">Richard</option>
                          <option value="nelson">Nelson</option>
                          <option value="peter">Peter</option>
                          <option value="edward">Edward</option>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                    </form>
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