<?php
function defaultuser(){
echo" <div id=headermodul>Manajemen Admin User</div>
      <div id=groupmodul1><table id=tablemodul1>
      <tr><td bgcolor=#265180><form method=post action=?page=AdminUser&PHPIdSession=CariNamaUser>   Cari : <input type=text name=nama_lengkap>
            <input type=submit value=Cari_Nama>
          </form></td>
          <td bgcolor=#C0DCC0><form method=post action=?page=AdminUser>       <input type=submit value=Tampil_semua>
          </form></td></tr>
      </table></div>        
      </select></td></tr></div>
      <div id=groupmodul1><a href='?page=AdminUser&PHPIdSession=TambahAdminUser'>Tambah Admin User</a></div>  
      <div id=groupmodul1><table id=tablemodul>
      <tr><th>Modul</th><th>Nama</th><th>Keterangan</th><th>Nama Lengkap</th><th>E-mail</th><th>Telepon</th><th>Aktif</th><th>Aksi</th></tr>"; 
      $sql="SELECT * FROM admin ORDER BY id";
    	$qry= mysql_query($sql)
    	or die ("SQL Error:".mysql_error());
    	while ($data=mysql_fetch_array($qry)){
    	$no++;
echo" <tr><input type=hidden name=id_level value=$data[id_level]>               
               <td align=center><a href=?page=AdminUser&PHPIdSession=CariModulUser&id=$data[id]><img src=../img/modul.png></a></td>               
               <td><a href=?page=AdminUser&PHPIdSession=EditAdminUser&id=$data[id]>$data[username]</a></td>
  		         <td>$data[keterangan]</td>
  		         <td>$data[nama_lengkap]</td>
  		         <td>$data[email]</td>
  		         <td>$data[telepon]</td>
  		         <td align=center>$data[aktif]</td>
               <td><a href=?page=AdminUser&PHPIdSession=HapusAdminUser&id=$data[id]>Hapus</a>
               </td></tr>";        
       } 
echo" </table></div>";      
}

function carinamauser(){
      echo"<div id=headermodul>Manajemen Admin User</div>
            <div id=groupmodul1> <table id=tablemodul1>
              <tr><td bgcolor=#265180><form method=post action=?page=AdminUser&PHPIdSession=CariNamaUser>  Cari :  <input type=text name=nama_lengkap>
                  <input type=submit value=Cari_Nama>
                </form></td>
                <td bgcolor=#C0DCC0><form method=post action=?page=AdminUser>  <input type=submit value=Tampil_semua>
                </form></td></tr>
            </table></div>   
            </select></td></tr></div>
            <div id=groupmodul1><a href='?page=AdminUser&PHPIdSession=TambahAdminUser'>Tambah Admin User</div>
            <div id=groupmodul1><table id=tablemodul>
            <tr><th>Modul</th><th>Nama</th><th>Keterangan</th><th>Nama Lengkap</th><th>E-mail</th><th>Telepon</th><th>Aktif</th><th>Aksi</th></tr>"; 
            $sql="SELECT * FROM admin WHERE nama_lengkap LIKE '%$_POST[nama_lengkap]%' ORDER BY id";
          	$qry= mysql_query($sql)
          	or die ("SQL Error:".mysql_error());
          	while ($data=mysql_fetch_array($qry)){
          	$no++;
               echo "<tr>                     
                     <td align=center><a href=?page=AdminUser&PHPIdSession=CariModulUser&id=$data[id]><img width=20 height=20></a></td>               
                     <td><a href='?page=AdminUser&PHPIdSession=EditAdminUser&id=$data[id]'>$data[username]</a></td>
        		         <td>$data[keterangan]</td>
        		         <td>$data[nama_lengkap]</td>
        		         <td>$data[email]</td>
        		         <td>$data[telepon]</td>
        		         <td align=center>$data[aktif]</td>
                     <td><a href=?page=AdminUser&PHPIdSession=HapusAdminUser&id=$data[id]>Hapus</a>
                     </td></tr>";              
            }
            echo "</table></div>";
}

function carimoduluser(){
    echo"<div id=headermodul>Manajemen Modul User</div>
          <div id=groupmodul>";
          echo"<table id=tablemodul><tr><th colspan=3>Data Admin</th></tr>";            
          $sql="SELECT * FROM admin WHERE id='$_GET[id]' ORDER BY id";
          $qry= mysql_query($sql)
          or die ("SQL Error:".mysql_error());
          while ($data=mysql_fetch_array($qry)){
          echo" <input type=hidden name=id_level value=$data[id_level]>
                <tr><td colspan=1>Nama Lengkap</td>  <td>$data[nama_lengkap]</td></tr>
                <tr><td>Keterangan</td>    <td>$data[keterangan]</td></tr>
                <tr><td>Telepon</td>       <td>$data[telepon]</td></tr>
                <tr><td>Aktif</td>         <td>$data[aktif]</td></tr>
                <tr>
                <form name=form1 method=post action='?page=AdminUser'>
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
    	    or die ("SQL Error:".mysql_error());
          while ($data=mysql_fetch_array($qry)){
          $no++;
          echo "<tr>";
          echo "<form method=post action='?page=AdminUser&PHPIdSession=InputModulUser'>";
          $sqlr="SELECT * FROM hakmodul WHERE id_level=$id_level AND id=$data[id]";
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
          echo "<input type=hidden name=id_level value=$id_level>
               <td bgcolor=$bg>$data[nama]</td>           
               <td bgcolor=$bg><input name=CekModul[] type=checkbox value=$data[id] $cek></td></tr>";
          }
          echo "</table></div>";
          echo"<div id=groupmodul1><table id=tablemodul>";
          echo"<tr><th>Modul</th><th>Modul</th><th>Keterangan</th><th>Aksi</th></tr>"; 
          $sql="SELECT  t2.id_group AS id_group,
                        t1.id AS id,
                        t1.parent_id AS parent_id,
                        t2.nama AS nama,
                        t1.judul AS judul,
                        t1.aktif AS aktif,
                        t1.url AS url,
                        t1.keterangan AS keterangan 
                FROM   dropdownsystem t1 , groupmodul t2 
                WHERE  t1.parent_id = t2.relasi_modul
                ORDER BY  t2.id_group";
	    $qry= mysql_query($sql)
	    or die ("SQL Error:".mysql_error());
      while ($data=mysql_fetch_array($qry)){
      $no++;
         echo "<tr>";

         $sqlr="SELECT * FROM hakmodul WHERE id_level='$id_level' AND id='$data[id]'";
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
         echo "<input type=hidden name=id_level value=$id_level>
               <td bgcolor=$bg>$data[nama]</td>              
               <td bgcolor=$bg>$data[judul]</td>
  		         <td bgcolor=$bg>$data[keterangan]</td>
               <td bgcolor=$bg><input name=CekModul[] type=checkbox value=$data[id] $cek></td>
      </tr>";
      }
        echo " <td colspan=4 align=center><input type=submit name=submit value=Simpan></form></table></div>";
}

function tambahuser(){
     echo"<div id=headermodul>Tambah Admin User</div>
          <form id='form1' name='form1' method='post' action=?page=AdminUser&PHPIdSession=TambahUser>
          <div id=groupmodul1><table id=tablemodul1>              
          <tr><td bgcolor=#265180>Username</td>       <td bgcolor=#C0DCC0><input type=text name=username></td></tr>                  
          <tr><td bgcolor=#265180>Password</td>       <td bgcolor=#C0DCC0><input type=password name=password></td></tr>
          <tr><td bgcolor=#265180>Keterangan</td>     <td bgcolor=#C0DCC0><input type=text name=keterangan size=50></td></tr>
          <tr><td bgcolor=#265180>Nama Lengkap</td>   <td bgcolor=#C0DCC0><input type=text name=nama_lengkap></td></tr>
          <tr><td bgcolor=#265180>Email</td>          <td bgcolor=#C0DCC0><input type=text name=email></td></tr>
          <tr><td bgcolor=#265180>Telepon</td>        <td bgcolor=#C0DCC0><input type=text name=telepon></td></tr>
          <tr><td bgcolor=#265180>Status</td>         <td bgcolor=#C0DCC0><input type=radio name=aktif value=Y>Y 
                                                                          <input type=radio name=aktif value=N>N  </td></tr>           
          <tr><td colspan=2 align=center><input type=submit value=Simpan>
                                         <input type=reset value=Reset>
                                         <input type=button value=Batal onclick=self.history.back()></td></tr>
              
          </div></table></form></div>";
}

function edituser(){
    $edit=mysql_query("SELECT * FROM admin WHERE id='$_GET[id]'");
    $data=mysql_fetch_array($edit);

    echo"<div id=headermodul>Edit Admin User</div>
          <form method=POST action=?page=AdminUser&PHPIdSession=UpdateUser>
          <input type=hidden name=id value='$data[id]'>
          <div id=groupmodul><table id=tablemodul1>
          <tr><td bgcolor=#265180>ID</td>           <td bgcolor=#C0DCC0><input type=text name=id disabled=disable size=2 value='$data[id]'></td></tr>
          <tr><td bgcolor=#265180>Username</td>     <td bgcolor=#C0DCC0><input type=text name=username  value='$data[username]'></td></tr>
          <tr><td bgcolor=#265180>Password</td>     <td bgcolor=#C0DCC0><input type=password name=password size=20'></td></tr>
          <tr><td bgcolor=#265180>Keterangan</td>   <td bgcolor=#C0DCC0><input type=text name=keterangan size=30  value='$data[keterangan]'></td></tr>
          <tr><td bgcolor=#265180>Nama Lengkap</td> <td bgcolor=#C0DCC0><input type=text name=nama_lengkap size=30  value='$data[nama_lengkap]'></td></tr>
          <tr><td bgcolor=#265180>Email</td>        <td bgcolor=#C0DCC0><input type=text name=email size=30  value='$data[email]'></td></tr>
          <tr><td bgcolor=#265180>Telepon</td>      <td bgcolor=#C0DCC0><input type=text name=telepon size=30  value='$data[telepon]'></td></tr>";
          if ($data[aktif]=='Y'){
              echo "<tr><td bgcolor=#265180>Aktif</td>    <td bgcolor=#C0DCC0><input type=radio name=aktif value=Y checked>Y
                                                                              <input type=radio name=aktif value=N>N</td></tr>";
          }
          else{
              echo "<tr><td bgcolor=#265180>Aktif</td>    <td bgcolor=#C0DCC0><input type=radio name=aktif value=Y>Y
                                                                              <input type=radio name=aktif value=N checked>N</td></tr>";
          }
              echo"</form><tr><td colspan=1><input type=submit value=Update>
                       <form method=POST action=?page=AdminUser>
                       <td colspan=1><input type=submit value=Kembali></td></tr>
          </table></div></form>";
}
?>
