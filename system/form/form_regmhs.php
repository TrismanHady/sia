<?
function defaultregmhs(){
echo"<div id=headermodul>Registrasi Ulang Mahasiswa</div>
       <form name=form1 method=post  action='?page=RegUlangMhs&PHPIdSession=CariMahasiswa'>
          <div id=groupmodul1><table id=tablemodul1>   
            <tr><td bgcolor=#265180>Tahun</td><td bgcolor=#C0DCC0>              <input type=text name=tahun size=5></td>           
                <td rowspan=6 valign=top><input type=submit value=Refresh></td></tr>
            <tr><td bgcolor=#265180>NIM</td><td bgcolor=#C0DCC0>                <input type=text name=NIM ></td></tr>
            <tr><td bgcolor=#265180>Nama</td><td bgcolor=#C0DCC0>               <input type=text readonly name=nama ></td></tr>
            <tr><td bgcolor=#265180>Jurusan</td><td bgcolor=#C0DCC0>            <input type=text readonly name=kode_jurusan ></td></tr>
            <tr><td bgcolor=#265180>Program Studi</td><td bgcolor=#C0DCC0>      <input type=text size=2 readonly name=prodi ></td></tr>
            <tr><td bgcolor=#265180>Pembimbing Akademik</td><td bgcolor=#C0DCC0><input type=text size=30 readonly name=pembimbing ></td></tr>
        </table></div></form>";   
}
    
function cariregmhs(){ 
  $sql="SELECT * FROM view_data_form_mhs WHERE NIM='$_POST[NIM]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ("SQL ERROR".mysql_error());
  $ab=mysql_num_rows($qry);
  $data=mysql_fetch_array($qry);
  $no++;

  echo"<div id=headermodul>Registrasi Ulang Mahasiswa</div>
        <form  method=post  action='?page=RegUlangMhs&PHPIdSession=CariMahasiswa'>
          <div id=groupmodul1><table id=tablemodul1>
            <tr><td bgcolor=#265180>Tahun</td><td bgcolor=#C0DCC0>            <input type=text name=tahun size=5 value='$_POST[tahun]'></td>           
                <td rowspan=6 valign=top><input type=submit value=Refresh></td>
                <td rowspan=6 valign=top><img alt='galeri' src='foto/$data[foto]' height=180/></td></tr>
            <tr><td bgcolor=#265180>NIM</td><td bgcolor=#C0DCC0>                <input type=text name=NIM value='$data[NIM]'></td></tr>
            <tr><td bgcolor=#265180>Nama</td><td bgcolor=#C0DCC0>               <input type=text readonly name=nama value='$data[nama_lengkap]'></td></tr>
            <tr><td bgcolor=#265180>Jurusan</td><td bgcolor=#C0DCC0>            <input type=hidden name=kode_jurusan value='$data[kode_jurusan]'>
                                  <input type=text readonly name=kode_jurusan value='$data[kode_jurusan]-$data[nama_jurusan]'></td></tr>
            <tr><td bgcolor=#265180>Program Studi</td><td bgcolor=#C0DCC0>      <input type=text readonly name=prodi size=2 value='$data[prodi]'></td></tr>
            <tr><td bgcolor=#265180>Pembimbing Akademik</td><td bgcolor=#C0DCC0><input type=text readonly name=pembimbing size=30 value='$data[pembimbing]'></td></tr>
        </table></form></div>";
  echo"   <div id=groupmodul1><table id=tablemodul>
            <tr><td colspan=7 align=center bgcolor=#C0DCC0><strong>Registarasi Ulang Mahasiswa</strong></td></tr>
            <tr><th>No</th><th>Tahun Akd</th><th>Tanggal Reg</th><th>Aktif</th><th>Registrasi</th></tr>";
              $sql="SELECT * FROM regakademik t1 WHERE t1.tahun_akd='$_POST[tahun]' AND t1.aktif='Y'";
              $no=0;
              $qry=mysql_query($sql)
              or die ("SQL ERROR".mysql_error());
              while($data=mysql_fetch_array($qry)){
              $no++;
          
                $sqlr="SELECT * FROM regmhs WHERE tahun_akd='$_POST[tahun]' AND NIM='$_POST[NIM]' AND aktif='Y'";
              	$qryr= mysql_query($sqlr);
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
                echo"<form name=form1 method=post  action='?page=RegUlangMhs&PHPIdSession=InputRegMhs'>
                      <input type=hidden name=NIM value='$_POST[NIM]'>
                      <input type=hidden name=tahun_akd value='$_POST[tahun]'>
                      <tr><td align=center bgcolor=$bg> $no</td>
                          <td bgcolor=$bg>$data[tahun_akd]</td>";
                echo "<td align=center bgcolor=$bg>";echo date("d-M-Y");
                echo "</td> 
                      <td align=center bgcolor=$bg>$Aktif</td>
                      <td align=center bgcolor=$bg ><input type=submit value=Registrasi $disable ></td>"; 
              }  
                echo"</tr></table></form></div>";
}
     
function inputregmhs(){
  $tglsekarang=date("Ymd");    
  $query = "INSERT INTO regmhs(tahun_akd,NIM,tgl_reg,aktif) VALUES('$_POST[tahun_akd]','$_POST[NIM]','$tglsekarang','Y')";
  mysql_query($query);        
  $sql="SELECT * FROM view_form_mhs WHERE NIM='$_POST[NIM]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ("SQL ERROR".mysql_error());
  $ab=mysql_num_rows($qry);
  $data=mysql_fetch_array($qry);
  $no++;
 
  echo"<div id=headermodul>Registrasi Ulang Mahasiswa</div>
        <form  method=post  action='?page=RegUlangMhs&PHPIdSession=CariMahasiswa'>
         <div id=groupmodul1><table id=tablemodul1>
          <tr><td bgcolor=#265180>Tahun</td>
              <td bgcolor=#C0DCC0><input type=text name=tahun size=5 value='$_POST[tahun_akd]'></td>           
              <td rowspan=6 valign=top><input type=submit value=Refresh></td>
              <td  rowspan=6 valign=top>";
              echo "<img alt='galeri' src='foto/$data[foto]' height=180/></td></tr>
          <tr><td bgcolor=#265180>NIM</td><td bgcolor=#C0DCC0>                <input type=text name=NIM value='$data[NIM]'></td></tr>
          <tr><td bgcolor=#265180>Nama</td><td bgcolor=#C0DCC0>               <input type=text readonly name=nama value='$data[nama_lengkap]'></td></tr>
          <tr><td bgcolor=#265180>Jurusan</td><td bgcolor=#C0DCC0>            <input type=hidden name=kode_jurusan value='$data[kode_jurusan]'>
                                <input type=text readonly name=kode_jurusan value='$data[kode_jurusan]-$data[nama_jurusan]'></td></tr>
          <tr><td bgcolor=#265180>Program Studi</td><td bgcolor=#C0DCC0>      <input type=text readonly name=prodi size=2 value='$data[kode_prog]'></td></tr>
          <tr><td bgcolor=#265180>Pembimbing Akademik</td><td bgcolor=#C0DCC0><input type=text readonly name=pembimbing size=30 value='$data[pembimbing]'></td></tr>
      </table></form></div>";
  echo"<div id=groupmodul1><table id=tablemodul>
          <tr><td colspan=7 align=center bgcolor=#C0DCC0><strong>Registarasi Ulang Mahasiswa</strong></td></tr>
          <tr><th>No</th><th>Tahun Akd</th><th>Tanggal Reg</th><th>Aktif</th><th>Registrasi</th></tr>";
          $sql="SELECT * FROM regakademik t1 WHERE t1.tahun_akd='$_POST[tahun_akd]' AND t1.aktif='Y'";
          $no=0;
          $qry=mysql_query($sql)
          or die ("SQL ERROR".mysql_error());
          while($data=mysql_fetch_array($qry)){
          $no++;
          
          $sqlr="SELECT * FROM regmhs WHERE tahun_akd='$_POST[tahun_akd]' AND NIM='$_POST[NIM]' AND aktif='Y'";
        	$qryr= mysql_query($sqlr);
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

          echo"<form name=form1 method=post  action='?page=RegUlangMhs&PHPIdSession=InputRegMhs'>
              <input type=hidden name=NIM value='$_POST[NIM]'>
              <input type=hidden name=tahun_akd value='$_POST[tahun_akd]'>
                <tr>
                <td align=center bgcolor=$bg> $no</td>
                <td bgcolor=$bg>$data[tahun_akd]</td>";
          echo" <td align=center bgcolor=$bg>";echo date("d-M-Y");
          echo" </td>
                <td align=center bgcolor=$bg>$Aktif</td>
                <td align=center bgcolor=$bg ><input type=submit value=Registrasi $disable ></td></tr>
              </table></form></div></form>";
          } 
}
?>
