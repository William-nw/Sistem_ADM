@extends('layouts.app')

@section('content-title', 'Detail Uang Konsumsi')

@section('content')

    <div class="row">
        @include('includes/error')

        {{--    Modals Guide Payment    --}}
        @include('includes\Modals\payment-guide-administration')

        <div class="col-md-12 col-sm-12">
            <div class="col-md-12 col-sm-12 mb-2">
                <h3 class="mb-3">Data Uang Konsumsi</h3>
            </div>
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Data Siswa</th>
                  <th>Total Uang Konsumsi</th>
                  <th>Status Pembayaran</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($administration as $item)
                    @foreach($item['data_administration'] as $consumption_adm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $consumption_adm->siswaData->NIS_siswa }} -
                                {{ $consumption_adm->siswaData->nama_siswa }} -
                                {{ $consumption_adm->siswaData->tingkat }} -
                                {{ $consumption_adm->masterKelas->nama_kelas }}
                            </td>
                            <td>
                                Rp {{ number_format($consumption_adm->total_biaya,2) }}
                            </td>
                            <td>
                                 <span @if($consumption_adm->status_konsumsi == "lunas")
                                       class="badge badge-success"
                                       @else
                                       class="badge badge-danger"
                                       @endif
                                       style="width: 100%;font-size: 15px;">
                                    {{ ucfirst(str_replace("_"," ",$consumption_adm->status_konsumsi)) }}
                                  </span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    @if($consumption_adm->status_konsumsi != "lunas")
                                        <a href="#" type="submit" class="btn btn-success" data-toggle="modal"
                                           data-target=".bs-example-modal-sm-{{ $consumption_adm->siswaData->NIS_siswa }}">
                                            Bayar
                                        </a>
                                    @endif
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
            <h3 class="mb-3">Data Pembayaran Uang Konsumsi</h3>
        </div>
        <div class="col-md-12 col-sm-12">
            <table id="datatable2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Pembayaran</th>
                        <th>Data Siswa</th>
                        <th>Total Pembayaran Konsumsi</th>
                        <th>Tanggal Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($administration as $item_adm)
                        @foreach($item_adm['data_payment_consumption'] as $data_payment_consump)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data_payment_consump->kode_pembayaran }}</td>
                                <td>{{ $data_payment_consump->NIS_siswa }} - {{ $data_payment_consump->siswaData->nama_siswa }}</td>
                                <td>Rp {{ number_format($data_payment_consump->total_pembayaran,2) }}</td>
                                <td>{{ date('d-m-Y h:i:s', strtotime($data_payment_consump->tanggal_bayar)) }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
