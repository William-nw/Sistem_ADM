@extends('layouts.app')

@section('content-title', 'Detail Uang Baju Siswa')

@section('content')
            {{-- Alert Validation --}}
            @include('includes/error')

        {{--    Modals Guide Payment    --}}
        {{-- @include('includes/Modals\payment-guide') --}}

        <div class="col-md-12 col-sm-12">
            <div class="col-md-12 col-sm-12 mb-2">
                <h3 class="mb-3">Data Uang Baju</h3>
            </div>
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Data Siswa</th>
                    <th>Data Baju</th>
                    <th>Total Harga Baju</th>
                    <th>Status Baju</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Poly - SD - 1A - 2021/2022</td>
                        <td> 
                          <ol> 
                            <li> Batik - qty: 2  - size : XL - harga Rp 15.000 - total: Rp 30.000  </li> 
                            <li> Pramuka - qty: 2 - size : L  - harga Rp 15.000 - total: Rp 30.000  </li> 
                          </ol>
                        </td>
                        <td>Rp. 60.000</td>
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
                      <td> 
                        <ol> 
                          <li> Batik - qty: 1  - size : XL - harga Rp 15.000 - total: Rp 15.000  </li> 
                          <li> Pramuka - qty: 1 - size : L  - harga Rp 15.000 - total: Rp 15.000  </li> 
                        </ol>
                      </td>
                      <td>Rp. 30.000</td>
                       <td>
                         <span class="badge badge-danger" style="width: 100%;font-size: 15px;">
                           tertunggak
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
                      <td>bodi - SD - 1A - 2021/2022</td>
                      <td> 
                        <ol> 
                          <li> Batik - qty: 1  - size : XL - harga Rp 15.000 - total: Rp 15.000  </li> 
                          <li> Pramuka - qty: 1 - size : L  - harga Rp 15.000 - total: Rp 15.000  </li> 
                        </ol>
                      </td>
                      <td>Rp. 30.000</td>
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
            <h3 class="mb-3">Data Pembayaran Uang Baju</h3>
        </div>
        <div class="col-md-12 col-sm-12">
            <table id="datatable2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                   <th>No.</th>
                    <th>Data Siswa</th>
                    <th>Data Baju</th>
                    <th>Total Harga Baju</th>
                    <th>Status Baju</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Poly - SD - 1A - 2021/2022</td>
                    <td> 
                      <ol> 
                        <li> Batik - qty: 2  - size : XL - harga Rp 15.000 - total: Rp 30.000  </li> 
                        <li> Pramuka - qty: 2 - size : L  - harga Rp 15.000 - total: Rp 30.000  </li> 
                      </ol>
                    </td>
                    <td>Rp. 60.000</td>
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
