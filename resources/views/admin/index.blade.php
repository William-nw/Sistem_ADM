@extends('layouts.app')
@section('title', 'Table Admin')

@section('content-title', 'Tabel Admin')

@section('content')
    {{-- errror validation --}}
{{-- 
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong> {{ session('error') }}</strong> 
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong> {{ session('success') }}</strong>
        </div>
    @endif
 --}}

<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Status User</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $index_user => $item_user)
            <td>{{ $index_user + 1 }}</td>
            <td>{{ $item_user->name }}</td>
            <td>{{ $item_user->email}}</td>
            <td>{{ ucwords(str_replace("_"," ",$item_user->status)) }}</td>
            <td>
                <a href="{{ route('data-admin.edit',[$item_user->id]) }}" class=" btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
            </td>
        @endforeach

    </tbody>
</table>
@endsection