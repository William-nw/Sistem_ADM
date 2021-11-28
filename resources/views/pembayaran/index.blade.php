    @extends('layouts.app')

    @section('content-title', 'Form Daftar User Orang Tua')

    @section('content')
        <style>
            .middle-icon {
                font-size: 20px;
                margin-left: 0.15rem;
                margin-right: 0.15rem;
                vertical-align: middle;
            }

            .middle-icon:hover {
                cursor: pointer;
            }

            .hidden-button,
            .hidden-button:focus {
                border: transparent;
                outline: none;
            }

        </style>

        @include('includes.error')

        {{-- <form id="demo-form2" action="{{ route('pembayaran.store') }}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
    @csrf --}}
        <div id="smartwizard" class="sw sw-theme-default">
            <ul class="nav">
                <li>
                    <a class="nav-link" href="#step-1">
                        <strong> Data Siswa </strong>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#step-2">
                        <strong>Uang Pembangunan</strong>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#step-3">
                        <strong>Uang SPP</strong>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#step-4">
                        <strong>Uang Buku</strong>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#step-5">
                        <strong>Uang Baju</strong>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#step-6">
                        <strong>Uang Konsumsi</strong>
                    </a>
                </li>
            </ul>
            <form method="post" action={{ route('register-all.store') }}>
                @csrf
                <div class="tab-content">
                    <div id="step-1" class="tab-pane" style="padding-top:.5rem" role="tabpanel">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nis_siswa">NIS Siswa <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="nis_siswa" id="nis" pattern="(^0[0-9])\w+" title="Angka Mulai Dari 0"
                                    required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_siswa">Nama Siswa <span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="nama_siswa" id="nama_siswa" required="required"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tingkat">Tingkat <span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" name="tingkat" id="tingkat" tabindex="-1"
                                    required>
                                    <option value="">Pilih Salah Satu</option>
                                    <option value="tk">TK</option>
                                    <option value="sd">SD</option>
                                    <option value="smp">SMP</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kelas">Kelas <span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" name="kelas" id="kelas" tabindex="-1" required>
                                    <option value="">Pilih Salah Satu</option>
                                    @foreach ($kelas as $itemKelas)
                                        <option value="{{ $itemKelas->id }}">{{ $itemKelas->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 mb-10 label-align" for="password">Tahun Ajaran
                                <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="tahun_ajaran"
                                    id="tahun_ajaran" required>
                                    <option value="">Pilih Salah Satu</option>
                                    @foreach ($tahun_ajaran as $itemtahunAjaran)
                                        <option value="{{ $itemtahunAjaran->id }}">
                                            {{ $itemtahunAjaran->nama_tahun_ajaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="step-2" class="tab-pane" style="padding-top:.5rem" role="tabpanel">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="uang_pembangunan">Uang
                                Pembangunan<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="uang_pembangunan" id="uang_pembangunan" pattern="(^0[0-9])\w+"
                                    title="Angka Mulai Dari 0" required="required" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div id="step-3" class="tab-pane" style="padding-top:.5rem" role="tabpanel">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="uang_spp">Uang
                                SPP<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="uang_spp" id="uang_spp" pattern="(^0[0-9])\w+"
                                    title="Angka Mulai Dari 0" required="required" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div id="step-4" class="tab-pane" style="padding-top:.5rem" role="tabpanel">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- left side div -->
                                <div class="row">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-6 col-sm-6 label-align" for="buku">Pilih
                                            Buku
                                            <span class="required">*</span></label>
                                        <div class="col-md-7 col-sm-10 ">
                                            <select id="buku" class="select2_single form-control" tabindex="-1">
                                                <option value="" style="text-align-last:center">-- Pilih Salah Satu --</option>
                                                @foreach ($buku as $item_buku)
                                                    <option value="{{ $item_buku->id_buku }}">
                                                        {{ $item_buku->nama_buku}} {{ $item_buku->masterKelas[0]->nama_kelas }} | {{ $item_buku->masterTahunAjaran[0]->nama_tahun_ajaran }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 ">
                                            <a href="#" class="btn btn-primary text-white " id="btn_tambah_buku">Tambahkan
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">

                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nama Buku</th>
                                                    <th>Qty buku</th>
                                                    <th>Harga Buku</th>
                                                </tr>
                                            </thead>


                                            <tbody id="result_buku"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>Total Harga</td>
                                                    <th colspan="2" style="text-align:right;" id="totalBuku"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div id="step-5" class="tab-pane" style="padding-top:.5rem" role="tabpanel">
                            <div class="container-fluid">
                            <div class="row">
                                <!-- left side div -->
                                <div class="row">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-6 col-sm-6 label-align" for="baju">Pilih
                                            Baju
                                            <span class="required">*</span></label>
                                        <div class="col-md-7 col-sm-10 ">
                                            <select id="baju" class="select2_single form-control" tabindex="-1">
                                                <option value="" style="text-align-last:center">-- Pilih Salah Satu --</option>
                                                @foreach ($baju as $item_baju)
                                                    <option value="{{ $item_baju->id_baju }}">
                                                        {{ $item_baju->nama_baju}} {{ $item_baju->masterKelas[0]->nama_kelas }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 ">
                                            <a href="#" class="btn btn-primary text-white " id="btn_tambah_baju">Tambahkan
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">

                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nama Baju</th>
                                                    <th>Qty Baju</th>
                                                    <th>Harga Baju</th>
                                                </tr>
                                            </thead>


                                            <tbody id="result_baju"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>Total Harga</td>
                                                    <th colspan="2" style="text-align:right;" id="totalBaju"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div id="step-6" class="tab-pane" style="padding-top:.5rem" role="tabpanel">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="uang_konsumsi">Uang
                                    Konsumsi<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" name="uang_konsumsi" id="uang_konsumsi" pattern="(^0[0-9])\w+"
                                        title="Angka Mulai Dari 0" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 ">
                                <button type="submit" class="btn btn-primary text-white ">
                                    Submit
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            </form>



        <script>
            window.localStorage.clear();
            //check localstorage
            if (localStorage.getItem('buku') != null) {
                doomBuku();
                getTotalBuku();
            }
            if (localStorage.getItem('baju') != null) {
                doomBaju();
                getTotalBaju();
            }

            // event listener
            let btn_tambah_buku = document.getElementById('btn_tambah_buku');
            btn_tambah_buku.addEventListener('click', tambahBarang);
                //baju
            let btn_tambah_baju = document.getElementById('btn_tambah_baju');
            btn_tambah_baju.addEventListener('click', tambahBarang);

            function tambahBarang() {
                let form_buku = document.getElementById('buku');
                let get_id_buku = form_buku.options[form_buku.selectedIndex].value;

                //baju
                let form_baju = document.getElementById('baju');
                let get_id_baju = form_baju.options[form_baju.selectedIndex].value;

                // fetch
                $.ajax({
                    url: 'getBuku/' + get_id_buku,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        console.log(response.data.master_kelas[0]);
                        let buku_on_cart = 0;
                        // check local storage
                        if (localStorage.getItem('buku') == null) {
                            //create local storage
                            localStorage.setItem('buku', '[]');
                        }

                        //get data localstorage
                        let data_buku_ls = JSON.parse(localStorage.getItem('buku'));
                        // set item to local storage

                        data_buku_ls.forEach(item_buku => {
                            if (item_buku.id_buku == response.data.id_buku) {
                                buku_on_cart += 1;
                                alert('Buku sudah ditambahkan');
                            }
                        });

                        if (buku_on_cart < 1) {
                            let set_buku = {
                                'id_buku': response.data.id_buku,
                                'nama_buku': response.data.nama_buku + " " + response.data.master_kelas[0].nama_kelas + " " +  response.data.master_tahun_ajaran[0].nama_tahun_ajaran,
                                'qty': 1,
                                'harga_buku': response.data.harga_buku,
                            };
                            data_buku_ls.push(set_buku);
                            // save to local storage
                            localStorage.setItem('buku', JSON.stringify(data_buku_ls));
                            doomBuku();
                            getTotalBuku();
                            alert('Buku Berhasil Ditambahkan');
                        }
                    }
                });
                //fetch Baju
                $.ajax({
                    url: 'getBaju/' + get_id_baju,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response);
                        // console.log(response.data.master_kelas[0]);
                        let baju_on_cart = 0;
                        // check local storage
                        if (localStorage.getItem('baju') == null) {
                            //create local storage
                            localStorage.setItem('baju', '[]');
                        }

                        //get data localstorage
                        let data_baju_ls = JSON.parse(localStorage.getItem('baju'));
                        // set item to local storage

                        data_baju_ls.forEach(item_baju => {
                            if (item_baju.id_baju == response.data.id_baju) {
                                baju_on_cart += 1;
                                alert('baju sudah ditambahkan');
                            }
                        });

                        if (baju_on_cart < 1) {
                            let set_baju = {
                                'id_baju': response.data.id_baju,
                                'nama_baju': response.data.nama_baju + " " + response.data.master_kelas[0].nama_kelas,
                                'qty': 1,
                                'harga_baju': response.data.harga_baju,
                            };
                            data_baju_ls.push(set_baju);
                            // save to local storage
                            localStorage.setItem('baju', JSON.stringify(data_baju_ls));
                            doomBaju();
                            getTotalBaju();
                            alert('Baju Berhasil Ditambahkan');
                        }
                    }
                });
            }

            //doom
            function doomBuku() {
                let result_buku = document.getElementById('result_buku');
                //get data localstorage
                let data_buku_ls = JSON.parse(localStorage.getItem('buku'));

                let result_doom_buku = ``;
                data_buku_ls.forEach(item_buku => {
                    result_doom_buku += returnTableBuku(item_buku);
                });
                // doom to html
                result_buku.innerHTML = result_doom_buku;
            }
            //Dom Baju
            function doomBaju() {
                let result_baju = document.getElementById('result_baju');
                //get data localstorage
                let data_baju_ls = JSON.parse(localStorage.getItem('baju'));

                let result_doom_baju = ``;
                data_baju_ls.forEach(item_baju => {
                    result_doom_baju += returnTableBaju(item_baju);
                });
                // doom to html
                result_baju.innerHTML = result_doom_baju;
            }

            //tambah kurang delete qty Buku
            function tambahbuku(id_buku) {
                $.ajax({
                    url: 'getBuku/' + id_buku,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        //get data localstorage
                        let data_buku_ls = JSON.parse(localStorage.getItem('buku'));
                        for (let i = 0; i < data_buku_ls.length; i++) {

                            // overide object
                            if (data_buku_ls[i].id_buku == id_buku) {
                                let new_qty = data_buku_ls[i].qty += 1;
                                data_buku_ls[i].harga_buku = new_qty * response.data.harga_buku;
                                break; // exit since find the book
                            }
                        }

                        // save to local storage
                        localStorage.setItem('buku', JSON.stringify(data_buku_ls));
                        doomBuku();
                        getTotalBuku();

                    }
                });
            }

            function kurangbuku(id_buku) {
                $.ajax({
                    url: 'getBuku/' + id_buku,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        //get data localstorage
                        let data_buku_ls = JSON.parse(localStorage.getItem('buku'));
                        for (let i = 0; i < data_buku_ls.length; i++) {
                            if (data_buku_ls[i].qty < 1) {
                                alert('Qty Buku Tidak boleh dibawah 0');
                                break;
                            }

                            // overide object
                            if (data_buku_ls[i].id_buku == id_buku) {
                                let new_qty = data_buku_ls[i].qty -= 1;
                                data_buku_ls[i].harga_buku = new_qty * response.data.harga_buku;
                                break; // exit since find the book
                            }
                        }

                        // save to local storage
                        localStorage.setItem('buku', JSON.stringify(data_buku_ls));
                        doomBuku();
                        getTotalBuku();

                    }
                });
            }

            function deletebuku(id_buku) {

                //get data localstorage
                let data_buku_ls = JSON.parse(localStorage.getItem('buku'));

                for (let index = 0; index < data_buku_ls.length; index++) {

                    if (data_buku_ls[index].id_buku == id_buku) {
                        data_buku_ls.splice(index, 1);
                    }
                }
                // save to local storage
                localStorage.setItem('buku', JSON.stringify(data_buku_ls));
                doomBuku();
                getTotalBuku();
            }

            function getTotalBuku()
            {
                let data_buku = JSON.parse(localStorage.getItem('buku'));
                let doom_total_buku = document.getElementById('totalBuku');
                let total = 0;

                for (let index = 0; index < data_buku.length; index++) {
                    total += data_buku[index].harga_buku;
                }

                doom_total_buku.innerHTML = "Rp " + number_format(total,0);
            }

            //tambah kurang delete qty Baju
            function tambahbaju(id_baju) {
                $.ajax({
                    url: 'getBaju/' + id_baju,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        //get data localstorage
                        let data_baju_ls = JSON.parse(localStorage.getItem('baju'));
                        for (let i = 0; i < data_baju_ls.length; i++) {

                            // overide object
                            if (data_baju_ls[i].id_baju == id_baju) {
                                let new_qty = data_baju_ls[i].qty += 1;
                                data_baju_ls[i].harga_baju = new_qty * response.data.harga_baju;
                                break; // exit since find the book
                            }
                        }

                        // save to local storage
                        localStorage.setItem('baju', JSON.stringify(data_baju_ls));
                        doomBaju();
                        getTotalBaju();

                    }
                });
            }

            function kurangbaju(id_baju) {
                $.ajax({
                    url: 'getBaju/' + id_baju,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        //get data localstorage
                        let data_baju_ls = JSON.parse(localStorage.getItem('baju'));
                        for (let i = 0; i < data_baju_ls.length; i++) {
                            if (data_baju_ls[i].qty < 1) {
                                alert('Qty Baju Tidak boleh dibawah 0');
                                break;
                            }

                            // overide object
                            if (data_baju_ls[i].id_baju == id_baju) {
                                let new_qty = data_baju_ls[i].qty -= 1;
                                data_baju_ls[i].harga_baju = new_qty * response.data.harga_baju;
                                break; // exit since find the book
                            }
                        }

                        // save to local storage
                        localStorage.setItem('baju', JSON.stringify(data_baju_ls));
                        doomBaju();
                        getTotalBaju();

                    }
                });
            }

            function deletebaju(id_baju) {

                //get data localstorage
                let data_baju_ls = JSON.parse(localStorage.getItem('baju'));

                for (let index = 0; index < data_baju_ls.length; index++) {

                    if (data_baju_ls[index].id_baju == id_baju) {
                        data_baju_ls.splice(index, 1);
                    }
                }
                // save to local storage
                localStorage.setItem('baju', JSON.stringify(data_baju_ls));
                doomBaju();
                getTotalBaju();
            }

            function getTotalBaju()
            {
                let data_baju = JSON.parse(localStorage.getItem('baju'));
                let doom_total_baju = document.getElementById('totalBaju');
                let total = 0;

                for (let index = 0; index < data_baju.length; index++) {
                    total += data_baju[index].harga_baju;
                }

                doom_total_baju.innerHTML = "Rp " + number_format(total,0);
            }
            function returnTableBuku(item_buku) {
                return `
                        <tr>
                            <td>
                                <input type="hidden" name="buku_id[]" id="nama-buku" value="${item_buku.id_buku}" style="border: transparent;" readonly>
                                <input type="text" name="buku[]" id="nama-buku" value="${item_buku.nama_buku}" style="border: transparent;" readonly>
                            </td>
                            <td>
                                <input type="text" name="buku[]" value="${item_buku.qty}" style="width: 50px;text-align: center;" readonly>
                                <a href="#" class="hidden-button" id="btn_tambah_cart" onclick="tambahbuku(${item_buku.id_buku})">
                                    <i class="fa fa-plus-circle middle-icon" style="color:darkgreen" aria-hidden=true></i>
                                </a>
                                <a href="#" class="hidden-button" id="btn_kurang_cart" onclick="kurangbuku(${item_buku.id_buku})">
                                    <i class="fa fa-minus-circle middle-icon" style="color:darkorange"></i>
                                </a>
                                <a href="#" class="hidden-button" id="btn_delete_cart" onclick="deletebuku(${item_buku.id_buku})">
                                    <i class="fa fa-trash middle-icon" style="color:red"></i>
                                </a>

                            </td>
                            <td>
                                <input type="text" name="harga_buku[]" value="${number_format(item_buku.harga_buku,0)}" style="border: transparent;" readonly>
                            </td>
                         </tr>
                `;
            }
            function returnTableBaju(item_baju) {
                return `
                        <tr>
                            <td>
                                <input type="hidden" name="baju_id[]" id="nama-baju" value="${item_baju.id_baju}" style="border: transparent;" readonly>
                                <input type="text" name="baju[]" id="nama-baju" value="${item_baju.nama_baju}" style="border: transparent;" readonly>
                            </td>
                            <td>
                                <input type="text" name="baju[]" value="${item_baju.qty}" style="width: 50px;text-align: center;" readonly>
                                <a href="#" class="hidden-button" id="btn_tambah_cart" onclick="tambahbaju(${item_baju.id_baju})">
                                    <i class="fa fa-plus-circle middle-icon" style="color:darkgreen" aria-hidden=true></i>
                                </a>
                                <a href="#" class="hidden-button" id="btn_kurang_cart" onclick="kurangbaju(${item_baju.id_baju})">
                                    <i class="fa fa-minus-circle middle-icon" style="color:darkorange"></i>
                                </a>
                                <a href="#" class="hidden-button" id="btn_delete_cart" onclick="deletebaju(${item_baju.id_baju})">
                                    <i class="fa fa-trash middle-icon" style="color:red"></i>
                                </a>

                            </td>
                            <td>
                                <input type="text" name="harga_baju[]" value="${number_format(item_baju.harga_baju,0)}" style="border: transparent;" readonly>
                            </td>
                         </tr>
                `;
            }


            function number_format (number, decimals, dec_point, thousands_sep) {
                // Strip all characters but numerical ones.
                number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function (n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }
        </script>
    @endsection
