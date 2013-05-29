<?php
session_start();
include "../../config/koneksi.php";
include "../../librari/library.php";

$page=$_GET[page];
$act=$_GET[PHPIdSession];
    $id= $_REQUEST['Identitas_ID'];
    $kode= $_REQUEST['kode_jurusan'];
    $idp= $_REQUEST['prog'];
    $tahun= $_REQUEST['tahun'];
if ($page=='levelakademikjadkul' AND $act=='insertjdwl'){

    mysql_query("INSERT INTO jadwal(Tahun_ID,
                                    Identitas_ID,
                                    Program_ID,
                                    Kode_Mtk,
                                    Kode_Jurusan,
                                    Ruang_ID,
                                    Kelas,
                                    Dosen_ID,
                                    Hari, 
                                    Jam_Mulai,Jam_Selesai) 
                            VALUES('$_POST[tahun]',
                                   '$id',
                                   '$idp',
                                   '$_POST[mtk]',
                                   '$kode',
                                   '$_POST[Ruang_ID]',
                                   '$_POST[kelas]',
                                   '$_POST[dsn]',
                                   '$_POST[Hari]',
                                   '$_POST[jm]','$_POST[js]')");    

 header('location:../media.php?page=levelakademikjadkul&ID='.$id.'&codd='.$kode.'&prog='.$idp.'&tahun='.$tahun);
}

elseif ($page=='levelakademikjadkul' AND $act=='updatejadkul'){
    $id=$_POST['identitas'];
    $kode=$_POST['codd'];
    $idpr=$_POST['program'];
    $tahun=$_POST['tahun'];
    $gis=$_POST['idj'];

    mysql_query("UPDATE jadwal SET 
                                 Program_ID = '$_POST[program]',
                                 Kode_Mtk        = '$_POST[mtk]',
                                 Kode_Jurusan        = '$_POST[codd]',
                                 Ruang_ID        = '$_POST[rk]',
                                 Kelas        = '$_POST[nk]',
                                 Dosen_ID        = '$_POST[dsn]',
                                 Hari        = '$_POST[hari]',
                                 Jam_Mulai        = '$_POST[jm]',
                                 Jam_Selesai        = '$_POST[js]' 
                           WHERE Jadwal_ID      = '$_POST[idj]'");
 header('location:../media.php?page=levelakademikjadkul&ID='.$id.'&codd='.$kode.'&prog='.$idpr.'&tahun='.$tahun);
}

elseif ($page=='levelakademikjadkul' AND $act=='updatejadujianuts'){
    $id=$_POST['identitas'];
    $kode=$_POST['codd'];
    $idpr=$_POST['program'];
    $tahun=$_POST['tahun'];
    $gis=$_POST['idj'];
 
  $tgluts=sprintf("%02d%02d%02d",$_POST[thnuts],$_POST[blnuts],$_POST[tgluts]);

    mysql_query("UPDATE jadwal SET UTSTgl = '$tgluts',
                                 UTSHari = '$_POST[hariuts]',
                                 UTSMulai        = '$_POST[jmuts]',
                                 UTSSelesai        = '$_POST[jsuts]',
                                 UTSRuang        = '$_POST[ruat]' 
                           WHERE Jadwal_ID      = '$_POST[id]'");
 header('location:../media.php?page=levelakademikjadkul&ID='.$id.'&codd='.$kode.'&prog='.$idpr.'&tahun='.$tahun);
}

elseif ($page=='levelakademikjadkul' AND $act=='updatejadujianuas'){
    $id=$_POST['identitas'];
    $kode=$_POST['codd'];
    $idpr=$_POST['program'];
    $tahun=$_POST['tahun'];
    $gis=$_POST['idj'];

  $tgluas=sprintf("%02d%02d%02d",$_POST[thnuas],$_POST[blnuas],$_POST[tgluas]);

    mysql_query("UPDATE jadwal SET UASTgl = '$tgluas',
                                 UASHari = '$_POST[hariuas]',
                                 UASMulai        = '$_POST[jmuas]',
                                 UASSelesai        = '$_POST[jsuas]',
                                 UASRuang        = '$_POST[ruas]' 
                           WHERE Jadwal_ID      = '$_POST[id]'");
 header('location:../media.php?page=levelakademikjadkul&ID='.$id.'&codd='.$kode.'&prog='.$idpr.'&tahun='.$tahun);
}

elseif ($page=='levelakademikjadkul' AND $act=='hapusjadwl'){
    $id=$_REQUEST['ID'];
    $kode=$_REQUEST['codd'];
    $idpr=$_REQUEST['prog'];
    $tahun=$_REQUEST['tahun'];
    $gis=$_POST['idj'];
    mysql_query("DELETE FROM jadwal WHERE Jadwal_ID='$_GET[gos]'");
 header('location:../media.php?page=levelakademikjadkul&ID='.$id.'&codd='.$kode.'&prog='.$idpr.'&tahun='.$tahun);
}     
?>
