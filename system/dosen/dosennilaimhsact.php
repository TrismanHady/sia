<?php
session_start();
include "../../config/koneksi.php";
include "../../librari/library.php";

$page=$_GET[page];
$act=$_GET[PHPIdSession];


if ($page=='dosennilai' AND $act=='inputnilai'){

    mysql_query("UPDATE krs SET GradeNilai  = '$_GET[grade]',
                                 BobotNilai = '$_GET[bbt]'  
                           WHERE KRS_ID    = '$_GET[idk]'");

 header('location:../media.php?page=dosennilai&PHPIdSession=inputnilai&ID='.$_REQUEST['ID'].'&kode='.$_REQUEST['kode'].'&idp='.$_REQUEST['idp'].'&tahun='.$_REQUEST['tahun'].'&mat='.$_REQUEST['mat'].'&idjadwal='.$_REQUEST['idjadwal']);
}                    
?>
