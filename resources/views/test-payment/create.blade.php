@extends('layouts.app')

@section('title', 'Test Pembayaran')
@section('content-title', 'Form Test Pembayaran')

@section('content')

   @include('includes.error')

<form id="demo-form2" action="{{ route('test-payment.store') }}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
    @csrf

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="status-user">Bank <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select id="status-user" name="bank_account" class="select2_single form-control" tabindex="-1">
            <option value="">-- Pilih Salah Satu --</option>
                @foreach ($banks as $bank)
                    <option value="{{ $bank->external_id }}">{{ $bank->bank_code }} - {{ $bank->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <small>Secara Default akan dibayar sebesar 50.000 ribu</small>
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
@endsection
