<?
switch($_GET[PHPIdSession]){
 // Semua content pada admin user terdapat pada folder form file form_user.php //
  default:
    defaultuser();
  break;  
 
  case "TambahAdminUser":
    tambahuser();		  
  break;  

  case "CariNamaUser":
    carinamauser();
  break;

  case "CariModulUser":
    carimoduluser();
  break;

  case "InputModulUser":
        $id_level =$_REQUEST['id_level'];
        $CekModul =$_REQUEST['CekModul'];

          $jum=count($CekModul);

          $sqlpil= "SELECT * FROM hakmodul WHERE id_level='$id_level'";
          $qrypil= mysql_query($sqlpil);
          while ($datapil=mysql_fetch_array($qrypil)){
          for($i=0; $i < $jum; ++$i){
          if ($datapil['id'] !=$CekModul[$i]){
          $sqldel= "DELETE FROM hakmodul WHERE id_level='$id_level' AND NOT id IN ('$CekModul[$i]')";   
          mysql_query($sqldel);

          }
          }
          }
        for($i=0; $i < $jum; ++$i){
          $sqlr="SELECT * FROM hakmodul WHERE id_level='$id_level'AND id='$CekModul[$i]'";
        	$qryr= mysql_query($sqlr);
        	$cocok= mysql_num_rows($qryr);
        	if (! $cocok==1){
        	$sql= "INSERT INTO hakmodul(id_level,id)";
        	$sql .="VALUES ('$id_level','$CekModul[$i]')";
          mysql_query($sql)
          or die ("SQL Input Relasi Gagal"
          .mysql_error());
          }
          }
          $pesan="Data Telah Berhasil Disimpan";
    defaultuser();         
  break;
 
  case"TambahUser":
        $username     = $_POST['username'];
        $password     = md5($_POST[password]);
        $keterangan   = $_POST['keterangan'];   
        $nama_lengkap = $_POST['nama_lengkap'];        
        $email        = $_POST['email'];
        $telepon      = $_POST['telepon'];
        $aktif    = $_POST['aktif'];
        $query = "INSERT INTO admin(id_level,username,password,keterangan,nama_lengkap,email,telepon,aktif)VALUES('1','$username','$password','$keterangan','$nama_lengkap','$email','$telepon','$aktif')";
        mysql_query($query);	  
    defaultuser();
  break;
     
  case "EditAdminUser":
    edituser();
  break;

  case "UpdateUser":
    // Apabila password tidak diubah
    if (empty($_POST[password])) {
    $update=mysql_query("UPDATE admin SET username    = '$_POST[username]',                                          
                                          keterangan  = '$_POST[keterangan]',
                                          nama_lengkap= '$_POST[nama_lengkap]',
                                          email       = '$_POST[email]',
                                          telepon     = '$_POST[telepon]',
                                          aktif       = '$_POST[aktif]'                                                                                   
                                    WHERE id          = '$_POST[id]'");
    $data=mysql_fetch_array($update);
    
    }
       
    // Apabila password diubah
    else{
      $password=md5($_POST[password]);
      $update1=mysql_query("UPDATE admin SET username    = '$_POST[username]',
                                            password    = '$password',
                                            keterangan  = '$_POST[keterangan]',
                                            nama_lengkap= '$_POST[nama_lengkap]',
                                            email       = '$_POST[email]',
                                            telepon     = '$_POST[telepon]',
                                            aktif       = '$_POST[aktif]'                                                                                   
                                     WHERE id          = '$_POST[id]'");
      $data1=mysql_fetch_array($update1);
    }
    defaultuser();    
  break;


  case "HapusAdminUser":
       $sql="DELETE FROM admin WHERE id='$_GET[id]'";
       $qry=mysql_query($sql)
       or die ("SQL ERROR".mysql_error());
    defaultuser();
  break;

}
?>
