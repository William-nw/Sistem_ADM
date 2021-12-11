@extends('layouts.app')

@section('content-title', 'Data Pembayaran Orang Tua')

@section('content')

    {{--Alert validation --}}
 @include('includes/error')



  <table id="datatable" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode Pembayaran</th>
        <th Scope="col">Tanggal Transfer</th>
        <th scope="col">NIS</th>
        <th scope="col">Nama Siswa</th>
        <th scope="col">Kelas</th>
        <th scope="col">Nominal Transfer</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Status Transfer</th>
        {{-- <th scope="col">Cetak Kwitansi</th> --}}
      </tr>
    </thead>
    <tbody>
        {{-- @php
        $no =1;
        @endphp
        @foreach ($dataPayment as $itemPayment)
          @foreach ($itemPayment->dataPembayaranSiswa as $itemPembayaraSiswa)
            <tr>
                <td scope="row">{{ $no++ }}</td>
                <td>{{ $itemPembayaraSiswa->kode_pembayaran }}</td>
                <td>{{ \Carbon\Carbon::parse($itemPembayaraSiswa->created_at)->format('d-m-Y')}} </td>
                <td>{{ $itemPembayaraSiswa->nis }}</td>
                <td>{{ $itemPembayaraSiswa->nama_siswa }}</td>
                <td>{{ $itemPembayaraSiswa->nama_kelas }}</td>
                <td>Rp {{ number_format($itemPembayaraSiswa->nominal_transfer,0) }}</td>
                <td><a href="{{asset('/bukti-Transfer/'.$itemPembayaraSiswa->bukti_transfer)}}" target="_blank">{{ $itemPembayaraSiswa->bukti_transfer }}</a></td>
                <td>{{ $itemPembayaraSiswa->keterangan }}</td>
                <td>
                  @php
                    $subReplace = ucwords(str_replace("_", " ", $itemPembayaraSiswa->status_transfer));
                    echo $subReplace;
                  @endphp
                </td>
                {{-- <td>
                  @if ($itemPembayaraSiswa->status_transfer == 'terverifikasi')
                    <a href="{{ route('upload-register-siswa-ortu.show', $itemPembayaraSiswa->kode_pembayaran) }}" class="btn btn-primary">Cetak</a>
                  @else
                    <a a href="#" class="btn btn-primary">Cetak</a>
                  @endif
                </td>
              </tr>
            @endforeach
        @endforeach --}}
    </tbody>
  </table>
@endsection
