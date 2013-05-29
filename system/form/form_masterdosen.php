
<?php
function GetCheckboxes($table, $key, $Label, $Label1, $Nilai='') {
  $s = "select * from $table order by jurusan_ID";
  $r = mysql_query($s);
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysql_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
    $str .= "<input type=checkbox name='".$key."[]' value='$w[$key]' $_ck> $w[$Label] - $w[$Label1] </br>";
  }
  return $str;
}


function defaultmstDosen(){
echo"<div id=headermodul>Master Dosen</div>";
?>       
          <div id="groupmodul1">
            <div id="tabsview">
		          <div id="tab1" class="tab_sel" onclick="javascript: displayPanel('1');" align="center">&nbsp; Depan &nbsp;</div>
 		          <div id="tab2" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('2');" align="center">&nbsp; Tambah Dosen &nbsp;</div>
            </div>
	          <div class="tab_bdr"></div>
            <div class="panel" id="panel1" style="display: block;">
              <span>
              <ul>            
                <?php 
                     echo"<table id=tb1>
                          <form method=post action=?page=masterdosen&PHPIdSession=carimstDosen>
                          <tr><td bgcolor=#dbeaf5>Cari :  <input type=text name=nama_lengkap>
                                <input type=submit value=Cari class=tombol>
                              </form></td>
                              <td bgcolor=#dbeaf5><form method=post action=?page=masterdosen>
                                <input type=submit value=Refresh class=tombol>
                              </form></td></tr>
                          </table></select></td></tr>
                          <table id=tablemodul>
                          <tr><th>No</th><th>Mdl</th><th>Login/NIP</th><th>NIDN</th><th>Nama</th><th>Gelar</th><th>Prodi</th><th>Telepon</th><th>Alamat</th><th>Aktif</th><th>Aksi</th></tr>"; 
                        
                          $sql="SELECT * FROM dosen GROUP BY NIDN ORDER BY dosen_ID";
                        	$qry= mysql_query($sql)
                        	or die ();
                        	while ($data=mysql_fetch_array($qry)){
                          if(($no % 2)==0){
                              $warna="#FFFFFF";
                          }
                          else{
                              $warna="#E1E1E1";
                          }         	

                        	$no++;
                             echo "<tr bgcolor=$warna><input type=hidden name=dosen_ID value='$data[dosen_ID]'>
                               		 <td>$no</td>               
                                   <td align=center><a href=?page=masterdosen&PHPIdSession=CariModulDosen&mod=$data[NIDN]><img src=../img/modul.png></a></td>
                                   <td>$data[username]</td>               
                                   <td>$data[NIDN]</a></td>
                      		         <td>$data[nama_lengkap]</td>
                      		         <td>$data[Gelar]</td>
                      		         <td>$data[jurusan_ID]</td>
                      		         <td>$data[Telepon]</td>
                      		         <td>$data[Alamat]</td>
                      		         <td align=center>$data[Aktif]</td>
                                   <td><a href='?page=masterdosen&PHPIdSession=editmstDosen&gis=$data[dosen_ID]'><img src=../img/edit.png></a> |
                                   <a href=\"?page=masterdosen&PHPIdSession=delmstdsn&gos=$data[username]\"
                                   onClick=\"return confirm('Apakah Anda benar-benar akan menghapus $data[nama_lengkap]?')\"><img src=../img/del.jpg></a>
                                   </td></tr>";
                            
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
                    echo"<form method=post action=?page=masterdosen&PHPIdSession=addDosn>
                      <table id=tablemodul>
                      <tr><td class=cc>Username</td>    <td>    <input type=text name=username></td></tr>
                      <tr><td class=cc>Password</td>    <td>    <input type=text name=password></td></tr>
                      <tr><td class=cc>NIDN</td>    <td>      <input type=text name=NIDN> Nomor Induk Dosen Nasional</td></tr>
                      <tr><td class=cc>Nama Dosen</td>    <td><input type=text name=nama_lengkap size=30></td></tr>
                      <tr><td class=cc>Gelar</td>    <td>      <input type=text name=Gelar></td></tr>
                      <tr><td class=cc>Tempat/ Tanggal lahir</td>    <td><input type=text name=TempatLahir size=30> Tanggal ";        
                              combotgl(1,31,'tgllahir',Tgl);
                              combobln(1,12,'blnlahir',Bulan);
                              $thn_sekarang=date("Y");
                              combotgl($thn_sekarang-100,$thn_sekarang+1,'thnlahir',Tahun);  
                        echo "</td></tr></td></tr>
                      <tr><td class=cc>Agama</td>    <td>       <select name='Agama'>
                                <option value=0 selected>- Pilih Agama -</option>";
                                $t=mysql_query("SELECT * FROM agama ORDER BY agama_ID");
                                while($w=mysql_fetch_array($t)){
                                    echo "<option value=$w[nama]>$w[agama_ID] - $w[nama]</option>";
                                }                                
                        echo "</select></td></tr>

                      <tr><td class=cc>Telepon</td>    <td>   <input type=text name=Telepon></td></tr> 
                      <tr><td class=cc>Ponsel</td>    <td>      <input type=text name=Handphone></td></tr>
                      <tr><td class=cc>E-Mail</td>    <td>      <input type=text name=Email></td></tr>
                      <tr><td class=cc>Identitas</td>    <td>       <select name='identitas'>
                                <option value=0 selected>- Pilih Identitas -</option>";
                                $t=mysql_query("SELECT * FROM identitas ORDER BY Identitas_ID");
                                while($w=mysql_fetch_array($t)){
                                    echo "<option value=$w[Identitas_ID]>$w[Identitas_ID] - $w[Nama_Identitas]</option>";
                                }                                
                        echo "</select></td></tr>

                      <tr><td class=cc>Program Studi</td>    <td>";
                                $tampil=mysql_query("SELECT * FROM jurusan ORDER BY jurusan_ID");
                                while($r=mysql_fetch_array($tampil)){
                                  echo "<input type=checkbox name=Jurusan_ID[] value=$r[kode_jurusan]> $r[kode_jurusan] - $r[nama_jurusan]<br>";
                                }
                        echo "</td></tr>
                      <tr><td class=cc>Aktif</td>    <td><input type=radio name=Aktif value=Y> Y
                                                <input type=radio name=Aktif value=N> N </td></tr>
                      <tr><td colspan=2><input type=submit value=Simpan class=tombol>
                                        <input type=reset value=Reset class=tombol></td></tr>
                    </table></form>";
                ?>                    
              </ul>
              </span>
            </div>
          </div> 
<?  
}

function carimstDosen(){
      echo"<div id=headermodul>Master Dosen</div>";
?>     
          <div id="groupmodul1">
            <div id="tabsview">
		          <div id="tab1" class="tab_sel" onclick="javascript: displayPanel('1');" align="center">&nbsp; Depan &nbsp;</div>
 		          <div id="tab2" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('2');" align="center">&nbsp; Tambah Dosen &nbsp;</div>
            </div>
	          <div class="tab_bdr"></div>
            <div class="panel" id="panel1" style="display: block;">
              <span>
              <ul>            
                <?php 
                     echo"<table id=tb1>
                          <form method=post action=?page=masterdosen&PHPIdSession=carimstDosen>
                          <tr><td bgcolor=#dbeaf5>Cari :  <input type=text name=nama_lengkap>
                              <input type=submit value=Cari class=tombol>
                              </form></td>
                          <td bgcolor=#dbeaf5><form method=post action=?page=masterdosen>
                                <input type=submit value=Refresh class=tombol>
                              </form></td></tr>
                          </table></select></td></tr>
                          <table id=tablemodul>
                          <tr><th>No</th><th>Mdl</th><th>Login/NIP</th><th>NIDN</th><th>Nama</th><th>Gelar</th><th>Prodi</th><th>Telepon</th><th>Alamat</th><th>Aktif</th><th>Aksi</th></tr>";                
                          $sql="SELECT * FROM dosen WHERE nama_lengkap LIKE '%$_POST[nama_lengkap]%' GROUP BY NIDN ORDER BY NIDN";
                        	$qry= mysql_query($sql)
                        	or die ();
                        	while ($data=mysql_fetch_array($qry)){
                          if(($no % 2)==0){
                              $warna="#FFFFFF";
                          }
                          else{
                              $warna="#E1E1E1";
                          }   	

                        	$no++;
                             echo "<tr bgcolor=$warna><input type=hidden name=dosen_ID value='$data[dosen_ID]'>
                               		 <td>$no</td>               
                                   <td align=center><a href=?page=&PHPIdSession=CariModulDosen&mod=$data[NIDN]><img src=../img/modul.png></a></td>
                                   <td>$data[username]</td>               
                                   <td>$data[NIDN]</a></td>
                      		         <td>$data[nama_lengkap]</td>
                      		         <td>$data[Gelar]</td>
                      		         <td>$data[Jurusan_ID]</td>
                      		         <td>$data[Telepon]</td>
                      		         <td>$data[Alamat]</td>
                      		         <td align=center>$data[Aktif]</td>
                                   <td><a href='?page=masterdosen&PHPIdSession=editmstDosen&gis=$data[dosen_ID]'><img src=../img/edit.png></a> |
                                   <a href=\"?page=masterdosen&PHPIdSession=delmstdsn&gos=$data[username]\"
                                   onClick=\"return confirm('Apakah Anda benar-benar akan menghapus $data[nama_lengkap]?')\"><img src=../img/del.jpg></a>
                                   </td></tr>";                            
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
                    echo"<form method=post action=?page=masterdosen&PHPIdSession=addDosn>
                      <table id=tablemodul>
                      <tr><td class=cc>Username</td>    <td>    <input type=text name=username></td></tr>
                      <tr><td class=cc>Password</td>    <td>    <input type=text name=password></td></tr>
                      <tr><td class=cc>NIDN</td>    <td>      <input type=text name=NIDN> Nomor Induk Dosen Nasional</td></tr>
                      <tr><td class=cc>Nama Dosen</td>    <td><input type=text name=nama_lengkap size=30></td></tr>
                      <tr><td class=cc>Gelar</td>    <td>      <input type=text name=Gelar></td></tr>
                      <tr><td class=cc>Tempat/ Tanggal lahir</td>    <td><input type=text name=TempatLahir size=30> Tanggal ";        
                              combotgl(1,31,'tgllahir',Tgl);
                              combobln(1,12,'blnlahir',Bulan);
                              $thn_sekarang=date("Y");
                              combotgl($thn_sekarang-100,$thn_sekarang+1,'thnlahir',Tahun);  
                        echo "</td></tr></td></tr>
                      <tr><td class=cc>Agama</td>    <td>       <select name='Agama'>
                                <option value=0 selected>- Pilih Agama -</option>";
                                $t=mysql_query("SELECT * FROM agama ORDER BY agama_ID");
                                while($w=mysql_fetch_array($t)){
                                    echo "<option value=$w[nama]>$w[agama_ID] - $w[nama]</option>";
                                }                                
                        echo "</select></td></tr>

                      <tr><td class=cc>Telepon</td>    <td>   <input type=text name=Telepon></td></tr> 
                      <tr><td class=cc>Ponsel</td>    <td>      <input type=text name=Handphone></td></tr>
                      <tr><td class=cc>E-Mail</td>    <td>      <input type=text name=Email></td></tr>
                      <tr><td class=cc>Identitas</td>    <td>       <select name='identitas'>
                                <option value=0 selected>- Pilih Identitas -</option>";
                                $t=mysql_query("SELECT * FROM identitas ORDER BY Identitas_ID");
                                while($w=mysql_fetch_array($t)){
                                    echo "<option value=$w[Identitas_ID]>$w[Identitas_ID] - $w[Nama_Identitas]</option>";
                                }                                
                        echo "</select></td></tr>

                      <tr><td class=cc>Program Studi</td>    <td>";
                                $tampil=mysql_query("SELECT * FROM jurusan ORDER BY jurusan_ID");
                                while($r=mysql_fetch_array($tampil)){
                                  echo "<input type=checkbox name=Jurusan_ID[] value=$r[kode_jurusan]> $r[kode_jurusan] - $r[nama_jurusan]<br>";
                                }
                        echo "</td></tr>
                      <tr><td class=cc>Aktif</td>    <td><input type=radio name=Aktif value=Y> Y
                                                <input type=radio name=Aktif value=N> N </td></tr>
                      <tr><td colspan=2><input type=submit value=Simpan class=tombol>
                                        <input type=reset value=Reset class=tombol></td></tr>
                    </table></form>";
                ?>                    
              </ul>
              </span>
            </div><br /> 
          </div> 
<?  
}

function CariModulDosen(){
      echo"<div id=headermodul>Manajemen Modul Dosen</div>
            <div id=groupmodul>";
            echo"<table id=tablemodul><tr><th colspan=3>Data Dosen</th></tr>";            
            $sql="SELECT * FROM dosen WHERE NIDN='$_GET[mod]' ORDER BY dosen_ID";
          	$qry= mysql_query($sql)
          	or die ();
          	while ($data=mysql_fetch_array($qry)){
          	$no++;
            echo" <input type=hidden name=id_level value=$data[id_level]>
                  <tr><td colspan=1>Nama Lengkap</td>  <td>$data[nama_lengkap]</td></tr>
                  <tr><td>Keterangan</td>    <td>$data[keterangan]</td></tr>
                  <tr><td>Telepon</td>       <td>$data[telepon]</td></tr>
                  <tr><td>Aktif</td>         <td>$data[aktif]</td></tr>
                  <form name=form1 method=post action='?page=masterdosen'>
                  <td colspan=2 align=center><input type=submit name=submit value=Kembali></form></td></tr>";

           $id_level=$data[id_level];
           }
      echo "</table></div>";
            echo"<div id=groupmodul><table id=tablemodul>";
echo"<tr><th>Group</th><th>Pilih</th></tr>"; 
      $sql="SELECT t2.id,t1.nama
            FROM groupmodul t1, dropdownsystem t2
            WHERE t1.relasi_modul=t2.id_group
            ORDER BY relasi_modul";
	    $qry= mysql_query($sql)
	    or die ();
      while ($data=mysql_fetch_array($qry)){
      $no++;
         echo "<tr>";
         echo "<form method=post action='?page=masterdosen&PHPIdSession=InputModulDosen'>";
         $sqlr="SELECT * FROM hakmodul WHERE id_level=$id_level AND id=$data[id]";
                	$qryr= mysql_query($sqlr);
                	$cocok=mysql_num_rows($qryr);
                	if ($cocok==1){
                  $cek="checked";
                  $bg="71fe74";
                  }
                  else{
                  $cek="";
                  $bg="FFFFFF";
                  }     
         echo "<input type=hidden name=id_level value=$id_level>

               <td bgcolor=$bg>$data[nama]</td>              

               <td bgcolor=$bg><input name=CekModul[] type=checkbox value=$data[id] $cek></td>
      </tr>";
      }
        echo "</table></div>";

      echo"<div id=groupmodul1><table id=tablemodul>";
echo"<tr><th>Group</th><th>Modul</th><th>Keterangan</th><th>Aksi</th></tr>"; 
      $sql="select 
                          t2.id_group AS id_group,
                          t1.id AS id,
                          t1.parent_id AS parent_id,
                          t2.nama AS nama,
                          t1.judul AS judul,
                          t1.aktif AS aktif,
                          t1.url AS url,
                          t1.keterangan AS keterangan 
                        from 
                          (dropdownsystem t1 join groupmodul t2) 
                        where 
                          (t1.parent_id = t2.relasi_modul) 
                        order by 
                          t2.id_group";
	    $qry= mysql_query($sql)
	    or die ();
      while ($data=mysql_fetch_array($qry)){
      $no++;
         echo "<tr>";
         echo "";
         $sqlr="SELECT * FROM hakmodul WHERE id_level='$id_level' AND id='$data[id]'";
                	$qryr= mysql_query($sqlr);
                	$cocok=mysql_num_rows($qryr);
                	if ($cocok==1){
                  $cek="checked";
                  $bg="71fe74";
                  }
                  else{
                  $cek="";
                  $bg="FFFFFF";
                  }     
         echo "<input type=hidden name=id_level value=$id_level>

               <td bgcolor=$bg>$data[nama]</td>              
               <td bgcolor=$bg>$data[judul]</td>
  		         <td bgcolor=$bg>$data[keterangan]</td>
               <td bgcolor=$bg><input name=CekModul[] type=checkbox value=$data[id] $cek></td>
      </tr>";
      }
        echo " <td colspan=4 align=center><input type=submit name=submit value=Simpan></form></table></div>";
}

function editmstDosen(){
echo"<div id=headermodul>Master Dosen</div>";
              $e=mysql_query("SELECT * FROM dosen WHERE dosen_ID='$_GET[gis]'");
              $r=mysql_fetch_array($e);
         echo"<div id=groupmodul1><form method=post action=?page=masterdosen&PHPIdSession=updsn>    
              <table id=tablemodul2><tr><th colspan=3>Informasi Dosen</th></tr>                               
                <tr><td>Username Login</td>    <td>  <strong><h3> : $r[username]</h3></strong></td>
                    <td rowspan=3><img alt='galeri' src='foto_dosen/$r[foto]' height=70></td></tr>                    
                <tr><td>Nama Lengkap</td>          <td><strong><h3>: $r[nama_lengkap], $r[Gelar]</h3></strong></td></tr>
                <tr><td>Pilihan </td><td>  <a class='s' href=?page=masterdosen>: Kembali Ke Daftar Dosen</a> </td></tr>
              </form></table></div>";
           ?>         
          <div id="groupmodul1">
            <div id="tabsview">
		          <div id="tab1" class="tab_sel" onclick="javascript: displayPanel('1');" align="center">&nbsp; Data Pribadi &nbsp;</div>
 		          <div id="tab2" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('2');" align="center">&nbsp; Alamat &nbsp;</div>
 		          <div id="tab3" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('3');" align="center">&nbsp; Akademik &nbsp;</div>
 		          <div id="tab4" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('4');" align="center">&nbsp; Jabatan &nbsp;</div>
            </div>
	          <div class="tab_bdr"></div>
            <div class="panel" id="panel1" style="display: block;">
              <span>
              <ul>            
                <?php
                  
                 echo"<form method=post action=?page=masterdosen&PHPIdSession=updsn>
                      <input type=hidden name=id value='$r[dosen_ID]'>
                      <table id=tablemodul>
                      <tr><td class=cc>Username</td>    <td class=cb>    <input type=text name=username value='$r[username]'></td></tr>
                      <tr><td class=cc>Password</td>     <td class=cb><input type=password name=password size=20'> *) Kosongkan jika tidak diubah</td></tr>
                      <tr><td class=cc>NIDN</td>    <td class=cb>        <input type=text name=NIDN value='$r[NIDN]'></td></tr>
                      <tr><td class=cc>Nama Dosen</td>    <td class=cb><input type=text name='nama_lengkap' size=30 value='$r[nama_lengkap]'></td></tr>
                      <tr><td class=cc>Gelar</td>    <td class=cb>      <input type=text name=Gelar value='$r[Gelar]'></td></tr>
                      <tr><td class=cc>Tempat/ Tanggal lahir</td>    <td class=cb><input type=text name=TempatLahir size=30  value='$r[TempatLahir]'> Tanggal ";        
                                $get_tgl=substr("$r[TanggalLahir]",8,2);
                                combotgl2(1,31,'tgllahir',$get_tgl);
                                $get_bln=substr("$r[TanggalLahir]",5,2);
                                combobln2(1,12,'blnlahir',$get_bln);
                                $get_thn=substr("$r[TanggalLahir]",0,4);
                                $t=date("Y");
                                combotgl2($t-100,$t+2,'thnlahir',$get_thn);  
                        echo "</td></tr></td></tr>
                      <tr><td class=cc>Agama</td>    <td class=cb>       <select name='Agama'>
                                <option value=0 selected>- Pilih Agama -</option>";
                                $t=mysql_query("SELECT * FROM agama ORDER BY agama_ID");
                                while($w=mysql_fetch_array($t)){
                                  if ($r[Agama]==$w[nama]){
                                    echo "<option value=$w[nama] selected>$w[agama_ID] - $w[nama]</option>";
                                  }
                                  else{
                                    echo "<option value=$w[nama]>$w[agama_ID] - $w[nama]</option>";
                                  }
                                }                                
                        echo "</select></td></tr>
                      <tr><td class=cc>Telepon</td>    <td class=cb>   <input type=text name=Telepon value='$r[Telepon]'></td></tr> 
                      <tr><td class=cc>Ponsel</td>    <td class=cb>      <input type=text name=Handphone value='$r[Handphone]'></td></tr>
                      <tr><td class=cc>E-Mail</td>    <td class=cb>      <input type=text name=Email value='$r[Email]'></td></tr>
                            <tr><td class=cc>Identitas</td>    <td class=cb><select name='identitas'>
                                      <option value=0 selected>- Pilih Identitas -</option>";
                                      $tampil=mysql_query("SELECT * FROM identitas ORDER BY Identitas_ID");
                                while($w=mysql_fetch_array($tampil)){
                                  if ($r[Identitas_ID]==$w[Identitas_ID]){
                                    echo "<option value=$w[Identitas_ID] selected>$w[Identitas_ID] - $w[Nama_Identitas]</option>";
                                  }
                                  else{
                                    echo "<option value=$w[Identitas_ID]>$w[Identitas_ID] - $w[Nama_Identitas]</option>";
                                  } 
                                }
                              echo "</select></td></tr>";
                       $d = GetCheckboxes('jurusan', 'kode_jurusan', 'kode_jurusan', 'nama_jurusan', $r[jurusan_ID]);
                    echo"  <tr><td class=cc>Program Studi</td>    <td class=cb> $d </td></tr>";
                      if ($r[Aktif]=='Y'){
                        echo "<tr><td class=cc>Aktif</td> <td class=cb>  <input type=radio name='Aktif' value='Y' checked>Y  
                                                        <input type=radio name='Aktif' value='N'> N</td></tr>";
                      }
                      else{
                        echo "<tr><td class=cc>Aktif</td> <td class=cb>  <input type=radio name='Aktif' value='Y'>Y  
                                                        <input type=radio name='Aktif' value='N' checked>N</td></tr>";
                      }
                   
                    echo"     <tr><td colspan=2></td></tr></table>";
                 ?>          
              </ul>
              </span><? echo"<input type=submit value=Simpan class=tombol>"; ?>
            </div>
            <div class="panel" id="panel2" style="display: none;">
              <span>
              <ul>            
                <?php             
                    echo" 
                          <table id=tablemodul>
                          <tr><td class=cc>No KTP</td>    <td class=cb><input type=text name='KTP' size=30 value='$r[KTP]'></td></tr>
                          <tr><td class=cc>No Telepon</td>    <td class=cb>    <input type=text value='$r[Telepon]' readonly></td></tr>
                          <tr><td class=cc>No HP</td>    <td class=cb>    <input type=text value='$r[Handphone]' readonly></td></tr>
                          <tr><td class=cc>Email</td>    <td class=cb>      <input type=text value='$r[Email]' readonly></td></tr>
                          <tr><td class=cc>Alamat</td>    <td class=cb><textarea name='Alamat' cols=45 rows=5>$r[Alamat]</textarea></td>  </tr>
                          <tr><td class=cc>Kota</td>    <td class=cb>      <input type=text name='Kota' size=30 value='$r[Kota]'></td></tr>
                          <tr><td class=cc>Propinsi</td>    <td class=cb>   <input type=text name='Propinsi' size=30 value='$r[Propinsi]'></td></tr>
                          <tr><td class=cc>Negara</td>    <td class=cb>     <input type=text name='Negara' value='$r[Negara]'></td></tr>
                          <tr><td colspan=2></td></tr></table>";
                ?>                    
              </ul>
              </span><? echo"<input type=submit value=Simpan class=tombol>"; ?>
            </div>
            <div class="panel" id="panel3" style="display: none;">
              <span>
              <ul>        
                <?php
                      echo" <table id=tablemodul>
                      <tr><td class=cc>Mulai Bekerja</td>    <td class=cb>"; 
                              $get_tgl=substr("$r[TglBekerja]",8,2);
                              combotgl2(1,31,'TglBekerja',$get_tgl);
                              $get_bln=substr("$r[TglBekerja]",5,2);
                              combobln2(1,12,'BlnBekerja',$get_bln);
                              $get_thn=substr("$r[TglBekerja]",0,4);
                              $thn_sekarang=date("Y");
                              combotgl2($thn_sekarang-100,$thn_sekarang+1,'ThnBekerja',$get_thn);                              
                        echo "</td></tr>
                      <tr><td class=cc>Status Dosen</td>    <td class=cb>       <select name='StatusDosen_ID'>
                                <option value=0 selected>- Pilih Status Dosen -</option>";
                                $tampil=mysql_query("SELECT * FROM statusaktivitasdsn ORDER BY StatusAktivDsn_ID");
                                while($w=mysql_fetch_array($tampil)){
                                  if ($r[StatusDosen_ID]==$w[StatusAktivDsn_ID]){
                                    echo "<option value=$w[StatusAktivDsn_ID] selected>$w[StatusAktivDsn_ID] - $w[Nama]</option>";
                                  }
                                  else{
                                    echo "<option value=$w[StatusAktivDsn_ID]>$w[StatusAktivDsn_ID] - $w[Nama]</option>";
                                  }
                                }                                
                        echo "</select></td></tr>
                      <tr><td class=cc>Status Kerja</td>    <td class=cb>      <select name='StatusKerja_ID'>
                                <option value=0 selected>- Pilih Status Kerja -</option>";
                                $tampil=mysql_query("SELECT * FROM statuskerja ORDER BY StatusKerja_ID");
                                while($w=mysql_fetch_array($tampil)){
                                  if ($r[StatusKerja_ID]==$w[StatusKerja_ID]){
                                    echo "<option value=$w[StatusKerja_ID] selected>$w[StatusKerja_ID] - $w[Nama]</option>";
                                  }
                                  else{
                                  echo "<option value=$w[StatusKerja_ID]>$w[StatusKerja_ID] - $w[Nama]</option>";
                                  }
                                }                                
                        echo "</select></td></tr>
                      <tr><td class=cc>Prodi Homebase</td>    <td class=cb>      <input type=text size=10 name='Homebase' value='$r[Homebase]'>
                      <tr><td class=cc>Kode Instansi Induk</td>    <td class=cb><input type=text name='InstitusiInduk' value='$r[InstitusiInduk]'></td></tr>
                      <tr><td class=cc>Jenjang Penddk. Tertinggi</td>    <td class=cb>      <select name='Jenjang_ID'>
                                <option value=0 selected>- Pilih Kategori -</option>";
                                $tampil=mysql_query("SELECT * FROM jenjang ORDER BY Jenjang_ID");
                                while($w=mysql_fetch_array($tampil)){
                                  if ($r[Jenjang_ID]==$w[Jenjang_ID]){
                                    echo "<option value=$w[Jenjang_ID] selected>$w[Jenjang_ID] - $w[Nama]</option>";
                                  }
                                  else{
                                  echo "<option value=$w[Jenjang_ID]>$w[Jenjang_ID] - $w[Nama]</option>";
                                  }
                                }                                
                        echo "</select></td></tr>
                      <tr><td class=cc>Keilmuan</td>    <td class=cb><input type=text name='Keilmuan' size=50 value='$r[Keilmuan]'></td></tr>
                      <tr><td colspan=2></td></tr>
                    </table>";
                ?>      
              </ul>
              </span><? echo"<input type=submit value=Simpan class=tombol>"; ?>
            </div>
            <div class="panel" id="panel4" style="display: none;">
              <span>
              <ul>            
                <?php             
                    echo"  <table id=tablemodul>
                            <tr><td colspan=2><h3>Jabatan</h3></td></tr>
                            <tr><td class=cc>Jabatan Akademik</td>    <td class=cb><select name='Jabatan_ID'>
                                      <option value=0 selected>- Pilih Kategori -</option>";
                                      $tampil=mysql_query("SELECT * FROM jabatan ORDER BY Jabatan_ID");
                                while($w=mysql_fetch_array($tampil)){
                                  if ($r[Jabatan_ID]==$w[Jabatan_ID]){
                                    echo "<option value=$w[Jabatan_ID] selected>$w[Jabatan_ID] - $w[Nama]</option>";
                                  }
                                  else{
                                    echo "<option value=$w[Jabatan_ID]>$w[Jabatan_ID] - $w[Nama]</option>";
                                  } 
                                }
                              echo "</select></td></tr>
                            <tr><td class=cc>Jabatan Dikti</td>    <td class=cb><select name='JabatanDikti_ID'>
                                      <option value=0 selected>- Pilih Kategori -</option>";
                                      $tampil=mysql_query("SELECT * FROM jabatandikti ORDER BY JabatanDikti_ID");
                                while($w=mysql_fetch_array($tampil)){
                                  if ($r[JabatanDikti_ID]==$w[JabatanDikti_ID]){
                                    echo "<option value=$w[JabatanDikti_ID] selected>$w[JabatanDikti_ID] - $w[Nama]</option>";
                                  }
                                  else{
                                    echo "<option value=$w[JabatanDikti_ID]>$w[JabatanDikti_ID] - $w[Nama]</option>";
                                  } 
                                }
                              echo "</select></td></tr>
                            <tr><td colspan=2></td></tr></table>";
                ?>                    
              </ul>
              </span><? echo"<input type=submit value=Simpan class=tombol></form>"; ?>
            </div>            
            <div class="panel" id="panel5" style="display: none;">
              <span>
              <ul>            
                <?php
                  echo" <table id=tablemodul>
                        <tr><th>no</th><th>Gelar</th><th>Jenjang</th><th>Tanggal Lulus</th><th>Nama Perguruan Tinggi</th><th>Negara</th><th>Bidang Ilmu</th><th>Aksi</th></tr>"; 
                        $tampil=mysql_query("SELECT t1.*,t2.NIDN,t2.nama_lengkap,t3.Nama,t4.Nama AS Nm FROM dosenpendidikan t1, dosen t2, perguruantinggi t3, jenjang t4 WHERE t1.Dosen_ID=t2.NIDN AND t1.Dosen_ID='$_GET[gis]' AND t1.Jenjang_ID=t4.Jenjang_ID GROUP BY t1.DosenPendidikan_ID");
                        $no=1;
                        while ($ra=mysql_fetch_array($tampil)){
                        $tgl=tgl_indo($ra[TanggalIjazah]);                        
                           echo "<tr><td>$no</td>
                                 <td>$ra[Gelar]</td>
                                 <td>$ra[Nm]</td>
                                 <td>$tgl</td>
                                 <td>$ra[NamaPT]</td>
                                 <td>$ra[NamaNegara]</td>
                                 <td>$ra[BidangIlmu]</td>
                                 <td><a class='thickbox' href='msedtpdddsn.php?gis=$ra[DosenPendidikan_ID]&width=470&height=330'><img src=../img/edit.png></a> |
                                   <a href=\"?page=masterdosen&PHPIdSession=deldsnpdd&gos=$ra[DosenPendidikan_ID]\"
                                   onClick=\"return confirm('Apakah Anda benar-benar akan menghapus Gelar $ra[Gelar] $ra[nama_lengkap]?')\"><img src=../img/del.jpg></a>
                                  
                                 </td></tr>";
                          $no++;
                        }
                        echo "</table>                            
                        <form method=post action=?page=masterdosen&PHPIdSession=addpddDosn>
                        <table id=tablemodul>
                        <input type=hidden name=NIDN value='$r[NIDN]'>
                        <h3>Tambah Pendidikan</h3> 
                        <tr><td class=cc>No Urut</td>    <td class=cb> <input type=text name=Nomor size=10 value='$r[Nomor]'></td></tr>
                        <tr><td class=cc>Gelar</td>    <td class=cb>      <input type=text name=Gelar></td></tr>
                        <tr><td class=cc>Jenjang</td>    <td class=cb><select name=Jenjang_ID>
                                  <option value=0 selected>- Pilih Kategori -</option>";
                                  $tampil=mysql_query("SELECT * FROM jenjang ORDER BY Jenjang_ID");
                                  while($rc=mysql_fetch_array($tampil)){
                                    echo "<option value=$rc[Jenjang_ID]>$rc[Jenjang_ID] - $rc[Nama]</option>";
                                  }
                          echo "</select></td></tr>
                        <tr><td class=cc>Tanggal Lulus</td>    <td class=cb>";        
                                combotgl(1,31,'TglIjazah',Tgl);
                                combobln(1,12,'BlnIjazah',Bulan);
                                combotgl($thn_sekarang-50,$thn_sekarang+1,'ThnIjazah',Tahun);  
                          echo "</td></tr>
                        <tr><td class=cc>Kode P.T</td>   <td class=cb>  <input type=text name=PerguruanTinggi_ID size=30></td></tr>
                        <tr><td class=cc>Nama P.T</td>    <td class=cb>    <input type=text name=namapt size=60></td></tr>
                        <tr><td class=cc>Negara</td>  <td class=cb>    <input type=text name=Negara size=50></td></tr>
                        <tr><td class=cc>Benua</td>   <td class=cb><select name=KodeBenua>
                                  <option value=0 selected>- Pilih Kategori -</option>";
                                  $tampil=mysql_query("SELECT * FROM benua ORDER BY KodeBenua");
                                  while($rc=mysql_fetch_array($tampil)){
                                    echo "<option value=$rc[KodeBenua]>$rc[KodeBenua] - $rc[NamaBenua]</option>";
                                  }
                          echo "</select></td></tr>
                        <tr><td class=cc>Bidang Ilmu</td>   <td class=cb>   <input type=text name=BidangIlmu size=50></td></tr>
                        <tr><td colspan=2><input type=submit value=Simpan class=tombol></td></tr>
                      </table></form>";
                
                             
                ?>                    
              </ul>
              </span>
            </div>
            <div class="panel" id="panel6" style="display: none;">
              <span>
              <ul>            
                <?php 
                  echo" <table id=tablemodul>
                        <tr><th>no</th><th>Jabatan</th><th>Nama Institusi</th><th>Alamat Institusi</th><th>Kota</th><th>Kode Pos</th><th>Telepon</th><th>Fax</th><th>Aksi</th></tr>"; 
                        $tampil=mysql_query("SELECT t1.*,t2.nama_lengkap FROM dosenpekerjaan t1, dosen t2 WHERE t1.Dosen_ID=t2.NIDN AND t1.Dosen_ID='$_GET[gis]' GROUP BY t1.DosenPekerjaan_ID");
                        $no=1;
                        while ($ra=mysql_fetch_array($tampil)){
                           echo "<tr><td>$no</td>
                                 <td>$ra[Jabatan]</td>
                                 <td>$ra[Institusi]</td>
                                 <td>$ra[Alamat]</td>
                                 <td>$ra[Kota]</td>
                                 <td>$ra[Kodepos]</td>
                                 <td>$ra[Telepon]</td>
                                 <td>$ra[Fax]</td>
                                 <td><a class='thickbox' href='form/frmedtpkjdsn.php?gis=$ra[DosenPekerjaan_ID]&width=540&height=300'><img src=../img/edit.png></a> |                                 
                                   <a href=\"?page=masterdosen&PHPIdSession=deldsnpkj&gos=$ra[DosenPekerjaan_ID]\"
                                   onClick=\"return confirm('Apakah Anda benar-benar akan menghapus Pekerjaan $ra[Jabatan] $ra[nama_lengkap]?')\"><img src=../img/del.jpg></a>
                                  
                                 </td></tr>";
                          $no++;
                        }
                        echo "</table>
                       <form method=post action=?page=masterdosen&PHPIdSession=addpkjDosn>
                       <table id=tablemodul>
                        <input type=hidden name=NIDN value='$r[NIDN]'>
                        <h3>Tambah Pekerjaan</h3> 
                          <tr><td class=cc>Nama Institusi</td>    <td class=cb><input type=text name=Institusi size=30></td></tr>
                          <tr><td class=cc>Jabatan</td>    <td class=cb><input type=text name=Jabatan size=30></td></tr>
                          <tr><td class=cc>Alamat Institusi</td>    <td class=cb><input type=text name=Alamat size=60></td></tr>
                          <tr><td class=cc>Kota</td>    <td class=cb><input type=text name=Kota></td></tr>
                          <tr><td class=cc>Kodepos</td>    <td class=cb><input type=text name=Kodepos></td></tr>
                          <tr><td class=cc>Telepon</td>    <td class=cb><input type=text name=Telepon></td></tr>
                          <tr><td class=cc>Fax</td>    <td class=cb><input type=text name=Fax></td></tr>
                          <tr><td colspan=2><input type=submit value=Simpan class=tombol></td></tr>
                        </table></form>";               
                ?>                    
              </ul>
              </span>
            </div>
          </div> 
<?
}
?>
