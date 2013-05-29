<?
switch($_GET[PHPIdSession]){

  default:
    defaultRuang();
  break;  

  case "tambahRuang":
    tambahRuang();		  
  break;

  case"inputRuang":
        $Ruang_ID =$_REQUEST['Ruang_ID'];
        $CekJurusan =$_REQUEST['CekJurusan'];

        $jum=count($CekJurusan);        
        $Ruang_ID     = $_POST['Ruang_ID'];
        $Nama     = $_POST['Nama'];
        $Kampus_ID     = $_POST['Kampus_ID'];
        $Lantai     = $_POST['Lantai'];
        $RuangKuliah     = $_POST['RuangKuliah'];
        $Kapasitas     = $_POST['Kapasitas'];
        $KapasitasUjian    = $_POST['KapasitasUjian'];
        $Keterangan     = $_POST['Keterangan'];
        $Aktif     = $_POST['Aktif'];

          $sqlpil= "SELECT * FROM ruang WHERE Ruang_ID='$Ruang_ID'";
          $qrypil= mysql_query($sqlpil);
          while ($datapil=mysql_fetch_array($qrypil)){
          for($i=0; $i < $jum; ++$i){
          if ($datapil['kode_jurusan'] !=$CekJurusan[$i]){
          $sqldel= "DELETE FROM ruang WHERE Ruang_ID='$Ruang_ID' AND NOT kode_jurusan IN ('$CekJurusan[$i]')";   
          mysql_query($sqldel);

          }
          }
          }        
        for($i=0; $i < $jum; ++$i){
          $sqlr="SELECT * FROM ruang WHERE Ruang_ID='$Ruang_ID'AND kode_jurusan='$CekJurusan[$i]'";
        	$qryr= mysql_query($sqlr);
        	$cocok= mysql_num_rows($qryr);
    
       	
        	
        	if (! $cocok==1){        
        	$sql = "INSERT INTO ruang(Ruang_ID,Nama,Kampus_ID,Lantai,kode_jurusan,RuangKuliah,Kapasitas,KapasitasUjian,Keterangan,Aktif)VALUES ('$Ruang_ID','$Nama','$Kampus_ID','$Lantai','$CekJurusan[$i]','$RuangKuliah','$Kapasitas','$KapasitasUjian','$Keterangan','$Aktif')";
          mysql_query($sql)
          or die ();
          }	
          }  
    defaultRuang();
  break;

  case "editruang":
    editruang();
  break;
  
  case "delRuang":
       $sql="DELETE FROM ruang WHERE ID='$_GET[gos]'";
       $qry=mysql_query($sql)
       or die();
    defaultRuang();
  break;
}
?>
