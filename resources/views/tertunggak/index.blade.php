@extends('layouts.app')

@section('content-title', 'Tabel Tunggakan SPP Siswa Perbulan Filter Tanggal')

@section('content')
    <form action="#" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
        @csrf
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_awal">Tanggal Awal <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control ">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_akhir">Tanggal AKhir <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control ">
            </div>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
        <div id="filter-tanggal">
            <form action="#" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
                @csrf
                <input type="hidden" name="tanggal_awal" value="#">
                <input type="hidden" name="tanggal_akhir" value="#">
                <button type="submit" class="btn btn-primary">Cetak</button>
            </form>
        </div>
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1A</td>
                    <td>Rp. 6.000.000</td>
                </tr>
            </tbody>
        </table>
@endsection