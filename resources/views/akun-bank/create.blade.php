@extends('layouts.app')

@section('title', 'Tambah Bank Akun')
@section('content-title', 'Form Tambah Akun Bank')

@section('content')

   @include('includes.error')

<form id="demo-form2" action="{{ route('akun-bank.store') }}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
    @csrf

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nis_siswa">NIS Siswa <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select id="nis_siswa" name="nis_siswa" class="select2_single form-control" tabindex="-1" required>
                <option value="" selected>Pilih Salah Satu</option>
                @foreach($siswa as $index_siswa => $item_siswa)
                    <option value="{{ $item_siswa->NIS_siswa }}">{{ $item_siswa->NIS_siswa }} - {{ $item_siswa->nama_siswa }} - {{ $item_siswa->masterKelas->nama_kelas }} - {{ $item_siswa->tahunAjaran->nama_tahun_ajaran }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama Pemilik Rekening <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="nama_pemilik_rekening" name="nama_pemilik_rekening" class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="status-user">Bank <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select id="status-user" name="bank_account" class="select2_single form-control" tabindex="-1">
                <option value="BCA" selected>Bank Central Asia</option>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="status-user">Tipe Bank <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select id="status-user" name="tipe_bank" class="select2_single form-control" tabindex="-1">
                <option value="Virtual Account" selected>Virtual Account</option>
            </select>
        </div>
    </div>
    <small>
        *Fyi: Nomor rekening virtual account akan di create oleh pihak payment gateway.
        <a href="{{ route('akun-bank.index') }}">
            <b>Info Akun Bank Klik Disini</b>
        </a>
    </small>
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
@endsection
