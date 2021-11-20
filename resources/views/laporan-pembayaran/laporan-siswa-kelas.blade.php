@extends('layouts.app')

@section('content-title', 'Tabel Pembayaran SPP Siswa & Kelas')

@section('content')
        {{-- Alert Validation --}}
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                {{ $error }}
            </div>
        @endforeach
        @endif

        @if (session('success'))
        <div class="alert alert-success alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            {{ session('error') }}
        </div>
        @endif
        <form action="{{ route('laporan-sppSiswaKelas.store')}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
            @csrf
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nis_siswa">Nis Siswa <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" name="nis_siswa" id="nis_siswa" class="form-control " required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kelas">Kelas <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <select class="select2_single form-control" name="kelas" id="kelas" tabindex="-1" required >
                        <option value="">Pilih Salah Satu</option>
                        @foreach ($dataKelas as $itemKelas)
                            <option value="{{$itemKelas->id_kelas}}">{{ $itemKelas->nama_kelas}}</option>
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
                <form action="{{ route('laporan-sppSiswaKelas.filter')}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
                    @csrf
                    <input type="hidden" name="nis_siswa" value="{{ $nis_siswa }}">
                    <input type="hidden" name="kelas" value="{{ $kelas }}">
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
                @php
                    $no = 1;
                @endphp
                
                @foreach ($data as $indexData => $itemData)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $spp->nis }}</td>
                        <td>{{ $spp->nama_siswa }}</td>
                        <td>{{ $spp->nama_kelas }}</td>
                        <td>{{ $spp->tahun_ajaran }}</td>
                        <td> {{ \Carbon\Carbon::parse($itemData->jatuh_tempo)->format('m-Y')}} </td>
                        <td>{{ $itemData->tertunggak }}</td>
                        <td> {{ $itemData->tanggal_bayar != null ? \Carbon\Carbon::parse($itemData->tanggal_bayar)->format('d-m-Y') : ""}} </td>
                        <td>Rp {{ number_format($itemData->total_biaya,0) }}</td>
                        <td>
                            <div class="btn btn-danger text-white text-uppercase font-weight-bold">
                                {{ $itemData->status_pembayaran }}
                            </div>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif

@endsection