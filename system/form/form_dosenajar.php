<?php
switch($_GET[PHPIdSession]){

  default:
  echo"<div id=headermodul>Kelas Ajar Dosen</div>
        <div id=groupmodul1>
            <table id=tablemodul>
            <tr><th>NO</th><th>Jurusan</th><th>Kode Mtk</th><th>Nama Mtk</th><th>SKS</th><th>Sem</th><th>Kelas</th><th>Hari</th><th>Jam<br>Mulai</th><th>Jam<br>Selesai</th><th>Dosen</th><th>Absen</th></tr>";  
            $sql="SELECT * FROM view_ajar_dosen WHERE username='$_SESSION[username]' ORDER BY Kode_Mtk";
            $no=0;
            $qry=mysql_query($sql)
            or die ();
            while($data=mysql_fetch_array($qry)){
            $no++;
            
           echo" <tr><td>$no</td>
                    <td>$data[nama_jurusan]</td>
                    <td>$data[Kode_Mtk]</td>
                    <td>$data[nama_matakuliah]</td>
                    <td align=center>$data[sks]</td>
                    <td align=center>$data[semester]</td>
                    <td align=center>$data[Kelas]</td>
                    <td>$data[Hari]</td>
                    <td align=center>$data[Jam_Mulai]</td>
                    <td align=center>$data[Jam_Selesai]</td>
                    <td>$data[nama_lengkap], $data[gelar]</td>
                   <td><a class=s href='absendosenprint.php?tahun=$data[Tahun_ID]&prodi=$data[Kode_Jurusan]&program=$data[Program_ID]&kdmtk=$data[Kode_Mtk]&kelas=$data[Kelas]' target='_blank'><img src=../img/printer.GIF></a>
               </td></tr>";
            }
  echo"</table></div>";
  break;

}
?>
