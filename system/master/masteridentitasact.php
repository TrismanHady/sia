<?
switch($_GET[PHPIdSession]){

  default:
    defaultIdenUniv();
  break;  
	  
  case "edit":
    editidentitas();
  break;

  case "tambahidentitas":
    tambahidentitas();
   break;
       
  case"InputIdntUniv":
        $TglMulai=sprintf("%02d%02d%02d",$_POST[thn_mulai],$_POST[bln_mulai],$_POST[tgl_mulai]);
        $TglAkta=sprintf("%02d%02d%02d",$_POST[thn_akta],$_POST[bln_akta],$_POST[tgl_akta]);
        $TglSah=sprintf("%02d%02d%02d",$_POST[thn_sah],$_POST[bln_sah],$_POST[tgl_sah]);
        $Kode     = $_POST['Kode'];
        $KodeHukum     = $_POST['KodeHukum'];
        $Nama   = $_POST['Nama'];         
        $Alamat1        = $_POST['Alamat1'];
        $Kota      = $_POST['Kota'];
        $KodePos      = $_POST['KodePos']; 
        $Telepon      = $_POST['Telepon'];
        $Fax      = $_POST['Fax'];
        $Email      = $_POST['Email'];
        $Website      = $_POST['Website'];
        $NoAkta      = $_POST['NoAkta'];
        $NoSah      = $_POST['NoSah'];      
        $NA        = $_POST['NA'];

        $cek=mysql_num_rows(mysql_query
             ("SELECT * FROM identitas  WHERE Identitas_ID='$Kode'"));
        if ($cek > 0){
            ?>
            <script>
             alert('Data Anda Sudah Ada, Program Mencoba Entrykan Data yang Sama\n.');                    
            </script>
            <?
        }
        else{
        $query = "INSERT INTO identitas(Identitas_ID,KodeHukum,Nama_Identitas,TglMulai,Alamat1,Kota,KodePos,Telepon,Fax,Email,Website,NoAkta,TglAkta,NoSah,TglSah,Aktif)VALUES('$Kode','$KodeHukum','$Nama','$TglMulai','$Alamat1','$Kota','$KodePos','$Telepon','$Fax','$Email','$Website','$NoAkta','$TglAkta','$NoSah','$TglSah','$NA')";
        mysql_query($query);
        }	  
    defaultIdenUniv();
  break;
  
  case "UpdateIdntUniv":
    $TglMulai=sprintf("%02d%02d%02d",$_POST[thn_mulai],$_POST[bln_mulai],$_POST[tgl_mulai]);
    $TglAkta=sprintf("%02d%02d%02d",$_POST[thn_akta],$_POST[bln_akta],$_POST[tgl_akta]);
    $TglSah=sprintf("%02d%02d%02d",$_POST[thn_sah],$_POST[bln_sah],$_POST[tgl_sah]);
    $update=mysql_query("UPDATE identitas SET Identitas_ID  = '$_POST[Kode]',
                                          KodeHukum  = '$_POST[KodeHukum]',
                                          Nama_Identitas= '$_POST[Nama]',
                                          TglMulai       = '$TglMulai',
                                          Alamat1     = '$_POST[Alamat1]',
                                          Kota     = '$_POST[Kota]',
                                          KodePos     = '$_POST[KodePos]',
                                          Telepon     = '$_POST[Telepon]',
                                          Fax     = '$_POST[Fax]',
                                          Email     = '$_POST[Email]',
                                          Website     = '$_POST[Website]',
                                          NoAkta     = '$_POST[NoAkta]',
                                          TglAkta     = '$TglAkta',
                                          NoSah     = '$_POST[NoSah]',
                                          TglSah     = '$TglSah',
                                          Aktif       = '$_POST[NA]'                                                                                   
                                    WHERE ID          = '$_POST[ID]'");
    $data=mysql_fetch_array($update);
    defaultIdenUniv();    
  break;

  case "HapusIdntUniv":
       $sql="DELETE FROM identitas WHERE ID='$_GET[gos]'";
       $qry=mysql_query($sql)
       or die();
    defaultIdenUniv();
  break;

}
?>
