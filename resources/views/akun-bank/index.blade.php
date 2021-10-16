@extends('layouts.app')
@section('title', 'Data Akun Bank')

@section('content-title', 'Data Akun Bank')

@section('content')
    {{-- errror validation --}}
    @include('includes.error')

    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                        <a href="{{ route('akun-bank.create') }}" class="btn btn-primary text-white ">
                            Tambah Akun Bank
                        </a>
                        <a href="{{ route('update-akun-bank.updateVa') }}" class="btn btn-success text-white ">
                            Update Akun Bank
                        </a>
                    </p>


                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>External id</th>
                            <th>Owner id</th>
                            <th>Kode Merchant</th>
                            <th>Bank</th>
                            <th>No Rekening</th>
                            <th>Nama Pemilik Rekening</th>
                            <th>Tipe Akun</th>
                            <th>Tanggal Expired</th>
                            <th>Status Bank</th>
                            <th>Tanggal Update</th>
{{--                            <th>Aksi</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($banks as $index_bank => $item_bank)
                            <tr>
                                <td>{{ $index_bank + 1 }}</td>
                                <td>{{ $item_bank->external_id }}</td>
                                <td>{{ $item_bank->owner_id }}</td>
                                <td>{{ $item_bank->merchant_code }}</td>
                                <td>{{ strtoupper($item_bank->bank_code) }}</td>
                                <td>{{ strtoupper($item_bank->account_number) }}</td>
                                <td>{{ strtoupper($item_bank->name) }}</td>
                                <td>{{ ucwords($item_bank->type_account) }}</td>
                                <td>{{ date('d-m-Y', strtotime($item_bank->expiration_date)) }}</td>
                                <td>{{ ucwords($item_bank->status_bank) }}</td>
                                <td>{{ ($item_bank->updated_at != null) ? date('d-m-Y H:i:s', strtotime($item_bank->updated_at)) : "" }}</td>

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
