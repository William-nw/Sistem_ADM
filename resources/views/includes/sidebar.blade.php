<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu menu_fixed">
    <div class="menu_section">
        <h3>General</h3>

        <ul class="nav side-menu">
            @if (Auth::user()->status == 'tata_usaha')
                <li><a><i class="fa fa-bank" aria-hidden="true"></i> Akun Bank <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('akun-bank.index') }}">Lihat Data Akun Bank</a></li>
                        <li><a href="{{ route('akun-bank.create') }}">Tambah Akun Bank</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-credit-card" aria-hidden="true"></i> Test Pembayaran <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('test-payment.index') }}">Data Pembayaran</a></li>
                        <li><a href="{{ route('test-payment.create') }}">Test Pembayaran</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-users" aria-hidden="true"></i> Data Admin <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('data-admin.index') }}">Lihat Data</a></li>
                        <li><a href="{{ route('data-admin.create') }}">Tambah Data</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Data Siswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                            <li><a href="{{ route('data-siswa.index') }}">Lihat Data</a></li>
{{--                            <li><a href="{{ route('data-siswa.create') }}">Tambah Data</a></li>--}}
                            <li><a href="{{ route('register-all.index') }}">Tambah Data Siswa</a></li>
                            {{-- <li><a href="{{ route('naik-tinggal-kelas.index') }}">Siswa Naik & Tinggal</a></li> --}}
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Data Ortu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                            <li><a href="{{ route('data-ortu.index') }}">Lihat Data</a></li>
                            <li><a href="{{ route('data-ortu.create') }}">Tambah Data</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-book"></i> Master Buku <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('master-buku.index') }}">Lihat Data</a></li>
                        <li><a href="{{ route('master-buku.create') }}">Tambah Data</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-archive"></i> Master Baju <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                         <li><a href="{{ route('master-baju.index') }}">Lihat Data</a></li>
                        <li><a href="{{ route('master-baju.create') }}">Tambah Data</a></li>
                    </ul>
                </li>
                {{--
                <li><a><i class="fa fa-table"></i> Pembayaran <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('data-register-siswa.index')}}">Data Pembayaran</a></li>
                          <li><a href="{{ route('admin-upload-register-siswa.index') }}">Upload Pembayaran</a></li>
                            <li><a href="{{ route('cari-siswa.index') }}">SPP Siswa</a></li>
                            <li><a href="{{ route('pembangunan.index') }}">Pembangunan</a></li>
                        </ul>
                    </li>
                --}}
                <li><a><i class="fa fa-table"></i> Master Kelas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('master-kelas.index') }}">Lihat Data</a></li>
                        <li><a href="{{ route('master-kelas.create') }}">Tambah Data</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Master Tahun Ajaran <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('master-tahun-ajaran.index') }}">Lihat Data</a></li>
                        <li><a href="{{ route('master-tahun-ajaran.create') }}">Tambah Data</a></li>
                    </ul>
                </li>
                {{-- report administration--}}
                <li><a><i class="fa fa-table"></i> Lap.Pembayaran SPP <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('report.spp')}}">Laporan Pembayaran SPP</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Lap.Pembangunan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('report.construction') }}">Laporan Pembayaran Pembagunan</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Lap.Konsumsi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('report.consumption') }}">Laporan Pembayaran Konsumsi</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Lap.Uang Baju <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('report.clothes') }}">Laporan Pembayaran Uang Baju</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Lap.Uang Buku <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('report.books') }}">Laporan Pembayaran Uang Buku</a></li>
                    </ul>
                </li>
            @elseif(Auth::user()->status == 'kepala_sekolah')
                <li><a><i class="fa fa-table"></i> Lap.Pembayaran SPP <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('report.spp')}}">Laporan Pembayaran SPP</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Lap.Pembangunan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('report.construction') }}">Laporan Pembayaran Pembagunan</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Lap.Konsumsi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('report.consumption') }}">Laporan Pembayaran Konsumsi</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Lap.Uang Baju <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('report.clothes') }}">Laporan Pembayaran Uang Baju</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Lap.Uang Buku <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('report.books') }}">Laporan Pembayaran Uang Buku</a></li>
                    </ul>
                </li>
            @elseif(Auth::user()->status == 'orang_tua')

                <li><a><i class="fa fa-table"></i> Pembayaran <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="max-height: 100% !important;">
                        <li><a href="{{ route('uang-pembangunan.ContructionAdmininstration') }}">Uang Pembangunan</a></li>
                        <li><a href={{ route('spp-siswa-ortu.index') }}>SPP Siswa</a></li>
                        <li><a href="{{ route('uang-buku.BooksAdmininstration') }}">Uang Buku</a></li>
                        <li><a href="{{ route('uang-baju.ClothesAdmininstration') }}">Uang Baju</a></li>
                        <li><a href="{{ route('uang-konsumsi.ConsumptionAdmininstration') }}">Uang Konsumsi</a></li>
                        @if(env('APP_ENV') == "local")
                            <li><a href="{{ route('testing-payment.index') }}">Test Pembayaran</a></li>
                        @endif
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
<!-- /sidebar menu -->
