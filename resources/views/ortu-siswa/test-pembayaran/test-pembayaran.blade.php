@extends('layouts.app')

@section('content-title', 'test Pembayaran')

@section('content')

   @include('includes/error')

   <form action="#" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >

    @csrf
    
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="siswa">Siswa<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <div class="form-group">
                <select id="" class="select2_single form-control" tabindex="-1">
                <option value="" style="text-align-last:center">-- Pilih Anak --</option>
                    <option style="text-align-last:center">Poly - SD ( 1A - 2021/2022)</option>
                    <option style="text-align-last:center">Agus - SD ( 1A - 2021/2022)</option>
                    <option style="text-align-last:center">Bodi - SD ( 1A - 2021/2022)</option>
                </select>
              </div>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="jumlah_transfer">Jumlah Transfer<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="jumlah_transfer" name="jumlah_transfer" required="required" class="form-control ">
        </div>
    </div>
    <div class="item form-group">
        <label for="tergunggak" class="col-form-label col-md-3 col-sm-3 label-align"> Tertunggak</label>
        <div class="col-md-6 col-sm-6 ">
            <a href="#" class="btn btn-primary stretched-link">SPP</a>
            <a href="#" class="btn btn-primary stretched-link">Pembangunan</a>
            <a href="#" class="btn btn-primary stretched-link">Buku</a>
            <a href="#" class="btn btn-primary stretched-link">Baju</a>
            <a href="#" class="btn btn-primary stretched-link">Konsumsi</a>
        </div>
    </div>
</form>
@endsection
