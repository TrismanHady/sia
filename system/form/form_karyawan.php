<?php
function defaultkaryawan(){
echo"<div id=headermodul>Manajemen Admin Karyawan</div>
      <div id=groupmodul1>
      <table id=tablemodul1>
        <tr>
          <td bgcolor=#265180><form method=post action=?page=AdminKaryawan&PHPIdSession=CariNamaKaryawan>
            Cari : 
            <input type=text name=nama_lengkap>
            <input type=submit value=Cari_Nama>
          </form></td>
          <td bgcolor=#C0DCC0><form method=post action=?page=AdminKaryawan>
            <input type=submit value=Tampil_semua>
          </form></td>
        </tr>
      </table></div>      
        
      </select></td></tr></div>
      <div id=groupmodul1><a href='?page=AdminKaryawan&PHPIdSession=TambahAdminKaryawan'>Tambah Adm Krywn</div></a>
  
      <div id=groupmodul1><table id=tablemodul>
      <tr><th>Modul</th><th>Nama</th><th>Keterangan</th><th>Nama Lengkap</th><th>E-mail</th><th>Telepon</th><th>Aktif</th><th>Aksi</th></tr>"; 
      $sql="SELECT * FROM karyawan ORDER BY id";
    	$qry= mysql_query($sql)
    	or die ();
    	while ($data=mysql_fetch_array($qry)){
    	$no++;
         echo "<tr><input type=hidden name=id_level value='$data[id_level]'>               
               <td align=center><a href=?page=AdminKaryawan&PHPIdSession=CariModulKaryawan&id=$data[id]><img src=../img/modul.png></a></td>               
               <td><a href='?page=AdminKaryawan&PHPIdSession=EditAdminKaryawan&id=$data[id]'>$data[username]</a></td>
  		         <td>$data[keterangan]</td>
  		         <td>$data[nama_lengkap]</td>
  		         <td>$data[email]</td>
  		         <td>$data[telepon]</td>
  		         <td align=center>$data[aktif]</td>
               <td><a href=?page=AdminKaryawan&PHPIdSession=HapusAdminKaryawan&id=$data[id]>Hapus</a>
               </td></tr>";
        
      }
      echo "</table></div>";
}

function carinamakaryawan(){
      echo"<div id=headermodul>Manajemen Admin Karyawan</div>
            <div id=groupmodul1>
            <table id=tablemodul1>
              <tr>
                <td bgcolor=#265180><form method=post action=?page=AdminKaryawan&PHPIdSession=CariNamaKaryawan>
                  Cari : 
                  <input type=text name=nama_lengkap>
                  <input type=submit value=Cari_Nama>
                </form></td>
                <td bgcolor=#C0DCC0><form method=post action=?page=AdminKaryawan>
                  <input type=submit value=Tampil_semua>
                </form></td>
              </tr>
            </table></div>      
              
            </select></td></tr></div>
            <div id=groupmodul1><a href='?page=AdminKaryawan&PHPIdSession=TambahAdminKaryawan'>Tambah Adm Krywn</div>
  

            <div id=groupmodul1><table id=tablemodul>
            <tr><th>Modul</th><th>Nama</th><th>Keterangan</th><th>Nama Lengkap</th><th>E-mail</th><th>Telepon</th><th>Aktif</th><th>Aksi</th></tr>"; 
            $sql="SELECT * FROM karyawan WHERE nama_lengkap LIKE '%$_POST[nama_lengkap]%' ORDER BY id";
          	$qry= mysql_query($sql)
          	or die ();
          	while ($data=mysql_fetch_array($qry)){
          	$no++;
               echo "<tr>                     
                     <td align=center><a href=?page=AdminKaryawan&PHPIdSession=CariModulKaryawan&id=$data[id]><img width=20 height=20></a></td>               
                     <td><a href='?page=AdminKaryawan&PHPIdSession=EditAdminKaryawan&id=$data[id]'>$data[username]</a></td>
        		         <td>$data[keterangan]</td>
        		         <td>$data[nama_lengkap]</td>
        		         <td>$data[email]</td>
        		         <td>$data[telepon]</td>
        		         <td align=center>$data[aktif]</td>
                     <td><a href=?page=AdminKaryawan&PHPIdSession=HapusAdminKaryawan&id=$data[id]>Hapus</a>
                     </td></tr>";
              
            }
            echo "</table></div>";

}

function editkaryawan(){
    $edit=mysql_query("SELECT * FROM karyawan WHERE id='$_GET[id]'");
    $data=mysql_fetch_array($edit);

    echo"<div id=headermodul>Edit Admin Karyawan</div>
          <form method=POST action=?page=AdminKaryawan&PHPIdSession=UpdateKaryawan>
          <input type=hidden name=id value='$data[id]'>
          <div id=groupmodul><table id=tablemodul>
          <tr><td class=cc>ID</td>           <td><input type=text name=id disabled=disable size=2 value='$data[id]'></td></tr>
          <tr><td class=cc>Username</td>     <td><input type=text name=username  value='$data[username]'></td></tr>
          <tr><td class=cc>Password</td>     <td><input type=password name=password size=20'></td></tr>
          <tr><td class=cc>Keterangan</td>   <td><input type=text name=keterangan size=30  value='$data[keterangan]'></td></tr>
          <tr><td class=cc>Nama Lengkap</td> <td><input type=text name=nama_lengkap size=30  value='$data[nama_lengkap]'></td></tr>
           <tr><td class=cc>Identitas</td>  <td>  <select name='identitas'>
                <option value=0 selected>- Pilih Jurusan -</option>"; 
          $tampil=mysql_query("SELECT * FROM identitas ORDER BY Identitas_ID");
          while($w=mysql_fetch_array($tampil)){
            if ($data[Identitas_ID]==$w[Identitas_ID]){
              echo "<option value=$w[Identitas_ID] selected>$w[Identitas_ID] -- $w[Nama_Identitas]</option>";
            }
            else{
              echo "<option value=$w[Identitas_ID]>$w[Identitas_ID] -- $w[Nama_Identitas]</option>";
            }
          }
          echo "</select></td></tr>
           <tr><td class=cc>Jurusan</td>  <td>  <select name='jurusan'>
                <option value=0 selected>- Pilih Jurusan -</option>"; 
          $tampil=mysql_query("SELECT * FROM jurusan ORDER BY jurusan_ID");
          while($w=mysql_fetch_array($tampil)){
            if ($data[kode_jurusan]==$w[kode_jurusan]){
              echo "<option value=$w[kode_jurusan] selected>$w[kode_jurusan] -- $w[nama_jurusan]</option>";
            }
            else{
              echo "<option value=$w[kode_jurusan]>$w[kode_jurusan] -- $w[nama_jurusan]</option>";
            }
          }
          echo "</select></td></tr>
          <tr><td class=cc>Email</td>        <td><input type=text name=email size=30  value='$data[email]'></td></tr>
          <tr><td class=cc>Telepon</td>      <td><input type=text name=telepon size=30  value='$data[telepon]'></td></tr>";
          if ($data[aktif]=='Y'){
              echo "<tr><td class=cc>Aktif</td>    <td><input type=radio name=aktif value=Y checked>Y
                                                                              <input type=radio name=aktif value=N>N</td></tr>";
          }
          else{
              echo "<tr><td class=cc>Aktif</td>    <td><input type=radio name=aktif value=Y>Y
                                                                              <input type=radio name=aktif value=N checked>N</td></tr>";
          }
              echo"<tr><td colspan=2><input type=submit value=Update class=tombol>                    
                       <input type=button value=Batal class=tombol onclick=self.history.back()></td></tr>
          </table></div></form>";
}

function carimodulkaryawan(){
      echo"<div id=headermodul>Manajemen Modul Karyawan</div>
            <div id=groupmodul>";
            echo"<table id=tablemodul><tr><th colspan=3>Data Krywn</th></tr>";            
            $sql="SELECT * FROM karyawan WHERE id='$_GET[id]' ORDER BY id";
          	$qry= mysql_query($sql)
          	or die ();
          	while ($data=mysql_fetch_array($qry)){
          	$no++;
            echo" <input type=hidden name=id_level value=$data[id_level]>
                  <tr><td colspan=1>Nama Lengkap</td>  <td>$data[nama_lengkap]</td></tr>
                  <tr><td>Keterangan</td>    <td>$data[keterangan]</td></tr>
                  <tr><td>Telepon</td>       <td>$data[telepon]</td></tr>
                  <tr><td>Aktif</td>         <td>$data[aktif]</td></tr>
                  <form name=form1 method=post action='?page=AdminKaryawan'>
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
         echo "<form method=post action='?page=AdminKaryawan&PHPIdSession=InputModulKarywan'>";
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


function tambahkaryawan(){
    echo"<div id=headermodul>Tambah Admin Karyawan</div>
          <form name='form1' method='post' action=?page=AdminKaryawan&PHPIdSession=TambahKaryawan>
          <div id=groupmodul1><table id=tablemodul>
               
          <tr><td class=cc>Username</td>       <td><input type=text name=username></td></tr>                  
          <tr><td class=cc>Password</td>       <td><input type=password name=password></td></tr>
          <tr><td class=cc>Keterangan</td>     <td><input type=text name=keterangan size=50></td></tr>
          <tr><td class=cc>Nama Lengkap</td>   <td><input type=text name=nama_lengkap></td></tr>
          <tr><td class=cc>Identitas</td>  <td> 
          <select name='identitas'>
            <option value=0 selected>- Pilih Identitas -</option>";
            $tampil=mysql_query("SELECT * FROM identitas ORDER BY Identitas_ID");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[Identitas_ID]>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";
            }
    echo" <tr><td class=cc>Jurusan</td>  <td> 
          <select name='jurusan'>
            <option value=0 selected>- Pilih Jurusan -</option>";
            $tampil=mysql_query("SELECT * FROM jurusan ORDER BY jurusan_ID");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[kode_jurusan]>$r[kode_jurusan] -- $r[nama_jurusan]</option>";
            }
    echo "</select></td></tr> 
          <tr><td class=cc>Email</td>          <td><input type=text name=email></td></tr>
          <tr><td class=cc>Telepon</td>        <td><input type=text name=telepon></td></tr>
          <tr><td class=cc>Status</td>         <td><input type=radio name=aktif value=Y>Y 
                                                                          <input type=radio name=aktif value=N>N  </td></tr>                

          <tr><td colspan=2 align=center><input type=submit value=Simpan class=tombol>
                                         <input type=reset value=Reset class=tombol>
                                         <input type=button value=Batal class=tombol onclick=self.history.back()></td></tr>              
          </div></table></form></div>";
}

?>
