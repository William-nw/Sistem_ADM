@extends('layouts.app')

@section('content-title', 'Form Siswa')

@section('content')

 @include('includes/error')


<form action="{{ route('data-siswa.store')}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nis_siswa">NIS Siswa <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="number" name="nis_siswa" id="nis_siswa"
             pattern="(^0[0-9])\w+"
             title="Angka Mulai Dari 0"
             required="required" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_siswa">Nama Siswa <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="nama_siswa" id="nama_siswa" required="required" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tingkat">Tingkat <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select id="tingkat" name="tingkat" class="select2_single form-control" tabindex="-1">
            <option value="">-- Pilih Salah Satu --</option>
                <option value="tk">TK</option>
                <option value="sd">SD</option>
                <option value="smp">SMP</option>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kelas">Kelas <span
                class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select class="select2_single form-control" name="kelas" id="kelas" tabindex="-1" required>
                <option value="">Pilih Salah Satu</option>
                @foreach ($kelas as $itemKelas)
                    <option value="{{$itemKelas->id_kelas}}">{{ $itemKelas->nama_kelas}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tahun_ajaran">Tahun Ajaran <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select id="tahun_ajaran" name="tahun_ajaran" class="select2_single form-control" tabindex="-1">
            <option value="">-- Pilih Salah Satu --</option>
                @foreach ($tahun_ajaran as $ttahunAjaran)
                    <option value="{{ $ttahunAjaran->id }}">{{ $ttahunAjaran->nama_tahun_ajaran }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Doom --}}
    <div id="show_amount"></div>

    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
@endsection
@section('custom-js')
    <script src="{{ asset('js/filter_pilihan_spp.min.js') }}"></script>
@endsection
