<?
    $edit=mysql_query("SELECT * FROM karyawan WHERE username='$_SESSION[username]'");
    $data=mysql_fetch_array($edit);
switch($_GET[PHPIdSession]){

  default:
    echo"<div id=headermodul>Registrasi Ulang Mahasiswa</div>
           <form method=post  action='?page=levelakademikregmhs&PHPIdSession=CariMahasiswa'>
              <div id=groupmodul1><table id=tablemodul>   
                <tr><td class=cc>Tahun</td><td class=cb>              <input type=text name=tahun size=5></td>           
                    <td rowspan=6 valign=top><input type=submit value=Refresh class=tombol></td></tr>
                <tr><td class=cc>NIM</td><td class=cb>                <input type=text name=NIM ></td></tr>
                <tr><td class=cc>Nama</td><td class=cb>               </td></tr>
                <tr><td class=cc>Jurusan</td><td class=cb>            </td></tr>
                <tr><td class=cc>Program Studi</td><td class=cb>     </td></tr>
                <tr><td class=cc>Pembimbing Akademik</td><td class=cb></td></tr>
            </table></div></form>";   

  break;
    
  case "CariMahasiswa":
  $sql="SELECT * FROM view_form_mhsakademik WHERE kode_jurusan='$data[kode_jurusan]' AND NIM='$_POST[NIM]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  $ab=mysql_num_rows($qry);
  $data1=mysql_fetch_array($qry);
  $no++;

  echo"<div id=headermodul>Registrasi Ulang Mahasiswa</div>
        <form  method=post  action='?page=levelakademikregmhs&PHPIdSession=CariMahasiswa'>
          <div id=groupmodul1><table id=tablemodul>
            <tr><td class=cc>Tahun</td><td class=cb>            <input type=text name=tahun size=5 value='$_POST[tahun]'></td>           
                <td rowspan=6 valign=top><input type=submit value=Refresh class=tombol></td>
                <td rowspan=6 valign=top><img alt='galeri' src='foto_mhs/$data1[foto]' height=150/></td></tr>
            <tr><td class=cc>NIM</td><td class=cb>                <input type=text name=NIM value='$data1[NIM]'></td></tr>
            <tr><td class=cc>Nama</td><td class=cb>             <strong> $data1[nama_lengkap]</td></tr>
            <tr><td class=cc>Jurusan</td><td class=cb>            <input type=hidden name=kode_jurusan value='$data1[kode_jurusan]'>
                                  <strong> $data1[kode_jurusan] - $data1[nama_jurusan]</td></tr>
            <tr><td class=cc>Program Studi</td><td class=cb>       <strong>$data1[Program_ID] - $data1[nama_program]</td></tr>
            <tr><td class=cc>Pembimbing Akademik</td><td class=cb> <strong>$data1[pembimbing], $data1[Gelar]</td></tr>
        </table></form>";
  echo"   <table id=tablemodul>
            <tr><th>No</th><th>Tahun Akd</th><th>Tanggal Reg</th><th>Aktif</th><th>Registrasi</th><th>Hapus</th></tr>";
              $sql="SELECT * FROM tahun t1 WHERE t1.Tahun_ID='$_POST[tahun]' AND Jurusan_ID='$data[kode_jurusan]' AND Program_ID='$data1[ID]' AND t1.Aktif='Y'";
              $no=0;
              $qry=mysql_query($sql)
              or die ();
              while($data2=mysql_fetch_array($qry)){
              $no++;
          
                $sqlr="SELECT * FROM regmhs WHERE Tahun='$_POST[tahun]' AND NIM='$_POST[NIM]' AND aktif='Y'";
              	$qryr= mysql_query($sqlr);
              	$d=mysql_fetch_array($qryr);
              	$cocok=mysql_num_rows($qryr);
              	if ($cocok==1){    
                $bg="bfbfbf";
                $Aktif='Y';
                $disable='disabled';
                }
                else{
                $bg="FFFFFF";
                $Aktif='N';
                $disable='';
                }        
                echo"<form name=form1 method=post  action='?page=levelakademikregmhs&PHPIdSession=InputRegMhs'>
                      <input type=hidden name=NIM value='$_POST[NIM]'>  <input type=hidden name=NIM value='$_POST[NIM]'>
                      <input type=hidden name=tahun value='$_POST[tahun]'>
                      <input type=hidden name=Jurusan_ID value='$data1[kode_jurusan]'> <input type=hidden name=Identitas_ID value='$data2[Identitas_ID]'>
                      <tr><td align=center bgcolor=$bg> $no</td>
                          <td bgcolor=$bg>$data2[Tahun_ID]</td>";
                echo "<td align=center bgcolor=$bg>";echo date("d-M-Y");
                echo "</td> 
                      <td align=center bgcolor=$bg>$Aktif</td>
                      <td align=center bgcolor=$bg ><input type=submit value=Registrasi $disable></td> 
                <td align=center><a href='?page=levelakademikregmhs&PHPIdSession=delregmhs&gos=$d[ID_Reg]'><img src=../img/del.GIF></a></td>";                      
              }  
                echo"</tr></table></form></div>";
 
  break;
  

  case "InputRegMhs":
          $cek=mysql_num_rows(mysql_query("SELECT * FROM regmhs WHERE Tahun='$_POST[tahun]' AND NIM='$_POST[NIM]'"));
        if ($cek > 0){
        ?><script>alert('Data Anda Sudah Ada,\n.');</script><?
        }else{
  $tglsekarang=date("Ymd");    
  $query = "INSERT INTO regmhs(Tahun,Identitas_ID,Jurusan_ID,NIM,tgl_reg,aktif) VALUES('$_POST[tahun]','$_POST[Identitas_ID]','$_POST[Jurusan_ID]','$_POST[NIM]','$tglsekarang','Y')";
  mysql_query($query);
  }        
  $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_POST[NIM]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  $ab=mysql_num_rows($qry);
  $data=mysql_fetch_array($qry);
  $no++;
 
  echo"<div id=headermodul>Registrasi Ulang Mahasiswa</div>
        <form  method=post  action='?page=levelakademikregmhs&PHPIdSession=CariMahasiswa'>
         <div id=groupmodul1><table id=tablemodul>
          <tr><td class=cc>Tahun</td>
              <td class=cb><input type=text name=tahun size=5 value='$_POST[tahun]'></td>           
              <td rowspan=6 valign=top><input type=submit value=Refresh class=tombol></td>
              <td  rowspan=6 valign=top>";
              echo "<img alt='galeri' src='foto_mhs/$data[foto]' height=150/></td></tr>
          <tr><td class=cc>NIM</td><td class=cb>                <input type=text name=NIM value='$data[NIM]'></td></tr>
          <tr><td class=cc>Nama</td><td class=cb>             <strong>  $data[nama_lengkap]</td></tr>
          <tr><td class=cc>Jurusan</td><td class=cb>            <input type=hidden name=kode_jurusan value='$data[kode_jurusan]'>
                                <strong>$data[kode_jurusan] - $data[nama_jurusan]</td></tr>
          <tr><td class=cc>Program Studi</td><td class=cb>      <strong>$data[Program_ID] - $data[nama_program]</td></tr>
          <tr><td class=cc>Pembimbing Akademik</td><td class=cb><strong>$data[pembimbing]</td></tr>
      </table></form>";
  echo"<table id=tablemodul>
          <tr><th>No</th><th>Tahun Akd</th><th>Tanggal Reg</th><th>Aktif</th><th>Registrasi</th><th>Hapus</th></tr>";
          $sql="SELECT * FROM tahun t1 WHERE t1.Tahun_ID='$_POST[tahun]' AND Jurusan_ID='$data[kode_jurusan]' AND Program_ID='$data[ID]' AND t1.Aktif='Y'";
          $no=0;
          $qry=mysql_query($sql)
          or die ();
          while($data=mysql_fetch_array($qry)){
          $no++;
          
          $sqlr="SELECT * FROM regmhs WHERE Tahun='$_POST[tahun]' AND NIM='$_POST[NIM]' AND aktif='Y'";
        	$qryr= mysql_query($sqlr);
        	$d=mysql_fetch_array($qryr);
          $cocok=mysql_num_rows($qryr);
        	if ($cocok==1){
          $bg="bfbfbf";
          $Aktif='Y';
          $disable='disabled';
          }
          else{
          $bg="FFFFFF";
          $Aktif='N';
          $disable='';
          }          

          echo"<form name=form1 method=post  action='?page=levelakademikregmhs&PHPIdSession=InputRegMhs'>
              <input type=hidden name=NIM value='$_POST[NIM]'>
              <input type=hidden name=Tahun value='$_POST[Tahun]'>
                <tr>
                <td align=center bgcolor=$bg> $no</td>
                <td bgcolor=$bg>$data[Tahun_ID]</td>";
          echo" <td align=center bgcolor=$bg>";echo date("d-M-Y");
          echo" </td>
                <td align=center bgcolor=$bg>$Aktif</td>
                <td align=center bgcolor=$bg ><input type=submit value=Registrasi $disable ></td>
                <td align=center><a href='?page=levelakademikregmhs&PHPIdSession=delregmhs&gos=$d[ID_Reg]'><img src=../img/del.GIF></a></td></tr>
              </table></form></div>";
          } 
  break;  
     
     
  case "delregmhs":
    $edit=mysql_query("DELETE FROM regmhs WHERE ID_Reg='$_GET[gos]'");
    $r=mysql_fetch_array($edit);

    $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_POST[NIM]'";
    $no=0;
    $qry=mysql_query($sql)
    or die ();
    $ab=mysql_num_rows($qry);
    $data=mysql_fetch_array($qry);
    $no++;
    echo"<div id=headermodul>Registrasi Ulang Mahasiswa</div>
           <form method=post  action='?page=levelakademikregmhs&PHPIdSession=CariMahasiswa'>
              <div id=groupmodul1><table id=tablemodul>   
                <tr><td class=cc>Tahun</td><td class=cb>              <input type=text name=tahun size=5></td>           
                    <td rowspan=6 valign=top><input type=submit value=Refresh class=tombol></td></tr>
                <tr><td class=cc>NIM</td><td class=cb>                <input type=text name=NIM ></td></tr>
                <tr><td class=cc>Nama</td><td class=cb>              </td></tr>
                <tr><td class=cc>Jurusan</td><td class=cb>            </td></tr>
                <tr><td class=cc>Program Studi</td><td class=cb>      </td></tr>
                <tr><td class=cc>Pembimbing Akademik</td><td class=cb></td></tr>
            </table></div></form>";   

  break;  
   
}
?>
