<? 
switch($_GET[PHPIdSession]){
  default:
  echo" <div id=headermodul>Index Prestasi Kumulatif</div>
        <form method=post  action='?page=akademiktranskrip&PHPIdSession=CariMahasiswa'>
        <div id=groupmodul1><table id=tablemodul>
        <tr><td class=cc>NIM</td><td class=cb>            <input type=text name=NIM></td>         
            <td rowspan=6 valign=top><input type=submit value=Refresh class=tombol></td></tr>
        <tr><td class=cc>Nama</td>          <td class=cb></td></tr>
        <tr><td class=cc>Fakultas</td>      <td class=cb> </td></tr>
        <tr><td class=cc>Jurusan</td>       <td class=cb></td></tr>
        <tr><td class=cc>Program Studi</td> <td class=cb></td></tr>
        <tr><td class=cc>Pembimbing Akademik</td>    <td class=cb></td></tr>";
  echo" </table></div></form>";

  break;   
 
  case "CariMahasiswa":
  $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_POST[NIM]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  $ab=mysql_num_rows($qry);
  $data=mysql_fetch_array($qry);
  $no++;
  echo" <div id=headermodul>Daftar Matakuliah Yang Telah Diambil</div>
        <form name=form1 method=post action=?page=akademiktranskrip&PHPIdSession=CariMahasiswa>
        <div id=groupmodul1><table id=tablemodul>    
        <tr><td class=cc>NIM</td>          <td class=cb><input type=text name=NIM value='$data[NIM]'></td>           
            <td rowspan=5 valign=top><input type=submit value=Refresh class=tombol></td>
            <td  rowspan=5 valign=top>";
            $sql="SELECT  t1.NIM AS NIM,t1.foto AS foto  FROM  mahasiswa t1  WHERE t1.NIM='$_SESSION[username]'";
            $no=0;
            $qry=mysql_query($sql)
            or die ();
            while($data1=mysql_fetch_array($qry)){
            echo "<img alt='galeri' src='foto/$data1[foto]' height=150/>";
            }
  echo"     </td></tr>
        <tr><td class=cc>Nama</td>                 <td class=cb><strong>$data[nama_lengkap]</td></tr>
        <tr><td class=cc>Jurusan</td>              <td class=cb><strong>$data[kode_jurusan] - $data[nama_jurusan]</td></tr>
        <tr><td class=cc>Program Studi</td>        <td class=cb><strong><strong>$data[nama_program]</td></tr>
        <tr><td class=cc>Pembimbing Akademik</td>  <td class=cb><strong>$data[pembimbing], $data[Gelar]</td></tr>
      </table></form>
        <a class=s href='transkripprint.php?NIM=$_POST[NIM]&prodi=$data[kode_jurusan]' target='_new'><img src=../img/printer.GIF> Cetak Transkrip |</a>";
  echo" <table id=tablemodul>
        <tr><th>NO</th><th>Kode Mtk</th><th>Nama Mtk</th><th>SKS</th><th>Sem</th><th>Grade</th><th>Bobot</th><th>Nilai</th></tr>";

  $sql="SELECT * FROM matakuliah WHERE Jurusan_ID='$data[kode_jurusan]' ORDER BY semester,kode_mtk";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
        $sqlr="SELECT * FROM view_ipk  WHERE  NIM='$_POST[NIM]' AND kode_mtk='$data[Kode_mtk]'";
        $qryr= mysql_query($sqlr);
        $data1=mysql_fetch_array($qryr);

  echo" <tr><td align=center>$no</td>
            <td bgcolor=#ececec>$data[Kode_mtk]</td>
            <td>$data[Nama_matakuliah]</td>
            <td align=center bgcolor=#ececec>$data[SKS]</td>
            <td align=center>$data[Semester]</td>

            <td align=center bgcolor=#ececec>$data1[GradeNilai]</td>
            <td align=center>$data1[BobotNilai]</td>";
            $boboxtsks=$data1[SKS]*$data1[BobotNilai];
      echo" <td align=center bgcolor=#ececec>$boboxtsks</td>";
            $TotSks=$TotSks+$data[SKS];
            $Tot=$Tot+$data[SKS];
            $jmlbobot=$jmlbobot+$boboxtsks;
  echo" </tr>";   	  
  }
  echo" <td colspan=3 align=right></td>
        <td colspan=1 align=center bgcolor=#ececec>";
  echo number_format($Tot,0,',','.');
  echo" </td>
        <td colspan=3 align=right></td>
        <td colspan=1 align=center bgcolor=#ececec>";
  echo number_format($jmlbobot,0,',','.');
  echo" </td></table>";
  
  $ipk=$jmlbobot/$Tot;
  echo" <table id=tablemodul2>
        <tr><th>Total Keselruhan SKS</th>
            <td class=cb><strong>";
          echo number_format($Tot,0,',','.');
  echo"</tr>";
  echo" <tr><th>Index Prestasi Kumulatif </th>
            <td class=cb><strong>";
          echo number_format($ipk,2,',','.');
  echo" </strong></td></tr></table></div>";

  break;
  }
?>
