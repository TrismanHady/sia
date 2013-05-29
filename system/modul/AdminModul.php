<?
switch($_GET[PHPIdSession]){
  // Semua content pada admin form terdapat pada folder form file form_modul.php //
  default:
      defaultmodul();
      defaultmodul1();
      break;  
  
  case"CariModul":
      carimodul();
  break; 
 
  case"TambahModul":
      tambahmodul();
  break;
  
  case"InputModul":
      $relasi_modul = $_POST['relasi_modul'];
      $nama_modul = $_POST['nama_modul']; 
      $url = $_POST['url'];   
      $menu_order = $_POST['menu_order'];        
      $keterangan = $_POST['keterangan'];
      $aktif= $_POST['aktif'];          
      $query = "INSERT INTO dropdownsystem(parent_id,
                                            judul,
                                            url,
                                            menu_order,
                                            keterangan,
                                            aktif) 
            	                       VALUES('$relasi_modul',
                                            '$nama_modul',                                
                                            '$url',
                                            '$menu_order',
                                            '$keterangan',
                                            '$aktif')";
      mysql_query($query);	  
      defaultmodul();
      defaultmodul1();

  break;
      
  case"InputGroup":
      $nama_group = $_POST['nama_group'];
      $urutan_group = $_POST['urutan_group']; 
        
      $query = "INSERT INTO groupmodul(relasi_modul,nama)VALUES('$urutan_group','$nama_group')";
      mysql_query($query);
        	  
      $nama_group = $_POST['nama_group'];
      $id_group = $_POST['id_group'];
      $parent_id ='0'; 
      $urutan_group = $_POST['urutan_group'];
      $query1 = "INSERT INTO dropdownsystem(parent_id,id_group,judul,menu_order)VALUES('$parent_id','$urutan_group','$nama_group','$urutan_group')";
      mysql_query($query1); 
  
      tambahgroup();
  break;        

  case "EditGroupModul":
      EditGroupModul();  
      GroupModul();
  break;
  
  case "UpdateGroup":
      $relasimodul = $_POST['relasi_modul1'];
      $update=mysql_query("UPDATE dropdownsystem SET id_group   = '$relasimodul',
                                                      judul     = '$_POST[nama]',
                                                      menu_order= '$relasimodul',
                                                      aktif     = '$_POST[aktif]'
                                               WHERE id_group   = '$_POST[relasi_modul]'");
      $data=mysql_fetch_array($update);
  
      $update=mysql_query("UPDATE groupmodul SET id_group     = '$_POST[id_group]',
                                                 relasi_modul = '$relasimodul',                                              
                                                 nama         = '$_POST[nama]' 
                                           WHERE id_group     = '$_POST[id_group]'");
      $data=mysql_fetch_array($update);
      tambahgroup();  
  break;

  case "HapusGroupModul":
      $sql=mysql_query("DELETE FROM groupmodul WHERE relasi_modul='$_GET[relasi_modul]'");
      $data=mysql_fetch_array($sql);
  
      $sql=mysql_query("DELETE FROM dropdownsystem WHERE id_group='$_GET[relasi_modul]'");
      $data=mysql_fetch_array($sql);
      tambahgroup();
  break;
  
  case "HapusModul":
      $sql=mysql_query("DELETE FROM dropdownsystem WHERE id='$_POST[id]'");
      $data=mysql_fetch_array($sql);

      defaultmodul();
      defaultmodul1();
  break;
   
  case "TambahGroup":
      tambahgroup();
  break;  
     
  case "EditModul":
      editmodul();
  break;
     
  case "UpdateModul":
      $update=mysql_query("UPDATE dropdownsystem SET  parent_id = '$_POST[parent_id]',
                                                      judul     = '$_POST[judul]',
                                                      url       = '$_POST[url]',
                                                      menu_order= '$_POST[menu_order]',
                                                      keterangan= '$_POST[keterangan]',
                                                      aktif= '$_POST[aktif]'
                                               WHERE id       = '$_POST[id]'");
      $data=mysql_fetch_array($update);
      defaultmodul();
      defaultmodul1();  
  break;   
}
?>
