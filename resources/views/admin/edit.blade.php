@extends('layouts.app')
@section('title, Form Admin')

@endsection

@section('content-title', 'Form Admin')

@section('content')

    @include('includes/error')

<form id="demo-form2" action="{{ route('data-admin.update', $user->id) }}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    @method("PUT")

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama Lengkap <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="nama" name="nama_lengkap" required="required" class="form-control " value="{{ $user->name }}">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">email <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="email" name="email" required="required" class="form-control" value="{{ $user->email }}">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">password <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="password" name="password" required="required" class="form-control">
        </div>
    </div>
{{--    <div class="item form-group">--}}
{{--        <label class="col-form-label col-md-3 col-sm-3 label-align" for="siswa_ortu">Siswa Ortu <span class="required">*</span></label>--}}
{{--        <div class="col-md-6 col-sm-6 "> --}}
{{--            <div class="form-group">--}}
{{--                <select class="js-example-basic-multiple w-100" multiple="multiple">--}}
{{--                  <option value="AL">Alabama</option>--}}
{{--                  <option value="WY">Wyoming</option>--}}
{{--                  <option value="AM">America</option>--}}
{{--                  <option value="CA">Canada</option>--}}
{{--                  <option value="RU">Russia</option>--}}
{{--                </select>--}}
{{--              </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="status-user">Status User <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select id="status-user" name="status_user" class="select2_single form-control" tabindex="-1">
                <option value="kepala_sekolah" {{ $user->status == 'kepala_sekolah' ? "selected" : "" }}>Kepala Sekolah</option>
                <option value="tata_usaha" {{ $user->status == 'tata_usaha' ? "selected" : "" }}>Tata Usaha</option>
                {{-- <option value="orang_tua" {{ $user->status == 'orang_tua' ? "selected" : "" }}>Orang Tua</option> --}}
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="status-user">Status Aktif <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select id="status-user" name="status_user" class="select2_single form-control" tabindex="-1">
                <option value="0" {{ $user->isactive == '0' ? "selected" : "" }}>Non Aktif</option>
                <option value="1" {{ $user->isactive == '1' ? "selected" : "" }}>Aktif</option>
            </select>
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
{{-- </form> --}}
@endsection
