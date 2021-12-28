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
<br>
<div style="margin:auto; text-align:center">
    <h3>Laporan Total Pembayaran Pertahun</h3>
</div>
<br>
</table>
<br>
<br>

<table width="100%" border="1" cellspacing="0" cellpadding="4" style="border-collapse: collapse;">
    <tr>
        <th>No</th>
        <th>Total Pembayaran Setahun</th>
        <th>Tahun Ajaran</th>
    </tr>
    @php
        $no = 1;
        $totalSetahun = [];
         foreach ($data as $key => $value) {
            array_push($totalSetahun, $value->totalSetahun);
        }
    @endphp

        <tr>
            <td align='center'>{{ $no++}}</td>
            <td>
                @php
                    echo "Rp ".number_format(array_sum($totalSetahun),0);
                @endphp
            </td>
            <td align='center'>
                {{$dataTahunAjaran->tahun_ajaran}}
            </td>
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