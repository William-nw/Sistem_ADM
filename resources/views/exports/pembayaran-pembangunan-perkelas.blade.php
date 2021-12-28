<table style="border-collapse: collapse;">
    <tr>
    <td> <img src="assets/img/maitreyawira2.png" width="120" height="120"></td>
<td> <center>
<font size="4"> YAYASAN PRAJNAMITRA MAITREYA</font><br>
<font size="4"> (YPM) CABANG DUMAI</font><br>
<font size="6"> SEKOLAH DASAR MAITREYAWIRA </font><br>
<font size="4"><i> Jl. Kamboja No.101 HP.082283645000 e-mail: sdmaitreyawira@gmail.com </i></font> <br>
<font size="4"> DUMAI </font><br>
<font size="2"> BPTPM.IPSS. NO.04/IPSS/BPTPM/VII/2014 TANGGAL 14 JULI 2014. IZIN OPERASIONAL NO.141 TAHUN 2014 TANGGAL 15 JULI 2014, NSS:10.2.09.06.02.036, NPSN: 69854815</font></center>
</td>
</tr>
</table>
<div style="margin:auto; text-align:center">
    <h3>Laporan Pembayaran Pembangunan Perkelas</h3>
</div>
<br>
<br>
<b>Bulan: <?php echo date('d/m/Y'); ?></b>
<br>
<b>Kelas: </br> {{ $kelas->nama_kelas}}
<br>
<b>Tahun Ajaran: </br> {{ $tahun_ajaran->tahun_ajaran}}
<br>
<table width="100%" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse;">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nis</th>
        <th class="text-center">Nama Siswa</th>
        <th class="text-center">Keterangan</th>
        <th class="text-center">Nominal Pembayaran Pembangunan</th>
    </tr>
    @php
        $no = 1;
        $total_biaya =[];
    @endphp
    
        @foreach ($data as $itemPembangunan)
            <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td class="text-center">{{ $itemPembangunan->nis }}</td>
                <td class="text-center">{{ $itemPembangunan->nama_siswa }}</td>
                <td class="text-left">
                    @foreach ($itemPembangunan->pembayaranPembangunan as $itemDetailPembayaranPembangunan)
                        <ul>
                            <li>{{ $itemDetailPembayaranPembangunan->keterangan_angsuran}}</li>
                        </ul>
                    @endforeach
                </td>
                <td class="text-left">
                    @foreach ($itemPembangunan->pembayaranPembangunan as $itemDetailPembayaranPembangunan)
                        <ul>
                            <li>
                                @php
                                array_push($total_biaya, $itemDetailPembayaranPembangunan->total_biaya);
                                echo "Rp ".number_format($itemDetailPembayaranPembangunan->total_biaya,0);
                                @endphp
                            </li>
                        </ul>
                    @endforeach
                </td>
            </tr>
         @endforeach
         <th colspan="5" align='left'>
            Total: Rp 
            @php
                echo number_format(array_sum($total_biaya),0);
            @endphp
        </th>
</table>

<table width="100%" style="border-collapse: collapse;">
<tr>
<td></td>
<td width="200px">
    <p>Dumai, <?php echo date('d/m/Y'); ?>
        <br/> 
        @php
            $statusRole = ucwords(str_replace("_", " ", $privilege->role));
            echo $statusRole
        @endphp,
    </p>
<br/>
<br/>
<p>_____________________</p>
{{ ucwords($privilege->nama_lengkap) }}
</td>
</tr>
</table>