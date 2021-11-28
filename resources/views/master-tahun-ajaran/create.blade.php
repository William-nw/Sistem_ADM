@extends('layouts.app')

@section('content-title', 'Form Master Tahun Ajaran')

@section('content')
<form action="{{ route('master-tahun-ajaran.store')}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_tahun_ajaran">Tahun Ajaran <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="nama_tahun_ajaran" id="nama_tahun_ajaran" required="required" class="form-control ">
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