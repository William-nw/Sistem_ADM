@extends('layouts.app')

@section('content-title', 'Tabel Master Tahun Ajaran')

@section('content')
    {{--Alert validation --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong> {{ $error }}</strong>
            </div>
        @endforeach
    @endif

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

<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tahun Ajaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tahun_ajaran as $index => $tahun_ajaran)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $tahun_ajaran->nama_tahun_ajaran }}</td>
                <td>
                    <form action="{{ route('master-tahun-ajaran.destroy', $tahun_ajaran->id) }}" method="POST" class="d-flex">
                        @csrf 
                        @method('DELETE')
                        <a href="{{ route('master-tahun-ajaran.edit', $tahun_ajaran->id) }}" class=" btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection