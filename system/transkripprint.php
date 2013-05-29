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
<table class="basic" width="796" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="80" rowspan="6"><img src="../img/lambang.PNG" height="80"></td>
    <td width="716" align="center"><strong>UNIVERSITAS LOKOMEDIA</strong></td>
    
  </tr>
  <tr>
    <td align="center">xx. xx xx xx, Telp. (xx) xxx,xxx. Fax.xxxx</td>
  </tr>
  <tr>
    <td align="center">xxx-xxx xxx xxx, E-mail : xxx@xxx.xxx. Homepage : xxx.xxx.xxx.xxxs</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><h2><strong>TRANSKRIP NILAI</strong></h2></td>
  </tr>
</table>
<br><br>
<table width="793">
  <?php  
  $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_GET[NIM]'";
  $no=1;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
  ?>
    <tr>
      <td width="95" class=basic><strong>NIM</strong></td>
      <td width="377" class=basic><strong>: <?php echo $data['NIM']; ?></td>
      <td width="91" class=basic><strong>Jurusan</strong></td>
      <td width="210" class=basic><strong>: <?php echo $data['kode_jurusan']; ?> - <?php echo $data['nama_jurusan']; ?></strong></td>
             
    </tr>
    <tr>
      <td class=basic><strong>NAMA</strong></td>
      <td class=basic><strong>: <?php echo $data['nama_lengkap']; ?></td>
      <td class=basic><strong>Program Studi</strong></td>
      <td class=basic><strong>: <?php echo $data['nama_program']; ?></strong></td>
    </tr>
  </table>
<table id=tablemodul1>
<tr><td colspan=8 align=left><strong>Semester 1</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode </th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>Grade</th>
        <th class=basic>Bobot</th>
        <th class=basic>BobotSKS</th>
      </tr>

        <?php  
  $sql="SELECT * FROM matakuliah WHERE Jurusan_ID='$_GET[prodi]' AND semester='1' ORDER BY semester,kode_mtk";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
        $sqlr="SELECT * FROM view_ipk  WHERE  NIM='$_GET[NIM]' AND kode_mtk='$data[Kode_mtk]'";
        $qryr= mysql_query($sqlr);
        $data1=mysql_fetch_array($qryr);
  ?>      <tr valign="top">
        <td class=basic><?php echo $no; ?>
          </td>
        <td class=basic><?php echo $data['Kode_mtk']; ?>
          </td>
        <td class=basic><span class="style4">
          <?php echo $data['Nama_matakuliah']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['SKS']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['GradeNilai']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['BobotNilai']; ?>
        </span></td>
        <?
        $boboxtsks=$data1['SKS']*$data1['BobotNilai'];        
        $jmlbobot=$jmlbobot+$boboxtsks;
        ?>
        <td class=basic><span class="style4">
          <?php echo $boboxtsks; ?>
        </span></td>
       
        <?php $Tot=$Tot+$data['SKS']; ?>
        <?php $ipk=$jmlbobot/$Tot; ?>
      </tr>
      
	    <?php
  }
  ?>
  </table>
  
<table id=tablemodul1>
<tr>
  <td colspan=8 align=left><strong>Semester 2</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode </th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>Grade</th>
        <th class=basic>Bobot</th>
        <th class=basic>BobotSKS</th>
      </tr>

        <?php  
  $sql="SELECT * FROM matakuliah WHERE Jurusan_ID='$_GET[prodi]' AND semester='2' ORDER BY semester,kode_mtk";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
        $sqlr="SELECT * FROM view_ipk  WHERE  NIM='$_GET[NIM]' AND kode_mtk='$data[Kode_mtk]'";
        $qryr= mysql_query($sqlr);
        $data1=mysql_fetch_array($qryr);
  ?>      <tr valign="top">
        <td class=basic><?php echo $no; ?>
          </td>
        <td class=basic><?php echo $data['Kode_mtk']; ?>
          </td>
        <td class=basic><span class="style4">
          <?php echo $data['Nama_matakuliah']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['SKS']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['GradeNilai']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['BobotNilai']; ?>
        </span></td>
        <?
        $boboxtsks=$data1['SKS']*$data1['BobotNilai'];        
        $jmlbobot=$jmlbobot+$boboxtsks;
        ?>
        <td class=basic><span class="style4">
          <?php echo $boboxtsks; ?>
        </span></td>
       
        <?php $Tot=$Tot+$data['SKS']; ?>
        <?php $ipk=$jmlbobot/$Tot; ?>
      </tr>
      
	    <?php
  }
  ?>
  </table>
  
<table id=tablemodul1>
<tr>
  <td colspan=8 align=left><strong>Semester 3</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode </th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>Grade</th>
        <th class=basic>Bobot</th>
        <th class=basic>BobotSKS</th>
      </tr>

        <?php  
  $sql="SELECT * FROM matakuliah WHERE Jurusan_ID='$_GET[prodi]' AND semester='3' ORDER BY semester,kode_mtk";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
        $sqlr="SELECT * FROM view_ipk  WHERE  NIM='$_GET[NIM]' AND kode_mtk='$data[Kode_mtk]'";
        $qryr= mysql_query($sqlr);
        $data1=mysql_fetch_array($qryr);
  ?>      <tr valign="top">
        <td class=basic><?php echo $no; ?>
          </td>
        <td class=basic><?php echo $data['Kode_mtk']; ?>
          </td>
        <td class=basic><span class="style4">
          <?php echo $data['Nama_matakuliah']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['SKS']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['GradeNilai']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['BobotNilai']; ?>
        </span></td>
        <?
        $boboxtsks=$data1['SKS']*$data1['BobotNilai'];        
        $jmlbobot=$jmlbobot+$boboxtsks;
        ?>
        <td class=basic><span class="style4">
          <?php echo $boboxtsks; ?>
        </span></td>
       
        <?php $Tot=$Tot+$data['SKS']; ?>
        <?php $ipk=$jmlbobot/$Tot; ?>
      </tr>
      
	    <?php
  }
  ?>
  </table>
<table id=tablemodul1>
<tr>
  <td colspan=8 align=left><strong>Semester 4</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode </th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>Grade</th>
        <th class=basic>Bobot</th>
        <th class=basic>BobotSKS</th>
      </tr>
        <?php  
  $sql="SELECT * FROM matakuliah WHERE Jurusan_ID='$_GET[prodi]' AND semester='4' ORDER BY semester,kode_mtk";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
        $sqlr="SELECT * FROM view_ipk  WHERE  NIM='$_GET[NIM]' AND kode_mtk='$data[Kode_mtk]'";
        $qryr= mysql_query($sqlr);
        $data1=mysql_fetch_array($qryr);
  ?>      <tr valign="top">
        <td class=basic><?php echo $no; ?>
          </td>
        <td class=basic><?php echo $data['Kode_mtk']; ?>
          </td>
        <td class=basic><span class="style4">
          <?php echo $data['Nama_matakuliah']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['SKS']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['GradeNilai']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['BobotNilai']; ?>
        </span></td>
        <?
        $boboxtsks=$data1['SKS']*$data1['BobotNilai'];        
        $jmlbobot=$jmlbobot+$boboxtsks;
        ?>
        <td class=basic><span class="style4">
          <?php echo $boboxtsks; ?>
        </span></td>
       
        <?php $Tot=$Tot+$data['SKS']; ?>
        <?php $ipk=$jmlbobot/$Tot; ?>
      </tr>
      
	    <?php
  }
  ?>
  </table>
 <table id=tablemodul1>
<tr>
  <td colspan=8 align=left><strong>Semester 5</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode </th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>Grade</th>
        <th class=basic>Bobot</th>
        <th class=basic>BobotSKS</th>
      </tr>

        <?php  
  $sql="SELECT * FROM matakuliah WHERE Jurusan_ID='$_GET[prodi]' AND semester='5' ORDER BY semester,kode_mtk";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
        $sqlr="SELECT * FROM view_ipk  WHERE  NIM='$_GET[NIM]' AND kode_mtk='$data[Kode_mtk]'";
        $qryr= mysql_query($sqlr);
        $data1=mysql_fetch_array($qryr);
  ?>      <tr valign="top">
        <td class=basic><?php echo $no; ?>
          </td>
        <td class=basic><?php echo $data['Kode_mtk']; ?>
          </td>
        <td class=basic><span class="style4">
          <?php echo $data['Nama_matakuliah']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['SKS']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['GradeNilai']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['BobotNilai']; ?>
        </span></td>
        <?
        $boboxtsks=$data1['SKS']*$data1['BobotNilai'];        
        $jmlbobot=$jmlbobot+$boboxtsks;
        ?>
        <td class=basic><span class="style4">
          <?php echo $boboxtsks; ?>
        </span></td>
       
        <?php $Tot=$Tot+$data['SKS']; ?>
        <?php $ipk=$jmlbobot/$Tot; ?>
      </tr>
      
	    <?php
  }
  ?>
  </table>
 <table id=tablemodul1>
<tr>
  <td colspan=8 align=left><strong>Semester 6</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode </th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>Grade</th>
        <th class=basic>Bobot</th>
        <th class=basic>BobotSKS</th>
      </tr>

        <?php  
  $sql="SELECT * FROM matakuliah WHERE Jurusan_ID='$_GET[prodi]' AND semester='6' ORDER BY semester,kode_mtk";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
        $sqlr="SELECT * FROM view_ipk  WHERE  NIM='$_GET[NIM]' AND kode_mtk='$data[Kode_mtk]'";
        $qryr= mysql_query($sqlr);
        $data1=mysql_fetch_array($qryr);
  ?>      <tr valign="top">
        <td class=basic><?php echo $no; ?>
          </td>
        <td class=basic><?php echo $data['Kode_mtk']; ?>
          </td>
        <td class=basic><span class="style4">
          <?php echo $data['Nama_matakuliah']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['SKS']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['GradeNilai']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['BobotNilai']; ?>
        </span></td>
        <?

        $boboxtsks=$data1['SKS']*$data1['BobotNilai'];        
        $jmlbobot=$jmlbobot+$boboxtsks;
        ?>
        <td class=basic><span class="style4">
          <?php echo $boboxtsks; ?>
        </span></td>
       
        <?php $Tot=$Tot+$data['SKS']; ?>
        <?php $ipk=$jmlbobot/$Tot; ?>
      </tr>
      
	    <?php
  }
  ?>
  </table>
 <table id=tablemodul1>
<tr>
  <td colspan=8 align=left><strong>Semester 7</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode </th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>Grade</th>
        <th class=basic>Bobot</th>
        <th class=basic>BobotSKS</th>
      </tr>
        <?php  
  $sql="SELECT * FROM matakuliah WHERE Jurusan_ID='$_GET[prodi]' AND semester='7' ORDER BY semester,kode_mtk";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
        $sqlr="SELECT * FROM view_ipk  WHERE  NIM='$_GET[NIM]' AND kode_mtk='$data[Kode_mtk]'";
        $qryr= mysql_query($sqlr);
        $data1=mysql_fetch_array($qryr);
  ?>      <tr valign="top">
        <td class=basic><?php echo $no; ?>
          </td>
        <td class=basic><?php echo $data['Kode_mtk']; ?>
          </td>
        <td class=basic><span class="style4">
          <?php echo $data['Nama_matakuliah']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['SKS']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['GradeNilai']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['BobotNilai']; ?>
        </span></td>
        <?
        $boboxtsks=$data1['SKS']*$data1['BobotNilai'];        
        $jmlbobot=$jmlbobot+$boboxtsks;
        ?>
        <td class=basic><span class="style4">
          <?php echo $boboxtsks; ?>
        </span></td>
       
        <?php $Tot=$Tot+$data['SKS']; ?>
        <?php $ipk=$jmlbobot/$Tot; ?>
      
	    <?php
  }
  ?>
  </table>
 <table id=tablemodul1>
<tr>
  <td colspan=8 align=left><strong>Semester 8</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode </th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>Grade</th>
        <th class=basic>Bobot</th>
        <th class=basic>BobotSKS</th>
      </tr>

        <?php  
  $sql="SELECT * FROM matakuliah WHERE Jurusan_ID='$_GET[prodi]' AND semester='8' ORDER BY semester,kode_mtk";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
        $sqlr="SELECT * FROM view_ipk  WHERE  NIM='$_GET[NIM]' AND kode_mtk='$data[Kode_mtk]'";
        $qryr= mysql_query($sqlr);
        $data1=mysql_fetch_array($qryr);
  ?>      <tr valign="top">
        <td class=basic><?php echo $no; ?>
          </td>
        <td class=basic><?php echo $data['Kode_mtk']; ?>
          </td>
        <td class=basic><span class="style4">
          <?php echo $data['Nama_matakuliah']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['SKS']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['GradeNilai']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data1['BobotNilai']; ?>
        </span></td>
        <?
        $boboxtsks=$data1['SKS'] * $data1['BobotNilai']; 
        $jmlbobot=$jmlbobot+$boboxtsks;       
        ?>
        <td class=basic><span class="style4">
          <?php echo $boboxtsks; ?>
        </span></td>
       
        <?php $Tot=$Tot+$data['SKS']; ?>
         <?  $ipk=$jmlbobot/$Tot; ?>
      </tr>
      
	    <?php
  }
  ?>
  </table>
    <table id=tablestd>
         <?  $ipk=$jmlbobot/$Tot; ?>       
      <tr>
        <td valign="top" class=basic>Jumlah Keseluruhan SKS</td>
        <td valign="top" class=basic><?php echo number_format($Tot,0,',','.');  ?></td>
      </tr>
      <tr>
        <td valign="top" class=basic>Index Prestasi Kumulatif</td>
        <td valign="top" class=basic><?php echo number_format($ipk,2,',','.');  ?></td>
      </tr>
  <?php
  }
  ?>
<dl><dd><div align="center"></div>
    </dd>
  </dl>
