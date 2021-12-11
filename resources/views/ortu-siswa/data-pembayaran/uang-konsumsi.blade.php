@extends('layouts.app')

@section('content-title', 'Detail Uang Konsumsi')

@section('content')

    <div class="row">
        @include('includes/error')

        {{--    Modals Guide Payment    --}}
        {{-- @include('includes/Modals\payment-guide') --}}

        <div class="col-md-12 col-sm-12">
            <div class="col-md-12 col-sm-12 mb-2">
                <h3 class="mb-3">Data Uang Konsumsi</h3>
            </div>
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Data Siswa</th>
                  <th>Jatuh Tempo</th>
                  <th>Tanggal Bayar	</th>
                  <th>Bulan Tertunggak</th>
                  <th>Jumlah Uang Konsumsi</th>
                  <th>Status Pembayaran</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Poly - SD - 1A - 2021/2022</td>
                        <td>11-12-2021</td>
                        <td>12-12-2021</td>
                        <td></td>
                        <td>Rp. 150.000</td>
                        <td>
                          <span class="badge badge-success" style="width: 100%;font-size: 15px;">
                            Lunas
                          </span>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="#" type="submit" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">
                                    Bayar
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>agus - SD - 1A - 2021/2022</td>
                      <td>11-12-2021</td>
                      <td>12-12-2021</td>
                      <td></td>
                      <td>Rp. 150.000</td>
                      <td>
                        <span class="badge badge-danger" style="width: 100%;font-size: 15px;">
                          Tertunggak
                        </span>
                      </td>
                      <td>
                          <div class="d-flex">
                              <a href="#" type="submit" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">
                                  Bayar
                              </a>
                          </div>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Bodi - SD - 1A - 2021/2022</td>
                      <td>11-12-2021</td>
                      <td>12-12-2021</td>
                      <td></td>
                      <td>Rp. 150.000</td>
                      <td>
                        <span class="badge badge-danger" style="width: 100%;font-size: 15px;">
                          Belum Lunas
                        </span>
                      </td>
                      <td>
                          <div class="d-flex">
                              <a href="#" type="submit" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">
                                  Bayar
                              </a>
                          </div>
                      </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Laporan Pembayaran SPP --}}
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-2">
            <h3 class="mb-3">Data Pembayaran Uang Konsumsi</h3>
        </div>
        <div class="col-md-12 col-sm-12">
            <table id="datatable2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Data Siswa</th>
                    <th>Jatuh Tempo</th>
                    <th>Tanggal Bayar	</th>
                    <th>Bulan Tertunggak</th>
                    <th>Jumlah Uang Konsumsi</th>
                    <th>Status Pembayaran</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Poly - SD - 1A - 2021/2022</td>
                    <td>11-12-2021</td>
                    <td>12-12-2021</td>
                    <td></td>
                    <td>Rp. 150.000</td>
                    <td>
                      <span class="badge badge-success" style="width: 100%;font-size: 15px;">
                        Lunas
                      </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
