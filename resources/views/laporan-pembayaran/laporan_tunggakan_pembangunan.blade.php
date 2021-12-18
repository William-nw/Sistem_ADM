@extends('layouts.app')

@section('content-title', 'Tunggakan & Pembayaran Pembangunan')

@section('content')
<div class="row">
    
    <div class="container ml-2">
        <a href="#" class="btn btn-warning">Cetak PDF</a>
    </div>

    <div class="col-md-12 col-sm-12">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Uang Pembangunan</th>
                    <th>Total Pembayaran</th>
                    <th>Sisa Total Tunggakan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>0000001</td>
                    <td>Poly</td>
                    <td>Rp. 2.000.000</td>
                    <td>Rp. 1.500.000</td>
                    <td>Rp. 500.000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>0000002</td>
                    <td>Doly</td>
                    <td>Rp. 2.000.000</td>
                    <td>Rp. 500.000</td>
                    <td>Rp. 1.500.000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection