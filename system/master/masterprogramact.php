<?
switch($_GET[PHPIdSession]){
 // Semua content pada program terdapat pada folder form file form_program.php //
  default:
    defProg();
  break;  

  case "tambahprogram":
    tambahprogram();     
  break;

  case "editprogram":
    editprogram();     
  break;
  
  case"InputProg":
        $Program_ID     = $_POST['Program_ID'];
        $nama_program     = $_POST['nama_program'];
        $cmi     = $_POST['cmi'];
        $aktif     = $_POST['aktif'];
        $cek=mysql_num_rows(mysql_query("SELECT * FROM program WHERE Program_ID='$Program_ID'"));
        if ($cek > 0){
            ?>
            <script>
             alert('Data Anda Sudah Ada,\n.');                    
            </script>
            <?
        }
        else{        
        $query = "INSERT INTO program(Program_ID,nama_program,Identitas_ID,aktif)VALUES('$Program_ID','$nama_program','$cmi','$aktif')";
        mysql_query($query);
        }	  
    defProg();
  break;

  case "UpdateProg":
    $update=mysql_query("UPDATE program SET Program_ID  = '$_POST[Program_ID]',
                                          nama_program  = '$_POST[nama_program]',
                                          Identitas_ID  = '$_POST[cmi]',
                                          aktif       = '$_POST[aktif]'                                                                                   
                                    WHERE ID          = '$_POST[ID]'");
    $data=mysql_fetch_array($update);
    defProg();    
  break;
  
  case "delprog";
        $sql="DELETE FROM program WHERE ID='$_GET[gos]'";
       $qry=mysql_query($sql)
       or die();
    defProg();
  break;
}
?>
