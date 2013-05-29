<? 
switch($_GET[PHPIdSession]){

  default:
    defaultakademikkrs();
  break;   
 
  case "cari":
    carimahasiswaAkd();
  break;
      
  case "tambah":
    akademikKrsTambah();
  break;
        
  case "hapus":
    mysql_query("DELETE FROM krs WHERE KRS_ID='$_POST[id]'");
    carimahasiswaAkd();     
  break;    
    
  case "siaadd_krsxinf":
      $id_jadwal = $_POST['id_jadwal'];
      $kdmk = $_POST['kode_mtk'];  
      $jumlah=count($id_jadwal);
      for($i=0; $i < $jumlah; ++$i){
        $cek=mysql_num_rows(mysql_query("SELECT * FROM krs WHERE NIM='$_POST[NIM]' AND Tahun_ID='$_POST[tahun]' AND Jadwal_ID='$id_jadwal[$i]'"));
        }
        $sql="select t1.id AS id,
                      t1.idprog AS idprog,
                      t1.kode_jurusan AS kode_jurusan,
                      t1.tahun AS tahun,
                      t1.NIM AS NIM,
                      t1.identitas_ID AS identitas_ID,
                      sum(t1.sks) AS totsks
              from
                    krs1 t1
              where 
                    t1.tahun = '$_POST[tahun]' and t1.NIM ='$_POST[NIM]'
              group by 
                    t1.tahun,t1.NIM 
              order by
                    t1.semester,t1.kelas";
        $qry=mysql_query($sql)
        or die ();
        $ab=mysql_num_rows($qry);
        $data=mysql_fetch_array($qry);
        
        $sql="SELECT MAX(x.id),
                         x.tahun,
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
              WHERE x.identitas_ID=y.Identitas_ID AND x.kode_jurusan=y.Jurusan_ID AND (y.ipmax >= x.ip) AND (y.ipmin <= x.ip) AND x.NIM='$_POST[NIM]'
              GROUP BY x.id";
        $qry=mysql_query($sql)
        or die ();
        $ab=mysql_num_rows($qry);
        $data1=mysql_fetch_array($qry);
        $j=1;
        if ($cek > 0){
            ?>
            <script>
             alert('Data Anda Sudah Ada, Program Mencoba Entrykan Data yang Sama\n.');                    
            </script>
            <?
        }

        else{       
          for($i=0; $i < $jumlah; ++$i)
          {     
          mysql_query("INSERT INTO krs(NIM,
                                    Tahun_ID,
                                    Jadwal_ID,
                                    SKS) 
        	                    VALUES('$_POST[NIM]',
                                    '$_POST[tahun]',                                
                                    '$id_jadwal[$i]',
                                    '$_POST[sks]')");	  
         }
       }
    carimahasiswaAkd();
  break;      
}
?>
