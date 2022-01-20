@extends('layouts.app')

@section('content-title', 'Form Daftar User Orang Tua')

@section('content')

   @include('includes/error')

   <form action="{{ route('data-ortu.store')}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >

    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_orang_tua">Nama Lengkap Orang Tua <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="nama_orang_tua" name="nama_orang_tua" required="required" class="form-control ">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="email" id="email" name="email" required="required" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_hp">No_HP <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="no_hp" name="no_hp" maxlength="13" pattern="[0-9]+" title="Harap Masukan Angka" required="required" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="password" class="form-control" id="password" name="password">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="siswa_ortu">Siswa Ortu <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <div class="form-group">
                <select class="js-example-basic-multiple w-100" name="siswa_ortu[]" id="siswa_ortu" multiple="multiple">
                    @foreach ($siswa as $itemSiswa)
                    <option value="{{$itemSiswa->NIS_siswa}}">{{$itemSiswa->NIS_siswa}} - {{ $itemSiswa->nama_siswa}} - {{$itemSiswa->masterKelas->nama_kelas}}</option>
                @endforeach
                </select>
              </div>
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
