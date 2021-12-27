@foreach($administration as $data)
    @foreach($data['data_administration'] as $administration)
        <div class="modal fade bs-example-modal-sm-{{$administration->NIS_siswa}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel2">Pilih Metode Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="d-flex flex-column modal-body text-center">
                        <a href="#" type="submit" class="btn btn-success" data-toggle="modal"
                           data-target=".bs-example-modal-lg-ATM-{{$data->studentSaving[$administration->NIS_siswa]->masterAccountBank->bank_id}}">
                            ATM
                        </a>
                        <a href="#" type="submit" class="btn btn-success" data-toggle="modal"
                           data-target=".bs-example-modal-lg-InternetBanking-{{$data->studentSaving[$administration->NIS_siswa]->masterAccountBank->bank_id}}">
                            Internet Banking
                        </a>
                        <a href="#" type="submit" class="btn btn-success" data-toggle="modal"
                           data-target=".bs-example-modal-lg-MobileBanking-{{$data->studentSaving[$administration->NIS_siswa]->masterAccountBank->bank_id}}">
                            Mobile Banking
                        </a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>

                </div>
            </div>
        </div>

        {{-- modal ATM --}}
        <div class="modal fade bs-example-modal-lg-ATM-{{$data->studentSaving[$administration->NIS_siswa]->masterAccountBank->bank_id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title text-dark font-weight-bold" id="myModalLabel">Pembayaran ATM</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>English</th>
                                <th>Indonesia</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <h6><b>STEP 1: FIND NEAREST ATM</b></h6>
                                    <ol class="d-block ml-3">
                                        <li>Insert your BCA ATM card and PIN</li>
                                        <li>Enter your ATM PIN</li>
                                    </ol>

                                    <h6><b>STEP 2: FIND NEAREST ATM</b></h6>
                                    <ol class="d-block ml-3">
                                        <li>Select Menu "Other Transaction"</li>
                                        <li>Select "Transfer"</li>
                                        <li>Select "To BCA Virtual Account"</li>
                                        <li>
                                            Enter Virtual Account Number example:
                                            <b>{{ $data->studentSaving[$administration->NIS_siswa]->masterAccountBank->account_number }}.</b>
                                            Press "Correct" to proceed
                                        </li>
                                        <li>
                                            Verify Virtual Account details and then enter
                                            amount to be transferred and select "Correct" to
                                            confirm
                                        </li>
                                        <li>
                                            Confirm your transaction details displayed
                                        </li>
                                        <li>
                                            Select "Yes" if the details are correct or "No" if the
                                            details are not correct
                                        </li>
                                    </ol>

                                    <h6><b>STEP 3: TRANSACTION COMPLETED</b></h6>
                                    <ol class="d-block ml-3">
                                        <li>You have completed your transaction. Select
                                            "No" to end the transaction
                                        </li>
                                        <li>
                                            Once the payment transaction is completed, this
                                            invoice will be updated automatically. This may
                                            take up to 5 minute
                                        </li>
                                    </ol>
                                </td>

                                <td>
                                    <h6><b>LANGKAH 1: TEMUKAN ATM TERDEKAT</b></h6>
                                    <ol class="d-block ml-3">
                                        <li>Masukkan Kartu ATM BCA</li>
                                        <li>Masukkan PIN</li>
                                    </ol>

                                    <h6><b>LANGKAH 2: DETAIL PEMBAYARAN</b></h6>
                                    <ol class="d-block ml-3">
                                        <li>Pilih menu "Transaksi Lainnya"</li>
                                        <li>Pilih menu "Transfer"</li>
                                        <li>Pilih menu "ke Rekening BCA Virtual Account"</li>
                                        <li>
                                            Masukkan Nomor Virtual Account Anda contoh:
                                            <b>{{ $data->studentSaving[$administration->NIS_siswa]->masterAccountBank->account_number }}.</b>
                                            Tekan "Benar" untuk melanjutkan
                                        </li>
                                        <li>
                                            Di halaman konfirmasi, pastikan detil
                                            pembayaran sudah sesuai seperti No VA, Nama,
                                            Perus/Produk dan Total Tagihan, tekan "Benar"
                                            untuk melanjutkan
                                        </li>
                                        <li>
                                            Tekan "Ya" jika sudah benar
                                        </li>
                                    </ol>

                                    <h6><b>LANGKAH 3: TRANSAKSI BERHASIL</b></h6>
                                    <ol class="d-block ml-3">
                                        <li>Transaksi Anda telah selesai</li>
                                        <li>
                                            Setelah transaksi anda selesai, invoice ini akan
                                            diupdate secara otomatis. Proses ini mungkin
                                            memakan waktu hingga 5 menit
                                        </li>
                                    </ol>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>

                </div>
            </div>
        </div>

        {{-- modal Internet Banking --}}
        <div class="modal fade bs-example-modal-lg-InternetBanking-{{$data->studentSaving[$administration->NIS_siswa]->masterAccountBank->bank_id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title text-dark font-weight-bold" id="myModalLabel">Pembayaran Internet Banking</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>English</th>
                                <th>Indonesia</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <h6><b>STEP 1: LOG IN TO YOUR ACCOUNT</b></h6>
                                    <ol class="d-block ml-3">
                                        <li>
                                            Login to KlikBCA Individual
                                            <a href="https://ibank.klikbca.com" target="_blank">https://ibank.klikbca.com</a>
                                        </li>
                                        <li>
                                            Select "Transfer", then select "Transfer to BCA
                                            Virtual Account"
                                        </li>
                                    </ol>

                                    <h6><b>STEP 2: PAYMENT DETAILS</b></h6>
                                    <ol class="d-block ml-3">
                                        <li>
                                            Enter the Virtual Account Number example:
                                            <b>{{ $data->studentSaving[$administration->NIS_siswa]->masterAccountBank->account_number }}</b>
                                        </li>
                                        <li>Select "Continue" to proceed your payment</li>
                                        <li>
                                            Enter "RESPON KEYBCA APPLI 1" shown in your
                                            BCA Token, then click on the "Send" button
                                        </li>
                                        <li>
                                            Enter the authentication token code
                                        </li>
                                    </ol>

                                    <h6><b>STEP 3: TRANSACTION COMPLETED</b></h6>
                                    <ol class="d-block ml-3">
                                        <li>
                                            Your transaction is successful
                                        </li>
                                        <li>
                                            Once the payment transaction is completed, this
                                            invoice will be updated automatically. This may
                                            take up to 5 minutes
                                        </li>
                                    </ol>
                                </td>

                                <td>
                                    <h6><b>LANGKAH 1: MASUK KE AKUN ANDA</b></h6>
                                    <ol class="d-block ml-3">
                                        <li>Lakukan log in pada aplikasi KlikBCA Individual
                                            <a href="https://ibank.klikbca.com" target="_blank">https://ibank.klikbca.com</a>
                                        </li>
                                        <li>Masukkan User ID dan PIN</li>
                                    </ol>

                                    <h6><b>LANGKAH 2: DETAIL PEMBAYARAN</b></h6>
                                    <ol class="d-block ml-3">
                                        <li>
                                            Pilih "Transfer Dana", kemudian pilih "Transfer
                                            ke BCA Virtual Account"
                                        </li>
                                        <li>
                                            Masukkan Nomor Virtual Account contoh:
                                            <b>{{ $data->studentSaving[$administration->NIS_siswa]->masterAccountBank->account_number }}</b>
                                        </li>
                                        <li>Pilih "Lanjutkan"</li>
                                        <li>
                                            Masukkan "RESPON KEYBCA APPLI 1" yang
                                            muncul pada Token BCA anda, kemudian tekan
                                            tombol "Kirim"
                                        </li>
                                    </ol>

                                    <h6><b>LANGKAH 3: TRANSAKSI BERHASIL</b></h6>
                                    <ol class="d-block ml-3">
                                        <li>Transaksi Anda telah selesai</li>
                                        <li>
                                            Setelah transaksi anda selesai, invoice ini akan
                                            diupdate secara otomatis. Proses ini mungkin
                                            memakan waktu hingga 5 menit
                                        </li>
                                    </ol>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>

                </div>
            </div>
        </div>

        {{-- modal Mobile Banking--}}
        <div class="modal fade bs-example-modal-lg-MobileBanking-{{$data->studentSaving[$administration->NIS_siswa]->masterAccountBank->bank_id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title text-dark font-weight-bold" id="myModalLabel">Pembayaran Internet Banking</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>English</th>
                            <th>Indonesia</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <h6><b>STEP 1: LOG IN TO YOUR ACCOUNT</b></h6>
                                <ol class="d-block ml-3">
                                    <li>
                                        Open BCA Mobile App
                                    </li>
                                    <li>
                                        Select "m-BCA", then select "m-Transfer"
                                    </li>
                                </ol>

                                <h6><b>STEP 2: PAYMENT DETAILS</b></h6>
                                <ol class="d-block ml-3">
                                    <li>
                                        Select "m-BCA", then select "m-Transfer"
                                    </li>
                                    <li>
                                        Enter your Virtual Account Number example:
                                        <b>{{ $data->studentSaving[$administration->NIS_siswa]->masterAccountBank->account_number }}</b>,
                                        then press "OK"
                                    </li>
                                    <li>
                                        Click on "Send" button at the top right corner to
                                        proceed
                                    </li>
                                    <li>
                                        Click "OK" to proceed
                                    </li>
                                    <li>
                                        Enter your PIN to authorize the transaction
                                    </li>
                                </ol>

                                <h6><b>STEP 3: TRANSACTION COMPLETED</b></h6>
                                <ol class="d-block ml-3">
                                    <li>
                                        Once the payment transaction is completed, this
                                        invoice will be updated automatically. This may
                                        take up to 5 minutes
                                    </li>
                                </ol>
                            </td>

                            <td>
                                <h6><b>LANGKAH 1: MASUK KE AKUN ANDA</b></h6>
                                <ol class="d-block ml-3">
                                    <li>
                                        Buka aplikasi BCA Mobile
                                    </li>
                                    <li>
                                        Pilih menu "m-BCA", kemudian masukkan kode
                                        akses m-BCA
                                    </li>
                                </ol>

                                <h6><b>LANGKAH 2: DETAIL PEMBAYARAN</b></h6>
                                <ol class="d-block ml-3">
                                    <li>
                                        Pilih “Transaction” lalu pilih "m-Transfer",
                                        kemudian pilih "BCA Virtual Account"
                                    </li>
                                    <li>
                                        Masukkan Nomor Virtual Account anda contoh:
                                        <b>{{ $data->studentSaving[$administration->NIS_siswa]->masterAccountBank->account_number }}</b>,
                                        kemudian tekan "OK"
                                    </li>
                                    <li>
                                        Tekan tombol "Kirim" yang berada di sudut
                                        kanan atas aplikasi untuk melakukan transfer
                                    </li>
                                    <li>
                                        Tekan "OK" untuk melanjutkan pembayaran
                                    </li>
                                    <li>
                                        Masukkan PIN Anda untuk meng-otorisasi
                                        transaksi
                                    </li>
                                </ol>

                                <h6><b>LANGKAH 3: TRANSAKSI BERHASIL</b></h6>
                                <ol class="d-block ml-3">
                                    <li>Transaksi Anda telah selesai</li>
                                    <li>
                                        Setelah transaksi anda selesai, invoice ini akan
                                        diupdate secara otomatis. Proses ini mungkin
                                        memakan waktu hingga 5 menit
                                    </li>
                                </ol>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>
    @endforeach
@endforeach
