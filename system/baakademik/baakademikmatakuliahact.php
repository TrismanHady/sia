<?php
session_start();
include "../../config/koneksi.php";
include "../../librari/library.php";

$page=$_GET[page];
$act=$_GET[PHPIdSession];
if ($page=='levelakademikmtk' AND $act=='upkrklmmk'){
        $kode= $_REQUEST['mkiq'];
        $jur= $_REQUEST['mkjkq'];

        $cek=mysql_num_rows(mysql_query("SELECT * FROM kurikulum WHERE Kode='$_POST[Kode]' AND Identitas_ID='$_GET[codd]' AND Jurusan_ID='$_POST[mkjkq]'"));
        if ($cek > 0){
        ?><script>alert('Data Anda Sudah Ada,\n.');</script><?
        }else{
        mysql_query("INSERT INTO kurikulum(Kode,Nama,Identitas_ID,Jurusan_ID,Sesi,JmlSesi,Aktif)
        VALUES('$_POST[Kode]','$_POST[Nama]','$_POST[mkiq]','$_POST[mkjkq]','$_POST[Sesi]','$_POST[JmlSesi]','$_POST[Aktif]')");
        }
 header('location:../media.php?page=levelakademikmtk&PHPIdSession=Daftarkrklm&codd='.$kode.'&kode='.$jur);
}


elseif ($page=='levelakademikmtk' AND $act=='delprog'){
        $kode= $_REQUEST['mkiq'];
        $jur= $_REQUEST['mkjkq'];

        mysql_query("DELETE FROM kurikulum WHERE Kurikulum_ID='$_GET[gos]'");

 header('location:../media.php?page=levelakademikmtk&codd='.$kode.'&kode='.$jur);
}


elseif ($page=='levelakademikmtk' AND $act=='addmk'){
        $kode= $_REQUEST['i'];
        $jur= $_REQUEST['jur'];
        $nkur= $_REQUEST['nkur'];
        $kmk= $_POST['kmk'];
        $nm= $_POST['nm'];
        $ne= $_POST['ne'];
        $jmk= $_POST['jmk'];  //Jenis Matakuliah (wajib)       
        $sesi= $_POST['sesi'];
        $sks= $_POST['sks'];
        $jur= $_POST['jur'];  //kode jurusan              
        $klmptk= $_POST['klmptk'];  //kode kurikulum
        $no= $_POST['no'];  //no urut
        $kon= $_POST['no'];  //kode konsenstrasi  
        $pj= $_POST['pj'];// penanggung jawab
        $Ket= $_POST['Ket'];
        $cek=mysql_num_rows(mysql_query("SELECT * FROM matakuliah WHERE Kode_mtk='$kmk'"));
        if ($cek > 0){?><script>alert('Data Anda Sudah Ada,\n.');</script><?}else{        
        mysql_query("INSERT INTO matakuliah(Identitas_ID,Kode_mtk,Nama_matakuliah,Nama_english,Semester,SKS,Jurusan_ID,KelompokMtk_ID,JenisMTK_ID,JenisKurikulum_ID,StatusMtk_ID,Kurikulum_ID,Penanggungjawab,Ket,Aktif)
        VALUES('$_POST[i]','$kmk','$nm','$ne','$sesi','$sks','$jur','$klmptk','$jmk','$_POST[jkur]','$_POST[stmk]','$nkur','$pj','$_POST[Ket]','$_POST[ak]')");
        }
 header('location:../media.php?page=levelakademikmtk&codd='.$kode.'&kode='.$jur);
}


elseif ($page=='levelakademikmtk' AND $act=='upmk'){
        $kode= $_REQUEST['i'];
        $jur= $_REQUEST['jur'];
        $nkur= $_REQUEST['nkur'];
    mysql_query("UPDATE matakuliah SET Identitas_ID  = '$_POST[i]',
                                          Kode_mtk  = '$_POST[kmk]',
                                          Nama_matakuliah  = '$_POST[nm]',
                                          Nama_english  = '$_POST[ne]',
                                          Semester  = '$_POST[sesi]',
                                          SKS  = '$_POST[sks]',
                                          Jurusan_ID  = '$_POST[jur]',
                                          KelompokMtk_ID  = '$_POST[klmptk]',
                                          JenisMTK_ID  = '$_POST[jmk]',
                                          JenisKurikulum_ID  = '$_POST[jkur]',
                                          StatusMtk_ID  = '$_POST[stmk]',
                                          Kurikulum_ID ='$nkur',
                                          Penanggungjawab  = '$_POST[pj]',
                                          Ket  = '$_POST[Ket]',
                                          Aktif  = '$_POST[ak]'                                                                                   
                                    WHERE Matakuliah_ID          = '$_POST[ID]'");
 header('location:../media.php?page=levelakademikmtk&codd='.$kode.'&kode='.$jur);
}

elseif ($page=='levelakademikmtk' AND $act=='InsertPras'){
        $kode= $_REQUEST['kode'];
        $jur= $_REQUEST['jur'];
        $id= $_REQUEST['ID'];
        $kodemk= $_REQUEST['kodemk'];
        $cek=mysql_num_rows(mysql_query("SELECT * FROM mtkpra WHERE MKPraID='$kode' AND Matakuliah_ID ='$kodemk'"));
        if ($cek > 0){?><script>alert('Data Anda Sudah Ada,\n.');</script><?}else{        
        mysql_query("INSERT INTO mtkpra(MKPraID,Matakuliah_ID,PraID,NilaiID) VALUES('$kode','$kodemk','$_POST[pras]','$nm')");
        
        }
 header('location:../media.php?page=levelakademikmtk&PHPIdSession=prasyratMtk&gis='.$kodemk.'&kode='.$jur.'&ID='.$id);
}

elseif ($page=='levelakademikmtk' AND $act=='delMtkPras'){
        $jur= $_REQUEST['jur'];
        $id= $_REQUEST['ID'];
        $kodemk= $_REQUEST['kodemk'];
  mysql_query("DELETE FROM mtkpra WHERE Matakuliah_ID='$_GET[kodeMtk]' AND MKPraID='$_GET[gos]'");
 header('location:../media.php?page=levelakademikmtk&PHPIdSession=prasyratMtk&gis='.$_GET['kodeMtk'].'&kode='.$jur.'&ID='.$id);
}

?>
