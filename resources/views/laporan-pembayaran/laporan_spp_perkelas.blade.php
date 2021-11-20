@extends('layouts.app')

@section('content-title', 'Laporan SPP PerKelas')

@section('content')
        <form action="{{ route('laporan-spp-kelas.store')}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
            @csrf

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kelas">Kelas <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <select class="select2_single form-control" name="kelas" id="kelas" tabindex="-1" required >
                        <option value="">Pilih Salah Satu</option>
                        @foreach ($kelas as $itemKelas)
                            <option value="{{$itemKelas->id_kelas}}">{{ $itemKelas->nama_kelas}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_awal">Tanggal Pembayaran <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="date" name="tanggal_pby" id="tanggal_pby" class="form-control " required>
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
        <div id="filter-tanggal">
            <form action="{{ route('laporan-spp-kelas.laporanKelas') }}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
                @csrf
                <input type="hidden" name="kelas" value="{{ $data_kelas }}">
                <input type="hidden" name="tanggal_pby" value="{{ $data_tanggal_pby }}">
                <input type="hidden" name="tahun_ajaran" value="{{ $data_tahun_ajaran }}">
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
                    <th>Tahun Ajaran</th>
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
                    $total_biaya =[];
                @endphp

                @foreach ($data as $index => $delay)
                    @foreach ($delay->data as $itemDetailSPP)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $delay->nis }}</td>
                            <td>{{ $delay->nama_siswa }}</td>
                            <td>{{ $delay->nama_kelas }}</td>
                            <td>{{ $delay->tahun_ajaran }}</td>
                            <td>{{  \Carbon\Carbon::parse($itemDetailSPP->jatuh_tempo)->format('m-Y')}}</td>
                            <td>{{ $itemDetailSPP->tertunggak }}</td>
                            <td>{{  \Carbon\Carbon::parse($itemDetailSPP->tanggal_bayar)->format('d-m-Y')}}</td>
                            <td>
                                @php
                                    array_push($total_biaya, $itemDetailSPP->total_biaya);
                                    echo "Rp ".number_format($itemDetailSPP->total_biaya,0);
                                @endphp
                            </td>
                            <td>{{ ucfirst($itemDetailSPP->status_pembayaran) }}</td>
                        </tr>
                        @endforeach
                @endforeach

                    <th colspan="6">
                        Total: Rp 
                        @php
                            echo number_format(array_sum($total_biaya),0);
                        @endphp
                    </th>

            </tbody>
        </table>
        @endif

@endsection