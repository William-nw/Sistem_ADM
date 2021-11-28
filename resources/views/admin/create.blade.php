@extends('layouts.app')

@section('content-title', 'Form Admin')

@section('content')

   @include('includes.error')

<form id="demo-form2" action="{{ route('data-admin.store') }}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama Lengkap <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="nama" name="nama" class="form-control ">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="email"  id="email" name="email" required="required" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="password" class="form-control" id="password" name="password">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="status">posisi <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select id="status" name="status" class="select2_single form-control" tabindex="-1">
                <option value="tata_usaha">Tata Usaha</option>
                <option value="kepala_sekolah">Kepala Sekolah</option>
            </select>
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
@endsection