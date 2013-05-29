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
  <?php  
  $sql="SELECT Nama FROM tahun WHERE ID='$_GET[tahun]' AND Program_ID='$_GET[program]' AND Jurusan_ID='$_GET[prodi]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($t=mysql_fetch_array($qry)){
  $no++;
  ?>
<table class="basic" width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="550" align="center"><strong>UNIVERSITAS LOKOMEDIA</strong></td>
  </tr>
  <tr>
    <td align="center">DAFTAR HADIR PERKULIAHAN <?php echo $t['Nama']; ?></td>
  </tr>
  <?
  }
  ?>
</table>
<br><br>
<table  width="800" id=tablemodul>
  <?php  
  $sql="SELECT * FROM krs1 WHERE idtahun='$_GET[tahun]' AND idprog='$_GET[program]' AND kode_jurusan='$_GET[prodi]' AND kode_mtk='$_GET[kdmtk]' AND kelas='$_GET[kelas]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
  ?>
    <tr>
      <td width="120" class=basic>Program</td>
      <td width="417" class=basic><strong>: <?php echo $data['nama_program']; ?></td>
      <td width="53" class=basic>Hari</td>
      <td width="191" class=basic> <strong>: <?php echo $data['hari']; ?></td>
	</tr>
    <tr>
      <td class=basic>Semester/ Kelas</td>
      <td class=basic><strong>: <?php echo $data['kelas']; ?></td>
      <td class=basic>Waktu</td>
      <td class=basic><strong>: <?php echo $data['jam_mulai']; ?> - <?php echo $data['jam_selesai']; ?></td>
    </tr>
    <tr>
      <td class=basic>Program Studi</td>
      <td class=basic><strong>: <?php echo $data['kode_jurusan']; ?> - <?php echo $data['nama_jurusan']; ?></td>
      <td class=basic>Lokal</td>
      <td class=basic><strong>: <?php echo $data['Ruang_ID']; ?></td>
    </tr>
    <tr>
      <td class=basic>Mata Kuliah</td>
      <td colspan="3" class=basic><strong>: <?php echo $data['kode_mtk']; ?> - <?php echo $data['nama_matakuliah']; ?></strong></td>
    </tr>
    <tr>
      <td class=basic>Dosen</td>
      <td colspan="3" class=basic><strong>: <?php echo $data['dosen']; ?>, <?php echo $data['gelar']; ?></strong></td>
    </tr>
  </table>

<table id=tablemodul1>
      <tr bgcolor="#CCCCCC">
        <th rowspan="4" class=basic>No</th>
        <th rowspan="4" class=basic>NIM</th>
        <th rowspan="4" class=basic>Nama Mahasiswa</th>
        <th colspan="16" class=basic>Pertemuan Ke</th>
        <th rowspan="4" class=basic>Abs</th>
      </tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>01</th>
        <th class=basic>02</th>
        <th class=basic>03</th>
        <th class=basic>04</th>
        <th class=basic>05</th>
        <th class=basic>06</th>
        <th class=basic>07</th>
        <th class=basic>08</th>
        <th class=basic>09</th>
        <th class=basic>10</th>
        <th class=basic>11</th>
        <th class=basic>12</th>
        <th class=basic>13</th>
        <th class=basic>14</th>
        <th class=basic>15</th>
        <th class=basic>16</th>
      </tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
        <th class=basic>Tgl</th>
      </tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
        <th class=basic>&nbsp;</th>
      </tr>

        <?php  
  $sql="SELECT * FROM krs1 WHERE idtahun='$_GET[tahun]' AND idprog='$_GET[program]' AND kode_jurusan='$_GET[prodi]' AND kode_mtk='$_GET[kdmtk]' AND kelas='$_GET[kelas]' ORDER BY NIM";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
  ?>   
      <tr valign="top">
        <td class=basic><?php echo $no; ?>
          </td>
        <td class=basic><?php echo $data['NIM']; ?>
          </td>
        <td class=basic><span class="style4">
          <?php echo $data['nama_lengkap']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_1']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_2']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_3']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_4']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_5']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_6']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_7']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_8']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_9']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_10']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_11']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_12']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_13']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_14']; ?>
        </td>
        <td align=center>
          <?php echo $data['hdr_15']; ?>
         </td> 
        <td align=center>
          <?php echo $data['hdr_16']; ?>
        </td>
        <td class=basic><span class="style4">

        </td>

      </tr>
        <?php
  }
  ?>
</table>
  	    <?php
  }
  ?>

<dl><dd><div align="center"></div>
    </dd>
</dl>
</form>
</body>
</html>
