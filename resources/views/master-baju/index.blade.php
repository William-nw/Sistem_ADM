@extends('layouts.app')

@section('content-title', 'Tabel Baju')

@section('content')
    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                        <a href="{{ route('master-baju.create') }}" class="btn btn-primary text-white " >Tambah Baju</a>
                    </p>

                    {{-- Validation --}}
                    @include('includes.error')

                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Baju</th>
                                <th>Ukuran Baju</th>
                                <th>Kelas</th>
                                <th>Harga Baju</th>
                                @if (Auth::user()->status == 'tata_usaha')
{{--                                <th>Aksi</th>--}}
                                @endif
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($baju as $index_baju => $item_baju)
                                    <tr>
                                        <td>{{ $index_baju + 1 }}</td>
                                        <td>{{ $item_baju->nama_baju }}</td>
                                        <td>{{ $item_baju->ukuran_baju }}</td>
                                        <td>{{ $item_baju->masterKelas[0]->nama_kelas}}</td>
                                        <td>{{ $item_baju->harga_baju}}</td>
                                @if (Auth::user()->status == 'tata_usaha')
{{--                                        <td>--}}
{{--                                            <a href="{{ route('master-baju.edit',[$item_baju->id_baju]) }}" class=" btn btn-sm btn-warning">Edit</a>--}}
{{--                                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endif
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
