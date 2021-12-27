@extends('layouts.app')

@section('content-title', 'Detail Uang Pembangunan')

@section('content')


    {{-- Alert Validation --}}
    @include('includes/error')

    {{--    Modals Guide Payment    --}}
     @include('includes\Modals\payment-guide-administration')

        <div class="col-md-12 col-sm-12">
            <div class="col-md-12 col-sm-12 mb-2">
                <h3 class="mb-3">Data Uang Pembangunan</h3>
            </div>
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Data Siswa</th>
                    <th>Total Biaya Pembangunan</th>
                    <th>Status Pembayaran Pembangunan</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($administration as $item_construction)
                    @foreach($item_construction['data_administration'] as $data_administration_construction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $data_administration_construction->siswaData->NIS_siswa }} -
                                {{ $data_administration_construction->siswaData->nama_siswa }} -
                                {{ $data_administration_construction->siswaData->tingkat }} -
                                {{ $data_administration_construction->masterKelas->nama_kelas }} -
                                {{ $data_administration_construction->tahunAjaran->nama_tahun_ajaran }}
                            </td>
                            <td>Rp {{ number_format($data_administration_construction->total_biaya,2) }}</td>
                            <td>
                              <span @if($data_administration_construction->status_pembangunan == "lunas")
                                        class="badge badge-success"
                                    @else
                                        class="badge badge-danger"
                                    @endif
                                    style="width: 100%;font-size: 15px;">
                                {{ ucfirst(str_replace("_"," ",$data_administration_construction->status_pembangunan)) }}
                              </span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="#" type="submit" class="btn btn-success" data-toggle="modal"
                                       data-target=".bs-example-modal-sm-{{ $data_administration_construction->siswaData->NIS_siswa }}">
                                        Bayar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Laporan Pembayaran SPP --}}
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-2">
            <h3 class="mb-3">Data Pembayaran Uang Pembangunan</h3>
        </div>
        <div class="col-md-12 col-sm-12">
            <table id="datatable2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Data Siswa</th>
                  <th>Total Biaya Pembangunan</th>
                  <th>Status Pembayaran Pembangunan</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Poly - SD - 1A - 2021/2022</td>
                    <td>Rp. 1.600.000</td>
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
