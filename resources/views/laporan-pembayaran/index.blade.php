@extends('layouts.app')

@section('content-title', 'Tabel Pembayaran SPP Siswa')

@section('content')
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <a href="{{ route('laporan-spp-siswa.show')}}" class="btn btn-primary">Cetak</a>

    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Tahun</th>
            <th>Jatuh Tempo</th>
            <th>Bulan Menunggak</th>
            <th>Tanggal Pembayaran</th>
            <th>Total Pembayaran</th>
            <th>Status Menunggak</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembayaranSPP as $index => $delay)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $delay->nis }}</td>
                <td>{{ $delay->nama_siswa }}</td>
                <td>{{ $delay->nama_kelas }}</td>
                <td>{{ $delay->tahun_ajaran }}</td>
                <td>{{  \Carbon\Carbon::parse($delay->jatuh_tempo)->format('m-Y')}}</td>
                <td>{{ $delay->tertunggak }}</td>
                <td>{{  \Carbon\Carbon::parse($delay->tanggal_bayar)->format('d-m-Y')}}</td>
                @foreach ($delay->pembayaranSPP as $itemBiaya)
                    <td>Rp {{  number_format($itemBiaya->total_biaya,0)}}</td>
                @endforeach
                <td>
                    <div class="btn btn-danger text-white text-uppercase font-weight-bold">
                        {{ $delay->status_pembayaran }}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection