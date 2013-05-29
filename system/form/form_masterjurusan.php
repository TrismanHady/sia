<?php
function defaultjurusan(){
 ?>
 <div id=headermodul>Jurusan</div>

          <!-- TAB -->         
          <div id="groupmodul1">
            <div id="tabsview">
		          <div id="tab1" class="tab_sel" onclick="javascript: displayPanel('1');" align="center">&nbsp; Depan &nbsp;</div>
 		          <div id="tab2" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('2');" align="center">&nbsp; Tambah Jurusan &nbsp;</div>
            </div>
  
	          <div class="tab_bdr"></div>
	          
	          <!-- tab 1: Depan -->
            <div class="panel" id="panel1" style="display: block;">
              <span>
              <ul>            
                <?php
                  echo" <table id=tablemodul>  
                      <tr><th>Hapus</th><th>Edit</th><th>Institusi</th><th>Kode Jurusan</th><th>Jurusan</th><th>Jenjang</th><th>Aktif</th></tr>"; 
                      $sql="SELECT t1.*,t2.Nama_Identitas AS NI FROM jurusan t1,identitas t2 WHERE t1.Identitas_ID=t2.Identitas_ID ORDER BY t1.jurusan_ID";
                    	$qry= mysql_query($sql)
                    	or die ();
                    	while ($data=mysql_fetch_array($qry)){
                      if(($no % 2)==0){
                          $warna="#FFF";
                      }
                      else{
                          $warna="#ebf0f5";
                      }         	
                    	$no++;
                         echo "<tr bgcolor=$warna>               
                                  <td width=10 align=center> <a href=\"?page=masterjurusan&PHPIdSession=exprodi&gos=$data[jurusan_ID]\"
                                  onClick=\"return confirm('Apakah Anda benar-benar akan menghapus $data[nama_jurusan]?')\"> <img src=../img/del.jpg></a>
                                  </td>                           
                                  <td width=10><a href='?page=masterjurusan&PHPIdSession=editjurusan&gis=$data[jurusan_ID]'><img src=../img/edit.png></a></td>
                  		            <td>$data[NI]</td>
                                  <td>$data[kode_jurusan]</td>
                  		            <td>$data[nama_jurusan]</td>
                  		            <td>$data[jenjang]</td>
                  		            <td>$data[Aktif]</td>
                               </tr>";        
                      }
                      echo "</table>";	
                ?>          
              </ul>
              </span>
            </div>
  

            <div class="panel" id="panel2" style="display: none;">
              <span>
              <ul>        
                <?php
                      echo" <form method='post' action='?page=masterjurusan&PHPIdSession=addprodins'>
                            <table id=tablemodul>
                            <tr><td align=right class=cc>Institusi</td>           <td><select name=cmbIns1><option value=0>-- Pilih Institusi --</option>";
                						  $s = "SELECT * FROM identitas ORDER BY Identitas_ID";
                              $g = mysql_query($s) 
                              or die ();
                							while($r = mysql_fetch_array($g)){
                								echo "<option value='$r[Identitas_ID]'>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";
                							}
                            echo "</select></td></tr>
                            
                            <tr><td align=right class=cc>Kode / Nama Jurusan</td>           <td><input type=text name=kode_jurusan size=10> - <input type=text name=nama_jurusan size=30></td></tr>
                            <tr><td align=right class=cc>Jenjang</td>    <td><select name=jenjang><option value=0 selected></option>";
                                                                      $sql=mysql_query("SELECT * FROM jenjang ORDER BY Jenjang_ID");
                                                                      while($data=mysql_fetch_array($sql)){
                                                                      echo "<option value=$data[Nama]>$data[Jenjang_ID] - $data[Nama]</option>";
                                                                      }
                            echo "</select></td></tr>

                            <tr><td align=right class=cc>Aktif</td>    <td><input type=radio name=Aktif value=Y> Y 
                                                                        <input type=radio name=Aktif value=N> N </td></tr>
                            <tr><td colspan=2><h3>Surat Keputusan</h3></td></tr>
                            <tr><td align=right class=cc>No SK Dikti</td>    <td><input type=text name=NoSKDikti size=30></td></tr>
                            <tr><td align=right class=cc>Tanggal SK Dikti</td>    <td>";  $thn_sekarang=date("Y");      
                                                                              combotgl(1,31,'tgl_SKDikti',Tgl);
                                                                              combobln(1,12,'bln_SKDikti',Bulan);
                                                                              combotgl($thn_sekarang-100,$thn_sekarang+2,'thn_SKDikti',Tahun);
                      echo "</td></tr>
                            <tr><td align=right class=cc>No SK BAN</td>    <td><input type=text name=NoSKBAN></td></tr>
                            <tr><td align=right class=cc>Tanggal SK BAN</td>    <td>";  $thn_sekarang=date("Y");      
                                                                              combotgl(1,31,'tgl_SKBAN',Tgl);
                                                                              combobln(1,12,'bln_SKBAN',Bulan);
                                                                              combotgl($thn_sekarang-100,$thn_sekarang+2,'thn_SKBAN',Tahun);
                      echo "</td></tr>
                            <tr><td align=right class=cc>Akreditasi</td>    <td><select name=Akreditasi><option value=0 selected></option>";
                                                                      $sql=mysql_query("SELECT * FROM statusakreditasi ORDER BY statusakreditasi_ID");
                                                                      while($data=mysql_fetch_array($sql)){
                                                                      echo "<option value=$data[statusakreditasi_ID]>$data[statusakreditasi_ID] - $data[nama]</option>";
                                                                      }
                            echo "</select></td></tr>
                            <tr><td colspan=2>
                                <input type=submit value=Simpan class=tombol></td></tr>
                            </table></form>";
                ?>      
              </ul>
              </span>
            </div><br />  
          </div> 
<?
}

function editjurusan(){
$edit = mysql_query("SELECT * FROM jurusan WHERE jurusan_ID='$_GET[gis]'");
$r    = mysql_fetch_array($edit);
echo"<div id=groupmodul1>
    <form action='?page=masterjurusan&PHPIdSession=updpodins' method='post'>
    <table id=tablemodul><h3>Edit Jurusan</h3>
    <input type=hidden name='jurusan_ID' size=10 value='$r[jurusan_ID]'>
    <tr><td align=right>Institusi</td>  <td> <select name='cmbIns1'id=cmbIns1>";
        $tampil=mysql_query("SELECT * FROM identitas ORDER BY Identitas_ID");
        while($w=mysql_fetch_array($tampil)){
        if ($r[Identitas_ID]==$w[Identitas_ID]){
        echo "<option value=$w[Identitas_ID] selected>$w[Identitas_ID] - $w[Nama_Identitas]</option>";
        }else{echo "<option value=$w[Identitas_ID]>$w[Identitas_ID] - $w[Nama_Identitas]</option>";}}
    echo "</select></td></tr>              
    
    <tr><td align=right>Kode/ Nama Jurusan</td>           <td><input type=text name='kode_jurusan' size=10 value='$r[kode_jurusan]'> - <input type=text name='nama_jurusan' size=30 value='$r[nama_jurusan]'></td></tr>

    <tr><td align=right>Jenjang</td>  <td> <select name='jenjang'>";
        $tampil=mysql_query("SELECT * FROM jenjang ORDER BY Jenjang_ID");
        while($w=mysql_fetch_array($tampil)){
        if ($r[jenjang]==$w[Nama]){
        echo "<option value=$w[Nama] selected>$w[Jenjang_ID] - $w[Nama]</option>";
        }else{echo "<option value=$w[Nama]>$w[Jenjang_ID] - $w[Nama]</option>";}}
    echo "</select></td></tr>";
        if ($r[Aktif]=='Y'){
        echo "<tr><td align=right>Aktif</td> <td> : <input type=radio name='Aktif' value='Y' checked>Y  
        <input type=radio name='Aktif' value='N'> N</td></tr>";
        }else{echo "<tr><td>Aktif</td> <td> : <input type=radio name='Aktif' value='Y'>Y  
        <input type=radio name='Aktif' value='N' checked>N</td></tr>";}
    echo"
    <tr><td colspan=2><h3>Surat Keputusan</h3></td></tr>
    <tr><td align=right>No SK Dikti</td>    <td><input type=text name='NoSKDikti' size=30 value='$r[NoSKDikti]'></td></tr>
    <tr><td align=right>Tanggal SK Dikti</td>    <td>";  
        $thn_sekarang=date("Y");      
        $get_tgl=substr("$r[TglSKDikti]",8,2);
        combotgl2(1,31,'tgl_SKDikti',$get_tgl);
        $get_bln=substr("$r[TglSKDikti]",5,2);
        combobln2(1,12,'bln_SKDikti',$get_bln);
        $get_thn=substr("$r[TglSKDikti]",0,4);
        combotgl2($thn_sekarang-100,$thn_sekarang+2,'thn_SKDikti',$get_thn);
    
    echo "</td></tr>
    <tr><td align=right>No SK BAN</td>    <td><input type=text name='NoSKBAN' value='$r[NoSKBAN]'></td></tr>
    <tr><td align=right>Tanggal SK BAN</td>    <td>";  
        $thn_sekarang=date("Y");      
        $get_tgl=substr("$r[TglSKBAN]",8,2);
        combotgl2(1,31,'tgl_SKBAN',$get_tgl);
        $get_bln=substr("$r[TglSKBAN]",5,2);
        combobln2(1,12,'bln_SKBAN',$get_bln);
        $get_thn=substr("$r[TglSKBAN]",0,4);
        combotgl2($thn_sekarang-100,$thn_sekarang+2,'thn_SKBAN',$get_thn);
    echo "</td></tr>
    <tr><td align=right>Akreditasi</td>  <td> <select name='Akreditasi'>";
        $tampil=mysql_query("SELECT * FROM statusakreditasi ORDER BY statusakreditasi_ID");
        while($w=mysql_fetch_array($tampil)){
        if ($r[Akreditasi]==$w[statusakreditasi_ID]){
        echo "<option value=$w[statusakreditasi_ID] selected>$w[statusakreditasi_ID] - $w[nama]</option>";
        }else{echo "<option value=$w[statusakreditasi_ID]>$w[statusakreditasi_ID] - $w[nama]</option>";}}
    echo "</select></td></tr>
    <tr><td colspan=2><input type=submit value=Simpan class=tombol>
                      <input type=button class=tombol value=Batal onclick=self.history.back()>
    </td></tr></table></form></div>";     	
}
?>
