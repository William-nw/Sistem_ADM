@extends('layouts.app')

@section('content-title', 'Form Master Buku')

@section('content')
@include('includes.error')
<form action="{{ route('master-buku.store')}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama-buku">Nama Buku <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="nama_buku" id="nama-buku" required="required" class="form-control ">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kelas">Kelas <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select id="kelas" name="kelas" class="select2_single form-control" tabindex="-1">
            <option value="">-- Pilih Salah Satu --</option>
                @foreach ($kelas as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tahun_ajaran">Tahun Ajaran <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select id="tahun_ajaran" name="tahun_ajaran" class="select2_single form-control" tabindex="-1">
            <option value="">-- Pilih Salah Satu --</option>
                @foreach ($tahun_ajaran as $tahun_ajaran)
                    <option value="{{ $tahun_ajaran->id }}">{{ $tahun_ajaran->nama_tahun_ajaran }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="harga_buku">Harga Buku <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="harga_buku" id="harga_buku" required="required" class="form-control ">
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