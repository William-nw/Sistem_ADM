@extends('layouts.app')

@section('content-title', 'Detail Uang Buku Siswa')

@section('content')

         {{-- Alert Validation --}}
         @include('includes/error')

        {{--    Modals Guide Payment    --}}
        @include('includes\Modals\payment-guide-administration')

        <div class="col-md-12 col-sm-12">
            <div class="col-md-12 col-sm-12 mb-2">
                <h3 class="mb-3">Data Uang Baju</h3>>
            </div>
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Data Siswa</th>
                    <th>Data Baju</th>
                    <th>Total Harga Baju</th>
                    <th>Status Baju</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($administration as $item)
                        @foreach($item['data_administration'] as $cloth_adm)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $cloth_adm->siswaData->NIS_siswa }} -
                                    {{ $cloth_adm->siswaData->nama_siswa }} -
                                    {{ $cloth_adm->siswaData->tingkat }} -
                                    {{ $cloth_adm->masterKelas->nama_kelas }} -
                                    {{ $cloth_adm->tahunAjaran->nama_tahun_ajaran }}
                                </td>
                                <td>
                                    @php
                                        $clothes_encoded = json_decode($cloth_adm->data_baju);
                                        $total_clothes  = 0;
                                    @endphp
                                      <ol>
                                          @foreach($clothes_encoded as $clothes_data)
                                            <li>
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
                                </td>
                                <td>
                                    Rp. {{ number_format($total_clothes,2) }}
                                </td>
                                <td>
                                 <span @if($cloth_adm->status_baju == "lunas")
                                       class="badge badge-success"
                                       @else
                                       class="badge badge-danger"
                                       @endif
                                       style="width: 100%;font-size: 15px;">
                                    {{ ucfirst(str_replace("_"," ",$cloth_adm->status_baju)) }}
                                  </span>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" type="submit" class="btn btn-success" data-toggle="modal"
                                           data-target=".bs-example-modal-sm-{{ $cloth_adm->siswaData->NIS_siswa }}">
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

    {{-- Laporan Pembayaran Uang Baju --}}
    <div class="row">
             <div class="col-md-12 col-sm-12 mb-2">
                 <h3 class="mb-3">Data Pembayaran Uang Baju</h3>
             </div>
             <div class="col-md-12 col-sm-12">
                 <table id="datatable2" class="table table-striped table-bordered" style="width:100%">
                     <thead>
                     <tr>
                         <th>No.</th>
                         <th>Data Siswa</th>
                         <th>Data Baju</th>
                         <th>Total Harga Baju</th>
                         <th>Status Baju</th>
                     </tr>
                     </thead>
                     <tbody>
                     <tr>
                         <td>1</td>
                         <td>Poly - SD - 1A - 2021/2022</td>
                         <td>
                             <ol>
                                 <li> Batik - qty: 2  - size : XL - harga Rp 15.000 - total: Rp 30.000  </li>
                                 <li> Pramuka - qty: 2 - size : L  - harga Rp 15.000 - total: Rp 30.000  </li>
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
