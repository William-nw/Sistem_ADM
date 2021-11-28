@extends('layouts.app')

@section('content-title', 'Detail Siswa Orang Tua')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 mb-5">
        <ul class="list-unstyled user_data">
                <li>
                    <i class="fa fa-key user-profile-icon"></i> 
                    NIS : 
                </li>
                <li>
                    <i class="fa fa-user user-profile-icon"></i> 
                    Nama : 
                </li>
                <li>
                    <i class="fa fa-building user-profile-icon"></i> 
                    Kelas : 
                </li>
                <li>
                    <i class="fa fa-book user-profile-icon"></i> 
                    Tahun Ajaran : 
                </li>
                {{-- <li>
                    <i class="fa fa-book user-profile-icon"></i> 
                    Tabungan Siswa : Rp {{ number_format($itemSiswa->tabunganSiswa->jumlah_tabungan,0)}}
                </li> --}}
        </ul>

        {{-- Alert Validation --}}
        @include('includes/error')
        
    </div>
    <div class="col-md-12 col-sm-12">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Jatuh Tempo</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Tertunggak</th>
                    <th>Jumlah SPP</th>
                    <th>Status SPP</th>
                </tr>
            </thead>
            <tbody>
                {{-- @php
                    $no = 1;
                @endphp
                @foreach ($data as $itemData)
                    @foreach ($itemData->detailSPP as $itemdetailSPP)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td> {{ \Carbon\Carbon::parse($itemdetailSPP->jatuh_tempo)->format('m-Y')}} </td>
                        <td> {{ $itemdetailSPP->tanggal_bayar != null ? \Carbon\Carbon::parse($itemdetailSPP->tanggal_bayar)->format('d-m-Y') : ""}} </td>
                        <td> {{ $itemdetailSPP->tertunggak }}</td>
                        <td>
                            @php
                                
                                // $totalBiaya = abs($itemdetailSPP->spp) + abs($itemdetailSPP->konsumsi) + abs($itemdetailSPP->pembangunan) + abs($itemdetailSPP->pembayaran_seragam) + abs($itemdetailSPP->lapor);
                                echo 'Rp. '.number_format($itemdetailSPP->total_biaya);
                            @endphp
                        </td>
                        <td>
                            @if ($itemdetailSPP->status_pembayaran == 'lunas')
                                <span class="badge badge-success" style="width: 100%;font-size: 15px;">
                                    @php
                                        $statusPembayaran = ucwords(str_replace("_", " ", $itemdetailSPP->status_pembayaran));
                                        echo $statusPembayaran
                                    @endphp
                                </span>
                            @else
                                <span class="badge badge-danger" style="width: 100%;font-size: 15px;">
                                    @php
                                        $statusPembayaran = ucwords(str_replace("_", " ", $itemdetailSPP->status_pembayaran));
                                        echo $statusPembayaran
                                    @endphp
                                </span>
                            @endif
                        </td> --}}
                        {{-- <td>
                            <div class="d-flex">
                                @if ($itemdetailSPP->status_pembayaran == 'lunas')
                                    <a href="{{ route('spp-cetak.index', $itemdetailSPP->id_detail_spp) }}" class="btn btn-primary">Cetak</a>
                                @else
                                    <a href="{{ route('editSPP.index', $itemdetailSPP->id_detail_spp) }}" class=" btn btn-warning">Edit SPP</a>
                                    <form action="{{ route('cari-siswa.store') }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="kodeSPP" value="{{  $itemdetailSPP->kode_spp }}">
                                            <input type="hidden" name="total_biaya" value="{{ $itemdetailSPP->total_biaya }}">
                                            <input type="hidden" name="nis" value="{{  $itemdetailSPP->nis }}">
                                            <input type="hidden" name="idSpp" value="{{  $itemdetailSPP->id_detail_spp }}">
                                            <button type="submit" class="btn btn-success">Bayar</button>
                                    </form>
                                @endif
                            </div>
                           
                        </td> --}}
                    </tr>

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
                    <th>Kode Pembayaran</th>
                    <th>Jatuh Tempo</th>
                    <th>Tanggal Bayar</th>
                    <th>Hari Tertunggak</th>
                    <th>Total Bayar</th>
                    <th>Status SPP</th>
                </tr>
            </thead>
            <tbody>
                {{-- @php
                    $no = 1;
                @endphp
                @foreach ($dataPembayaran as $itemData)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $itemData->kode_pembayaran }}</td>
                        <td> {{ \Carbon\Carbon::parse($itemData->jatuh_tempo)->format('d-m-Y')}} </td>
                        <td> {{ $itemData->tanggal_bayar != null ? \Carbon\Carbon::parse($itemdetailSPP->tanggal_bayar)->format('d-m-Y') : ""}} </td>
                        <td> {{ $itemData->tertunggak }}</td>
                        <td>
                            @php
                                
                                // $totalBiaya = abs($itemdetailSPP->spp) + abs($itemdetailSPP->konsumsi) + abs($itemdetailSPP->pembangunan) + abs($itemdetailSPP->pembayaran_seragam) + abs($itemdetailSPP->lapor);
                                echo 'Rp. '.number_format($itemData->total_biaya);
                            @endphp
                        </td>
                        <td>
                            @if ($itemData->status_pembayaran == 'lunas')
                                <span class="badge badge-success" style="width: 100%;font-size: 15px;">
                                    @php
                                        $statusPembayaran = ucwords(str_replace("_", " ", $itemData->status_pembayaran));
                                        echo $statusPembayaran
                                    @endphp
                                </span>
                            @else
                                <span class="badge badge-danger" style="width: 100%;font-size: 15px;">
                                    @php
                                        $statusPembayaran = ucwords(str_replace("_", " ", $itemData->status_pembayaran));
                                        echo $statusPembayaran
                                    @endphp
                                </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach --}}

            </tbody>
        </table>
    </div>
</div>
@endsection