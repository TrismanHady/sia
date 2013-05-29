<?php
// Bagian Home
if  ($_GET[page]=='home'){
 echo"<div id=groupmodul1>
        <table id=tablemodul>               
       <tr><th>Pendahuluan</th></tr>"; 
                $sql=mysql_query("SELECT * FROM beritaawal WHERE aktif='Y'");
                while($data=mysql_fetch_array($sql)){  
                echo "<tr><td>";
             		if ($data[gambar]!=''){
            			echo "<img src='img/$data[gambar]' width=180 height=160 hspace=10 border=0 align=left>";
            		}
            		$kalimat=strtok(nl2br($data[isi])," ");
                for ($i=1;$i<=100;$i++){
                  echo ($kalimat);
                  echo (" "); 
                  $kalimat=strtok(" "); 
                  }  
                }
   echo"</td></tr></table></div>";
  }

elseif ($_GET[page]=='profil'){
 echo"<div id=groupmodul1>
        <table id=tablemodul>               
       <tr><th>Profil</th></tr>"; 
                $sql=mysql_query("SELECT * FROM profil WHERE aktif='Y'");
                while($data=mysql_fetch_array($sql)){  
                echo "<tr><td>";
             		if ($data[gambar]!=''){
            			echo "<img src='img/$data[gambar]' width=180 height=160 hspace=10 border=0 align=left>";
            		}
            		$kalimat=strtok(nl2br($data[isi])," ");
                for ($i=1;$i<=100;$i++){
                  echo ($kalimat);
                  echo (" "); 
                  $kalimat=strtok(" "); 
                  }  
                }
   echo"</td></tr></table></div>";
}

elseif ($_GET[page]=='visimisi'){
 echo"<div id=groupmodul1>
        <table id=tablemodul>               
       <tr><th>VISI DAN MISI</th></tr>"; 
                $sql=mysql_query("SELECT * FROM visimisi WHERE aktif='Y'");
                while($data=mysql_fetch_array($sql)){  
                echo "<tr><td>";
             		if ($data[gambar]!=''){
            			echo "<img src='img/$data[gambar]' width=180 height=160 hspace=10 border=0 align=left>";
            		}
            		$kalimat=strtok(nl2br($data[isi])," ");
                for ($i=1;$i<=100;$i++){
                  echo ($kalimat);
                  echo (" "); 
                  $kalimat=strtok(" "); 
                  }  
                }
   echo"</td></tr></table></div>";
}

elseif ($_GET[page]=='fasilitas'){
 echo"<div id=groupmodul1>
        <table id=tablemodul>               
       <tr><th>FASILITAS</th></tr>"; 
                $sql=mysql_query("SELECT * FROM fasilitas WHERE aktif='Y'");
                while($data=mysql_fetch_array($sql)){  
                echo "<tr><td>";
             		if ($data[gambar]!=''){
            			echo "<img src='img/$data[gambar]' width=180 height=160 hspace=10 border=0 align=left>";
            		}
            		$kalimat=strtok(nl2br($data[isi])," ");
                for ($i=1;$i<=100;$i++){
                  echo ($kalimat);
                  echo (" "); 
                  $kalimat=strtok(" "); 
                  }  
                }
   echo"</td></tr></table></div>";
}

elseif ($_GET[page]=='pasca'){
 echo"<div id=groupmodul1>
        <table id=tablemodul>               
       <tr><th>PASCASARJANA</th></tr>"; 
                $sql=mysql_query("SELECT * FROM pasca WHERE aktif='Y'");
                while($data=mysql_fetch_array($sql)){  
                echo "<tr><td>";
             		if ($data[gambar]!=''){
            			echo "<img src='img/$data[gambar]' width=180 height=160 hspace=10 border=0 align=left>";
            		}
            		$kalimat=strtok(nl2br($data[isi])," ");
                for ($i=1;$i<=100;$i++){
                  echo ($kalimat);
                  echo (" "); 
                  $kalimat=strtok(" "); 
                  }  
                }
   echo"</td></tr></table></div>";
}

elseif ($_GET[page]=='strata'){
 echo"<div id=groupmodul1>
        <table id=tablemodul>               
       <tr><th>STRATA</th></tr>"; 
                $sql=mysql_query("SELECT * FROM strata WHERE aktif='Y'");
                while($data=mysql_fetch_array($sql)){  
                echo "<tr><td>";
             		if ($data[gambar]!=''){
            			echo "<img src='img/$data[gambar]' width=180 height=160 hspace=10 border=0 align=left>";
            		}
            		$kalimat=strtok(nl2br($data[isi])," ");
                for ($i=1;$i<=100;$i++){
                  echo ($kalimat);
                  echo (" "); 
                  $kalimat=strtok(" "); 
                  }  
                }
   echo"</td></tr></table></div>";
}


elseif ($_GET[page]=='pmb'){
 echo"<div id=groupmodul1>
        <table id=tablemodul>               
       <tr><th>Penerimaan Mahasiswa Baru</th></tr>"; 
                $sql=mysql_query("SELECT * FROM pmb WHERE aktif='Y'");
                while($data=mysql_fetch_array($sql)){  
                echo "<tr><td>";
             		if ($data[gambar]!=''){
            			echo "<img src='img/$data[gambar]' width=1000 height=707 hspace=10 border=0 align=left>";
            		}
            		$kalimat=strtok(nl2br($data[isi])," ");
                for ($i=1;$i<=100;$i++){
                  echo ($kalimat);
                  echo (" "); 
                  $kalimat=strtok(" "); 
                  }  
                }
   echo"</td></tr></table></div>";
}

elseif ($_GET[page]=='kegiatan'){
 echo"<div id=groupmodul1>
        <table id=tablemodul>               
       <tr><th>KEGIATAN</th></tr>"; 
                $sql=mysql_query("SELECT * FROM kegiatan WHERE aktif='Y'");
                while($data=mysql_fetch_array($sql)){  
                echo "<tr><td>";
             		if ($data[gambar]!=''){
            			echo "<img src='img/$data[gambar]' width=1000 height=707 hspace=10 border=0 align=left>";
            		}
            		$kalimat=strtok(nl2br($data[isi])," ");
                for ($i=1;$i<=100;$i++){
                  echo ($kalimat);
                  echo (" "); 
                  $kalimat=strtok(" "); 
                  }  
                }
   echo"</td></tr></table></div>";
}

elseif ($_GET[page]=='download'){
 echo"<div id=groupmodul1>
        <table id=tablemodul>               
       <tr><th>DOWNLOAD</th></tr>"; 
                $sql=mysql_query("SELECT * FROM download WHERE aktif='Y'");
                while($data=mysql_fetch_array($sql)){  
                echo "<tr><td>";
             		if ($data[gambar]!=''){
            			echo "<img src='img/$data[gambar]' width=180 height=160 hspace=10 border=0 align=left>";
            		}
            		$kalimat=strtok(nl2br($data[isi])," ");
                for ($i=1;$i<=100;$i++){
                  echo ($kalimat);
                  echo (" "); 
                  $kalimat=strtok(" "); 
                  }  
                }
   echo"</td></tr></table></div>";
}

elseif ($_GET[page]=='beasiswa'){
 echo"<div id=groupmodul1>
        <table id=tablemodul>               
       <tr><th>BEASISWA</th></tr>"; 
                $sql=mysql_query("SELECT * FROM beasiswa WHERE aktif='Y'");
                while($data=mysql_fetch_array($sql)){  
                echo "<tr><td>";
             		if ($data[gambar]!=''){
            			echo "<img src='img/$data[gambar]' width=1000 height=707 hspace=10 border=0 align=left>";
            		}
            		$kalimat=strtok(nl2br($data[isi])," ");
                for ($i=1;$i<=100;$i++){
                  echo ($kalimat);
                  echo (" "); 
                  $kalimat=strtok(" "); 
                  }  
                }
   echo"</td></tr></table></div>";
}

elseif  ($_GET[page]=='login'){
  echo"<div id='groupmodul1'>
    <table id=tablemodul>
        <form method='POST' action='ceck.php'>    
        <tr>
        <td rowspan=4><img src=img/login.png width=150 height=130  align=left></td>       
        <td>NIP/No BP</td><td> : <input type='text' name='username' id=username title='isi no bp atau nik dengan benar'></td></tr>
        <tr><td>Level</td><td> : <select name='id_level'>
                                    <option value=0 selected></option>";
                                    $sql=mysql_query("SELECT * FROM level ORDER BY id_level");
                                    while($data=mysql_fetch_array($sql)){
                                    echo "<option value=$data[id_level]>$data[id_level] $data[level]</option>";
                                    }
        echo "</select></td></tr>
        <tr><td>Password</td><td> : <input type='password' name='password' id=password title='isikan password anda dengan benar'></td></tr>
        <tr><td><input type='submit' value='Login'>
            <td><input type='reset' value='Reset'></td></td></tr>
           
        </form></table></div>";
}

elseif ($_GET[page]=='CekLogin'){
$level= $_REQUEST['id_level'];
$pass=md5($_POST[password]);
if ($level==1) $tbl = 'admin';
	elseif ($level==2) $tbl = 'dosen';
	elseif ($level==3) $tbl = 'karyawan';
	elseif ($level==4) $tbl = 'mahasiswa';
	else header('location:media.php?page=login');
$login=mysql_query("SELECT * FROM $tbl WHERE username='$_POST[username]' AND password='$pass'")or die ("SQL Error:".mysql_error());
$ketemu=mysql_num_rows($login);
$data=mysql_fetch_array($login);

if ($ketemu > 0){
  session_start();
  session_register("username");
  session_register("password");
  session_register("id_level");

  $_SESSION[username] = $data[username];
  $_SESSION[password] = $data[password];
    $_SESSION[id_level] = $data[id_level];
  header('location:system/media.php?page=home');
}
else{
echo"<div id=groupmodul1>
  <table width=301 border=0 cellspacing=0 cellpadding=0>
    <tr>
      <td align='center' bgcolor='#FF0000'><div id='font-error'>Kesalahan</div></td>
    </tr>
    <tr>
      <td align='center'>Maaf..!!,silakan periksa kembali data yang anda inputkan, pastikan data yang anda masukkan benar.</td>
    </tr>
  </table>
    <table id=tablemodul>
        <form method='POST' action='ceck.php'>    
        <tr>
        <td rowspan=4><img src=img/login.png width=150 height=130  align=left></td>       
        <td>NIP/No BP</td><td> : <input type='text' name='username' id=username title='isi no bp atau nik dengan benar'></td></tr>
        <tr><td>Level</td><td> : <select name='id_level'>
                                    <option value=0 selected></option>";
                                    $sql=mysql_query("SELECT * FROM level ORDER BY id_level");
                                    while($data=mysql_fetch_array($sql)){
                                    echo "<option value=$data[id_level]>$data[id_level] $data[level]</option>";
                                    }
        echo "</select></td></tr>
        <tr><td>Password</td><td> : <input type='password' name='password' id=password title='isikan password anda dengan benar'></td></tr>
        <tr><td><input type='submit' value='Login'>
            <td><input type='reset' value='Reset'></td></td></tr>
           
        </form></table></div>";

}
}
 
?>

