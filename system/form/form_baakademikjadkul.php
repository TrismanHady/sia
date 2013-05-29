<? 
    $edit=mysql_query("SELECT * FROM karyawan WHERE username='$_SESSION[username]'");
    $data=mysql_fetch_array($edit);
switch($_GET[PHPIdSession]){

  default:
        $id= $_REQUEST['ID'];
        $kode=$_REQUEST['codd'];
        $idp= $_REQUEST['prog'];
        $tahun= $_REQUEST['tahun'];
        ?>
        <script language="javascript" type="text/javascript">
        <!--
        function MM_jumpMenu(targ,selObj,restore){// v3.0
         eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
        if (restore) selObj.selectedIndex=0;
        }
        //-->
        </script>
        <?
           echo"<div id=headermodul>Jadwal Kuliah</div>            
                <div id=groupmodul1>
                <table id=tablemodul>
              <input name=identitas type=hidden value=$data[Identitas_ID]>
              <input name=jurusan type=hidden value=$data[kode_jurusan]>";
        ?>   

            <tr>
              <td class="cc">Program</td>   <td colspan=2 class="cb"> : <select name="program" onChange="MM_jumpMenu('parent',this,0)">
                <option value="media.php?page=jadkulAkd">- Pilih Program -</option>
            <?php
        	  $sqlp="SELECT * FROM program WHERE Identitas_ID='$data[Identitas_ID]'";
        	  $qryp=mysql_query($sqlp)
        	  or die();
        	  while ($d2=mysql_fetch_array($qryp)){
            if ($d2['ID']==$idp){
              $cek="selected";
              }
              else{
                $cek="";
              }
              echo "<option value='?page=levelakademikjadkul&ID=$data[Identitas_ID]&codd=$data[kode_jurusan]&prog=$d2[ID]' $cek> $d2[Program_ID] - $d2[nama_program]</option>";
        		}
        		?>
              </select>
              <input name="program" type="hidden" value="<?= $idp; ?>"></td>
            </tr>
            <tr>
              <td class="cc">Tahun Akademik</td>   <td colspan=2 class="cb"> : <select name="tahun" onChange="MM_jumpMenu('parent',this,0)">
                <option value="media.php?page=levelakademikjadkul">- Tahun -</option>
            <?php
        	  $sqlp="SELECT * FROM tahun WHERE Identitas_ID='$id' AND Jurusan_ID='$kode' AND Program_ID='$idp'";
        	  $qryp=mysql_query($sqlp)
        	  or die();
        	  while ($d2=mysql_fetch_array($qryp)){
            if ($d2['ID']==$tahun){
              $cek="selected";
              }
              else{
                $cek="";
              }
              echo "<option value='?page=levelakademikjadkul&ID=$id&codd=$kode&prog=$idp&tahun=$d2[ID]' $cek> $d2[Tahun_ID] </option>";
        		}
        		?>
              </select>
              <input name="tahun" type="hidden" value="<?= $tahun; ?>"></td>
            </tr>
            <?php
            echo"
            <tr><td class=cc>Pilihan</td>    <td colspan=2 class=cb>  <a class=s href=media.php?page=levelakademikjadkul&PHPIdSession=addjadkul><img src=../img/tambah.png> Tambah Jadwal |</a>
                                                                       <a class=s href=jadkulprint.php?ID=$id&codd=$kode&prog=$idp&tahun=$tahun target=_new><img src=../img/printer.GIF> Jadwal Utk Mhs |</a>
            </tr></td>
            <table id=tablemodul>
            <h3>Senin</h3>
            <tr><th>Edit</th><th>Ujian</th><th>Waktu</th><th>Ruang</th><th>Kode MK</th><th> Matakuliah</th><th>Kelas</th><th>SKS</th><th>Dosen</th><th>Aktif</th><th>Hapus</th></tr>";
          $sql="SELECT * FROM view_jadwal WHERE Identitas_ID='$id' AND Kode_Jurusan='$kode' AND Program_ID='$idp' AND Hari='Senin' AND Tahun_ID='$tahun' GROUP BY Jadwal_ID";
        	$qry= mysql_query($sql)
        	or die ();
        	while ($r=mysql_fetch_array($qry)){         	
        	$no++;
             echo "<tr bgcolor=$warna>                            
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalmtk&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'>$r[Jadwal_ID] <img src=../img/edit.png></a></td>
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalujian&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'> <img src=../img/edit_2.png></a></td>
      		         <td>$r[Jam_Mulai] - $r[Jam_Selesai]</td>
      		         <td>$r[NR]</td>
      		         <td>$r[Kode_Mtk]</td>
      		         <td>$r[Nama_matakuliah]</td>
      		         <td>$r[Kelas]</td>
       		         <td>$r[SKS]</td>
       		         <td>$r[nama_lengkap],$r[Gelar]</td>
       		         <td>$r[Aktif]</td>
                   <td><a class=s href='baakademik/baakademikjadkulact.php?page=levelakademikjadkul&PHPIdSession=hapusjadwl&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gos=$r[Jadwal_ID]'><img src=../img/del.gif></a></td>                    
                    </tr>";        
                  }
                  echo"</table>";
        echo"<table id=tablemodul>
             <h3>Selasa</h3>
            <tr><th>Edit</th><th>Ujian</th><th>Waktu</th><th>Ruang</th><th>Kode MK</th><th> Matakuliah</th><th>Kelas</th><th>SKS</th><th>Dosen</th><th>Aktif</th><th>Hapus</th></tr>";
          $sql="SELECT * FROM view_jadwal WHERE Identitas_ID='$id' AND Kode_Jurusan='$kode' AND Program_ID='$idp' AND Hari='Selasa' AND Tahun_ID='$tahun' GROUP BY Jadwal_ID";
        	$qry= mysql_query($sql)
        	or die ();
        	while ($r=mysql_fetch_array($qry)){         	
        	$no++;
             echo "<tr bgcolor=$warna>                            
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalmtk&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'>$r[Jadwal_ID] <img src=../img/edit.png></a></td>
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalujian&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'> <img src=../img/edit_2.png></a></td>
      		         <td>$r[Jam_Mulai] - $r[Jam_Selesai]</td>
      		         <td>$r[NR]</td>
      		         <td>$r[Kode_Mtk]</td>
      		         <td>$r[Nama_matakuliah]</td>
      		         <td>$r[Kelas]</td>
       		         <td>$r[SKS]</td>
       		         <td>$r[nama_lengkap],$r[Gelar]</td>
       		         <td>$r[Aktif]</td>
                   <td><a class=s href='baakademik/baakademikjadkulact.php?page=levelakademikjadkul&PHPIdSession=hapusjadwl&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gos=$r[Jadwal_ID]'><img src=../img/del.gif></a></td>                    
                    </tr>";        
                  }
                  echo"</table>";                  
        echo"<table id=tablemodul>
             <h3>Rabu</h3>
            <tr><th>Edit</th><th>Ujian</th><th>Waktu</th><th>Ruang</th><th>Kode MK</th><th> Matakuliah</th><th>Kelas</th><th>SKS</th><th>Dosen</th><th>Aktif</th><th>Hapus</th></tr>";
          $sql="SELECT * FROM view_jadwal WHERE Identitas_ID='$id' AND Kode_Jurusan='$kode' AND Program_ID='$idp' AND Hari='Rabu' AND Tahun_ID='$tahun' GROUP BY Jadwal_ID";
        	$qry= mysql_query($sql)
        	or die ();
        	while ($r=mysql_fetch_array($qry)){         	
        	$no++;
             echo "<tr bgcolor=$warna>                            
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalmtk&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'>$r[Jadwal_ID] <img src=../img/edit.png></a></td>
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalujian&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'> <img src=../img/edit_2.png></a></td>
      		         <td>$r[Jam_Mulai] - $r[Jam_Selesai]</td>
      		         <td>$r[NR]</td>
      		         <td>$r[Kode_Mtk]</td>
      		         <td>$r[Nama_matakuliah]</td>
      		         <td>$r[Kelas]</td>
       		         <td>$r[SKS]</td>
       		         <td>$r[nama_lengkap],$r[Gelar]</td>
       		         <td>$r[Aktif]</td>
                   <td><a class=s href='baakademik/baakademikjadkulact.php?page=levelakademikjadkul&PHPIdSession=hapusjadwl&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gos=$r[Jadwal_ID]'><img src=../img/del.gif></a></td>                    
                    </tr>";        
                  }
                  echo"</table>";                  
        echo"<table id=tablemodul>
             <h3>Kamis</h3>
            <tr><th>Edit</th><th>Ujian</th><th>Waktu</th><th>Ruang</th><th>Kode MK</th><th> Matakuliah</th><th>Kelas</th><th>SKS</th><th>Dosen</th><th>Aktif</th><th>Hapus</th></tr>";
          $sql="SELECT * FROM view_jadwal WHERE Identitas_ID='$id' AND Kode_Jurusan='$kode' AND Program_ID='$idp' AND Hari='Kamis' AND Tahun_ID='$tahun' GROUP BY Jadwal_ID";
        	$qry= mysql_query($sql)
        	or die ();
        	while ($r=mysql_fetch_array($qry)){         	
        	$no++;
             echo "<tr bgcolor=$warna>                            
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalmtk&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'>$r[Jadwal_ID] <img src=../img/edit.png></a></td>
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalujian&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'> <img src=../img/edit_2.png></a></td>
      		         <td>$r[Jam_Mulai] - $r[Jam_Selesai]</td>
      		         <td>$r[NR]</td>
      		         <td>$r[Kode_Mtk]</td>
      		         <td>$r[Nama_matakuliah]</td>
      		         <td>$r[Kelas]</td>
       		         <td>$r[SKS]</td>
       		         <td>$r[nama_lengkap],$r[Gelar]</td>
       		         <td>$r[Aktif]</td>
                   <td><a class=s href='baakademik/baakademikjadkulact.php?page=levelakademikjadkul&PHPIdSession=hapusjadwl&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gos=$r[Jadwal_ID]'><img src=../img/del.gif></a></td>                    
                    </tr>";        
                  }
                  echo"</table>";
        echo"<table id=tablemodul>
             <h3>Jumat</h3>
            <tr><th>Edit</th><th>Ujian</th><th>Waktu</th><th>Ruang</th><th>Kode MK</th><th> Matakuliah</th><th>Kelas</th><th>SKS</th><th>Dosen</th><th>Aktif</th><th>Hapus</th></tr>";
          $sql="SELECT * FROM view_jadwal WHERE Identitas_ID='$id' AND Kode_Jurusan='$kode' AND Program_ID='$idp' AND Hari='Jumat' AND Tahun_ID='$tahun' GROUP BY Jadwal_ID";
        	$qry= mysql_query($sql)
        	or die ();
        	while ($r=mysql_fetch_array($qry)){         	
        	$no++;
             echo "<tr bgcolor=$warna>                            
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalmtk&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'>$r[Jadwal_ID] <img src=../img/edit.png></a></td>
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalujian&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'> <img src=../img/edit_2.png></a></td>
      		         <td>$r[Jam_Mulai] - $r[Jam_Selesai]</td>
      		         <td>$r[NR]</td>
      		         <td>$r[Kode_Mtk]</td>
      		         <td>$r[Nama_matakuliah]</td>
      		         <td>$r[Kelas]</td>
       		         <td>$r[SKS]</td>
       		         <td>$r[nama_lengkap],$r[Gelar]</td>
       		         <td>$r[Aktif]</td>
                   <td><a class=s href='baakademik/baakademikjadkulact.php?page=levelakademikjadkul&PHPIdSession=hapusjadwl&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gos=$r[Jadwal_ID]'><img src=../img/del.gif></a></td>                    
                    </tr>";        
                  }
        echo"</table>";                  
        echo"<table id=tablemodul>
             <h3>Sabtu</h3>
            <tr><th>Edit</th><th>Ujian</th><th>Waktu</th><th>Ruang</th><th>Kode MK</th><th> Matakuliah</th><th>Kelas</th><th>SKS</th><th>Dosen</th><th>Aktif</th><th>Hapus</th></tr>";
          $sql="SELECT * FROM view_jadwal WHERE Identitas_ID='$id' AND Kode_Jurusan='$kode' AND Program_ID='$idp' AND Hari='Sabtu' AND Tahun_ID='$tahun' GROUP BY Jadwal_ID";
        	$qry= mysql_query($sql)
        	or die ();
        	while ($r=mysql_fetch_array($qry)){         	
        	$no++;
             echo "<tr bgcolor=$warna>                            
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalmtk&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'>$r[Jadwal_ID] <img src=../img/edit.png></a></td>
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalujian&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'> <img src=../img/edit_2.png></a></td>
      		         <td>$r[Jam_Mulai] - $r[Jam_Selesai]</td>
      		         <td>$r[NR]</td>
      		         <td>$r[Kode_Mtk]</td>
      		         <td>$r[Nama_matakuliah]</td>
      		         <td>$r[Kelas]</td>
       		         <td>$r[SKS]</td>
       		         <td>$r[nama_lengkap],$r[Gelar]</td>
       		         <td>$r[Aktif]</td>
                   <td><a class=s href='baakademik/baakademikjadkulact.php?page=levelakademikjadkul&PHPIdSession=hapusjadwl&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gos=$r[Jadwal_ID]'><img src=../img/del.gif></a></td>                    
                    </tr>";        
                  }
                  echo"</table>";                                                     
        echo"<table id=tablemodul>
             <h3>Minggu</h3>
            <tr><th>Edit</th><th>Ujian</th><th>Waktu</th><th>Ruang</th><th>Kode MK</th><th> Matakuliah</th><th>Kelas</th><th>SKS</th><th>Dosen</th><th>Aktif</th><th>Hapus</th></tr>";
          $sql="SELECT * FROM view_jadwal WHERE Identitas_ID='$id' AND Kode_Jurusan='$kode' AND Program_ID='$idp' AND Hari='Minggu' AND Tahun_ID='$tahun' GROUP BY Jadwal_ID";
        	$qry= mysql_query($sql)
        	or die ();
        	while ($r=mysql_fetch_array($qry)){         	
        	$no++;
             echo "<tr bgcolor=$warna>                            
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalmtk&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'>$r[Jadwal_ID] <img src=../img/edit.png></a></td>
                   <td><a class=s href='?page=levelakademikjadkul&PHPIdSession=editjadwalujian&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gis=$r[Jadwal_ID]'> <img src=../img/edit_2.png></a></td>
      		         <td>$r[Jam_Mulai] - $r[Jam_Selesai]</td>
      		         <td>$r[NR]</td>
      		         <td>$r[Kode_Mtk]</td>
      		         <td>$r[Nama_matakuliah]</td>
      		         <td>$r[Kelas]</td>
       		         <td>$r[SKS]</td>
       		         <td>$r[nama_lengkap],$r[Gelar]</td>
       		         <td>$r[Aktif]</td>
                   <td><a class=s href='baakademik/baakademikjadkulact.php?page=levelakademikjadkul&PHPIdSession=hapusjadwl&ID=$id&codd=$kode&prog=$idp&tahun=$tahun&gos=$r[Jadwal_ID]'><img src=../img/del.gif></a></td>                    
                    </tr>";        
                  }
                  echo"</table>                                                                       
                  </div>";							
  break;   

  case "addjadkul":
    $id= $_REQUEST['ID'];
    $kode= $_REQUEST['codd'];
    $idp= $_REQUEST['prog'];
    ?>
    <script language="javascript" type="text/javascript">
    <!--
    function MM_jumpMenu(targ,selObj,restore){// v3.0
     eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
    if (restore) selObj.selectedIndex=0;
    }
    //-->
    </script>
    <?
       echo"<div id=headermodul>Tambah Jadwal Kuliah</div>            
            <div id=groupmodul1>
            <table id=tablemodul><form method=post  action=baakademik/baakademikjadkulact.php?page=levelakademikjadkul&PHPIdSession=insertjdwl>
                <tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a class=s href=javascript:history.go(-1)><img src=../img/back.png> Kembali Ke Jadwal |</a>                                         
            </table>";
       
    echo" <table id=tablemodul>  
      <input name=Identitas_ID type=hidden value=$data[Identitas_ID]></td>
      <input name=kode_jurusan type=hidden value=$data[kode_jurusan]></td>";
      ?> 
      <tr>
        <td class="cc">Program *</td>   <td colspan=2 class="cb">  <select name="program" onChange="MM_jumpMenu('parent',this,0)">
          <option value="media.php?page=levelakademikjadkul">- Pilih Program -</option>
      <?php
  	  $sqlp="SELECT * FROM program WHERE Identitas_ID='$data[Identitas_ID]'";
  	  $qryp=mysql_query($sqlp)
  	  or die();
  	  while ($d2=mysql_fetch_array($qryp)){
      if ($d2['ID']==$idp){
        $cek="selected";
        }
        else{
          $cek="";
        }
        echo "<option value='?page=levelakademikjadkul&PHPIdSession=addjadkul&ID=$data[Identitas_ID]&codd=$data[kode_jurusan]&prog=$d2[ID]' $cek> $d2[Program_ID] - $d2[nama_program]</option>";
  		}
  		?>
        </select>
        <input name="prog" type="hidden" value="<?= $idp; ?>"></td>
      </tr>
            <?echo"
            <tr><td class=cc>Tahun Akademik *</td>    <td class=cb>     <select name='tahun'>
                      <option value=0>- Tahun -</option>";
                      $tampil=mysql_query("SELECT * FROM tahun WHERE Identitas_ID='$id' AND Jurusan_ID='$kode' AND Program_ID='$idp' ORDER BY ID");
                      while($r=mysql_fetch_array($tampil)){
                        echo "<option value=$r[ID]>$r[Tahun_ID]</option>";
                      }
              echo "</select></td></tr>
            <tr><td class=cc>Hari *</td>    <td class=cb><select name='Hari'>
                      <option value=0>- Pilih Hari -</option>";
                      $tampil=mysql_query("SELECT * FROM hari ORDER BY id");
                      while($r=mysql_fetch_array($tampil)){
                        echo "<option value=$r[hari]>$r[hari]</option>";
                      }
              echo "</select></td></tr>
            <tr><td class=cc>Jam Kuliah *</td>    <td class=cb>      <input type=text name=jm size=5 value=00:00> s/d <input type=text name=js size=5 value=00:00></td></tr>
            <tr><td class=cc>Nama Matakuliah *</td>    <td class=cb>     <select name='mtk'>
                      <option value=0>- Pilih Matakuliah -</option>";
                      $tampil=mysql_query("SELECT t1.Kode_mtk,t1.Nama_matakuliah,t1.SKS 
                                          FROM matakuliah t1 
                                          WHERE t1.StatusMtk_ID='A' AND t1.JenisMTK_ID!='D' AND t1.Identitas_ID='$id' AND t1.Jurusan_ID='$kode' ORDER BY Matakuliah_ID");
                      while($r=mysql_fetch_array($tampil)){
                        echo "<option value=$r[Kode_mtk]>$r[Kode_mtk] - $r[Nama_matakuliah] ($r[SKS])</option>";
                      }
              echo "</select></td></tr>
            <tr><td class=cc>Nama Kelas *</td>    <td class=cb>     <input type=text name=kelas size=6></td></tr>
            <tr><td class=cc>Ruang Kuliah *</td>    <td class=cb>     <select name='Ruang_ID'>
                      <option value=0>- Pilih Ruang -</option>";
                      $tampil=mysql_query("SELECT * FROM ruang WHERE Kode_Jurusan='$kode' ORDER BY ID");
                      while($r=mysql_fetch_array($tampil)){
                        echo "<option value=$r[ID]>$r[Ruang_ID] - $r[Nama]</option>";
                      }
              echo "</select></td></tr>
            <tr><td class=cc>Dosen Pengampu *</td>   <td colspan=2 class=cb> <select name=dsn>
              <option value=0>- Pilih Dosen -</option>";
          					$tampil = mysql_query("SELECT t1.dosen_ID,t1.nama_lengkap,t1.Gelar 
                    FROM dosen t1 
                    WHERE t1.Identitas_ID='$id' AND t1.Jurusan_ID LIKE '%$kode%' ORDER BY dosen_ID");
          					while($w = mysql_fetch_array($tampil)){
                      echo "<option value=$w[dosen_ID]>$w[nama_lengkap],$w[Gelar]</option>";
                  }
                  echo "</select></td></tr> 
            <tr><td colspan=2>
                <input type=submit class=tombol value=Simpan>
              </form></td></tr></table></div>";
          
  break;
  
  
  case "editjadwalmtk":
  $id= $_GET['ID'];
  $kode= $_GET['codd'];
  $idp= $_GET['prog'];
  $tahun= $_GET['tahun'];
    $edit=mysql_query("SELECT * FROM jadwal WHERE Jadwal_ID='$_GET[gis]'");
    $ed=mysql_fetch_array($edit);

     echo"<div id=headermodul>Edit Jadwal Kuliah</div>            
          <div id=groupmodul1>
          <table id=tablemodul>       
    <form method=post  action=baakademik/baakademikjadkulact.php?page=levelakademikjadkul&PHPIdSession=updatejadkul>     
           <input type=hidden name=identitas value=$id>
          <input type=hidden name=codd value=$kode>
          <input type=hidden name=program value=$idp>
          <input type=hidden name=tahun value=$tahun>
          <input type=hidden name=idj value=$_GET[gis]>
    <tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a class=s href=?page=levelakademikjadkul&ID=$id&codd=$kode&prog=$idp&tahun=$tahun><img src=../img/back.png> Kembali Ke Jadwal |</a></tr></td>
 
          <table id=tablemodul>
          <tr><td class=cc>Hari </td>   <td colspan=2 class=cb> : <select name=hari>
              <option value=0>- Pilih Hari -</option>";
              $tampil=mysql_query("SELECT * FROM hari ORDER BY id");
              while($w=mysql_fetch_array($tampil)){
                if ($ed[Hari]==$w[hari]){
                  echo "<option value=$w[hari] selected>$w[id] - $w[hari]</option>";
                }
                else{
                  echo "<option value=$w[hari]>$w[id] - $w[hari]</option>";
                }
              }
              echo "</select></td></tr>  
          <tr><td class=cc>Jam Kuliah</td>            <td colspan=2 class=cb>: <input type=text name=jm size=8 value='$ed[Jam_Mulai]'> s/d <input type=text name=js size=8 value='$ed[Jam_Selesai]'></td></tr>
          <tr><td class=cc>Matakuliah</td>   <td colspan=2 class=cb> : <select name=mtk>
              <option value=0>- Pilih Matakuliah -</option>";
              $tampil=mysql_query("SELECT t1.Kode_mtk,t1.Nama_matakuliah 
                    FROM matakuliah t1 
                    WHERE t1.StatusMtk_ID='A' AND t1.JenisMTK_ID!='D' AND t1.Identitas_ID='$id' AND t1.Jurusan_ID='$kode' ORDER BY Matakuliah_ID");
              while($w=mysql_fetch_array($tampil)){
                if ($ed[Kode_Mtk]==$w[Kode_mtk]){
                  echo "<option value=$w[Kode_mtk] selected>$w[Kode_mtk] - $w[Nama_matakuliah]</option>";
                }
                else{
                  echo "<option value=$w[Kode_mtk]>$w[Kode_mtk] - $w[Nama_matakuliah]</option>";
                }
              }
              echo "</select></td></tr> 
          <tr><td class=cc>Nama Kelas</td>            <td colspan=2 class=cb>: <input type=text name=nk size=6 value='$ed[Kelas]'></td></tr>    
          <tr><td class=cc>Ruang Kuliah</td>   <td colspan=2 class=cb> : <select name=rk>
              <option value=0>- Pilih Ruang -</option>";
              $tampil=mysql_query("SELECT * FROM ruang WHERE Kode_Jurusan='$kode' ORDER BY ID");
              while($w=mysql_fetch_array($tampil)){
                if ($ed[Ruang_ID]==$w[ID]){
                  echo "<option value=$w[ID] selected>$w[Ruang_ID] - $w[Nama]</option>";
                }
                else{
                  echo "<option value=$w[ID]>$w[Ruang_ID] - $w[Nama]</option>";
                }
              }
              echo "</select></td></tr>    
          <tr><td class=cc>Dosen Pengampu</td>   <td colspan=2 class=cb> : <select name=dsn>
              <option value=0>- Pilih Dosen -</option>";
          					$tampil = mysql_query("SELECT t1.dosen_ID,t1.nama_lengkap,t1.Gelar 
                    FROM dosen t1 
                    WHERE t1.Identitas_ID='$id' AND t1.Jurusan_ID LIKE '%$kode%' ORDER BY dosen_ID");
          					while($w = mysql_fetch_array($tampil)){
                    if ($ed[Dosen_ID]==$w[dosen_ID]){
                      echo "<option value=$w[dosen_ID] selected>$w[nama_lengkap],$w[Gelar]</option>";
                    }
                    else{
                      echo "<option value=$w[dosen_ID]>$w[nama_lengkap],$w[Gelar]</option>";
                    }
                  }
                  echo "</select></td></tr>  
          <tr><td colspan=2>
              <input type=submit value=Simpan class=tombol>
            </td></tr>
        </table></form></div>";  
  break;
  
  case "editjadwalujian":
  $id= $_GET['ID'];
  $kode= $_GET['codd'];
  $idp= $_GET['prog'];
  $tahun= $_GET['tahun'];
    $edit=mysql_query("SELECT * FROM view_jadwal WHERE Jadwal_ID='$_GET[gis]'");
    $ed=mysql_fetch_array($edit);

     echo"<div id=headermodul>Edit Jadwal Ujian</div>            
          <div id=groupmodul1>
          <table id=tablemodul>       
          <tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a class=s href=?page=levelakademikjadkul&ID=$id&codd=$kode&prog=$idp&tahun=$tahun><img src=../img/back.png> Kembali Ke Jadwal |</a></tr></td>
 
          <table id=tablemodul>

          <tr><td class=cc>Hari </td>   <td colspan=2 class=cb> : <strong>$ed[Hari]</strong></td>   
              <td class=cc>Jam Kuliah</td>            <td colspan=2 class=cb>: <strong>$ed[Jam_Mulai] - $ed[Jam_Selesai]</strong></td></tr> 
          <tr><td class=cc>Matakuliah</td>   <td colspan=2 class=cb> : <strong>$ed[Kode_Mtk] - $ed[Nama_matakuliah]</strong></td>  
              <td class=cc>Nama Kelas</td>            <td colspan=2 class=cb>: <strong>$ed[Kelas]</strong></td></tr>     
          <tr><td class=cc>Ruang Kuliah</td>   <td colspan=2 class=cb> : <strong>$ed[NamaRuang]</strong></td>    
              <td class=cc>Dosen Pengampu</td>   <td colspan=2 class=cb> : <strong>$ed[nama_lengkap],$ed[Gelar]</strong></td></tr>  
          </table></div>
          <div id=groupmodul>
          <form method=post  action=baakademik/baakademikjadkulact.php?page=levelakademikjadkul&PHPIdSession=updatejadujianuts>
          <table id=tablemodul>
          <input type=hidden name=id value=$ed[Jadwal_ID]>
           <input type=hidden name=identitas value=$id>
          <input type=hidden name=codd value=$kode>
          <input type=hidden name=program value=$idp>
          <input type=hidden name=tahun value=$tahun>          
          <h3>Set Jadwal UTS</h3>
          <tr><td class=cc>Tgl Ujian</td><td> : ";    
          $get_tgl=substr("$ed[UTSTgl]",8,2);
          combotgl2(1,31,'tgluts',$get_tgl);
          $get_bln=substr("$ed[UTSTgl]",5,2);
          combobln2(1,12,'blnuts',$get_bln);
          $get_thn=substr("$ed[UTSTgl]",0,4);
          $thn_skrg=date("Y");
          combotgl2($thn_sekarang-2,$thn_sekarang+2,'thnuts',$get_thn);
     echo"<tr><td class=cc>Hari Ujian</td>   <td colspan=2 class=cb> : <select name=hariuts>
              <option value=0>- Pilih Hari -</option>";
              $tampil=mysql_query("SELECT * FROM hari ORDER BY id");
              while($w=mysql_fetch_array($tampil)){
              if ($ed[UTSHari]==$w[hari]){
                  echo "<option value=$w[hari] selected>$w[id] - $w[hari]</option>";
                }
                else{
                  echo "<option value=$w[hari]>$w[id] - $w[hari]</option>";
                }
              }
              echo "</select></td></tr>  
          <tr><td class=cc>Jam Ujian</td>            <td colspan=2 class=cb>: <input type=text name=jmuts size=5 value='$ed[UTSMulai]'> s/d <input type=text name=jsuts size=5 value='$ed[UTSSelesai]'></td></tr>    
          <tr><td class=cc>Ruang Ujian</td>   <td colspan=2 class=cb> : <select name=ruat>
              <option value=0>- Pilih Ruang -</option>";
              $tampil=mysql_query("SELECT * FROM ruang WHERE Kode_Jurusan='$ed[Kode_Jurusan]' ORDER BY ID");
              while($w=mysql_fetch_array($tampil)){
              if ($ed[UTSRuang]==$w[ID]){
                  echo "<option value=$w[ID] selected>$w[Ruang_ID] - $w[Nama]</option>";
                }
                else{
                  echo "<option value=$w[ID]>$w[Ruang_ID] - $w[Nama]</option>";
                }
              }
              echo "</select></td></tr>     
          <tr><td colspan=2>
              <input type=submit value=Simpan class=tombol>
            </td></tr>
        </table></form></div>";

     echo"<div id=groupmodul1>
          <form method=post  action=baakademik/baakademikjadkulact.php?page=levelakademikjadkul&PHPIdSession=updatejadujianuas>
          <table id=tablemodul>
          <input type=hidden name=id value=$ed[Jadwal_ID]>
           <input type=hidden name=identitas value=$id>
          <input type=hidden name=codd value=$kode>
          <input type=hidden name=program value=$idp>
          <input type=hidden name=tahun value=$tahun>
          <h3>Set Jadwal UAS</h3>
          <tr><td class=cc>Tgl Ujian</td><td> : ";    
          $get_tgl=substr("$ed[UASTgl]",8,2);
          combotgl2(1,31,'tgluas',$get_tgl);
          $get_bln=substr("$ed[UASTgl]",5,2);
          combobln2(1,12,'blnuas',$get_bln);
          $get_thn=substr("$ed[UASTgl]",0,4);
          $thn_skrg=date("Y");
          combotgl2($thn_sekarang-2,$thn_sekarang+2,'thnuas',$get_thn);
     echo"<tr><td class=cc>Hari Ujian</td>   <td colspan=2 class=cb> : <select name=hariuas>
              <option value=0>- Pilih Hari -</option>";
              $tampil=mysql_query("SELECT * FROM hari ORDER BY id");
              while($w=mysql_fetch_array($tampil)){
              if ($ed[UASHari]==$w[hari]){
                  echo "<option value=$w[hari] selected>$w[id] - $w[hari]</option>";
                }
                else{
                  echo "<option value=$w[hari]>$w[id] - $w[hari]</option>";
                }
              }
              echo "</select></td></tr>   
          <tr><td class=cc>Jam Ujian</td>            <td colspan=2 class=cb>: <input type=text name=jmuas size=5 value='$ed[UASMulai]'> s/d <input type=text name=jsuas size=5 value='$ed[UASSelesai]'></td></tr>    
          <tr><td class=cc>Ruang Ujian</td>   <td colspan=2 class=cb> : <select name=ruas>
              <option value=0>- Pilih Ruang -</option>";
              $tampil=mysql_query("SELECT * FROM ruang WHERE Kode_Jurusan='$ed[Kode_Jurusan]' ORDER BY ID");
              while($w=mysql_fetch_array($tampil)){
              if ($ed[UASRuang]==$w[ID]){
                  echo "<option value=$w[ID] selected>$w[Ruang_ID] - $w[Nama]</option>";
                }
                else{
                  echo "<option value=$w[ID]>$w[Ruang_ID] - $w[Nama]</option>";
                }
              }
              echo "</select></td></tr>   
          <tr><td colspan=2>
              <input type=submit value=Simpan class=tombol>
            </td></tr>
        </table></form></div>";  
  break;       
}
?>
