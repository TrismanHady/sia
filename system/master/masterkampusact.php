<?
switch($_GET[PHPIdSession]){

  default:
    defaultKampus();
  break;  
  case"InputKampus":
        $Kampus_ID     = $_POST['Kampus_ID'];
        $Nama     = $_POST['Nama'];
        $Identitas_ID     = $_POST['Identitas_ID'];
        $Alamat     = $_POST['Alamat'];
        $Kota     = $_POST['Kota'];
        $Telepon     = $_POST['Telepon'];
        $Fax     = $_POST['Fax'];
        $Aktif     = $_POST['Aktif'];
        $cek=mysql_num_rows(mysql_query("SELECT * FROM kampus WHERE Kampus_ID='$Kampus_ID' AND Nama='$Nama'"));
        if ($cek > 0){
            ?>
            <script>
             alert('Data Anda Sudah Ada,\n.');                    
            </script>
            <?
        }else{                
        $query = "INSERT INTO kampus(Kampus_ID,Nama,Alamat,Kota,Identitas_ID,Telepon,Fax,Aktif)VALUES('$Kampus_ID','$Nama','$Alamat','$Kota','$Identitas_ID','$Telepon','$Fax','$Aktif')";
        mysql_query($query);
        }	  
    defaultKampus();
  break;

  case "editKampus":
    editKampus();
  break;

  case "UpdateKampus":
    $update=mysql_query("UPDATE kampus SET Kampus_ID  = '$_POST[Kampus_ID]',
                                          Nama  = '$_POST[Nama]',
                                          Alamat  = '$_POST[Alamat]',
                                          Kota  = '$_POST[Kota]',
                                          Identitas_ID  = '$_POST[Identitas_ID]',
                                          Telepon  = '$_POST[Telepon]',
                                          Fax  = '$_POST[Fax]',
                                          Aktif       = '$_POST[Aktif]'                                                                                   
                                    WHERE Kampus_ID          = '$_POST[codd]'");
    $data=mysql_fetch_array($update);
    defaultKampus();    
  break;

  case "delKampus":
       $sql="DELETE FROM kampus WHERE Kampus_ID='$_GET[gos]'";
       $qry=mysql_query($sql)
       or die();
    defaultKampus();
  break;
}
?>
