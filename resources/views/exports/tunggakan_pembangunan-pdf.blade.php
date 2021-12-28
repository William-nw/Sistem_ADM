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
<br>
<div style="margin:auto; text-align:center">
    <h3>Laporan Tunggakan Pembayaran Pembangunan</h3>
</div>
<br>
<h4><b>Bulan: <?php echo date('d/m/Y'); ?></b></h4>

<table width="100%" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse;">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nis</th>
        <th class="text-center">Nama Siswa</th>
        <th class="text-center">Total Pembayaran</th>
        <th class="text-center">Sisa Total Tunggakan</th>
    </tr>
    @php
        $no = 1;
    @endphp
    
        @foreach ($data as $itemPembangunan)
            <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td class="text-center">{{ $itemPembangunan->nis }}</td>
                <td class="text-center">{{ $itemPembangunan->getDataSiswa->nama_siswa }}</td>
                <td class="text-center">Rp {{ number_format($itemPembangunan->dataPembayaranPembagunan,0) }}</td>
                <td class="text-center">Rp {{ number_format($itemPembangunan->total_biaya,0) }}</td>
                
            </tr>
         @endforeach
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