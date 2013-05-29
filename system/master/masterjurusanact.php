<?
switch($_GET[PHPIdSession]){

  default:
    defaultjurusan();
  break;  

  case "editjurusan":
    editjurusan();
  break;
  case "addprodins":
        $Identitas_ID     = $_POST['cmbIns1'];
        $kode_jurusan     = $_POST['kode_jurusan'];
        $nama_jurusan     = $_POST['nama_jurusan'];         
        $jenjang        = $_POST['jenjang'];
        $Akreditasi        = $_POST['Akreditasi'];
        $NoSKDikti        = $_POST['NoSKDikti'];
        $TglSKDikti=sprintf("%02d%02d%02d",$_POST[thn_SKDikti],$_POST[bln_SKDikti],$_POST[tgl_SKDikti]);
        $NoSKBAN        = $_POST['NoSKBAN'];
        $TglSKBAN=sprintf("%02d%02d%02d",$_POST[thn_SKBAN],$_POST[bln_SKBAN],$_POST[tgl_SKBAN]);        
        $Aktif        = $_POST['Aktif'];

        $cek=mysql_num_rows(mysql_query("SELECT * FROM jurusan WHERE Identitas_ID='$Identitas_ID' AND kode_jurusan='$kode_jurusan'"));
        if ($cek > 0){
            ?>
            <script>
             alert('Data Anda Sudah Ada,\n.');                    
            </script>
            <?
        }else{        
        	mysql_query("INSERT INTO jurusan(Identitas_ID,kode_jurusan,nama_jurusan,jenjang,Akreditasi,
                                      NoSKDikti,
                                      TglSKDikti,
                                      NoSKBAN,
                                      TglSKBAN,
                                      Aktif)VALUES ('$Identitas_ID',
                                      '$kode_jurusan',
                                      '$nama_jurusan',
                                      '$jenjang',
                                      '$Akreditasi',
                                      '$NoSKDikti',
                                      '$TglSKDikti',
                                      '$NoSKBAN',
                                      '$TglSKBAN',
                                      '$Aktif')");
   
          }  
    defaultjurusan();
  break;

  case "updpodins":
        $TglSKDikti=sprintf("%02d%02d%02d",$_POST[thn_SKDikti],$_POST[bln_SKDikti],$_POST[tgl_SKDikti]);
        $TglSKBAN=sprintf("%02d%02d%02d",$_POST[thn_SKBAN],$_POST[bln_SKBAN],$_POST[tgl_SKBAN]);               
        $update=mysql_query("UPDATE jurusan SET Identitas_ID ='$_POST[cmbIns1]',
                                      kode_jurusan      ='$_POST[kode_jurusan]',
                                      nama_jurusan      ='$_POST[nama_jurusan]',
                                      jenjang           ='$_POST[jenjang]',
                                      Akreditasi        ='$_POST[Akreditasi]',
                                      NoSKDikti         ='$_POST[NoSKDikti]',
                                      TglSKDikti        ='$TglSKDikti',
                                      NoSKBAN           ='$_POST[NoSKBAN]',
                                      TglSKBAN          ='$TglSKBAN',
                                      Aktif             ='$_POST[Aktif]'
                                  WHERE jurusan_ID     ='$_POST[jurusan_ID]'");
          $data=mysql_fetch_array($update);
    defaultjurusan($_GET[ges]);
  break;

  case "exprodi":
       $sql="DELETE FROM jurusan WHERE jurusan_ID='$_GET[gos]'";
       $qry=mysql_query($sql)
       or die();
    defaultjurusan();
}
?>
