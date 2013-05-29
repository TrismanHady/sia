<?
switch($_GET[PHPIdSession]){

  default:
    echo"<div id=headermodul>Kartu Hasil Studi (KHS)</div>
          <form method=post  action='?page=mahasiswakhs&PHPIdSession=CariMahasiswa'>
          <div id=groupmodul1><table id=tablemodul>
            <tr><td class=cc>Tahun</td><td class=cb>            <input type=text name=tahun size=5></td>           
                <td rowspan=6 valign=top><input type=submit value=Refresh class=tombol></td></tr>
            <tr><td class=cc>NIM</td><td class=cb>      <input type=text name=NIM></td></tr>
            <tr><td class=cc>Nama</td><td class=cb></td></tr>
            <tr><td class=cc>Jurusan</td><td class=cb></td></tr>
            <tr><td class=cc>Program Studi</td><td class=cb></td></tr>
            <tr><td class=cc>Pembimbing Akademik</td><td class=cb></td></tr>
          </table></div>";

  break;
   
  case "CariMahasiswa":
  $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_SESSION[username]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  $ab=mysql_num_rows($qry);
  $data=mysql_fetch_array($qry);
  $no++;
  if ($ab > 0){
  echo" <div id=headermodul>Kartu Hasil Studi (KHS)</div>";
  echo" <form  method=post  action='?page=mahasiswakhs&PHPIdSession=CariMahasiswa'>
        <div id=groupmodul1><table id=tablemodul>
        <tr><td class=cc>Tahun</td><td class=cb>            <input type=text name=tahun size=5 value='$_POST[tahun]'></td>                       
            <td rowspan=6 valign=top><input type=submit value=Refresh class=tombol></td>
            <td  rowspan=6 valign=top>";
            $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_SESSION[username]' GROUP BY NIM";
            $no=0;
            $qry=mysql_query($sql)
            or die ();
            while($data1=mysql_fetch_array($qry)){
            echo "<img alt='galeri' src='foto_mhs/$data1[foto]' height=150/>";
            }              
  echo"     </td></tr>
        <tr><td class=cc>NIM</td><td class=cb>      <input type=text name=NIM value='$_SESSION[username]'></td></tr>
        <tr><td class=cc>Nama</td><td class=cb>     <strong> $data[nama_lengkap]</td></tr>
        <tr><td class=cc>Jurusan</td> <td class=cb> <input type=hidden name=kode_jurusan value='$data[kode_jurusan]'>
                              <strong>$data[kode_jurusan] - $data[nama_jurusan]</td></tr>
        <tr><td class=cc>Program Studi</td>
            <td class=cb><input type=hidden name=jenjang size=10 value='$data[ID]'><strong>$data[nama_program]</td></tr>
        <tr><td class=cc>Pembimbing Akademik</td>   <td class=cb><strong>$data[pembimbing], $data[Gelar]</td></tr>
        </table></form>
        <a class=s href='khsprint.php?tahun=$_POST[tahun]&NIM=$_SESSION[username]' target='_new'><img src=../img/printer.GIF> Cetak KHS |</a>";
    echo" <input type=hidden name=tahun size=5 value='$data[tahun]'>
          <input type=hidden name=kode_jurusan value='$data[kode_jurusan]'>
          <input type=hidden name=NIM value='$_SESSION[username]'>       
        <table id=tablemodul>
          <tr><th>No</th><th>KodeMtk</th><th>Nama Matakuliah</th><th>SKS</th><th>Sem</th><th>Dosen</th><th>Nilai</th><th>Bobot</th><th>BobotxSKS</th></tr>
        </form>";  
  $sql="SELECT * FROM krs1 WHERE tahun='$_POST[tahun]' AND NIM='$_SESSION[username]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;

  echo"<tr><form>
            <input type=hidden name=tahun size=5 value='$data[tahun]'>
            <input type=hidden name=NIM value='$_SESSION[username]'>
            <input type=hidden name=id value='$data[id]'>
            <td align=center> $no</td>
            <td bgcolor=#ececec>$data[kode_mtk]</td>
            <td>$data[nama_matakuliah]</td>
            <td align=center bgcolor=#ececec>$data[sks]</td>
            <td align=center>$data[semester]</td>
            <td>$data[dosen], $data[gelar]</td>";
            $Tot=$Tot+$data[sks];
      echo" <td align=center bgcolor=#ececec>$data[GradeNilai]</td>
            <td align=center>$data[bobot]</td>";
            $boboxtsks=$data[sks]*$data[bobot];
            $jmlbobot=$jmlbobot+$boboxtsks;
            $ips=$jmlbobot/$Tot;
     echo " <td align=center bgcolor=#ececec>$boboxtsks</td>   
            </form></tr>";
  }
  echo" <td colspan=3 align=right></td><td colspan=1 align=center bgcolor=#ececec>";
  echo number_format($Tot,0,',','.');
  echo" </td><td colspan=4 align=right></td>
        <td colspan=1 align=center bgcolor=#ececec>";
  echo number_format($jmlbobot,0,',','.');
  echo" </td></table>
        <table id=tablemodul2>
        <tr><th>Index Prestasi Sementara (IPS)</th><td class=cb>";
        echo number_format($ips,2,',','.');
        echo"</td></tr>";
        $sql="SELECT t2.MaxSKS AS sks 
              FROM master_nilai t2 
              WHERE (t2.ipmax >= $ips) AND (t2.ipmin <= $ips)";
        $no=0;
        $qry=mysql_query($sql)
        or die;
        while($data=mysql_fetch_array($qry)){
  
        echo"<tr><th>Maksimal SKS yg Diambil</th><td class=cb>$data[sks]</td>";
        }
  echo" </table></div>";
  } 
  else{
  echo"<div id=headermodul>Kartu Hasil Studi (KHS)</div>
        <form method=post  action='?page=mahasiswakhs&PHPIdSession=CariMahasiswa'>
        <div id=groupmodul1><table id=tablemodul>
          <tr><td class=cc>Tahun</td><td class=cb>            <input type=text name=tahun size=5></td>           
              <td rowspan=6 valign=top><input type=submit value=Refresh class=tombol></td></tr>
          <tr><td class=cc>NIM</td><td class=cb>      <input type=text name=NIM></td></tr>
          <tr><td class=cc>Nama</td><td class=cb></td></tr>
          <tr><td class=cc>Jurusan</td><td class=cb></td></tr>
          <tr><td class=cc>Program Studi</td><td class=cb></td></tr>
          <tr><td class=cc>Pembimbing Akademik</td><td class=cb></td></tr>
        </table></div>";
  }
  break;  
}
?>
