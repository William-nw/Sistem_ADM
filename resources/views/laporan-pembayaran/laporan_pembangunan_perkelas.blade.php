@extends('layouts.app')

@section('content-title', 'Tabel Pembayaran Pembangunan Perkelas')

@section('content')
        <form action="#" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
            @csrf
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kelas">Kelas <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <select class="select2_single form-control" name="kelas" id="kelas" tabindex="-1" required >
                        <option value="">Pilih Salah Satu</option>
                            <option value="#">1A</option>
                            <option value="#">1B</option>
                            <option value="#">1C</option>
                    </select>
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

        <div id="filter-tanggal">
            <form action="#" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
                @csrf
                <input type="hidden" name="kelas" value="#">
                <input type="hidden" name="tahun_ajaran" value="#">
                <button type="submit" class="btn btn-primary">Cetak</button>
            </form>
        </div>
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">

            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Tahun</th>
                    <th>Uang Pembangunan</th>
                    <th>Nominal Pembayaran Pembangunan</th>
                </tr>
            </thead>
            <tbody>
                        <tr>
                            <td>1</td>
                            <td>0000001</td>
                            <td>Poly</td>
                            <td>1A</td>
                            <td>2021/2022</td>
                            <td>Rp. 2.000.000</td>
                            <td>
                                <ul>
                                    <li>
                                        Rp. 150.000
                                    </li>
                                    <li>
                                        Rp. 150.000
                                    </li>
                                </ul>
                            </td>
                        </tr>

                    <th colspan="6">
                        Total: 
                    </th>
                    <th>Rp. 300.000</th>

            </tbody>
        </table>

@endsection
