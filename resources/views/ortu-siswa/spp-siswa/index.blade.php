@extends('layouts.app')

@section('content-title', 'Card siswa')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2>NIS</h2>
        </div>
        {{--  search for admin  --}}
        <div class="col-md-5 col-sm-5  form-group top_search">
            <div class="input-group">
                <input type="hidden" id="link" readonly>
                <input type="number" name="nis" id="nis" class="form-control" placeholder="NIS Siswa">
                <span class="input-group-btn">
                <button class="btn btn-default" id="searchNis">Go!</button>
            </span>
            </div>
        </div>
    </div>
    <div class="row" id="show-siswa">

        @foreach ($ortu as $data_spp)
            @foreach ($data_spp['data_spp'] as $itemSPP)
                <div class="col-md-4 col-sm-4 mb-3">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4>{{ ucwords($itemSPP->siswaData[0]->nama_siswa) }}</h4>
                            <p><b>NIS: {{ $itemSPP->NIS_siswa }}</b></p>
                            <h7>Kode SPP:
                                <b>{{ $itemSPP->kode_spp }}</b>
                            </h7><br/>
                            <h7>Tanggal Register SPP:
                                <b> {{ date("d-m-Y H:i:s" , strtotime($itemSPP->created_at) ) }} </b>
                            </h7><br/>
                            <h7>
                                Status Pembayaran:
                                <b>
                                    {{ str_replace("_", " ", strtoupper($itemSPP->status_spp) ) }}
                                </b>
                            </h7>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Kelas: {{ $itemSPP->masterKelas->nama_kelas }} </h5>
                            <h5 class="card-title">Tahun Ajaran: {{ $itemSPP->tahunAjaran->nama_tahun_ajaran }} </h5>
                            <a href="{{ route('spp-siswa-ortu.show',[$itemSPP->kode_spp, $itemSPP->NIS_siswa]) }}" class="btn btn-primary mt-3">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach

    </div>

@endsection

@section('custom-js')
    <script src="{{ asset('js/searchSiswa.min.js') }}"></script>
@endsection
