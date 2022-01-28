@extends('layouts.app')

@section('content-title', 'Tabel Master Kelas')

@section('content')
    {{--Alert validation --}}
 @include('includes/error')

<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kelas</th>
{{--            <th>Aksi</th>--}}
        </tr>
    </thead>
    <tbody>
        @foreach ($master_kelas as $index => $master_kelas)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $master_kelas->nama_kelas }}</td>
{{--                <td>--}}
{{--                    <form action="{{ route('master-kelas.destroy', $master_kelas->id) }}" method="POST" class="d-flex">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <a href="{{ route('master-kelas.edit', $master_kelas->id) }}" class=" btn btn-sm btn-warning">Edit</a>--}}
{{--                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>--}}
{{--                    </form>--}}
{{--                </td>--}}
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
