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
    <h3>Slip Pembayaran SPP</h3>
</div>
<br>
<br>
<table style="border-collapse: collapse;">
<tr>
<td width="100">Nis</td>
<td width="4">:</td>
<td>{{ $data->nis}}</td>
</tr>

<tr>
<td width="100">Nama Siswa</td>
<td width="4">:</td>
<td>{{ $data->nama_siswa}}</td>
</tr>

<tr>
<td width="100">Kelas</td>
<td width="4">:</td>
<td>{{ $data->nama_kelas}}</td>
</tr>
</table>

<table width="100%" border="1" cellspacing="0" cellpadding="4" style="border-collapse: collapse;">
    <tr>
        <th>No.</th>
        <th>No bayar</th>
        <th>Pembayaran Bulan</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
    </tr>
    <tr>
        <td align='center'>1</td>
        <td align='center'>{{ $data->kode_pembayaran }}</td>
        <td>{{ \Carbon\Carbon::parse($data->jatuh_tempo)->format('M Y')}}</td>
        <td align='right'>Rp {{ number_format($data->total_biaya,0) }}</td>
        <td> {{ $data->status_pembayaran }}</td>
    </tr>
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