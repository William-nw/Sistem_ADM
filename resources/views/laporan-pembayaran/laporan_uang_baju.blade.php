@extends('layouts.app')

@section('content-title', 'Tunggakan & Pembayaran Buku')

@section('content')
<div class="row">

    <div class="container ml-2">
        <a href="{{ route('print.admClothes') }}" target="_blank" class="btn btn-primary">Cetak</a>
    </div>

    <div class="col-md-12 col-sm-12">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Item Baju</th>
                    <th>Sisa Uang Baju</th>
                    <th>Total Pembayaran</th>
                    <th>Status Uang Baju</th>
                </tr>
            </thead>
            <tbody>
                @foreach($adm_clothes as $cloth_adm)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cloth_adm->siswaData->NIS_siswa }}</td>
                        <td>{{ $cloth_adm->siswaData->nama_siswa }}</td>
                        <td>
                            @php
                                $clothes_encoded = json_decode($cloth_adm->data_baju);
                                $total_clothes = 0;
                            @endphp
                            <ol>
                                @foreach($clothes_encoded as $clothes_data)
                                    <li class="ml-2 p-2">
                                        {{ $clothes_data->cloth_name }} -
                                        Size: {{ $clothes_data->size }} -
                                        Qty: {{ $clothes_data->qty }} -
                                        Harga: Rp {{ number_format($clothes_data->price_clothes,2) }} -
                                        Total: Rp {{ number_format($clothes_data->total,2) }} -

                                    </li>
                                    {{-- sum total --}}
                                    <?php
                                    $total_clothes += $clothes_data->total;
                                    ?>
                                @endforeach
                            </ol>
                            <b>Total Uang Baju:</b> Rp {{ number_format($total_clothes,2)}}
                        </td>
                        <td>Rp. {{ number_format($cloth_adm->total_harga_baju,2) }}</td>
                        <td>Rp. {{ number_format($cloth_adm->paymentClothes->sum('total_pembayaran_baju'),2) }}</td>
                        <td>
                            <div class="btn btn-success text-white text-uppercase font-weight-bold">
                                {{ $cloth_adm->status_baju }}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
