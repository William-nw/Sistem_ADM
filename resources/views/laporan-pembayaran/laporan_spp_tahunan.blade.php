@extends('layouts.app')

@section('content-title', 'Tabel Pembayaran Tahunan SPP')

@section('content')
        <form action="{{ route('laporan-spp-siswa.sppTahunan')}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
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
                        @foreach ($tahunAjaran as $itemTahunAjaran)
                            <option value="{{$itemTahunAjaran->id_tahun_ajaran}}">{{ $itemTahunAjaran->tahun_ajaran}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>

        @if ($data != null)
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <div id="filter-tanggal">
                <form action="{{ route('laporan-spp-siswa.cetaksppTahunan')}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
                    @csrf
                    <input type="hidden" name="tahun" value="{{ $tahun }}" readonly>
                    <input type="hidden" name="tahun_ajaran" value="{{ $tahun_ajaran }}" readonly>
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </form>
            </div>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Total Pembayaran SPP Setahun</th>
                    <th>Tahun Ajaran</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                    $totalSetahun = [];
                @endphp

                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>Rp {{ number_format($data,0) }}</td>
                        <td>
                            {{$dataTahunAjaran->tahun_ajaran}}
                        </td>

                    </tr>
            </tbody>
        </table>
        @endif

@endsection