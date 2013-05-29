<?php
session_start();
include "../../config/koneksi.php";
include "../../librari/library.php";

$page=$_GET[page];
$act=$_GET[PHPIdSession];


// Menghapus data
if ($page=='akademiktahun' AND $act=='addta'){
        $kode= $_REQUEST['cmi1'];
        $jur= $_REQUEST['cmbj1'];
        $id= $_REQUEST['cmbp1'];
        $krsm=sprintf("%02d%02d%02d",$_POST[tkrsm],$_POST[blkrsm],$_POST[tgkrsm]);
        $krss=sprintf("%02d%02d%02d",$_POST[tkrss],$_POST[blkrss],$_POST[tgkrss]);         
        $khsc=sprintf("%02d%02d%02d",$_POST[tkhsc],$_POST[blkhsc],$_POST[tgkhsc]);
        $mbyr=sprintf("%02d%02d%02d",$_POST[thbym],$_POST[blbym],$_POST[tgbym]);
        $sbyr=sprintf("%02d%02d%02d",$_POST[thbys],$_POST[blbys],$_POST[tgbys]);       
        $mkul=sprintf("%02d%02d%02d",$_POST[thkulm],$_POST[blkulm],$_POST[tgkulm]);
        $skul=sprintf("%02d%02d%02d",$_POST[thkuls],$_POST[blkuls],$_POST[tgkuls]);
        $muts=sprintf("%02d%02d%02d",$_POST[thutsm],$_POST[blutsm],$_POST[tgutsm]);
        $suts=sprintf("%02d%02d%02d",$_POST[thutss],$_POST[blutss],$_POST[tgutss]);
        $muas=sprintf("%02d%02d%02d",$_POST[thuasm],$_POST[bluasm],$_POST[tguasm]);
        $suas=sprintf("%02d%02d%02d",$_POST[thuass],$_POST[bluass],$_POST[tguass]);
        $manil=sprintf("%02d%02d%02d",$_POST[mthak],$_POST[mblak],$_POST[mtgak]);
        $anil=sprintf("%02d%02d%02d",$_POST[athak],$_POST[ablak],$_POST[atgak]);
        $cek=mysql_num_rows(mysql_query("SELECT * FROM tahun  WHERE Tahun_ID='$_POST[ta]' AND Identitas_ID='$_POST[cmi1]' AND Jurusan_ID='$_POST[cmbj1]' AND Program_ID='$_POST[cmbp1]'"));
        if ($cek > 0){
            ?>
            <script>
             alert('Data Anda Sudah Ada, Program Mencoba Entrykan Data yang Sama\n.');                    
            </script>
            <?
        }
        else{        
      mysql_query("INSERT INTO tahun(Tahun_ID,Identitas_ID,Jurusan_ID,Program_ID,Nama,TglKRSMulai,TglKRSSelesai,TglCetakKHS,TglBayarMulai,TglBayarSelesai,TglKuliahMulai,TglKuliahSelesai,TglUTSMulai,TglUTSSelesai,TglUASMulai,TglUASSelesai,TglNilaiMulai,TglNilaiSelesai,Catatan,Aktif) 
      VALUES('$_POST[ta]','$_POST[cmi1]','$_POST[cmbj1]','$_POST[cmbp1]','$_POST[nm]','$krsm',
      '$krss','$khsc','$mbyr','$sbyr','$mkul','$skul','$muts','$suts','$muas','$suas','$manil','$anil','$_POST[ctt]','$_POST[Aktif]')"); 
   }
 header('location:../media.php?page=akademiktahun&codd='.$kode.'&kode='.$jur.'&id='.$id);
}

elseif ($page=='akademiktahun' AND $act=='upta'){
        $kode= $_REQUEST['cmi2'];
        $jur= $_REQUEST['cmbj2'];
        $id= $_REQUEST['cmbp2'];

        $krsm=sprintf("%02d%02d%02d",$_POST[tkrsm],$_POST[blkrsm],$_POST[tgkrsm]);
        $krss=sprintf("%02d%02d%02d",$_POST[tkrss],$_POST[blkrss],$_POST[tgkrss]);         
        $khsc=sprintf("%02d%02d%02d",$_POST[tkhsc],$_POST[blkhsc],$_POST[tgkhsc]);
        $mbyr=sprintf("%02d%02d%02d",$_POST[thbym],$_POST[blbym],$_POST[tgbym]);
        $sbyr=sprintf("%02d%02d%02d",$_POST[thbys],$_POST[blbys],$_POST[tgbys]);       
        $mkul=sprintf("%02d%02d%02d",$_POST[thkulm],$_POST[blkulm],$_POST[tgkulm]);
        $skul=sprintf("%02d%02d%02d",$_POST[thkuls],$_POST[blkuls],$_POST[tgkuls]);
        $muts=sprintf("%02d%02d%02d",$_POST[thutsm],$_POST[blutsm],$_POST[tgutsm]);
        $suts=sprintf("%02d%02d%02d",$_POST[thutss],$_POST[blutss],$_POST[tgutss]);
        $muas=sprintf("%02d%02d%02d",$_POST[thuasm],$_POST[bluasm],$_POST[tguasm]);
        $suas=sprintf("%02d%02d%02d",$_POST[thuass],$_POST[bluass],$_POST[tguass]);
        $manil=sprintf("%02d%02d%02d",$_POST[mthak],$_POST[mblak],$_POST[mtgak]);
        $anil=sprintf("%02d%02d%02d",$_POST[athak],$_POST[ablak],$_POST[atgak]);
        $cek=mysql_num_rows(mysql_query("SELECT * FROM tahun  WHERE Tahun_ID='$_POST[ta]' AND Identitas_ID='$_POST[cmi1]' AND Jurusan_ID='$_POST[cmbj1]' AND Program_ID='$_POST[cmbp1]'"));
        if ($cek > 0){
            ?>
            <script>
             alert('Data Anda Sudah Ada, Program Mencoba Entrykan Data yang Sama\n.');                    
            </script>
            <?
        }
        else{        

    mysql_query("UPDATE tahun SET Tahun_ID  = '$_POST[ta]',
                  Identitas_ID  = '$_POST[cmi2]',
                  Jurusan_ID  = '$_POST[cmbj2]',
                  Program_ID  = '$_POST[cmbp2]',
                  Nama  = '$_POST[nm]',
                  TglKRSMulai  = '$krsm',
                  TglKRSSelesai  = '$krss',
                  TglCetakKHS='$khsc',
                  TglBayarMulai  = '$mbyr',
                  TglBayarSelesai  = '$sbyr',
                  TglKuliahMulai  = '$mkul',
                  TglKuliahSelesai  = '$skul',
                  TglUTSMulai  = '$muts',
                  TglUTSSelesai  = '$suts',
                  TglUASMulai  = '$muas',
                  TglUASSelesai  = '$suas',
                  TglNilaiMulai  = '$manil',
                  TglNilaiSelesai  = '$anil',
                  Catatan  = '$_POST[ctt]',
                  Aktif      = '$_REQUEST[Aktif]'
                  WHERE ID         = '$_POST[ID]'");
 header('location:../media.php?page=akademiktahun&codd='.$kode.'&kode='.$jur.'&id='.$id);
}    
}
?>
