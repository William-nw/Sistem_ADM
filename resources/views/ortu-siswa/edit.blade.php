@extends('layouts.app')

@section('content-title', 'Form Edit User Orang Tua')

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


<form action="{{ route('data-ortu.update', $ortu->id) }}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
    @csrf
    @method('PUT')

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_orang_tua">Nama Lengkap Orang Tua <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="nama_orang_tua" name="nama_orang_tua" value="{{ $ortu->nama_lengkap}}" required="required" class="form-control ">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="email" name="email" value="{{ $ortu->email }}" required="required" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_hp">No.HP <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="no_hp" name="no_hp" value="{{ $ortu->no_hp }}" required="required" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">New Password <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="password" class="form-control" id="password" name="password">
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