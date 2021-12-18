@extends('layouts.app')

@section('content-title', 'Tabel Pembayaran Tahunan Pembangunan')

@section('content')
        <form action="#" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
            @csrf

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tahun">Tahun <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" name="tahun" id="tahun" class="form-control" placeholder="EX: 2020" required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tahun_ajaran">Tahun Ajaran <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <select class="select2_single form-control" name="tahun_ajaran" id="tahun_ajaran" tabindex="-1" required >
                        <option value="">Pilih Salah Satu</option>
                            <option value="#">2019/2020</option>
                            <option value="#">2020/2021</option>
                            <option value="#">2021/2022</option>
                    </select>
                </div>
            </div>

            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>

        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <div id="filter-tanggal">
                <form action="#" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
                    @csrf
                    <input type="hidden" name="tahun" value="#" readonly>
                    <input type="hidden" name="tahun_ajaran" value="#" readonly>
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </form>
            </div>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Total Pembayaran Setahun</th>
                    <th>Tahun Ajaran</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>1</td>
                        <td>Rp. 10.150.000</td>
                        <td>
                            2021/2022
                        </td>
                    </tr>
            </tbody>
        </table>
@endsection
