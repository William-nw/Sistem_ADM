@extends('layouts.app')

@section('content-title', 'Pencarian Siswa')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <h2>NIS</h2>
    </div>
    <div class="col-md-5 col-sm-5  form-group top_search">
        <div class="input-group">
            {{-- <input type="hidden" id="link" value="{{$link}}" readonly> --}}
            <input type="number" name="nis" id="nis" class="form-control" placeholder="NIS Siswa">
            <span class="input-group-btn">
                <button class="btn btn-default" id="searchNis">Go!</button>
            </span>
        </div>
    </div>
</div>
<div class="row" id="show-siswa">
        {{-- doom object --}}
</div>

@endsection

@section('custom-js')
    <script src="{{ asset('js/searchSiswa.min.js') }}"></script>
@endsection