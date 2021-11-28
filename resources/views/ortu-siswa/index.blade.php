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

                    @include('includes/error')

                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Orang Tua</th>
                                <th>Email</th>
                                <th>No.HP</th>
                                <th>Siswa Orang Tua</th>
                                @if (Auth::user()->status == 'tata_usaha')
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
                                        @if ($itemOrtu->status == 'orang_tua')

                                        <td> {{ $no++ }} </td>
                                        <td> {{ $itemOrtu->name}} </td>
                                        <td> {{ $itemOrtu->email}} </td>
                                        <td> {{ $itemOrtu->no_hp}} </td>
                                        <td>
                                            <ul>
                                                @foreach($itemOrtu->siswa_ortu as $data_student)
                                                    <li>{{ $data_student->NIS_siswa }} - {{ $data_student->nama_siswa }} - {{ $data_student->tingkat }} ( {{ $data_student->masterKelas->nama_kelas }} - {{ $data_student->tahunAjaran->nama_tahun_ajaran }})</li>
                                                @endforeach
                                            </ul>

                                        </td>
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
                                    @endif
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
