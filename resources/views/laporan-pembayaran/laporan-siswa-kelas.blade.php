@extends('layouts.app')

@section('content-title', 'Tabel Pembayaran SPP Siswa & Kelas')

@section('content')
        {{-- Alert Validation --}}
        @include('includes.error')
        <form action="#" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
            @csrf
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nis_siswa">Nis Siswa <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" name="nis_siswa" id="nis_siswa" class="form-control " required>
                </div>
            </div>
            {{-- <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kelas">Kelas <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <select class="select2_single form-control" name="kelas" id="kelas" tabindex="-1" required >
                        <option value="">Pilih Salah Satu</option>
                            <option value="#">1A</option>
                            <option value="#">1B</option>
                            <option value="#">1C</option>
                    </select>
                </div>
            </div> --}}
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
                    <input type="hidden" name="nis_siswa" value="#">
                    <input type="hidden" name="kelas" value="#">
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </form>
            </div>
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
                    <td>Des-2021</td>
                    <td>Desember</td>
                    <td>12-Des-2021</td>
                    <td>Rp. 150.000</td>
                    <td>
                        <div class="btn btn-success text-white text-uppercase font-weight-bold">
                            Lunas
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>0000001</td>
                    <td>Poly</td>
                    <td>1A</td>
                    <td>2021/2022</td>
                    <td>Jan-2022</td>
                    <td>Januari</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                        <div class="btn btn-danger text-white text-uppercase font-weight-bold">
                            Belum Lunas
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>0000002</td>
                    <td>Doly</td>
                    <td>1A</td>
                    <td>2021/2022</td>
                    <td>Nov-2021</td>
                    <td>November</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                        <div class="btn btn-danger text-white text-uppercase font-weight-bold">
                            Tertunggak
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

@endsection