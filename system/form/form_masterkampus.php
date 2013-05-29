<?php
function defaultKampus(){
echo" <div id=headermodul>Kampus</div>";
?>
         <div id="groupmodul1">
            <div id="tabsview">
		          <div id="tab1" class="tab_sel" onclick="javascript: displayPanel('1');" align="center">&nbsp; Depan &nbsp;</div>
 		          <div id="tab2" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('2');" align="center">&nbsp; Tambah Kampus &nbsp;</div>
            </div>
	          <div class="tab_bdr"></div>
            <div class="panel" id="panel1" style="display: block;">
              <span>
              <ul>            
                <?php
                      echo"<table id=tablemodul>  
                            <tr><th>No</th><th>Institusi</th><th>Kode</th><th>Nama</th><th>Aktif</th><th>Aksi</th></tr>"; 
                           $sql="SELECT t1.*,t2.Nama_Identitas FROM kampus t1, identitas t2 WHERE t1.Identitas_ID=t2.Identitas_ID ORDER BY Kampus_ID";
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
                                <td>$data[Nama_Identitas]</td>
                                <td>$data[Kampus_ID]</td>
                                <td>$data[Nama]</td>
                                <td align=center>$data[Aktif]</td>
                                <td><a href=?page=masterkampus&PHPIdSession=editKampus&gis=$data[Kampus_ID]><img src=../img/edit.png></a> |
                                <a href=\"?page=masterkampus&PHPIdSession=delKampus&gos=$data[Kampus_ID]\"
                                onClick=\"return confirm('Apakah Anda benar-benar akan menghapus $data[Nama]?')\"><img src=../img/del.jpg></a>
                                </td></tr>";        
                             } 
                      echo" </table>";
                ?>          
              </ul>
              </span>
            </div>
            <div class="panel" id="panel2" style="display: none;">
              <span>
              <ul>            
                <?php
                       echo"<form name=form1 method=post action=?page=masterkampus&PHPIdSession=InputKampus>
                            <table id=tablemodul>              
                            <tr><td class=cc>Kode Kampus</td>       <td class=cb><input type=text name=Kampus_ID></td></tr>                  
                            <tr><td class=cc>Nama Kampus</td>       <td class=cb><input type=text name=Nama></td></tr>
                            <tr><td class=cc>Institusi</td>       <td class=cb><select name=Identitas_ID>
                            <option value=>Pilih Institusi</option>";
                    				      $sql = "SELECT Identitas_ID,Nama_Identitas FROM identitas ORDER BY Identitas_ID";
                                  $getComboInstitusi = mysql_query($sql) 
                                  or die ();
                    							while($data = mysql_fetch_array($getComboInstitusi)){
                    								echo "<option value='$data[Identitas_ID]'>$data[Identitas_ID] - $data[Nama_Identitas]</option>";
                    							}
                    		echo" </select></td></tr>
                            <tr><td class=cc>Alamat</td>       <td class=cb><input type=text name=Alamat></td></tr>
                            <tr><td class=cc>Kota</td>       <td class=cb><input type=text name=Kota></td></tr>
                            <tr><td class=cc>Telepon</td>       <td class=cb><input type=text name=Telepon></td></tr>
                            <tr><td class=cc>Fax</td>       <td class=cb><input type=text name=Fax></td></tr>
                            <tr><td class=cc>Aktif</td>         <td class=cb><input type=radio name=Aktif value=Y> Y 
                                                                                            <input type=radio name=Aktif value=N> N  </td></tr>           
                            <tr><td colspan=2 align=center><input type=submit value=Simpan class=tombol>
                                                           <input type=button  class=tombol value=Batal onclick=self.history.back()></td></tr>
                                
                            </div></table></form>";
                ?>                    
              </ul>
              </span>
            </div><br />  
          </div> 
<?     
}
function editKampus(){
    $edit=mysql_query("SELECT * FROM kampus WHERE Kampus_ID='$_GET[gis]'");
    $data=mysql_fetch_array($edit);

    echo"<div id=headermodul>Edit Program</div>
          <form method=POST action=?page=masterkampus&PHPIdSession=UpdateKampus>
          <input type=hidden name=codd value='$data[Kampus_ID]'>
          <div id=groupmodul1><table id=tablemodul>
          <tr><td class=cc>Kode Kampus</td>       <td><input type=text name=Kampus_ID value='$data[Kampus_ID]'></td></tr>                  
          <tr><td class=cc>Nama Kampus</td>       <td><input type=text name=Nama value='$data[Nama]'></td></tr>
          <tr><td class=cc>Institusi</td>       <td><select name=Identitas_ID>";
          $tampil=mysql_query("SELECT * FROM identitas ORDER BY Identitas_ID");
          while($w=mysql_fetch_array($tampil)){
            if ($data[Identitas_ID]==$w[Identitas_ID]){
              echo "<option value=$w[Identitas_ID] selected>$w[Identitas_ID] - $w[Nama_Identitas]</option>";
            }
            else{
              echo "<option value=$w[Identitas_ID]>$w[Identitas_ID] - $w[Nama_Identitas]</option>";
            }
          }
    echo "</select></td></tr>
          <tr><td class=cc>Alamat</td>       <td><input type=text name=Alamat value='$data[Alamat]'></td></tr>
          <tr><td class=cc>Kota</td>       <td><input type=text name=Kota value='$data[Kota]'></td></tr>
          <tr><td class=cc>Telepon</td>       <td><input type=text name=Telepon value='$data[Telepon]'></td></tr>
          <tr><td class=cc>Fax</td>       <td><input type=text name=Fax value='$data[Fax]'></td></tr>";          
          if ($data[Aktif]=='Y'){
              echo "<tr><td class=cc>Aktif</td>    <td><input type=radio name=Aktif value=Y checked>Y
                                                                              <input type=radio name=Aktif value=N>N</td></tr>";
          }
          else{
              echo "<tr><td class=cc>Aktif</td>    <td><input type=radio name=Aktif value=Y>Y
                                                                              <input type=radio name=Aktif value=N checked>N</td></tr>";
          }
              echo"<tr><td colspan=2><input type=submit value=Update class=tombol>
                       <input type=button  class=tombol value=Batal onclick=self.history.back()></td></tr>
          </table></div></form>";
}
?>
