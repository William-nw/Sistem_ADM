@extends('layouts.app')

@section('content-title', 'Tabel Tunggakan Per Siswa')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <h2>NIS</h2>
    </div>
    <div class="col-md-5 col-sm-5  form-group top_search">
        <form action="{{ route('tertunggak.search') }}" method="GET">
            <div class="input-group">
                {{-- <input type="hidden" id="link" value="{{$link}}" readonly> --}}
                <input type="text" name="nis" id="nis" class="form-control" placeholder="NIS Siswa">
                <span class="input-group-btn">
                    <button class="btn btn-default" id="searchNis">Go!</button>
                </span>
            </div>
        </form>
    </div>
</div>
@if (count($delays) > 0)
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Jatuh Tempo</th>
            <th>Bulan Menunggak</th>
            <th>Status Menunggak</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($delays as $index => $delay)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $delay->nama_siswa }}</td>
                <td>{{  \Carbon\Carbon::parse($delay->jatuh_tempo)->format('m-Y')}}</td>
                <td>{{ $delay->tertunggak }}</td>
                <td>
                    <div class="btn btn-danger text-white text-uppercase font-weight-bold">
                        {{ $delay->status_pembayaran }}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
    <p>Hasil NIS yang tertunggak tidak ditemukan</p>
@endif
@endsection