@extends('layouts.app')

@section('content-title', 'Card siswa')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <h2>NIS</h2>
    </div>
    <div class="col-md-5 col-sm-5  form-group top_search">
        <div class="input-group">
            <input type="hidden" id="link"  readonly>
            <input type="number" name="nis" id="nis" class="form-control" placeholder="NIS Siswa">
            <span class="input-group-btn">
                <button class="btn btn-default" id="searchNis">Go!</button>
            </span>
        </div>
    </div>
</div>
<div class="row" id="show-siswa">

     @foreach ($ortu as $itemOrtu->siswa_ortu as $data_student)
                {{-- @foreach ($valueDetailSiswa->SPP as $itemSPP)  --}}
                    <div class="col-md-4 col-sm-4 mb-3">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4>{{ $itemOrtu->NIS_siswa}}</h4>
                                <p><b>NIS:</b></p>
                                    <small>Kode SPP: </small><br />
                                    <small>Tanggal Register SPP: <b></b></small><br />
                                    <small>
                                        Status Pembayaran: 
                                        <b>
                                            
                                        </b>
                                    </small>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Kelas    </h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Tahun Ajaran </li>
                                </ul>
                                <a href="#" class="btn btn-primary mt-3">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                {{-- @endforeach
            @endforeach
        @endif --}}
@endforeach  

</div>

@endsection

@section('custom-js')
    <script src="{{ asset('js/searchSiswa.min.js') }}"></script>
@endsection