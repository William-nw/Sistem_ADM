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
                
                <li><a><i class="fa fa-table"></i> Lap.Pembayaran SPP <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ url('lappembayaranspp')}}">Laporan Pembayaran SPP</a></li>
                        <li><a href="{{ url('lappembayaranperbulan') }}">Laporan Pembayaran SPP Perbulan</a></li>
                        <li><a href="{{ url('lappembayaranperkelas') }}">Laporan Pembayaran SPP Kelas</a></li>
                        <li><a href="{{ url('lappembayaransiswakelas') }}">Laporan Pembayaran SPP Siswa & Kelas</a></li>
                        <li><a href="{{ url('lappembayaranpertahun') }}">Laporan Pembayaran SPP Pertahun</a></li>

                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Lap.Tunggakan SPP <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ url('laptertunggakperbulan') }}">Laporan Tunggakan SPP Perbulan</a></li>
                        <li><a href="{{ url('laptertunggakperkelas') }}">Laporan Tunggakan SPP Perkelas</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Lap.Pembangunan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ url('lappembangunantunggakan') }}">Laporan Tunggakan & Pembayaran Pembangunan</a></li>
                        <li><a href="{{ url('lappembangunanperkelas') }}">Laporan Pembayaran Pembagunan Perkelas</a></li>
                        <li><a href="{{ url('lappembangunanpertahun') }}">Laporan Pembayaran Pembangunan Pertahun</a></li>
                    </ul>
                </li>
            @elseif(Auth::user()->status == 'kepala_sekolah')
                <li><a><i class="fa fa-table"></i> Lap.Pembayaran SPP <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('register-siswa-siswa.index') }}">Laporan Pembayaran SPP</a></li>
                        <li><a href="{{ route('tanggal-register-siswa-siswa.index') }}">Laporan Pembayaran SPP Perbulan</a></li>
                        <li><a href="{{ route('laporan-spp-kelas.index') }}">Laporan Pembayaran SPP Kelas</a></li>
                        <li><a href="{{ route('laporan-sppSiswaKelas.index') }}">Laporan Pembayaran SPP Siswa & Kelas</a></li>
                        <li><a href="{{ route('laporan-spp-siswa.indexTahunan') }}">Laporan Pembayaran SPP Pertahun</a></li>

                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Lap.Tunggakan SPP <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('tertunggak.index') }}">Laporan Tunggakan SPP Perbulan</a></li>
                        <li><a href="{{ route('tertunggak.tunggakanKelas') }}">Laporan Tunggakan SPP Perkelas</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Lap.Pembangunan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('laporan-pembagunan.index') }}">Laporan Tunggakan & Pembayaran Pembangunan</a></li>
                        <li><a href="{{ route('register-siswa-pembangunan-perkelas.index') }}">Laporan Pembayaran Pembagunan Perkelas</a></li>
                        <li><a href="{{ route('register-siswa-pembangunan.tahunan') }}">Laporan Pembayaran Pembangunan Pertahun</a></li>
                    </ul>
                </li>
            @elseif(Auth::user()->status == 'orang_tua')
                
                <li><a><i class="fa fa-table"></i> SPP Siswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href={{ route('spp-siswa-ortu.index') }}>SPP Siswa</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Pembayaran <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ url('uang-pembangunan') }}">Uang Pembangunan</a></li>
                        <li><a href="{{ url('uang-buku') }}">Uang Buku</a></li>
                        <li><a href="{{ url('uang-baju') }}">Uang Baju</a></li>
                        <li><a href="{{ url('uang-konsumsi') }}">Uang Konsumsi</a></li>
                        <li><a href="{{ url('test-pembayaran') }}">Test Pembayaran</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
<!-- /sidebar menu -->
