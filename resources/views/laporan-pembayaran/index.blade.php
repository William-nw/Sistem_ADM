@extends('layouts.app')

@section('content-title', 'Tabel Pembayaran SPP Siswa')

@section('content')
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <a href="#" class="btn btn-primary">Cetak</a>

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
            <tr>
                <td>1</td>
                <td>0000001</td>
                <td>Poly</td>
                <td>1A</td>
                <td>2021/2022</td>
                <td>Nov-2022</td>
                <td>November</td>
                <td>12-Nov-2021</td>
                <td>Rp. 150.000</td>
                <td>
                    <div class="btn btn-success text-white text-uppercase font-weight-bold">
                        Lunas
                    </div>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>0000001</td>
                <td>Poly</td>
                <td>1A</td>
                <td>2021/2022</td>
                <td>Jun-2022</td>
                <td>Juni</td>
                <td>12-Jun-2021</td>
                <td>Rp. 150.000</td>
                <td>
                    <div class="btn btn-success text-white text-uppercase font-weight-bold">
                        Lunas
                    </div>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>0000003</td>
                <td>Doly</td>
                <td>1A</td>
                <td>2021/2022</td>
                <td>Des-2021</td>
                <td>Desember</td>
                <td>12-Desember-2021</td>
                <td>Rp. 150.000</td>
                <td>
                    <div class="btn btn-success text-white text-uppercase font-weight-bold">
                        Lunas
                    </div>
                </td>
            </tr>
    </tbody>
</table>
@endsection