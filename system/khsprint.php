  <?php 
    include "printer.css"; ?>
  
<BODY onLoad="javascript:window.print()">
<?php
include "../config/koneksi.php";

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
    <td align="center">xx. xxxx xxx xx, Telp. (xxx) xxx,xx. Fax.xxx</td>
  </tr>
  <tr>
    <td align="center">xxx-xxx xx xxx, E-mail : xx@xxx.xx. Homepage : xxx.xxxx.xx.xx</td>
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
           <?  $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_GET[NIM]' GROUP BY NIM";
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
    <tr>
      <td class=basic><strong>Pembimbing</strong></td>
      <td class=basic><strong>: <?php echo $data['pembimbing']; ?>, <?php echo $data['Gelar']; ?></strong></td>
    </tr>
  </table>
<table id=tablemodul1>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode <br>Matakuliah</th>
        <th class=basic>Nama <br>Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>Sem</th>
        <th class=basic> Kls</th>
        <th class=basic> Hari </th>
        <th class=basic>Jam <br>Mulai</th>
        <th class=basic>Jam <br>Selesai</th>
        <th class=basic>Dosen</th>
        <th class=basic>Nilai</th>
        <th class=basic>Bobot</th>
        <th class=basic>Bobot SKS</th>        
      </tr>

        <?php  
  $sql="SELECT * FROM krs1 WHERE tahun='$_GET[tahun]' AND NIM='$_GET[NIM]' ORDER BY semester,kelas";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
  ?>      <tr valign="top">
        <td class=basic><?php echo $no; ?>
          </td>
        <td class=basic><?php echo $data['kode_mtk']; ?>
          </td>
        <td class=basic><span class="style4">
          <?php echo $data['nama_matakuliah']; ?>
        </span></td>
        <td class=basic align=center><span class="style4">
          <?php echo $data['sks']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['semester']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['kelas']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['hari']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['jam_mulai']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['jam_selesai']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['dosen']; ?>,  <?php echo $data['gelar']; ?>
        </span></td>
        <?php $Tot=$Tot+$data['sks']; ?>
        <td class=basic><span class="style4">
          <?php echo $data['GradeNilai']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['bobot']; ?>
         <?php   $boboxtsks=$data[sks]*$data[bobot];  ?>
         <?php   $jmlbobot=$jmlbobot+$boboxtsks; ?>
         <?php   $ips=$jmlbobot/$Tot; ?>
        <td class=basic align=center><span class="style4">
          <?php echo $boboxtsks; ?>
        </span></td>
      </tr>
      
	    <?php
  }
  ?>
  <td colspan=3 align=right></td><td colspan=1 align=center>
  <?echo number_format($Tot,0,',','.'); ?>
   </td><td colspan=8 align=right></td>
        <td colspan=1 align=center>
  <?echo number_format($jmlbobot,0,',','.'); ?>
  </td></table>

    <table id=tablestd>
        
      <tr>
        <td valign="top" class=basic>Total Keseluruhan SKS Ambil</td>
        <td valign="top" class=basic><?php echo number_format($Tot,0,',','.');  ?></td>
      </tr>
      <tr>
      <?
         $sql="SELECT t2.MaxSKS AS sks 
              FROM master_nilai t2 
              WHERE (t2.ipmax >= $ips) AND (t2.ipmin <= $ips)";
        $no=0;
        $qry=mysql_query($sql)
        or die;
        while($data=mysql_fetch_array($qry)){
        ?>     
      <td class=basic>Batas Max Ambil SKS</td>
        <td valign="top" class=basic><?php echo $data['sks'];  ?></td></tr>
      <?
      }
      ?>
  <?php
  }
  ?>
  <?
  $sql="SELECT * FROM krs1 WHERE tahun='$_GET[tahun]' AND NIM='$_GET[NIM]' ORDER BY semester,kelas";
  $no=0;
  $qry=mysql_query($sql);
  $data=mysql_fetch_array($qry);
  ?>
  Tanggal KHS : <?php echo $data['TglCetakKHS']; ?>
<dl><dd><div align="center"></div>
    </dd>
  </dl>
</form>
</body>
</html>
