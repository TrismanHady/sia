<? 
function defaultakademikkrs(){
  
  echo"<div id=headermodul>Kartu Rencana Studi (KRS)</div>
        <form  method=post  action='?page=akademikkrs&PHPIdSession=cari'><div id=groupmodul1><table id=tablemodul>
        <tr><td class=cc>Tahun</td>                  <td class=cb><input type=text name=tahun size=5></td>           
            <td rowspan=6 valign=top>              <input type=submit value=Cari class=tombol></td></tr>
        <tr><td class=cc>NIM</td>                    <td class=cb> <input type=text name=NIM></td></tr>
        <tr><td class=cc>Nama</td>                   <td class=cb></td></tr>
        <tr><td class=cc>Jurusan</td>                <td class=cb></td></tr>
        <tr><td class=cc>Program Studi</td>          <td class=cb></td></tr>
        <tr><td class=cc>Pembimbing Akademik</td>    <td class=cb></td></tr>
      </table></div>";
}

function carimahasiswaAkd(){
  $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_POST[NIM]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  $ab=mysql_num_rows($qry);
  $data=mysql_fetch_array($qry);
  $no++; 
  if ($ab > 0){    
  $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_POST[NIM]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  $ab=mysql_num_rows($qry);
  $data=mysql_fetch_array($qry);
  $no++;
  echo"<div id=headermodul>Kartu Rencana Studi (KRS)</div>";  
  echo"<form  method=post  action='?page=akademikkrs&PHPIdSession=cari'>      
        <div id=groupmodul1><table id=tablemodul>
        <tr><td class=cc>Tahun</td>          <td class=cb><input type=text name=tahun size=5 value='$_POST[tahun]'></td>           
            <td rowspan=6 valign=top>          <input type=submit value=Refresh class=tombol></td>
            <td  rowspan=6 valign=top>";
             $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_POST[NIM]' GROUP BY NIM";
             $no=0;
             $qry=mysql_query($sql)
             or die ();
             while($data1=mysql_fetch_array($qry)){
             echo "<img alt='galeri' src='foto_mhs/$data1[foto]' height=150/>";
             }              
  echo"</td></tr>
        <tr><td class=cc>NIM</td>                    <td class=cb><input type=text name=NIM value='$_POST[NIM]'></td></tr>
        <tr><td class=cc>Nama</td><td class=cb><strong>  $data[nama_lengkap]</td></tr>
        <tr><td class=cc>Jurusan</td>                <td class=cb><input type=hidden name=kode_jurusan value='$data[kode_jurusan]'>
                                <strong>$data[kode_jurusan] - $data[nama_jurusan]</td></tr>
        <tr><td class=cc>Program Studi</td>          <td class=cb><strong>$data[nama_program]</td></tr>
        <tr><td class=cc>Pembimbing Akademik</td>    <td class=cb><strong>$data[pembimbing], $data[Gelar]</td></tr>
        </table></form>";      

  echo" <a class=s href='?page=akademikkrs&PHPIdSession=tambah&year_acd=$_POST[tahun]&codd_dkernlmnfso=$data[kode_jurusan]&siaprodi_inf=$data[Program_ID]&NIM=$_POST[NIM]'><img src=../img/printer.GIF> Tambah Matakuliah |</a> 
        <a class=s href='krsprint.php?tahun=$_POST[tahun]&NIM=$_POST[NIM]' target='_blank'><img src=../img/printer.GIF> Cetak KRS |</a>
        <table id=tablemodul>
        <tr><th>No</th><th>Kode <br>Matakuliah</br></th><th>Nama Matakuliah</th><th>SKS</th><th>Sem</th><th>Kls</th><th>Hari</th><th>Jam <br>Mulai</br></th><th>Jam <br>Selessi</br></th><th>Dosen</th><th>Hapus</th></tr>
        </form>";
              $sql="SELECT * FROM krs1 WHERE tahun='$_POST[tahun]' AND NIM='$_POST[NIM]' ORDER BY semester,kelas";
              $no=0;
              $qry=mysql_query($sql)
              or die ();
              while($data2=mysql_fetch_array($qry)){
              $no++;
              echo "<tr>
                    <form name=form1 method=post action='?page=akademikkrs&PHPIdSession=hapus'>
                    <input type=hidden name=tahun size=5 value='$data2[tahun]'>
                    <input type=hidden name=NIM value='$_POST[NIM]'>
                    <input type=hidden name=id value='$data2[id]'>
                    <td align=center> $no</td>          
                    <td>$data2[kode_mtk]</td>
                    <td>$data2[nama_matakuliah]</td>
                    <td align=center>$data2[sks]</td>
                    <td align=center>$data2[semester]</td>
                    <td align=center>$data2[kelas]</td>
                    <td bgcolor=#ececec>$data2[hari]</td>
                    <td align=center bgcolor=#ececec>$data2[jam_mulai]</td>
                    <td align=center bgcolor=#ececec>$data2[jam_selesai]</td>";
              echo "<td>$data2[dosen], $data2[gelar]</td>";
                    $Tot=$Tot+$data2[sks];
              echo "<td align=center><input type=submit value=HAPUS class=t></td>
                    </form></tr>";
              }
              echo "<table id=tablestd>
                    <tr><th>Total Keseluruhan SKS Ambil</th>
                    <td bgcolor=#C0DCC0><strong>";
              echo number_format($Tot,0,',','.');
              echo "</strong></td></tr>";                    
              $sql="SELECT
                      w.NIM,
                      w.tahuna,
                      w.ip AS ip,
                      w.MaxSKS,
                      w.tahuna - w.c AS TahunSblm                    
                    FROM
                      (SELECT z.tahuna,z.tahun,z.NIM,z.ip,z.MaxSKS, CASE
                    WHEN z.tahun > 1 THEN '1'
                    WHEN z.tahun <= 1 THEN '9'
                    END AS c
                    FROM (SELECT MAX(x.id),
                                    x.tahun as tahuna,
                          		SUBSTRING(x.tahun,5) AS tahun,
                          		      x.NIM,
                                    x.ip,
                                    y.MaxSKS
                          FROM master_nilai y,(select 
                          					  t1.id AS id,
                              				t1.idprog AS idprog,
                              				t1.kode_jurusan AS kode_jurusan,
                              				t1.tahun AS tahun,
                              				t1.NIM AS NIM,
                              				t1.identitas_ID AS identitas_ID,
                              				sum(t1.sks) AS sks,
                              				sum(t1.bobot * t1.sks) AS bobotsks,
                              				sum(t1.bobot * t1.sks) / sum(t1.sks) AS ip
                            					FROM 
                              				  krs1 t1,tahun t2
                                      WHERE t1.identitas_ID=t2.Identitas_ID AND t1.kode_jurusan=t2.Jurusan_ID  
                            					group by 
                              				t1.tahun,t1.NIM) AS x
                          WHERE x.identitas_ID=y.Identitas_ID AND 
                          x.kode_jurusan=y.Jurusan_ID AND
                          (y.ipmax >= x.ip) AND (y.ipmin <= x.ip) AND x.NIM='$_POST[NIM]' AND x.tahun='$_POST[tahun]'
                          GROUP BY x.id) AS z) AS w";
              $no=0;
              $qry=mysql_query($sql)
              or die ();
              $ab=mysql_num_rows($qry);
              $data3=mysql_fetch_array($qry);
              $no++; 
              $sql="SELECT
                    w.NIM,
                    w.tahuna,
                    w.ip AS ip,
                    w.MaxSKS,
                    w.tahuna - w.c AS TahunSblm
                    
                    FROM
                    (SELECT z.tahuna,z.tahun,z.NIM,z.ip,z.MaxSKS, CASE
                    WHEN z.tahun > 1 THEN '1'
                    WHEN z.tahun <= 1 THEN '9'
                    END AS c
                    FROM (SELECT MAX(x.id),
                    x.tahun as tahuna,
                          		SUBSTRING(x.tahun,5) AS tahun,
                          		x.NIM,
                                  x.ip,
                                  y.MaxSKS
                          FROM master_nilai y,(select 
                          					t1.id AS id,
                              				t1.idprog AS idprog,
                              				t1.kode_jurusan AS kode_jurusan,
                              				t1.tahun AS tahun,
                              				t1.NIM AS NIM,
                              				t1.identitas_ID AS identitas_ID,
                              				sum(t1.sks) AS sks,
                              				sum(t1.bobot * t1.sks) AS bobotsks,
                              				sum(t1.bobot * t1.sks) / sum(t1.sks) AS ip
                            					from 
                              				krs1 t1,tahun t2
                                              WHERE t1.identitas_ID=t2.Identitas_ID AND t1.kode_jurusan=t2.Jurusan_ID  
                            					group by 
                              				t1.tahun,t1.NIM) AS x
                          WHERE x.identitas_ID=y.Identitas_ID AND 
                          x.kode_jurusan=y.Jurusan_ID AND
                          (y.ipmax >= x.ip) AND (y.ipmin <= x.ip) AND x.NIM='$_POST[NIM]' AND x.tahun='$data3[TahunSblm]'
                          GROUP BY x.id) AS z) AS w";
              $no=0;
              $qry=mysql_query($sql)
              or die ();
              while($data4=mysql_fetch_array($qry)){
              $no++;
              echo "<tr><th>Index Prestasi Semester</th>
                    <td bgcolor=#C0DCC0><strong>";
                    echo number_format($data4[ip],2,',','.'); 
              echo"</strong></td></tr>";
              echo "<tr><th>Maksimal SKS yg Diambil</th>
                    <td bgcolor=#C0DCC0><strong>$data4[MaxSKS]</strong></td>";
              }
              echo "</tr></table></table></div>";
              } 
  else{
  echo"<div id=headermodul>Kartu Rencana Studi (KRS)</div>
        <form method=post  action='?page=akademikkrs&PHPIdSession=cari'><div id=groupmodul1><table id=tablemodul>
        <tr><td class=cc>Tahun</td>                  <td class=cb><input type=text name=tahun size=5></td>           
            <td rowspan=6 valign=top>              <input type=submit value=Cari class=tombol></td></tr>
        <tr><td class=cc>NIM</td>                    <td class=cb> <input type=text name=NIM></td></tr>
        <tr><td class=cc>Nama</td>                   <td class=cb> </td></tr>
        <tr><td class=cc>Jurusan</td>                <td class=cb></td></tr>
        <tr><td class=cc>Program Studi</td>          <td class=cb></td></tr>
        <tr><td class=cc>Pembimbing Akademik</td>    <td class=cb></td></tr>
      </table></div>";
  }

}

function akademikKrsTambah(){

  $sql="SELECT * FROM view_jadwalkrs_akademik WHERE tahun='$_GET[year_acd]' AND kode_jurusan='$_GET[codd_dkernlmnfso]'";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  $ab=mysql_num_rows($qry);
  $data=mysql_fetch_array($qry);
  $no++;
  if ($ab > 0){
  echo"<form  method=post  action='?page=akademikkrs&PHPIdSession=cari'>      
        <div id=groupmodul1><table id=tablemodul>
        <tr><td class=cc>Tahun</td>          <td class=cb><input type=text name=tahun size=5 value='$data[tahun]'></td>           
            <td rowspan=6 valign=top>          <input type=submit value=Kembali class=tombol></td>
            <td  rowspan=6 valign=top>";
             $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_GET[NIM]' GROUP BY NIM";
             $no=0;
             $qry=mysql_query($sql)
             or die ();
             while($data1=mysql_fetch_array($qry)){
             echo "<img alt='galeri' src='foto_mhs/$data1[foto]' height=150/>
                           
        </td></tr>
        <tr><td class=cc>NIM</td>                    <td class=cb><input type=text name=NIM value='$_GET[NIM]'></td></tr>
        <tr><td class=cc>Nama</td><td class=cb>  <strong>$data1[nama_lengkap]</td></tr>
        <tr><td class=cc>Jurusan</td>                <td class=cb><input type=hidden name=kode_jurusan value='$data1[kode_jurusan]'>
                                                    <strong>$data1[kode_jurusan] - $data1[nama_jurusan]</td></tr>
        <tr><td class=cc>Program Studi</td>          <td class=cb><strong>$data1[nama_program]</td></tr>
        <tr><td class=cc>Pembimbing Akademik</td>    <td class=cb><strong>$data1[pembimbing], $data1[Gelar]</td></tr>";
  }
  echo"</table></form>";   
  echo" 
          <form method=post action='?page=akademikkrs&PHPIdSession=siaadd_krsxinf'>
            <table id=tablemodul>
            <tr><th>NO</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Program</th><th>SKS</th><th>Sem</th><th>Kelas</th><th>Dosen</th><th>Hari</th><th>Jam Mulai</th><th>Jam Selesai</th><th>Ambil Mtk</th></tr>";  
            $sql="SELECT * FROM view_jadwalkrs_akademik WHERE tahun='$_GET[year_acd]' AND kode_jurusan='$_GET[codd_dkernlmnfso]'";
            $no=0;
            $qry=mysql_query($sql)
            or die ();
            while($data=mysql_fetch_array($qry)){
            $no++;
            $sqlr="SELECT * FROM krs1  WHERE tahun='$_GET[year_acd]' AND NIM='$_GET[NIM]' AND idjdwl='$data[id]'";
                	$qryr= mysql_query($sqlr);
                	$cocok=mysql_num_rows($qryr);
                	if ($cocok==1){
                  $cek="disabled";
                  $bg="ececec";
                  }
                  else{
                  $cek="";
                  $bg="FFFFFF";
                  }  
           echo"<input type=hidden name=NIM value=$_GET[NIM]>
                <input type=hidden name=tahun value=$_GET[year_acd]>
                <input type=hidden name=kode_jurusan value=$data[kode_jurusan]>
                <input type=hidden name=kode_mtk[] value=$data[kode_mtk]>                
                <input type=hidden name=sks value=$data[sks]>
                <tr><td bgcolor=$bg>$no</td>
                    <td bgcolor=$bg>$data[kode_mtk]</td>
                    <td bgcolor=$bg>$data[nama_matakuliah]</td>
                    <td bgcolor=$bg>$data[nama_program]</td>
                    <td align=center bgcolor=$bg>$data[sks]</td>
                    <td align=center bgcolor=$bg>$data[semester]</td>
                    <td align=center bgcolor=$bg>$data[kelas]</td>
                    <td bgcolor=$bg>$data[nama_lengkap], $data[Gelar]</td>
                    <td bgcolor=$bg>$data[hari]</td>
                    <td align=center bgcolor=$bg>$data[jam_mulai]</td>
                   <td align=center bgcolor=$bg>$data[jam_selesai]</td>";
                    $Tot=$Tot+$data[sks];
           echo"    <td align=center bgcolor=$bg><input name=id_jadwal[] type=checkbox value=$data[id] $cek></td></tr>";
            }
           echo"<tr><td colspan=11><input type=submit value=Ambil class=tombol>
                                
        </form></td></tr>
  </table></div>";
  }
  else{
  echo"<div id=headermodul>Kartu Rencana Studi (KRS)</div>
        <form name=form1 method=post  action='?page=akademikkrs&PHPIdSession=cari'><div id=groupmodul1><table id=tablemodul>
          <tr><td class=cc>Tahun</td>    <td class=cb><input type=text name=tahun size=5></td>           
              <td rowspan=6 valign=top><input type=submit value=Cari class=tombol></td></tr>
          <tr><td class=cc>NIM</td>      <td class=cb> <input type=text name=NIM></td></tr>
          <tr><td class=cc>Nama</td>     <td class=cb> </td></tr>
          <tr><td class=cc>Jurusan</td>  <td class=cb></td></tr>
          <tr><td class=cc>Program Studi</td>   <td class=cb></td></tr>
          <tr><td class=cc>Pembimbing Akademik</td>    <td class=cb></td></tr>
      </table></form></div>"; 
  }
        
}
?>
