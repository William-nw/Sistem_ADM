@extends('layouts.app')

@section('content-title', 'Tabel Buku')

@section('content')
    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                        <a href="{{ route('master-buku.create') }}" class="btn btn-primary text-white " >Tambah Buku</a>
                    </p>

                    {{-- Validation --}}
                    @include('includes.error')

                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Buku</th>
                                <th>Kelas</th>
                                <th>Tahun Ajaran</th>
                                <th>Harga Buku</th>
                                @if (Auth::user()->status == 'tata_usaha')
{{--                                <th>Aksi</th>--}}
                                @endif
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($buku as $index_buku => $item_buku)
                                    <tr>
                                        <td>{{ $index_buku + 1 }}</td>
                                        <td>{{ $item_buku->nama_buku }}</td>
                                        <td>{{ $item_buku->masterKelas[0]->nama_kelas}}</td>
                                        <td>{{ $item_buku->masterTahunAjaran[0]->nama_tahun_ajaran}}</td>
                                        <td>{{ $item_buku->harga_buku}}</td>
                                @if (Auth::user()->status == 'tata_usaha')
{{--                                        <td>--}}
{{--                                            <a href="{{ route('master-buku.edit',[$item_buku->id_buku]) }}" class=" btn btn-sm btn-warning">Edit</a>--}}
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

{{-- select --}}

{{-- <select id="buku">
    <option value="1">Buku MTK</option>
    <option value="2">Buku Indo</option>
    <option value="3">Buku English</option>
    <option value="4">Buku Penjas</option>
</select>

<button id="btn_tambah">Tambah</button> --}}

{{-- result --}}
{{-- <div id="result"></div>

<script>
    // event listener
    let btn_tambah = document.getElementById('btn_tambah');
    btn_tambah.addEventListener('click', tambahBarang);



    function tambahBarang()
    {
        let form_buku = document.getElementById('buku');
        let get_id_buku = form_buku.options[form_buku.selectedIndex].value;
        let result = document.getElementById('result');

        result.innerHTML =get_id_buku;

    }


</script> --}}
