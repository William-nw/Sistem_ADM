@extends('layouts.app')

@section('content-title', 'Form Master Tahun Ajaran')

@section('content')
<form action="{{ route('master-tahun-ajaran.update', $tahun_ajaran->id)}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
    @csrf
    @method("PUT")
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tahun-ajaran">Tahun Ajaran <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="tahun_ajaran" id="tahun-ajaran" required="required" class="form-control " value="{{ $tahun_ajaran->tahun_ajaran }}">
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button type="submit" class="btn btn-success">Ubah</button>
        </div>
    </div>
</form>
@endsection