@extends('layouts.app')

@section('content-title', 'Tunggakan & Pembayaran Konsumsi')

@section('content')
<div class="row">

    <div class="container ml-2">
        <a href="{{ route('print.admBooks') }}" target="_blank" class="btn btn-primary">Cetak</a>
    </div>

    <div class="col-md-12 col-sm-12">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Item Buku</th>
                    <th>Sisa Uang Buku</th>
                    <th>Total Pembayaran</th>
                    <th>Status Uang Buku</th>
                </tr>
            </thead>
            <tbody>
                @foreach($adm_books as $book_adm)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book_adm->siswaData->NIS_siswa }}</td>
                        <td>{{ $book_adm->siswaData->nama_siswa }}</td>
                        <td>
                            @php
                                $books_encoded = json_decode($book_adm->data_buku);
                                $total_books = 0;
                            @endphp
                            <ol>
                                @foreach($books_encoded as $book_data)
                                    <li class="ml-2 p-2">
                                        {{ $book_data->book_name }} -
                                        Qty: {{ $book_data->qty }} -
                                        Harga: Rp {{ number_format($book_data->price_book,2) }} -
                                        Total: Rp {{ number_format($book_data->total,2) }} -

                                    </li>
                                    {{-- sum total --}}
                                    <?php
                                    $total_books += $book_data->total;
                                    ?>
                                @endforeach
                            </ol>
                            <b>Total Uang Baju:</b> Rp {{ number_format($total_books,2)}}
                        </td>
                        <td>Rp. {{ number_format($book_adm->total_harga_buku,2) }}</td>
                        <td>Rp. {{ number_format($book_adm->paymentBooks->sum('total_pembayaran_buku'),2) }}</td>
                        <td>
                            <div class="btn btn-success text-white text-uppercase font-weight-bold">
                                {{ $book_adm->status_buku }}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
