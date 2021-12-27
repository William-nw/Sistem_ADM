@extends('layouts.app')

@section('content-title', 'Detail Uang Buku Siswa')

@section('content')

         {{-- Alert Validation --}}
         @include('includes/error')

        {{--    Modals Guide Payment    --}}
        @include('includes\Modals\payment-guide-administration')

        <div class="col-md-12 col-sm-12">
            <div class="col-md-12 col-sm-12 mb-2">
                <h3 class="mb-3">Data Uang Buku</h3>
            </div>
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Data Siswa</th>
                    <th>Data Buku</th>
                    <th>Total Harga Buku</th>
                    <th>Status Buku</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($administration as $item)
                        @foreach($item['data_administration'] as $books_adm)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $books_adm->siswaData->NIS_siswa }} -
                                    {{ $books_adm->siswaData->nama_siswa }} -
                                    {{ $books_adm->siswaData->tingkat }} -
                                    {{ $books_adm->masterKelas->nama_kelas }} -
                                    {{ $books_adm->tahunAjaran->nama_tahun_ajaran }}
                                </td>
                                <td>
                                    @php
                                        $books_encoded = json_decode($books_adm->data_buku);
                                        $total_books  = 0;
                                    @endphp
                                      <ol>
                                          @foreach($books_encoded as $book_data)
                                            <li>
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
                                </td>
                                <td>
                                    Rp. {{ number_format($total_books,2) }}
                                </td>
                                <td>
                                 <span @if($books_adm->status_buku == "lunas")
                                       class="badge badge-success"
                                       @else
                                       class="badge badge-danger"
                                       @endif
                                       style="width: 100%;font-size: 15px;">
                                    {{ ucfirst(str_replace("_"," ",$books_adm->status_buku)) }}
                                  </span>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" type="submit" class="btn btn-success" data-toggle="modal"
                                           data-target=".bs-example-modal-sm-{{ $books_adm->siswaData->NIS_siswa }}">
                                            Bayar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

    {{-- Laporan Pembayaran Uang Buku --}}
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-2">
            <h3 class="mb-3">Data Pembayaran Uang Buku</h3>
        </div>
        <div class="col-md-12 col-sm-12">
            <table id="datatable2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                   <th>No.</th>
                    <th>Data Siswa</th>
                    <th>Data Buku</th>
                    <th>Total Harga Buku</th>
                    <th>Status Buku</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Poly - SD - 1A - 2021/2022</td>
                    <td>
                      <ol>
                        <li> Matematika - qty: 2  - harga Rp 15.000 - total: Rp 30.000  </li>
                        <li> Bahasa indonesia - qty: 2  - harga Rp 15.000 - total: Rp 30.000  </li>
                      </ol>
                    </td>
                    <td>Rp. 60.000</td>
                    <td>
                      <span class="badge badge-success" style="width: 100%;font-size: 15px;">
                        Lunas
                      </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
