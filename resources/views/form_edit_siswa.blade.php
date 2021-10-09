@extends('layouts.master')
@section('title', 'Edit Data Siswa')

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
                    <h4 class="card-title">Edit Data Siswa</h4>
                    <form class="forms-sample">
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" placeholder="Nama Siswa">
                    </div>
                    <div class="form-group">
                        <label for="nis_siswa">Nis Siswa</label>
                        <input type="text" class="form-control" id="nis_siswa" placeholder="NIS Siswa">
                    </div>
                    <div class="form-group">
                         <div class="form-group">
                        <label for="exampleFormControlSelect1">Tingkat </label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                          <option>TK</option>
                          <option>SD</option>
                          <option>SMP</option>
                        </select>
                      </div>
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" placeholder="Kelas">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Tahun Ajaran</label>
                        <input type="text" class="form-control" id="kelas" placeholder="Kelas">
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
<!-- End plugin js for this page -->
<script src="{{ asset('Dashboard/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('Dashboard/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('Dashboard/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js') }}"></script>
    <script src="{{ asset('Dashboard/vendors/justgage/raphael-2.1.4.min.js') }} "></script>
    <script src="{{ asset('Dashboard/vendors/justgage/justgage.js') }} "></script>
<!-- Custom js for this page-->
<script src="{{ asset('Dashboard/js/dashboard.js') }}"></script>
<!-- End custom js for this page-->
@endsection