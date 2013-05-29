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
  $sql="SELECT t2.*,t3.Keterangan FROM jurusan t2,jenjang t3 WHERE t3.Nama=t2.jenjang AND t2.kode_jurusan='$_GET[kodejurSIA]'";
  $no=1;
  $qry=mysql_query($sql)
  or die ();
  while($d=mysql_fetch_array($qry)){
  $no++;
  ?>
<table class="basic" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="716" align="center"><h2>PROGRAM STUDI <?php echo $d['nama_jurusan']; ?></h2></td>
    
  </tr>
  <tr>
    <td align="center">MATAKULIAH AKTIF UNIVERSITAS LOKOMEDIA</td>
  </tr>
</table>
<br><br>
<table>

    <tr>
      <td width="119" class=basic><strong>Program Studi</strong></td>
      <td width="275" class=basic><strong>: <?php echo $d['nama_jurusan']; ?></td>
      <td width="169" class=basic><strong>Jenjang Pendidkan</strong></td>
      <td width="210" class=basic><strong>: <?php echo $d['Keterangan']; ?> ( <?php echo $d['jenjang']; ?> )</strong></td>
             
    </tr>
  </table>
<table id=tablemodul1>
<tr><td colspan=8 align=left><strong>Semester 1</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode </th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>&nbsp;</th>
      </tr>
        <?php  
        $sql="SELECT t1.*,t2.Nama_matakuliah AS pras FROM cetakmtk t1, matakuliah t2  WHERE t1.Identitas_ID='$_GET[IDSessionSIAinst]' AND t1.Jurusan_ID='$_GET[kodejurSIA]' AND t1.Semester='1' GROUP BY t1.Matakuliah_ID";
        $no=0;
        $qry=mysql_query($sql)
        or die ();
        while($data=mysql_fetch_array($qry)){
        $no++;
        ?>    
      <tr valign="top">
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
        <td class=basic>&nbsp;</td>
        
        <?php $T1=$T1+$data['SKS']; ?>
      </tr>      
	    <?php
  }
  ?>
  <?
  echo "<tr><td colspan=3 align=right>Total :<td>";
  echo number_format($T1,0,',','.');
  echo "</tr>";
  ?>
  </table>
  
<table id=tablemodul1>
<tr>
  <td colspan=8 align=left><strong>Semester 2</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode</th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>&nbsp;</th>
      </tr>

        <?php  
        $sql="SELECT t1.*,t2.Nama_matakuliah AS pras FROM cetakmtk t1, matakuliah t2  WHERE t1.Identitas_ID='$_GET[IDSessionSIAinst]' AND t1.Jurusan_ID='$_GET[kodejurSIA]' AND t1.Semester='2' GROUP BY t1.Matakuliah_ID";

  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
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
        <td class=basic>&nbsp;</td>
        
        <?php $T2=$T2+$data['SKS']; ?>
      </tr>
      
	    <?php
  }
  ?>
  <?
  echo "<tr><td colspan=3 align=right>Total :<td>";
  echo number_format($T2,0,',','.');
  echo "</tr>";
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
        <th class=basic>&nbsp;</th>
      </tr>

        <?php  
        $sql="SELECT t1.*,t2.Nama_matakuliah AS pras FROM cetakmtk t1, matakuliah t2  WHERE t1.Identitas_ID='$_GET[IDSessionSIAinst]' AND t1.Jurusan_ID='$_GET[kodejurSIA]' AND t1.Semester='3' GROUP BY t1.Matakuliah_ID";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
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
        <td class=basic>&nbsp;</td>
        
        <?php $T3=$T3+$data['SKS']; ?>
      </tr>
      
	    <?php
  }
  ?>
  <?
  echo "<tr><td colspan=3 align=right>Total :<td>";
  echo number_format($T3,0,',','.');
  echo "</tr>";
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
        <th class=basic>&nbsp;</th>
      </tr>

        <?php  
         $sql="SELECT t1.*,t2.Nama_matakuliah AS pras FROM cetakmtk t1, matakuliah t2  WHERE t1.Identitas_ID='$_GET[IDSessionSIAinst]' AND t1.Jurusan_ID='$_GET[kodejurSIA]' AND t1.Semester='4' GROUP BY t1.Matakuliah_ID";

  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
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
        <td class=basic>&nbsp;</td>
        
        <?php $T4=$T4+$data['SKS']; ?>
      </tr>
      
	    <?php
  }
  ?>
  <?
  echo "<tr><td colspan=3 align=right>Total :<td>";
  echo number_format($T4,0,',','.');
  echo "</tr>";
  ?>    
  </table>
 <table id=tablemodul1>
<tr>
  <td colspan=8 align=left><strong>Semester 5</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode</th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>&nbsp;</th>
      </tr>

        <?php  
        $sql="SELECT t1.*,t2.Nama_matakuliah AS pras FROM cetakmtk t1, matakuliah t2  WHERE t1.Identitas_ID='$_GET[IDSessionSIAinst]' AND t1.Jurusan_ID='$_GET[kodejurSIA]' AND t1.Semester='5' GROUP BY t1.Matakuliah_ID";

  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
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
        <td class=basic>&nbsp;</td>
        
        <?php $T5=$T5+$data['SKS']; ?>
      </tr>
      
	    <?php
  }
  ?>
  <?
  echo "<tr><td colspan=3 align=right>Total :<td>";
  echo number_format($T5,0,',','.');
  echo "</tr>";
  ?>      
  </table>
 <table id=tablemodul1>
<tr>
  <td colspan=8 align=left><strong>Semester 6</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode</th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>&nbsp;</th>
      </tr>

        <?php  
        $sql="SELECT t1.*,t2.Nama_matakuliah AS pras FROM cetakmtk t1, matakuliah t2  WHERE t1.Identitas_ID='$_GET[IDSessionSIAinst]' AND t1.Jurusan_ID='$_GET[kodejurSIA]' AND t1.Semester='6' GROUP BY t1.Matakuliah_ID";

  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
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
        <td class=basic>&nbsp;</td>
        
        <?php $T6=$T6+$data['SKS']; ?>
      </tr>
      
	    <?php
  }
  ?>
  <?
  echo "<tr><td colspan=3 align=right>Total :<td>";
  echo number_format($T6,0,',','.');
  echo "</tr>";
  ?>        
  </table>
 <table id=tablemodul1>
<tr>
  <td colspan=8 align=left><strong>Semester 7</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode</th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>&nbsp;</th>
      </tr>

        <?php  
        $sql="SELECT t1.*,t2.Nama_matakuliah AS pras FROM cetakmtk t1, matakuliah t2  WHERE t1.Identitas_ID='$_GET[IDSessionSIAinst]' AND t1.Jurusan_ID='$_GET[kodejurSIA]' AND t1.Semester='7' GROUP BY t1.Matakuliah_ID";

  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
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
        <td class=basic>&nbsp;</td>
        
        <?php $T7=$T7+$data['SKS']; ?>
      </tr>
      
	    <?php
  }
  ?>
  <?
  echo "<tr><td colspan=3 align=right>Total :<td>";
  echo number_format($T7,0,',','.');
  echo "</tr>";
  ?>    
  </table>
 <table id=tablemodul1>
<tr>
  <td colspan=8 align=left><strong>Semester 8</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode</th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>&nbsp;</th>
      </tr>

        <?php  
        $sql="SELECT t1.*,t2.Nama_matakuliah AS pras FROM cetakmtk t1, matakuliah t2  WHERE t1.Identitas_ID='$_GET[IDSessionSIAinst]' AND t1.Jurusan_ID='$_GET[kodejurSIA]' AND t1.Semester='8' GROUP BY t1.Matakuliah_ID";

  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
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
        <td class=basic>&nbsp;</td>
        
        <?php $T8=$T8+$data['SKS']; ?>
      </tr>
      
	    <?php
  }
  ?>
  <?
  echo "<tr><td colspan=3 align=right>Total :<td>";
  echo number_format($T8,0,',','.');
  echo "</tr>";
  ?>    
  </table>
    <table id=tablestd>
        
      <tr>
        <td valign="top" class=basic>Jumlah Keseluruhan SKS</td>
        <td valign="top" class=basic><?php echo number_format($T1+$T2+$T3+$T4+$T5+$T6+$T7+$T8,0,',','.');  ?></td>
      </tr>


<table class="basic" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="716" align="center"> <strong>Daftar Matakuliah Pilihan</td>
  </tr>
</table>
<table id=tablemodul1>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode </th>
        <th class=basic>Nama Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>Semester</th>
      </tr>

  <?php  
  $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Jurusan_ID='$_GET[kodejurSIA]' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Semester,t1.Matakuliah_ID";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
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
          <?php echo $data['Semester']; ?>
        </span></td>   
      </tr>
      
	    <?php
  }
  ?>
  </table>
  <br>
 <table class="basic" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="left">Matakuliah yang wajib diambil min. 10 SKS atau Max 15 SKS</td>
  </tr>
  <tr>
    <td colspan="2" align="left">Catatan :</td>
  </tr>
  <tr>
    <td colspan="2" align="left">* Skripsi dan PKL ditawarkan di Semester Ganjil dan Genap</td>
  </tr>
  <tr>
    <td colspan="2" align="left">* Setiap Bp harus menyesuaikan dengan pedoman PA ini</td>
  </tr>
  <tr>
    <td colspan="2" align="left">* (1),(2),(3),(4) --&gt; Prioritas pengambilan matakuliah ke atas</td>
  </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td width="327" align="right">&nbsp;</td>
    <td width="389" align="center"> <strong>Program Studi  <?php echo $d['nama_jurusan']; ?></strong></td>
  </tr>
  <tr>
    <td colspan="2" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">( <strong><?php echo $data['NIM']; ?></strong> )</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center"> <strong>Ketua Jurusan</td>
  </tr>
</table> 
  <?php
  }
  ?>  
  <dl><dd><div align="center"></div>
    </dd>
</dl>
