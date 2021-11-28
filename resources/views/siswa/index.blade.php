@extends('layouts.app')

@section('content-title', 'Tabel Siswa')

@section('content')
    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                        <a href="{{ route('data-siswa.create') }}" class="btn btn-primary text-white " >Tambah Siswa</a>
                    </p>

                    {{-- Validation --}}
                   @include('includes.error')
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Tahun Ajaran</th>
                                @if (Auth::user()->status == 'tata_usaha') 
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($siswa as $index_siswa => $item_siswa)
                                    <tr>
                                        <td>{{ $index_siswa + 1 }}</td>
                                        <td>{{ $item_siswa->NIS_siswa }}</td>
                                        <td>{{ $item_siswa->nama_siswa}}</td>
                                        <td>{{ $item_siswa->masterKelas->nama_kelas}}</td>
                                        <td>{{ $item_siswa->tahunAjaran->nama_tahun_ajaran}}</td>
                                @if (Auth::user()->status == 'tata_usaha') 
                                        <td>
                                            <a href="{{ route('data-siswa.edit',[$item_siswa->id]) }}" class=" btn btn-sm btn-warning">Edit</a>
                                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                        </td>
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