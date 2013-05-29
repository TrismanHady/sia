<?php
function defProg(){
echo" <div id=headermodul>Program</div>
<div id=groupmodul1> <table id=tablemodul>
    <tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a href='?page=masterprogram&PHPIdSession=tambahprogram'>Tambah Program</a> </tr></td>
</table></form>"; 
echo"<table id=tablemodul>
    <tr><th>No</th><th>Institusi</th><th>Kode</th><th>Nama</th><th>Aktif</th><th>Aksi</th></tr>";											
          $sql="SELECT t1.*,t2.Nama_Identitas FROM program t1, identitas t2 WHERE t1.Identitas_ID=t2.Identitas_ID ORDER BY t1.ID";
        	$qry= mysql_query($sql)
        	or die ();
        	while ($r=mysql_fetch_array($qry)){
          if(($no % 2)==0){
              $warna="#FFF";
          }
          else{
              $warna="#ebf0f5";
          }            	
        	$no++;
             echo "<tr bgcolor=$warna>                            
                   <td>$no</td>
                   <td>$r[Nama_Identitas]</td>
      		         <td>$r[Program_ID]</td>
      		         <td>$r[nama_program]</td>
      		         <td>$r[aktif]</td>
                   <td><a href='?page=masterprogram&PHPIdSession=editprogram&gis=$r[ID]'><img src=../img/edit.png></a> |
                   <a href=\"?page=masterprogram&PHPIdSession=delprog&gos=$r[ID]\"
                   onClick=\"return confirm('Apakah Anda benar-benar akan menghapus $r[Program_ID] - $r[nama_program]?')\"><img src=../img/del.jpg></a></td></tr>";        
          } 
   echo" </table></div>";
}

function tambahprogram(){
echo"<div id=groupmodul1>
    <form action='?page=masterprogram&PHPIdSession=InputProg' method='post'>
    <h3>Tambah Program</h3>
    <table id=tablemodul>              
    <tr><td class=cc>Institusi :</td>   <td><select name=cmi id=cmi>
        <option value=>Pilih Institusi</option>";
						  $s = "SELECT * FROM identitas ORDER BY Identitas_ID";
              $g = mysql_query($s) 
              or die ();
							while($r = mysql_fetch_array($g)){
								echo "<option value='$r[Identitas_ID]'>$r[Identitas_ID] - $r[Nama_Identitas]</option>";
							}
echo"</select></td></tr>    
    <tr><td class=cc>Kode :</td>       <td><input type=text name=Program_ID size=10></td></tr>                  
    <tr><td class=cc>Nama Program :</td>       <td><input type=text name=nama_program></td></tr>
    <tr><td class=cc>Aktif :</td>         <td><input type=radio name=aktif value=Y> Y <input type=radio name=aktif value=N> N  </td></tr>           
    <tr><td colspan=2><input type=submit value=Simpan class=tombol> 
    <input type=button  class=tombol value=Batal onclick=self.history.back()>
    </td></tr></table></form></div>";
}

function editprogram(){
$e=mysql_query("SELECT * FROM program WHERE ID='$_GET[gis]'");
$d=mysql_fetch_array($e);

echo"<div id=groupmodul1>
    <form action='?page=masterprogram&PHPIdSession=UpdateProg' method='post'>
    <h3>Tambah Program</h3>
    <table id=tablemodul>             
          <input type=hidden name=ID value='$d[ID]'>
    <tr><td class=cc>Institusi :</td>   <td><select name=cmi id=cmi>
        <option value=0>Pilih Institusi</option>";
$tampil=mysql_query("SELECT * FROM identitas ORDER BY Identitas_ID");
while($w=mysql_fetch_array($tampil)){
            if ($d[Identitas_ID]==$w[Identitas_ID]){
              echo "<option value=$w[Identitas_ID] selected>$w[Identitas_ID] - $w[Nama_Identitas]</option>";
            }
            else{
              echo "<option value=$w[Identitas_ID]>$w[Identitas_ID] - $w[Nama_Identitas]</option>";
            }
          }
echo "</select></td></tr>

<tr><td class=cc>Kode :</td>       <td><input type=text name=Program_ID value='$d[Program_ID]'  size=10></td></tr>                  
<tr><td class=cc>Nama Program :</td>       <td><input type=text name=nama_program  value='$d[nama_program]'></td></tr>";
          if ($d[aktif]=='Y'){
              echo "<tr><td class=cc>Aktif</td>    <td><input type=radio name=aktif value=Y checked>Y
                                                                              <input type=radio name=aktif value=N>N</td></tr>";
          }
          else{
              echo "<tr><td class=cc>Aktif</td>    <td><input type=radio name=aktif value=Y>Y
                                                                              <input type=radio name=aktif value=N checked>N</td></tr>";
          }
echo"           
<tr><td colspan=2><input type=submit value=Simpan class=tombol> <input type=button value=Batal class=tombol onClick=tb_remove() />
</td></tr></table></form></div>";
}
?>
