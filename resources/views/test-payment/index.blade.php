@extends('layouts.app')
@section('title', 'Data Pembayaran')

@section('content-title', 'Data Pembayaran')

@section('content')
    {{-- errror validation --}}
    @include('includes.error')

    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                        <a href="{{ route('test-payment.create') }}" class="btn btn-primary text-white ">
                            Test Pembayaran
                        </a>
                    </p>


                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>External id</th>
                            <th>Owner id</th>
                            <th>Bank</th>
                            <th>No Rekening</th>
                            <th>Nama Pemilik Rekening</th>
                            <th>Tipe Akun</th>
                            <th>Jumlah Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
{{--                            <th>Aksi</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($callback_payment as $index_payment => $item_payment)
                            <tr>
                                <td>{{ $index_payment + 1 }}</td>
                                <td>{{ $item_payment->external_id }}</td>
                                <td>{{ $item_payment->owner_id }}</td>
                                <td>{{ strtoupper($item_payment->bank_code) }}</td>
                                <td>{{ $item_payment->account_number }}</td>
                                <td>{{ $item_payment->masterBankAccount->name }}</td>
                                <td>{{ ucwords($item_payment->masterBankAccount->type_account) }}</td>
                                <td>{{ number_format($item_payment->jumlah_pembayaran,0) }}</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($item_payment->tanggal_pembayaran)) }}</td>

                                {{--                                <td>--}}
{{--                                    <a href="{{ route('akun-bank.edit',[$item_bank->bank_id]) }}"--}}
{{--                                       class=" btn btn-sm btn-warning">Edit</a>--}}
{{--                                      <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
