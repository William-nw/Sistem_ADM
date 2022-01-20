@extends('layouts.print')

@section('title', 'Laporan SPP')

@section('content')
<style>
    table, th, td {
        border: 1px solid black;
        text-align: center;
    }
</style>

<div>
    <h1>Laporan SPP</h1>
    <p>Tanggal Cetak: <b>{{ date('d-m-y H:i:s') }} </b></p>
</div>

<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Tahun</th>
            <th>Jatuh Tempo</th>
            <th>Tanggal Pembayaran</th>
            <th>Total Pembayaran</th>
            <th>Status Pembayaran</th>
        </tr>
    </thead>
    <tbody>
            @foreach($payment_spp as $spp)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $spp->NIS_siswa }}</td>
                    <td>{{ $spp->siswaData->nama_siswa }}</td>
                    <td>{{ $spp->siswaData->masterKelas->nama_kelas }}</td>
                    <td>{{ $spp->siswaData->tahunAjaran->nama_tahun_ajaran }}</td>
                    <td>{{ date('d-m-Y', strtotime($spp->detailSPP->jatuh_tempo)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($spp->tanggal_pembayaran)) }}</td>
                    <td>Rp {{ number_format($spp->total_bayar,2) }}</td>
                    <td>
                        <div class="btn btn-success text-white text-uppercase font-weight-bold">
                            {{ $spp->detailSPP->status_detail_spp }}
                        </div>
                    </td>
                </tr>
            @endforeach
    </tbody>
</table>
@endsection
