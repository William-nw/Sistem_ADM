@extends('layouts.app')

@section('content-title', 'Tunggakan & Pembayaran Pembangunan')

@section('content')
<div class="row">
    
    <div class="container ml-2">
        <a href="{{ route('tunggakan-pembagunan.index') }}" class="btn btn-warning">Cetak PDF</a>
    </div>

    <div class="col-md-12 col-sm-12">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nis</th>
                    <th class="text-center">Nama Siswa</th>
                    <th class="text-center">Total Pembayaran</th>
                    <th class="text-center">Sisa Total Tunggakan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                    @foreach ($dataPembayaran as $itemPembangunan)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center">{{ $itemPembangunan->nis }}</td>
                            <td class="text-center">{{ $itemPembangunan->getDataSiswa->nama_siswa }}</td>
                            <td class="text-center">Rp {{ number_format($itemPembangunan->dataPembayaranPembagunan,0) }}</td>
                            <td class="text-center">Rp {{ number_format($itemPembangunan->total_biaya,0) }}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection