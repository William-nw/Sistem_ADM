@extends('layouts.print')

@section('title', 'Laporan Uang Pembagunan')

@section('content')
    <style>
        table, th, td {
            border: 1px solid black;
            text-align: center;
        }
    </style>

    <div>
        <h1>Laporan Uang-Pembagunan</h1>
        <p>Tanggal Cetak: <b>{{ date('d-m-y H:i:s') }} </b></p>
    </div>

    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Sisa Uang Pembangunan</th>
                    <th>Total Pembayaran</th>
                    <th>Status Uang Pembagunan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($adm_construction as $adm_const)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $adm_const->siswaData->NIS_siswa }}</td>
                        <td>{{ $adm_const->siswaData->nama_siswa }}</td>
                        <td>Rp. {{ number_format($adm_const->total_biaya,2) }}</td>
                        <td>Rp. {{ number_format($adm_const->paymentConstruction->sum('total_pembayaran'),2) }}</td>
                        <td>
                            <div class="btn btn-success text-white text-uppercase font-weight-bold">
                                {{ $adm_const->status_pembangunan }}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection
