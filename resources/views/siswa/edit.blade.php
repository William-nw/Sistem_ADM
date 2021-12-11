@extends('layouts.app')

@section('content-title', 'Form Edit Siswa')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                {{ $error }}
            </div>
        @endforeach
    @endif


{{-- <form action="{{ route('siswa.update', $scopeSiswa->nis) }}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
    @csrf
    @method('PUT') --}}

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nis">NIS <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="nis" id="nis" value="{{ $siswa->NIS_siswa }}" required="required" class="form-control " readonly>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_siswa">Nama Siswa <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="nama_siswa" id="nama_siswa" value="{{ $siswa->nama_siswa }}" class="form-control" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Kelas <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select class="select2_single form-control" name="kelas" id="kelas" tabindex="-1" required >
                <option value="{{ $siswa->masterKelas->id }}">{{ $siswa->masterKelas->nama_kelas }}</option>
                    @foreach ($kelas as $itemKelas)
                        @if( $siswa->masterKelas->id != $itemKelas->id)
                            <option value="{{$itemKelas->id}}">{{ $itemKelas->nama_kelas}}</option>
                        @endif
                    @endforeach
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Tahun Ajaran <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select class="select2_single form-control" tabindex="-1" name="tahun_ajaran" id="tahun_ajaran" required>
                <option value="{{ $siswa->tahunAjaran->id }}">{{ $siswa->tahunAjaran->nama_tahun_ajaran }}</option>

                @foreach ($tahunAjaran as $itemtahunAjaran)
                    @if( $siswa->tahunAjaran->id != $itemtahunAjaran->id)
                        <option value="{{$itemtahunAjaran->id}}">{{ $itemtahunAjaran->nama_tahun_ajaran}}</option>
                    @endif
                @endforeach
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
