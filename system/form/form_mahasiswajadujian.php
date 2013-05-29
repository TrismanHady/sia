<?php 
switch($_GET[PHPIdSession]){

  default:
  echo"<div id=headermodul>Jadwal Ujian Mahasiswa</div>
        <form  method=post action='?page=mahasiswajadujian&PHPIdSession=cari'>
        <div id=groupmodul1><table id=tablemodul>
        <tr><td class=cc>Tahun</td>                  <td class=cb> : <input type=text name=tahun size=5></td>           
            <td rowspan=2 valign=top>              <input type=submit value=Cari class=tombol></td></tr>
          <tr><td class=cc>Jenis Jadwal</td>  <td> : 
          <select name='jenisjadwal'>
            <option value=0 selected>- Pilih Jadwal Ujian -</option>";
            $tampil=mysql_query("SELECT * FROM jenis_ujian ORDER BY jenisjadwal");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[jenisjadwal]>$r[jenisjadwal] -- $r[nama]</option>";
            }
    echo "</select></td></tr>
      </table></div>";
  break;   
 
  case "cari":
  $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_SESSION[username]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  $ab=mysql_num_rows($qry);
  $data=mysql_fetch_array($qry);
  $no++; 
  if ($ab > 0){    
  $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_SESSION[username]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  $ab=mysql_num_rows($qry);
  $data=mysql_fetch_array($qry);
  $no++;
  echo"<div id=headermodul>Kartu Ujian Mahasiswa</div>";  
  echo"<form method=post action='?page=mahasiswajadujian&PHPIdSession=cari&jadwal=$_REQUEST[jenisjadwal]'>      
        <div id=groupmodul1><table id=tablemodul>
        <tr><td class=cc>Tahun</td>          <td class=cb><input type=text name=tahun size=5 value='$_POST[tahun]'></td>           
            <td  rowspan=6 valign=top>";
             $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_SESSION[username]' GROUP BY NIM";
             $no=0;
             $qry=mysql_query($sql)
             or die ();
             while($data1=mysql_fetch_array($qry)){
             echo "<img alt='galeri' src='foto_mhs/$data1[foto]' height=150/>";
             }              
  echo"</td></tr>
        <tr><td class=cc>NIM</td>                    <td class=cb><strong>$_SESSION[username]</td></tr>
        <tr><td class=cc>Nama</td><td class=cb><strong>  $data[nama_lengkap]</td></tr>
        <tr><td class=cc>Jurusan</td>                <td class=cb><input type=hidden name=kode_jurusan value='$data[kode_jurusan]'>
                                <strong>$data[kode_jurusan] - $data[nama_jurusan]</td></tr>
        <tr><td class=cc>Program Studi</td>          <td class=cb><strong>$data[nama_program]</td></tr>
        <tr><td class=cc>Pembimbing Akademik</td>    <td class=cb><strong>$data[pembimbing], $data[Gelar]</td></tr>
        </table></form>";      

  echo" <a class=s href=media.php?page=mahasiswajadujian><img src=../img/back.png> Kembali |</a>
        <a class=s href='kartuujianprint.php?tahun=$_POST[tahun]&ujian=$_POST[jenisjadwal]&NIM=$_SESSION[username]' target='_blank'><img src=../img/printer.GIF> Cetak Kartu Ujian |</a>
        <table id=tablemodul>
        <tr><th>No</th><th>Kode <br>Matakuliah</br></th><th>Nama Matakuliah</th><th>SKS</th><th>Sem</th><th>Ruang</th><th>Tgl</th><th>Jam <br>Mulai</br></th><th>Jam <br>Selesai</br></th></tr>
        </form>";
              $sql="SELECT * FROM krs1 WHERE tahun='$_POST[tahun]' AND NIM='$_SESSION[username]' ORDER BY semester,kelas";
              $no=0;
              $qry=mysql_query($sql)
              or die ();
              while($data2=mysql_fetch_array($qry)){
              $no++;
              if ($_POST[jenisjadwal]=="UTS")
              {  
                  $UjianTgl   = tgl_indo($data2[UTSTgl]);
                  $UjianMulai = $data2[UTSMulai];
                  $UjianSelesai = $data2[UTSSelesai];
                  $UjianRuang = $data2[UTSRuang];
              }else if ($_POST[jenisjadwal]=="UAS")
              {  
                  $UjianTgl   = tgl_indo($data2[UASTgl]);
                  $UjianMulai = $data2[UASMulai];
                  $UjianSelesai = $data2[UASSelesai];
                  $UjianRuang = $data2[UASRuang];
              }
              echo "<tr>
                    <form name=form1 method=post action='?page=mahasiswajadujian&PHPIdSession=hapus'>
                    <input type=hidden name=tahun size=5 value='$data2[tahun]'>
                    <input type=hidden name=NIM value='$_SESSION[username]'>
                    <input type=hidden name=id value='$data2[id]'>
                    <td align=center> $no</td>          
                    <td>$data2[kode_mtk]</td>
                    <td>$data2[nama_matakuliah]</td>
                    <td align=center>$data2[sks]</td>
                    <td align=center>$data2[semester]</td>
                    <td align=center>$UjianRuang</td>
                    <td bgcolor=#ececec>$UjianTgl</td>
                    <td align=center bgcolor=#ececec>$UjianMulai</td>
                    <td align=center bgcolor=#ececec>$UjianSelesai</td>";
                    $Tot=$Tot+$data2[sks];
              echo "</form></tr>";
              }
              echo "<table id=tablestd>
                    <tr><th>Total Keseluruhan SKS Ambil</th>
                    <td bgcolor=#C0DCC0><strong>";
              echo number_format($Tot,0,',','.');
              echo "</strong></td></tr>";                    
 
              echo "</tr></table></table></div>";
              } 
  else{
  echo"<div id=headermodul>Kartu Ujian Mahasiswa</div>
        <form method=post  action='?page=mahasiswajadujian&PHPIdSession=cari'><div id=groupmodul1><table id=tablemodul>
        <tr><td class=cc>Tahun</td>                  <td class=cb><input type=text name=tahun size=5></td>           
            <td rowspan=6 valign=top>              <input type=submit value=Cari class=tombol></td></tr>
        <tr><td class=cc>NIM</td>                    <td class=cb> <input type=text name=NIM></td></tr>
        <tr><td class=cc>Nama</td>                   <td class=cb> </td></tr>
        <tr><td class=cc>Jurusan</td>                <td class=cb></td></tr>
        <tr><td class=cc>Program Studi</td>          <td class=cb></td></tr>
        <tr><td class=cc>Pembimbing Akademik</td>    <td class=cb></td></tr>
      </table></div>";
  }
  break;
 
}
?>


