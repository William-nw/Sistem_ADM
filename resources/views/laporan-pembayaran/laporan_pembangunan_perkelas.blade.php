@extends('layouts.app')

@section('content-title', 'Tabel Pembayaran Pembangunan Perkelas')

@section('content')
        <form action="{{ route('pembayaran-pembangunan-perkelas.store')}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
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
            <form action="{{ route('pembayaran-pembangunan-perkelas.laporanPembayaran') }}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
                @csrf
                <input type="hidden" name="kelas" value="{{ $data_kelas }}">
                <input type="hidden" name="tahun_ajaran" value="{{ $data_kelas }}">
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
                    <th>Keterangan</th>
                    <th>Nominal Pembayaran Pembangunan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                    $total_biaya =[];
                @endphp

                @foreach ($data as $indexPembangunan => $itemPembangunan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $itemPembangunan->nis }}</td>
                            <td>{{ $itemPembangunan->nama_siswa }}</td>
                            <td>{{ $itemPembangunan->nama_kelas }}</td>
                            <td>{{ $itemPembangunan->tahun_ajaran }}</td>
                            <td>
                                @foreach ($itemPembangunan->pembayaranPembangunan as $itemDetailPembayaranPembangunan)
                                    <ul>
                                        <li>{{ $itemDetailPembayaranPembangunan->keterangan_angsuran}}</li>
                                    </ul>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($itemPembangunan->pembayaranPembangunan as $itemDetailPembayaranPembangunan)
                                <ul>
                                    <li>
                                        @php
                                        array_push($total_biaya, $itemDetailPembayaranPembangunan->total_biaya);
                                        echo "Rp ".number_format($itemDetailPembayaranPembangunan->total_biaya,0);
                                        @endphp
                                    </li>
                                </ul>
                                @endforeach
                            </td>
                        </tr>
                @endforeach

                    <th colspan="7">
                        Total: Rp 
                        @php
                            echo number_format(array_sum($total_biaya),0);
                        @endphp
                    </th>

            </tbody>
        </table>
        @endif

@endsection