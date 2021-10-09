@extends('layouts.master')
@section('title', 'Data Pembayaran SPP')

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
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Pembayaran SPP</h4>
              <button type="button" class="btn btn-primary">Tambah</button>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>
                        No
                      </th>
                      <th>
                        Nama Orang Tua
                      </th>
                      <th>
                        Nama Anak
                      </th>
                      <th>
                        Progres Pembayaran
                      </th>
                      <th>
                        Total Pembayaran
                      </th>
                      <th>
                        Deadline
                      </th>
                      <th>
                        Edit
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        1
                      </td>
                      <td>
                        Batman
                      </td>
                      <td>
                        Herman
                      </td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td>
                        Rp. 180.000
                      </td>
                      <td>
                        May 15, 2020
                      </td>
                      <td>
                        <button type="button" class="btn btn-success">Lunas</button>
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </td>
                    </tr>
                    <tr>
                      <td class="py-1">
                        2
                      </td>
                      <td>
                        Linda
                      </td>
                      <td>
                        Messy
                      </td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td>
                        Rp. 200.000
                      </td>
                      <td>
                        July 1, 2020
                      </td>
                      <td>
                        <button type="button" class="btn btn-success">Lunas</button>
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </td>
                    </tr>
                    <tr>
                      <td>
                        3
                      </td>
                      <td>
                        Heru
                      </td>
                      <td>
                        Richards
                      </td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td>
                        Rp. 430.000
                      </td>
                      <td>
                        Apr 12, 2020
                      </td>
                      <td>
                        <button type="button" class="btn btn-success">Lunas</button>
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </td>
                    </tr>
                    <tr>
                      <td>
                        4
                      </td>
                      <td>
                        Heru
                      </td>
                      <td>
                        Richards
                      </td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td>
                        Rp. 430.000
                      </td>
                      <td>
                        Apr 12, 2020
                      </td>
                      <td>
                        <button type="button" class="btn btn-success">Lunas</button>
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </td>
                    </tr>
                    <tr>
                      <td class="py-1">
                        5
                      </td>
                      <td>
                        Hendra
                      </td>
                      <td>
                        Peter
                      </td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td>
                        Rp. 70.000
                      </td>
                      <td>
                        May 15, 2020
                      </td>
                      <td>
                        <button type="button" class="btn btn-success">Lunas</button>
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </td>
                    </tr>
                    <tr>
                      <td>
                        6
                      </td>
                      <td>
                        Kartini
                      </td>
                      <td>
                        Edward
                      </td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td>
                        Rp. 160.000
                      </td>
                      <td>
                        May 03, 2020
                      </td>
                      <td>
                        <button type="button" class="btn btn-success">Lunas</button>
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