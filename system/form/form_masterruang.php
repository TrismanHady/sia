<script language="javascript" type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){// v3.0
 eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<?php
function defaultRuang(){
          echo" <div id=headermodul>Ruangan</div>";
          $id= $_REQUEST['codd'];
          $idk= $_REQUEST['kampus'];
          ?>       
          <div id="groupmodul1">
            <div id="tabsview">
		          <div id="tab1" class="tab_sel" onclick="javascript: displayPanel('1');" align="center">&nbsp; Depan &nbsp;</div>
 		          <div id="tab2" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('2');" align="center">&nbsp; Tambah Ruang &nbsp;</div>
            </div>
	          <div class="tab_bdr"></div>
            <div class="panel" id="panel1" style="display: block;">
              <span>
              <ul>            
                <table id=tablemodul>
                  <tr>
                    <td class="cc">Jurusan</td>   <td colspan=2 class="cb"> : <select name="codd" onChange="MM_jumpMenu('parent',this,0)">
                      <option value="media.php?page=masterruang">- Pilih Jurusan -</option>
                  <?php
              	  $sqlp="SELECT * FROM jurusan ORDER BY jurusan_ID";
              	  $qryp=mysql_query($sqlp)
              	  or die();
              	  while ($d=mysql_fetch_array($qryp)){
                  if ($d['kode_jurusan']==$id){
                    $cek="selected";
                    }
                    else{
                      $cek="";
                    }
                    echo "<option value='?page=masterruang&codd=$d[kode_jurusan]' $cek> $d[kode_jurusan] - $d[nama_jurusan]</option>";
              		}
              		?>
                    </select>
                    <input name="codd" type="hidden" value="<?= $id; ?>"></td>
                  </tr>
                  <tr>
                    <td class="cc">Kampus</td>   <td colspan=2 class="cb"> : <select name="kampus" onChange="MM_jumpMenu('parent',this,0)">
                      <option value="media.php?page=masterruang">- Pilih Kampus -</option>
                  <?php
              	  $sqlp="SELECT t1.* FROM kampus t1, jurusan t2 WHERE t1.Identitas_ID=t2.Identitas_ID AND t2.kode_jurusan='$id' ORDER BY Kampus_ID";
              	  $qryp=mysql_query($sqlp)
              	  or die();
              	  while ($d=mysql_fetch_array($qryp)){
                  if ($d['Kampus_ID']==$idk){
                    $cek="selected";
                    }
                    else{
                      $cek="";
                    }
                    echo "<option value='?page=masterruang&codd=$id&kampus=$d[Kampus_ID]' $cek> $d[Kampus_ID] - $d[Nama]</option>";
              		}
              		?>
                    </select>
                    <input name="kampus" type="hidden" value="<?= $idk; ?>"></td>
                  </tr>
                  <?  echo"</table> 
                          <table id=tablemodul>
                          <tr><th>No</th><th>Kode</th><th>Nama</th><th>Jurusan</th><th>Ruang<br>Kelas</br></th><th>Kapasitas</th><th>Keterangan</th><th>Aktif</th><th>Aksi</th></tr>"; 
                         $sql="SELECT * FROM ruang WHERE Kode_Jurusan='$id' AND Kampus_ID='$idk' GROUP BY Ruang_ID ORDER BY ID";
                        	$qry= mysql_query($sql)
                        	or die ();
                        	while ($data=mysql_fetch_array($qry)){
                          if(($no % 2)==0){
                              $warna="#FFFFFF";
                          }
                          else{
                              $warna="#ebf0f5";
                          }         	
                        	$no++;
                    echo" <tr bgcolor=$warna><td>$no</td>
                              <td>$data[Ruang_ID]</td>
                              <td>$data[Nama]</td>
                              <td>$data[Kode_Jurusan]</td>
                              <td>$data[RuangKuliah]</td>
                              <td>$data[KapasitasUjian] - $data[Kapasitas]</td>
                              <td>$data[Keterangan]</td>
                              <td align=center>$data[Aktif]</td>
                              <td><a href='?page=masterruang&PHPIdSession=editruang&gis=$data[Ruang_ID]'><img src=../img/edit.png></a> |
                              <a href=\"?page=masterruang&PHPIdSession=delRuang&gos=$data[ID]\"
                              onClick=\"return confirm('Apakah Anda benar-benar akan menghapus $data[Nama]?')\"><img src=../img/del.jpg></a>
                              </td></tr>";        
                           }
                       ?> 
                </table>
        
              </ul>
              </span>
            </div>
            <div class="panel" id="panel2" style="display: none;">
              <span>
              <ul>            
                <?php
                     echo"<form method=post action=?page=masterruang&PHPIdSession=inputRuang>
                          <table id=tablemodul>              
                          <tr><td class=cc>Kode Ruang</td>       <td><input type=text name=Ruang_ID></td></tr>                  
                          <tr><td class=cc>Nama Ruang</td>       <td><input type=text name=Nama></td></tr>
                          <tr><td class=cc>Untuk Jurusan</td>       <td>";
                  				      $sql = "SELECT kode_jurusan,nama_jurusan FROM jurusan t1 ORDER BY jurusan_ID";
                                $cmbJur = mysql_query($sql) 
                                or die ();
                  							while($data = mysql_fetch_array($cmbJur)){
                  								echo "<input name=CekJurusan[] type=checkbox value='$data[kode_jurusan]'> $data[kode_jurusan] - $data[nama_jurusan]<br>";
                  							}
                  		echo"</td></tr>
                          <tr><td class=cc>Kampus</td>       <td><select name=Kampus_ID>
                          <option value=>- Pilih Kampus -</option>";
                  				      $sql = "SELECT t1.*,t2.Nama_Identitas FROM kampus t1, identitas t2 WHERE t1.Identitas_ID=t2.Identitas_ID ORDER BY t1.Kampus_ID";
                                $cmbKmp = mysql_query($sql) 
                                or die ();
                  							while($data = mysql_fetch_array($cmbKmp)){
                  								echo "<option value='$data[Kampus_ID]'> $data[Nama_Identitas] - $data[Nama]</option>";
                  							}
                  		echo" </select></td></tr>
                          <tr><td class=cc>Lantai</td>       <td><input type=text name=Lantai value=1 size=2></td></tr>
                          <tr><td class=cc>Untuk Kuliah</td>  <td ><input type=radio name=RuangKuliah value=Y> Y 
                                                                                          <input type=radio name=RuangKuliah value=N> N  </td></tr>
                          <tr><td class=cc>Kapasitas</td>       <td ><input type=text name=Kapasitas value=0 size=2></td></tr>
                          <tr><td class=cc>Kapasitas Ujian</td>       <td><input type=text name=KapasitasUjian value=0 size=2></td></tr>                          
                          <tr><td class=cc>Keterangan</td>       <td><textarea name='Keterangan' cols=30 rows=5></textarea></td></tr>
                          <tr><td class=cc>Aktif</td>         <td><input type=radio name=Aktif value=Y>Y 
                                                                                          <input type=radio name=Aktif value=N>N  </td></tr>           
                          <tr><td colspan=2 align=center><input type=submit value=Simpan class=tombol>
                                                         <input type=reset value=Reset class=tombol></td></tr>
                              
                          </div></table></form>";
                  ?>                    
              </ul>
              </span>
            </div><br />  
          </div> 
<?    
}

function editruang(){
$e=mysql_query("SELECT * FROM ruang WHERE Ruang_ID='$_GET[gis]'");
$d=mysql_fetch_array($e);

echo"<div id=groupmodul1>
      <form action=?page=masterruang&PHPIdSession=inputRuang method='post'>
      <h3>Edit Ruang</h3>
      <table id=tablemodul>
      <input type=hidden name=codd value='$d[Ruang_ID]'>              
          <tr><td class=cc>Kode Ruang</td>       <td><input type=hidden name=Ruang_ID value='$d[Ruang_ID]'><strong> $d[Ruang_ID]</strong></td></tr>                  
          <tr><td class=cc>Nama Ruang</td>       <td><input type=text name=Nama value='$d[Nama]'></td></tr>
          <tr><td class=cc>Untuk Jurusan</td>       <td>";
  				      $sql = "SELECT kode_jurusan,nama_jurusan FROM jurusan ORDER BY jurusan_ID";
                $cmbJur = mysql_query($sql) 
                or die ();
  							while($data1 = mysql_fetch_array($cmbJur)){
                    $sqlr="SELECT kode_jurusan FROM ruang WHERE Ruang_ID='$_GET[gis]' AND kode_jurusan='$data1[kode_jurusan]'";
                          	$qryr= mysql_query($sqlr);
                          	$cocok=mysql_num_rows($qryr);
                          	if ($cocok==1){
                            $cek="checked";
                            $bg="CCFF00";
                            }
                            else{
                            $cek="";
                            $bg="FFFFFF";
                            }     

  								echo "<input name=CekJurusan[] type=checkbox value='$data1[kode_jurusan]' $cek> $data1[kode_jurusan] - $data1[nama_jurusan]<br>";
  							}
  		echo"</td></tr>
          <tr><td class=cc>Kampus</td>       <td><select name=Kampus_ID>";
          $tampil=mysql_query("SELECT Kampus_ID,Nama FROM kampus ORDER BY Kampus_ID");
          while($w=mysql_fetch_array($tampil)){
            if ($d[Kampus_ID]==$w[Kampus_ID]){
              echo "<option value=$w[Kampus_ID] selected>$w[Kampus_ID] - $w[Nama]</option>";
            }
            else{
              echo "<option value=$w[Kampus_ID]>$w[Kampus_ID] - $w[Nama]</option>";
            }
          }
      echo "</select></td></tr>
          <tr><td class=cc>Lantai</td>       <td><input type=text name=Lantai  size=2 value='$d[Lantai]'></td></tr>";
          if ($d[RuangKuliah]=='Y'){
              echo "<tr><td class=cc>Untuk Kuliah</td>    <td><input type=radio name=RuangKuliah value=Y checked>Y
                                                                              <input type=radio name=RuangKuliah value=N>N</td></tr>";
          }
          else{
              echo "<tr><td class=cc>Aktif</td>    <td><input type=radio name=RuangKuliah value=Y>Y
                                                                              <input type=radio name=RuangKuliah value=N checked>N</td></tr>";
          }
      echo" <tr><td class=cc>Kapasitas</td>       <td><input type=text name=Kapasitas size=2 value='$d[Kapasitas]'></td></tr>
          <tr><td class=cc>Kapasitas Ujian</td>       <td><input type=text name=KapasitasUjian size=2 value='$d[KapasitasUjian]'></td></tr>
         <tr><td class=cc>Keterangan</td>       <td><textarea name='Keterangan' cols=30 rows=5>$d[Keterangan]</textarea></td></tr>";
          if ($d[Aktif]=='Y'){
              echo "<tr><td class=cc>Aktif</td>    <td><input type=radio name=Aktif value=Y checked>Y
                                                                              <input type=radio name=Aktif value=N>N</td></tr>";
          }
          else{
              echo "<tr><td class=cc>Aktif</td>    <td><input type=radio name=Aktif value=Y>Y
                                                                              <input type=radio name=Aktif value=N checked>N</td></tr>";
          }
      echo"<tr><td colspan=2><input type=submit value=Simpan class=tombol> 
                        <input type=button class=tombol value=Batal onclick=self.history.back()></td></tr>
  </table></form></div>";
}
?>
