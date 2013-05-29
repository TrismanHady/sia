<?
switch($_GET[PHPIdSession]){
 // Semua content pada admin karyawan terdapat pada folder form file form_karyawan.php //
  default:
    defaultkaryawan();
  break;  
 
  case "TambahAdminKaryawan":
    tambahkaryawan();		  
  break;  

  case "CariNamaKaryawan":
    carinamakaryawan();
  break;

  case "CariModulKaryawan":
    carimodulkaryawan();
  break;

  case "InputModulKarywan":
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
          or die ();
          }
          }
          $pesan="Data Telah Berhasil Disimpan";
    defaultkaryawan();         
  break;

  case"TambahKaryawan":
    //  $id_level     = $_POST['id_level'];
        $username     = $_POST['username'];
        $password     = md5($_POST[password]);
        $keterangan   = $_POST['keterangan'];   
        $nama_lengkap = $_POST['nama_lengkap'];        
        $identitas      = $_POST['identitas'];
        $jurusan      = $_POST['jurusan'];
        $email        = $_POST['email'];
        $telepon      = $_POST['telepon'];
        $aktif    = $_POST['aktif'];
        $query = "INSERT INTO karyawan(id_level,username,password,keterangan,nama_lengkap,Identitas_ID,kode_jurusan,email,telepon,aktif)VALUES('3','$username','$password','$keterangan','$nama_lengkap','$identitas','$jurusan','$email','$telepon','$aktif')";
        mysql_query($query);	  
    defaultkaryawan();
  break;
     
  case "EditAdminKaryawan":
    editkaryawan();
  break;

  case "UpdateKaryawan":
    // Apabila password tidak diubah
    if (empty($_POST[password])) {
    $update=mysql_query("UPDATE karyawan SET username    = '$_POST[username]',                                          
                                          keterangan  = '$_POST[keterangan]',
                                          nama_lengkap= '$_POST[nama_lengkap]',
                                          Identitas_ID       = '$_POST[identitas]',
                                          kode_jurusan       = '$_POST[jurusan]',
                                          email       = '$_POST[email]',
                                          telepon     = '$_POST[telepon]',
                                          aktif       = '$_POST[aktif]'                                                                                   
                                    WHERE id          = '$_POST[id]'");
    $data=mysql_fetch_array($update);
    
    }
       
    // Apabila password diubah
    else{
      $password=md5($_POST[password]);
      $update1=mysql_query("UPDATE karyawan SET username    = '$_POST[username]',
                                            password    = '$password',
                                            keterangan  = '$_POST[keterangan]',
                                            nama_lengkap= '$_POST[nama_lengkap]',
                                          Identitas_ID       = '$_POST[identitas]',
                                            kode_jurusan       = '$_POST[jurusan]',
                                            email       = '$_POST[email]',
                                            telepon     = '$_POST[telepon]',
                                            aktif       = '$_POST[aktif]'                                                                                   
                                     WHERE id          = '$_POST[id]'");
      $data1=mysql_fetch_array($update1);
    }
    defaultkaryawan();    
  break;


  case "HapusAdminKaryawan":
       $sql="DELETE FROM karyawan WHERE id='$_GET[id]'";
       $qry=mysql_query($sql)
       or die ("SQL ERROR".mysql_error());
    defaultkaryawan();
  break;
}
?>
