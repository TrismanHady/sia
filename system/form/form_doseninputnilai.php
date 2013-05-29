<? 

switch($_GET[PHPIdSession]){

  default: 
  echo"<div id=headermodul>Input Nilai Mahasiswa</div>
        <div id=groupmodul1>
            <table id=tablemodul>  
            <tr><th>NO</th><th>Jurusan</th><th>Kode Mtk</th><th>Nama Mtk</th><th>SKS</th><th>Sem</th><th>Kelas</th><th>Hari</th><th>Jam Mulai</th><th>Jam Selesai</th><th>Dosen</th></tr>";  
            $sql="SELECT * FROM view_ajar_dosen WHERE username='$_SESSION[username]' ORDER BY Kode_Mtk";
            $no=0;
            $qry=mysql_query($sql)
            or die ();
            while($data=mysql_fetch_array($qry)){
            $no++;
            
           echo" <tr><td>$no</td>
                    <td>$data[nama_jurusan]</td>
                    <td><a class=s href='?page=dosennilai&PHPIdSession=inputnilai&idjadwal=$data[Jadwal_ID]'>$data[Kode_Mtk]</a></td>
                    <td>$data[nama_matakuliah]</td>
                    <td align=center>$data[sks]</td>
                    <td align=center>$data[semester]</td>
                    <td align=center>$data[Kelas]</td>
                    <td>$data[Hari]</td>
                    <td align=center>$data[Jam_Mulai]</td>
                    <td align=center>$data[Jam_Selesai]</td>
                    <td>$data[nama_lengkap], $data[gelar]</td>

               </td></tr>";
            }
  echo"</table></div>";
  break;
  
  break;   

  case"inputnilai":
    $edit=mysql_query("SELECT * FROM dosen WHERE username='$_SESSION[username]'");
    $a=mysql_fetch_array($edit); 
       echo"<div id=headermodul>Input Nilai Mahasiswa</div>            
            <div id=groupmodul1>
            <table id=tablemodul>";
               
       echo"<table id=tablemodul>  
            <tr><th>NO</th><th>Jurusan</th><th>Kode Mtk</th><th>Nama Mtk</th><th>SKS</th><th>Sem</th><th>Kelas</th><th>Hari</th><th>Jam Mulai</th><th>Jam Selesai</th><th>Dosen</th></tr>";  
            $sql="SELECT * FROM view_ajar_dosen WHERE Jadwal_ID='$_GET[idjadwal]' ORDER BY Kode_Mtk";
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

               </td></tr>";
            }
      echo"</table>";     
            $d=mysql_query("SELECT * FROM view_jadwal WHERE Jadwal_ID='$_GET[idjadwal]' ORDER BY Jadwal_ID");
            $r=mysql_fetch_array($d); 
          echo" <tr><td> <a class=s href=?page=dosennilai><img src=../img/back.png> Kembali Ke Dafar Mtk |</a></tr>";
          echo"  <table id=tablemodul>
                  <tr><th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Grade</th></tr>";     								
                $sql="SELECT * FROM krs1 
                WHERE idjdwl='$_GET[idjadwal]' ORDER BY NIM";
              	$qry= mysql_query($sql)
              	or die ();
              	while ($r1=mysql_fetch_array($qry)){         	
              	$nom++;
                   echo "<tr bgcolor=$warna>                            
            		         <td>$nom</td>
            		         <td>$r1[NIM]</td>
            		         <td>$r1[nama_lengkap]</td>";
                         ?>                   
                          <td colspan=2> <select name="nilai" onChange="MM_jumpMenu('parent',this,0)">
                          <option value="">- Nilai -</option>
                          <?php
                      	  $sqlp="SELECT * FROM nilai WHERE Identitas_ID='$a[Identitas_ID]' AND Kode_Jurusan='$a[jurusan_ID]'";
                      	  $qryp=mysql_query($sqlp)
                      	  or die();
                      	  while ($d2=mysql_fetch_array($qryp)){
                          if ($d2['grade']==$r1['GradeNilai']){
                            $cek="selected";
                            }
                            else{
                              $cek="";
                            }
                            echo "<option value='dosen/dosennilaimhsact.php?page=dosennilai&PHPIdSession=inputnilai&ID=$_GET[ID]&kode=$kode&idp=$idp&tahun=$_GET[tahun]&mat=$_GET[mat]&idjadwal=$_GET[idjadwal]&grade=$d2[grade]&bbt=$d2[bobot]&idk=$r1[id]' $cek> $d2[grade]--> $d2[NilaiMin]-$d2[NilaiMax]</option>";
                      		}
                      		?>
                            </select>
                            <input name="nilai" type="hidden" value="<?= $nilai; ?>"></td>                                          
                            <?
                   echo" </tr>";        
                        }
      
          echo"</table></div>";
    
  break;  
}
?>
