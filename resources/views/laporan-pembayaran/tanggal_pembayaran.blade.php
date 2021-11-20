@extends('layouts.app')

@section('content-title', 'Tabel Pembayaran Siswa Filter Tanggal')

@section('content')
        <form action="{{ route('tanggal-pembayaran-siswa.store')}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
            @csrf

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_awal">Tanggal Awal <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control " required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_akhir">Tanggal AKhir <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control " required>
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
                <form action="{{ route('tanggal-pembayaran-siswa.filter')}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
                    @csrf
                    <input type="hidden" name="tanggal_awal" value="{{ $tanggal_awal }}">
                    <input type="hidden" name="tanggal_akhir" value="{{ $tanggal_akhir }}">
                    <input type="hidden" name="tahun_ajaran" value="{{ $tahun_ajaran }}">
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </form>
            </div>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                
                @foreach ($data as $indexKelas => $itemKelas)
                    {{-- create new array for keep kelas --}}
                    @php
                         $total_biaya[$itemKelas->id_kelas] = [];
                    @endphp

                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            {{ $itemKelas->nama_kelas }}
                        </td>
                            @foreach ($itemKelas->dataSPP as $itemPembayaranSPP)
                                @php
                                    if($itemKelas->id_kelas == $itemPembayaranSPP->id_kelas)
                                    {
                                        array_push($total_biaya[$itemKelas->id_kelas], $itemPembayaranSPP->totalPembayaran);
                                    }
                                 @endphp
                            @endforeach
                        <td>
                            @foreach ($total_biaya as $indexTotal => $valueTotal)
                                @php
                                    if($indexTotal == $itemKelas->id_kelas)
                                    {
                                        echo "Rp ".number_format(array_sum($valueTotal),0);
                                    }
                                @endphp
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif

@endsection