
<?php
ini_set('display_errors',0);
require_once "../config/koneksi.php";

//ambil parameter
$idi = $_GET['identitas'];

if($idi == ''){
	exit;
}else{ 
echo"<option value=0>- Pilih Jurusan -</option>";
	$sql = "SELECT kode_jurusan,nama_jurusan FROM jurusan	WHERE	Identitas_ID ='$idi' ORDER BY jurusan_ID";
	$getj = mysql_query($sql) or die ();
	while($r = mysql_fetch_array($getj)){
		echo "<option value='$r[kode_jurusan]'>$r[kode_jurusan] - $r[nama_jurusan]</option>";
	} 

	exit;	
}
?>

