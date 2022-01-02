@extends('layouts.app')

@section('content-title', 'Detail SPP Siswa')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <ul class="list-unstyled user_data">
                <li>
                    <i class="fa fa-key"></i>
                    NIS : {{ $spp->NIS_siswa }}
                </li>
                <li>
                    <i class="fa fa-user"></i>
                    Nama : {{ $spp->siswaData[0]->nama_siswa }}
                </li>
                <li>
                    <i class="fa fa-building"></i>
                    Kelas : {{ $spp->masterKelas->nama_kelas }}
                </li>
                <li>
                    <i class="fa fa-book"></i>
                    Tahun Ajaran : {{ $spp->tahunAjaran->nama_tahun_ajaran }}
                </li>
                <li>
                    <i class="fa fa-credit-card"></i>
                    Virtual Account {{ $studentSaving->masterAccountBank->type_account }} :
                    <b>{{ $studentSaving->masterAccountBank->account_number }}</b>
                </li>
                <li>
                    <i class="fa fa-credit-card"></i>
                    Sisa Pembayaran:
                    <b>Rp {{ number_format($spp->total_spp) }}</b>
                </li>
                <li>
                    <i class="fa fa-credit-card"></i>
                    Tabungan Siswa : Rp {{ number_format($studentSaving->total_tabungan,2)}}
                </li>
            </ul>

            {{-- Alert Validation --}}
            @include('includes/error')
        </div>

        {{--    Modals Guide Payment    --}}
        @include('includes/Modals\payment-guide')

        <div class="col-md-12 col-sm-12">
            <div class="col-md-12 col-sm-12 mb-2">
                <h3 class="mb-3">Data SPP</h3>
                {{-- @foreach ($data as $itemSpp)
                    <a href="{{ route('spp-cetak.allSPP', $itemSpp->kode_spp) }}" class="btn btn-primary">Cetak</a>
                @endforeach --}}
            </div>
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Jatuh Tempo</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Tertunggak</th>
                    <th>Denda SPP</th>
                    <th>Jumlah SPP</th>
                    <th>Status SPP</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($spp->detailSppStudent as $index => $dataSppStudent)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ date("d-m-Y", strtotime($dataSppStudent->jatuh_tempo) ) }}</td>
                        <td>{{ $dataSppStudent->tanggal_pembayaran }}</td>
                        <td>{{ $dataSppStudent->tertungak }}</td>
                        <td>{{ $dataSppStudent->denda_pembayaran }}</td>
                        <td>Rp {{ number_format($dataSppStudent->total_spp, 2) }}</td>
                        <td>
                            @if ($dataSppStudent->status_detail_spp == 'lunas')
                                <span class="badge badge-success" style="width: 100%;font-size: 15px;">
                                     {{ str_replace("_", " ", ucwords($dataSppStudent->status_detail_spp) ) }}
                                </span>
                            @else
                                <span class="badge badge-danger" style="width: 100%;font-size: 15px;">
                                     {{ str_replace("_", " ", ucwords($dataSppStudent->status_detail_spp) ) }}
                                </span>
                            @endif
                        </td>
                        <td>
                            @if ($dataSppStudent->status_detail_spp != 'lunas')
                                <div class="d-flex">
                                    <a href="#" type="submit" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">
                                        Bayar
                                    </a>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Laporan Pembayaran SPP --}}
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-2">
            <h3 class="mb-3">Data Pembayaran SPP</h3>
            {{-- @foreach ($data as $itemSpp)
                <a href="{{ route('spp-cetak.allSPP', $itemSpp->kode_spp) }}" class="btn btn-primary">Cetak</a>
            @endforeach --}}
        </div>
        <div class="col-md-12 col-sm-12">
            <table id="datatable2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode SPP</th>
                    <th>Jatuh Tempo</th>
                    <th>Tanggal Bayar</th>
                    <th>Hari Tertunggak</th>
                    <th>Total Bayar</th>
                    <th>Status SPP</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>
                    <button>bayar</button>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
