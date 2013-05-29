<? 
  $edit=mysql_query("SELECT * FROM karyawan WHERE username='$_SESSION[username]'");
  $data=mysql_fetch_array($edit);
switch($_GET[PHPIdSession]){

  default:
    $idp= $_REQUEST['idp'];
    $tahun= $_REQUEST['tahun'];
    $mat= $_REQUEST['mat'];
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
       echo"<div id=headermodul>Input Nilai Mahasiswa</div>            
            <div id=groupmodul1>
            <table id=tablemodul>  

          <input name=id type=hidden value=$data[Identitas_ID]>
          <input name=jurusan type=hidden value=$data[kode_jurusan]>";
      ?>
        <tr>
          <td class="cc">Program</td>   <td colspan=2 class="cb"> : <select name="program" onChange="MM_jumpMenu('parent',this,0)">
            <option value="media.php?page=levelakademiknilaimhs">- Pilih Program -</option>
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
          echo "<option value='?page=levelakademiknilaimhs&ID=$data[Identitas_ID]&kode=$data[kode_jurusan]&idp=$d2[ID]' $cek> $d2[Program_ID] - $d2[nama_program]</option>";
    		}
    		?>
          </select>
          <input name="program" type="hidden" value="<?= $idp; ?>"></td>
        </tr>
        <tr>
          <td class="cc">Tahun</td>   <td colspan=2 class="cb"> : <select name="program" onChange="MM_jumpMenu('parent',this,0)">
            <option value="media.php?page=levelakademiknilaimhs">- Pilih Tahun -</option>
        <?php
    	  $sqlp="SELECT * FROM tahun WHERE Identitas_ID='$data[Identitas_ID]' AND Jurusan_ID='$data[kode_jurusan]' AND Program_ID='$idp' ORDER BY Tahun_ID";
    	  $qryp=mysql_query($sqlp)
    	  or die();
    	  while ($d2=mysql_fetch_array($qryp)){
        if ($d2['Tahun_ID']==$tahun){
          $cek="selected";
          }
          else{
            $cek="";
          }
          echo "<option value='?page=levelakademiknilaimhs&ID=$data[Identitas_ID]&kode=$data[kode_jurusan]&idp=$idp&tahun=$d2[Tahun_ID]' $cek> $d2[Tahun_ID]</option>";
    		}
    		?>
          </select>
          <input name="program" type="hidden" value="<?= $idp; ?>"></td>
        </tr>
        <tr>
          <td class="cc">Matakuliah</td>   <td colspan=2 class="cb"> : <select name="mat" onChange="MM_jumpMenu('parent',this,0)">
            <option value="media.php?page=levelakademiknilaimhs">- Pilih Matakuliah -</option>
        <?php
    	  $sqlp="SELECT * FROM matakuliah WHERE Identitas_ID='$data[Identitas_ID]' AND Jurusan_ID='$data[kode_jurusan]' ORDER BY Matakuliah_ID";
    	  $qryp=mysql_query($sqlp)
    	  or die();
    	  while ($d2=mysql_fetch_array($qryp)){
        if ($d2['Kode_mtk']==$mat){
          $cek="selected";
          }
          else{
            $cek="";
          }
          echo "<option value='?page=levelakademiknilaimhs&ID=$data[Identitas_ID]&kode=$data[kode_jurusan]&idp=$idp&tahun=$tahun&mat=$d2[Kode_mtk]' $cek> $d2[Kode_mtk] -- $d2[Nama_matakuliah]</option>";
    		}
    		?>
          </select>
          <input name="mat" type="hidden" value="<?= $mat; ?>"></td>
        </tr>
        <?echo"
        <table id=tablemodul>
                <tr><th>No</th><th>Kode MK</th><th>Matakuliah</th><th>Hari</th><th>Jam Kuliah</th><th>Kelas</th><th>Lokal</th><th>Dosen</th></tr>";     								
              $sql="SELECT * FROM view_jadwal WHERE Identitas_ID='$data[Identitas_ID]' AND Kode_Jurusan='$data[kode_jurusan]' AND Program_ID='$idp' AND Tahun='$tahun' AND Kode_Mtk='$mat' ORDER BY Jadwal_ID";
            	$qry= mysql_query($sql)
            	or die ();
            	while ($r=mysql_fetch_array($qry)){         	
            	$no++;
                 echo "<tr bgcolor=$warna>                            
          		         <td>$no</td>
                       <td><a class=s href='?page=levelakademiknilaimhs&PHPIdSession=inputnilai&ID=$r[Identitas_ID]&kode=$data[kode_jurusan]&idp=$idp&tahun=$tahun&mat=$mat&idjadwal=$r[Jadwal_ID]'>$r[Kode_Mtk] <img src=../img/edit.png></a></td>
          		         <td>$r[Nama_matakuliah]</td>
          		         <td>$r[Hari]</td>
          		         <td>$r[Jam_Mulai] - $r[Jam_Selesai]</td>
           		         <td>$r[Kelas]</td>
           		         <td>$r[NamaRuang]</td>       		         
           		         <td>$r[nama_lengkap],$r[Gelar]</td>                    
                        </tr>";        
                      }
                      echo"</table></div></div>";
  
  break;   

  case"inputnilai":
      $idp= $_REQUEST['idp'];
      $tahun= $_REQUEST['tahun'];
      $mat= $_REQUEST['mat'];
      
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
       
      echo"<div id=headermodul>Input Nilai Mahasiswa</div>            
            <div id=groupmodul1>
            <table id=tablemodul>
          <input name=id type=hidden value=$data[Identitas_ID]>
          <input name=jurusan type=hidden value=$data[kode_jurusan]>";
        ?>   
          <tr>
            <td class="cc">Program</td>   <td colspan=2 class="cb"> : <select name="program" onChange="MM_jumpMenu('parent',this,0)">
              <option value="media.php?page=levelakademiknilaimhs">- Pilih Program -</option>
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
            echo "<option value='?page=levelakademiknilaimhs&ID=$data[Identitas_ID]&kode=$data[kode_jurusan]&idp=$d2[ID]' $cek> $d2[Program_ID] - $d2[nama_program]</option>";
      		}
      		?>
            </select>
            <input name="program" type="hidden" value="<?= $idp; ?>"></td>
          </tr>
          <tr>
            <td class="cc">Tahun</td>   <td colspan=2 class="cb"> : <select name="program" onChange="MM_jumpMenu('parent',this,0)">
              <option value="media.php?page=levelakademiknilaimhs">- Pilih Tahun -</option>
          <?php
      	  $sqlp="SELECT * FROM tahun WHERE Identitas_ID='$data[Identitas_ID]' AND Jurusan_ID='$data[kode_jurusan]' AND Program_ID='$idp' ORDER BY Tahun_ID";
      	  $qryp=mysql_query($sqlp)
      	  or die();
      	  while ($d2=mysql_fetch_array($qryp)){
          if ($d2['Tahun_ID']==$tahun){
            $cek="selected";
            }
            else{
              $cek="";
            }
            echo "<option value='?page=levelakademiknilaimhs&ID=$data[Identitas_ID]&kode=$data[kode_jurusan]&idp=$idp&tahun=$d2[Tahun_ID]' $cek> $d2[Tahun_ID]</option>";
      		}
      		?>
            </select>
            <input name="program" type="hidden" value="<?= $idp; ?>"></td>
          </tr>
          <tr>
            <td class="cc">Matakuliah</td>   <td colspan=2 class="cb"> : <select name="mat" onChange="MM_jumpMenu('parent',this,0)">
              <option value="media.php?page=levelakademiknilaimhs">- Pilih Matakuliah -</option>
          <?php
      	  $sqlp="SELECT * FROM matakuliah WHERE Identitas_ID='$data[Identitas_ID]' AND Jurusan_ID='$data[kode_jurusan]' ORDER BY Matakuliah_ID";
      	  $qryp=mysql_query($sqlp)
      	  or die();
      	  while ($d2=mysql_fetch_array($qryp)){
          if ($d2['Kode_mtk']==$mat){
            $cek="selected";
            }
            else{
              $cek="";
            }
            echo "<option value='?page=levelakademiknilaimhs&ID=$data[Identitas_ID]&kode=$data[kode_jurusan]&idp=$idp&tahun=$tahun&mat=$d2[Kode_mtk]' $cek> $d2[Kode_mtk] -- $d2[Nama_matakuliah]</option>";
      		}
      		?>
            </select>
            <input name="mat" type="hidden" value="<?= $mat; ?>"></td>
          </tr>
          <?php
            echo" <tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a class=s href=?page=levelakademiknilaimhs&ID=$data[Identitas_ID]&kode=$data[kode_jurusan]&idp=$idp&tahun=$tahun&mat=$mat><img src=../img/back.png> Kembali Ke Dafar Mtk |</a></tr>";
            $d=mysql_query("SELECT * FROM view_jadwal WHERE Jadwal_ID='$_GET[idjadwal]' ORDER BY Jadwal_ID");
            $r=mysql_fetch_array($d);    
          echo" <table id=tablemodul>
                <tr><td class=cc>Kelas</td> <td colspan=2 class=cb><strong>$r[Kelas]</strong></td></tr>
                <tr><td class=cc>Dosen</td> <td colspan=2 class=cb><strong>$r[nama_lengkap], $r[Gelar]</strong></td></tr>
                </table>";      
          echo"  <table id=tablemodul>
                  <tr><th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Grade</th></tr>";     								
                $sql="SELECT * FROM krs1 
                WHERE idjdwl='$_GET[idjadwal]' ORDER BY NIM";
              	$qry= mysql_query($sql)
              	or die ();
              	while ($r1=mysql_fetch_array($qry)){         	
              	$nom++;
                   echo "<tr bgcolor=$warna>                            
            		         <td>$nom</td>
            		         <td>$r1[NIM]</td>
            		         <td>$r1[nama_lengkap]</td>";
                         ?>                   
                          <td> <select name="nilai" onChange="MM_jumpMenu('parent',this,0)">
                          <option value="">- Nilai -</option>
                          <?php
                      	  $sqlp="SELECT * FROM nilai WHERE Identitas_ID='$data[Identitas_ID]' AND Kode_Jurusan='$data[kode_jurusan]'";
                      	  $qryp=mysql_query($sqlp)
                      	  or die();
                      	  while ($d2=mysql_fetch_array($qryp)){
                          if ($d2['grade']==$r1['GradeNilai']){
                            $cek="selected";
                            }
                            else{
                              $cek="";
                            }
                            echo "<option value='baakademik/baakademiknilaimhsact.php?page=levelakademiknilaimhs&PHPIdSession=inputnilai&ID=$_GET[ID]&kode=$data[kode_jurusan]&idp=$idp&tahun=$_GET[tahun]&mat=$_GET[mat]&idjadwal=$_GET[idjadwal]&grade=$d2[grade]&bbt=$d2[bobot]&idk=$r1[id]' $cek> $d2[grade]--> $d2[NilaiMin]-$d2[NilaiMax]</option>";
                      		}
                      		?>
                            </select>
                            <input name="nilai" type="hidden" value="<?= $nilai; ?>"></td>                                          
                            <?
                   echo" </tr>";        
                        }
      
          echo"</table></div>";
    
  break;  
}
?>
