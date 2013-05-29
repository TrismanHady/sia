  <?php 
    include "printer.css"; ?>
  
<BODY onLoad="javascript:window.print()">
<?php
include "../config/koneksi.php";
include "../librari/fungsi_indotgl.php";
?>
<style type="text/css">
.style4 {font-size: 12; }
.style7 {	font-size: 12;
	color: #265180;
	font-family: Georgia, "Times New Roman", Times, serif;
}
</style>

<table class="basic" width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="550" align="center"><strong>UNIVERSITAS LOKOMEDIA</strong></td>
  </tr>
  <tr>
    <td align="center">Jl. xxxxxx, Telp. (xxxx) xxxx,xxxx. Fax.xxxx</td>
  </tr>
  <tr>
    <td align="center">xxxx-xxxx xxxx xxxx, E-mail : xxxx@xxxx.xxxx. Homepage : xxxx.xxx.xx.xx</td>
  </tr>
</table>
<br><br>
<table id=tablestd>
  <?php  
  $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_GET[NIM]'";
  $no=1;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
  ?>
    <tr>
      <td class=basic><strong>Tahun</strong></td>
      <td class=basic><strong>: <?php echo $_GET['tahun']; ?></td>
      <td rowspan=6 valign=top>
           <?  $sql="SELECT * FROM view_form_mhsakademik WHERE  NIM='$_GET[NIM]' GROUP BY NIM";
               $no=0;
               $qry=mysql_query($sql)
               or die ();
               while($data1=mysql_fetch_array($qry)){
               echo "<img alt='galeri' src='foto_mhs/$data1[foto]' height=130/>";
             }
           ?>              
      </td></tr>
    <tr>
      <td class=basic><strong>NIM</strong></td>
      <td class=basic><strong>: <?php echo $data['NIM']; ?></td>
    </tr>
    <tr>
      <td class=basic><strong>NAMA</strong></td>
      <td class=basic><strong>: <?php echo $data['nama_lengkap']; ?></td>
    </tr>
    <tr>
      <td class=basic><strong>Jurusan</strong></td>
      <td class=basic><strong>: <?php echo $data['kode_jurusan']; ?> - <?php echo $data['nama_jurusan']; ?></strong></td>
    </tr>
    <tr>
      <td class=basic><strong>Program Studi</strong></td>
      <td class=basic><strong>: <?php echo $data['nama_program']; ?></strong></td>
    </tr>
  </table>
<?
    $edit=mysql_query("SELECT * FROM jenis_ujian WHERE jenisjadwal='$_GET[ujian]'");
    $r=mysql_fetch_array($edit);
?>  
<table id=tablemodul1>
<tr><td colspan=10 align=center bgcolor=#C0DCC0><strong>Kartu <?php echo $r['nama']; ?></strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode <br>Matakuliah</th>
        <th class=basic>Nama <br>Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>Sem</th>
        <th class=basic>Ruang</th>
        <th class=basic>Tgl</th>
        <th class=basic>Jam <br>Mulai</th>
        <th class=basic>Jam <br>Selesai</th>
      </tr>

        <?php  
  $sql="SELECT * FROM krs1 WHERE tahun='$_GET[tahun]' AND NIM='$_GET[NIM]' ORDER BY semester,kelas";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
              if ($_GET[ujian]=="UTS")
              {  
                  $UjianTgl   = tgl_indo($data[UTSTgl]);
                  $UjianMulai = $data[UTSMulai];
                  $UjianSelesai = $data[UTSSelesai];
                  $UjianRuang = $data[UTSRuang];
              }else if ($_GET[ujian]=="UAS")
              {  
                  $UjianTgl   = tgl_indo($data[UASTgl]);
                  $UjianMulai = $data[UASMulai];
                  $UjianSelesai = $data[UASSelesai];
                  $UjianRuang = $data[UASRuang];
              }
  ?>      <tr valign="top">
        <td class=basic><?php echo $no; ?>
          </td>
        <td class=basic><?php echo $data['kode_mtk']; ?>
          </td>
        <td class=basic><span class="style4">
          <?php echo $data['nama_matakuliah']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['sks']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['semester']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $UjianRuang; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $UjianTgl; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $UjianMulai; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $UjianSelesai; ?>
        </span></td>
        <?php $Tot=$Tot+$data['sks']; ?>
      </tr>
      
	    <?php
  }
  ?>
  </table>
    <table id=tablestd>
        
      <tr>
        <td valign="top" class=basic>Total Keseluruhan SKS Ambil</td>
        <td valign="top" class=basic><?php echo number_format($Tot,0,',','.');  ?></td>
      </tr>
  <?php
  }
  ?>
<dl><dd><div align="center"></div>
    </dd>
  </dl>
</form>
</body>
</html>
