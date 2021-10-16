@extends('layouts.app')

@section('content-title', 'Tabel User Orang Tua')

@section('content')
    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                        <a href="{{ route('data-ortu.create') }}" class="btn btn-success text-white " >Tambah Orang Tua</a>
                    </p>

                    {{-- Validation --}}
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <strong> {{ session('error') }}</strong>
                            </div>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <strong> {{ session('success') }}</strong>
                            </div>
                        </div>
                    @endif

                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Orang Tua</th>
                                <th>Email</th>
                                <th>No.HP</th>
                                <th>Siswa Orang Tua</th>
                                @if (Auth::user()->status == 1) 
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp

                                @foreach ($ortu as $itemOrtu)
                                    <tr>
                                        <td> {{ $no++ }} </td>
                                        <td> {{ $itemOrtu->nama_user}} </td>
                                        <td> {{ $itemOrtu->nama_lengkap}} </td>
                                        <td> {{ $itemOrtu->email}} </td>
                                        <td> {{ $itemOrtu->siswa_ortu}} </td>
                                        @if (Auth::user()->status == 'tata_usaha') 
                                            <td> 
                                                <a href="{{ route('data-ortu.edit',$itemOrtu->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                                                {{-- <form action="{{ route('siswa.destroy', $itemSiswa->nis) }}" method="POST" class="d-flex">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                                </form> --}}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection