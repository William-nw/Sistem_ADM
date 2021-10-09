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
                <h4 class="card-title">Tabel Siswa</h4>
                <button type="button" class="btn btn-primary">Tambah</button>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Nama Siswa
                          </th>
                          <th>
                            Nis Siswa
                          </th>
                          <th>
                            Kelas
                          </th>
                          <th>
                            Tahun Ajaran
                          </th>
                          <th>
                              Edit
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="table-info">
                          <td>
                            1
                          </td>
                          <td>
                            Herman
                          </td>
                          <td>
                            2202201
                          </td>
                          <td>
                            6 SD
                          </td>
                          <td>
                            2020/2021
                          </td>
                          <td>
                              <button type="button" class="btn btn-success">Edit</button>
                              <button type="button" class="btn btn-danger">Hapus</button>
                          </td>
                        </tr>
                        <tr class="table-warning">
                          <td>
                            2
                          </td>
                          <td>
                            Messsy
                          </td>
                          <td>
                            301492
                          </td>
                          <td>
                            1 SMP
                          </td>
                          <td>
                            2020/2021
                          </td>
                          <td>
                              <button type="button" class="btn btn-success">Edit</button>
                              <button type="button" class="btn btn-danger">Hapus</button>
                          </td>
                        </tr>
                        <tr class="table-danger">
                          <td>
                            3
                          </td>
                          <td>
                            Richard
                          </td>
                          <td>
                            1020123
                          </td>
                          <td>
                            TK
                          </td>
                          <td>
                            2020/2021
                          </td>
                          <td>
                              <button type="button" class="btn btn-success">Edit</button>
                              <button type="button" class="btn btn-danger">Hapus</button>
                          </td>
                        </tr>
                        <tr class="table-success">
                          <td>
                            4
                          </td>
                          <td>
                            Peter
                          </td>
                          <td>
                            2012391
                          </td>
                          <td>
                            4 SD
                          </td>
                          <td>
                            2020/2021
                          </td>
                          <td>
                              <button type="button" class="btn btn-success">Edit</button>
                              <button type="button" class="btn btn-danger">Hapus</button>
                          </td>
                        </tr>
                        <tr class="table-primary">
                          <td>
                            5
                          </td>
                          <td>
                            Edward
                          </td>
                          <td>
                            3040240
                          </td>
                          <td>
                            2 SMP
                          </td>
                          <td>
                            2020/2021
                          </td>
                          <td>
                              <button type="button" class="btn btn-success">Edit</button>
                              <button type="button" class="btn btn-danger">Hapus</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
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