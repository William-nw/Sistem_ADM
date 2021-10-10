<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu menu_fixed">
    <div class="menu_section">
        <h3>General</h3>

        <ul class="nav side-menu">
            @if (Auth::user()->status == 'tata_usaha')
                <li><a><i class="fa fa-users" aria-hidden="true"></i> Data Admin <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('data-admin.index') }}">Lihat Data</a></li>
                        <li><a href="{{ route('data-admin.create') }}">Tambah Data</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Data Siswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                            <li><a href="{{ route('data-siswa.index') }}">Lihat Data</a></li>
                            <li><a href="{{ route('data-siswa.create') }}">Tambah Data</a></li>
                            {{-- <li><a href="{{ route('naik-tinggal-kelas.index') }}">Siswa Naik & Tinggal</a></li> --}}
                    </ul>
                </li>
                {{-- 
                <li><a><i class="fa fa-table"></i> Data Ortu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                            <li><a href="{{ route('daftar-ortu-siswa.index') }}">Lihat Data</a></li>
                            <li><a href="{{ route('daftar-ortu-siswa.create') }}">Tambah Data</a></li>
                    </ul>
                </li> --}}
                {{-- 
                <li><a><i class="fa fa-table"></i> Pembayaran <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('data-pembayaran.index')}}">Data Pembayaran</a></li>
                          <li><a href="{{ route('admin-upload-pembayaran.index') }}">Upload Pembayaran</a></li>
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
                {{--            
                <li><a><i class="fa fa-table"></i> Lap.Pembayaran SPP <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('pembayaran-siswa.index') }}">Laporan Pembayaran SPP</a></li>
                        <li><a href="{{ route('tanggal-pembayaran-siswa.index') }}">Laporan Pembayaran SPP Perbulan</a></li>
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
                        <li><a href="{{ route('pembayaran-pembangunan-perkelas.index') }}">Laporan Pembayaran Pembagunan Perkelas</a></li>
                        <li><a href="{{ route('pembayaran-pembangunan.tahunan') }}">Laporan Pembayaran Pembangunan Pertahun</a></li>
                    </ul>
                </li> --}}
            @elseif(Auth::user()->id_status_user == 2)           
                <li><a><i class="fa fa-table"></i> Lap.Pembayaran SPP <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('pembayaran-siswa.index') }}">Laporan Pembayaran SPP</a></li>
                        <li><a href="{{ route('tanggal-pembayaran-siswa.index') }}">Laporan Pembayaran SPP Perbulan</a></li>
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
                        <li><a href="{{ route('pembayaran-pembangunan-perkelas.index') }}">Laporan Pembayaran Pembagunan Perkelas</a></li>
                        <li><a href="{{ route('pembayaran-pembangunan.tahunan') }}">Laporan Pembayaran Pembangunan Pertahun</a></li>
                    </ul>
                </li>
            @elseif(Auth::user()->id_status_user == 3)           
                <li><a><i class="fa fa-table"></i> Pembayaran <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('upload-pembayaran-ortu.index') }}">Data Pembayaran</a></li>
                        <li><a href="{{ route('upload-pembayaran-ortu.create') }}">Upload Pembayaran</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> SPP Siswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('spp-siswa-ortu.index') }}">SPP Siswa</a></li> 
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Pembangunan Siswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('pembangunan-siswa-ortu.index') }}">Pembangunan Siswa</a></li> 
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
<!-- /sidebar menu -->