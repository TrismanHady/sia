<?
switch($_GET[PHPIdSession]){

  default:
    defaultmstDosen();
  break;  

  case "tambahmstDosen":
    tambahmstDosen();
  break;  

  case "carimstDosen":
    carimstDosen();
  break;

   case "CariModulDosen":
    CariModulDosen();
  break; 
  
  case"addDosn":
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file;
       	  
        $TanggalLahir=sprintf("%02d%02d%02d",$_POST[thnlahir],$_POST[blnlahir],$_POST[tgllahir]);

          if (!empty($_POST[Jurusan_ID])){
               $jur = $_POST[Jurusan_ID];
               $tag=implode(',',$jur);
          }
        $cek=mysql_num_rows(mysql_query("SELECT * FROM dosen WHERE NIDN='$_POST[NIDN]'"));
        if ($cek > 0){
            ?>
            <script>
             alert('Data Anda Sudah Ada,\n.');                    
            </script>
            <?
        }
        else{        
    $pass=md5($_POST[password]);
    mysql_query("INSERT INTO dosen(username,password,
          NIDN,
          nama_lengkap,
          TempatLahir,
          TanggalLahir,
          Agama,
          Email,
          Telepon,
          Handphone,
          Identitas_ID,
          Jurusan_ID,      
          Gelar,         
          Aktif)
          VALUES('$_POST[username]','$pass',
          '$_POST[NIDN]',
          '$_POST[nama_lengkap]',
          '$_POST[TempatLahir]',
          '$TanggalLahir',
          '$_POST[Agama]',       
          '$_POST[Email]',
          '$_POST[Telepon]',
          '$_POST[Handphone]',
          '$_POST[identitas]',
          '$tag',
          '$_POST[Gelar]',
          '$_POST[Aktif]')");
          }
    defaultmstDosen();
  break;
  
case "updsn":
    $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];   	  
        $TanggalLahir=sprintf("%02d%02d%02d",$_POST[thnlahir],$_POST[blnlahir],$_POST[tgllahir]);
        $TglBekerja=sprintf("%02d%02d%02d",$_POST[ThnBekerja],$_POST[BlnBekerja],$_POST[TglBekerja]);

          if (!empty($_POST[kode_jurusan])){
               $jur = $_POST[kode_jurusan];
               $tag=implode(',',$jur);
          }


  // Apabila gambar tidak diganti
  if (empty($_POST[password])) {
    mysql_query("UPDATE dosen SET username = '$_POST[username]',
          NIDN = '$_POST[NIDN]',
          nama_lengkap = '$_POST[nama_lengkap]',
          TempatLahir = '$_POST[TempatLahir]',
          TanggalLahir = '$TanggalLahir',
          KTP = '$_POST[KTP]',
          Agama = '$_POST[Agama]',
          Alamat = '$_POST[Alamat]',
          Email = '$_POST[Email]',
          Telepon = '$_POST[Telepon]',
          Handphone = '$_POST[Handphone]',
          Keterangan = '$_POST[Keterangan]',
          Kota = '$_POST[Kota]',
          Propinsi = '$_POST[Propinsi]',
          Negara = '$_POST[Negara]',
          Identitas_ID = '$_POST[identitas]',
          Homebase = '$_POST[Homebase]',
          Jurusan_ID = '$tag',      
          Gelar = '$_POST[Gelar]',
          Jenjang_ID = '$_POST[Jenjang_ID]',
          Keilmuan = '$_POST[Keilmuan]',
          Kelamin_ID = '$_POST[Kelamin_ID]',
          Jabatan_ID = '$_POST[Jabatan_ID]',
          JabatanDikti_ID = '$_POST[JabatanDikti_ID]',
          InstitusiInduk = '$_POST[InstitusiInduk]',
          TglBekerja= '$_POST[InstitusiInduk]',
          StatusDosen_ID = '$_POST[StatusDosen_ID]',
          StatusKerja_ID = '$_POST[StatusKerja_ID]',
          Aktif = '$_POST[Aktif]'
          WHERE dosen_ID   = '$_POST[id]'");

  }else{
        $password=md5($_POST[password]);
    mysql_query("UPDATE dosen SET username = '$_POST[username]',
          password='$password',
          NIDN = '$_POST[NIDN]',
          nama_lengkap = '$_POST[nama_lengkap]',
          TempatLahir = '$_POST[TempatLahir]',
          TanggalLahir = '$TanggalLahir',
          KTP = '$_POST[KTP]',
          Agama = '$_POST[Agama]',
          Alamat = '$_POST[Alamat]',
          Email = '$_POST[Email]',
          Telepon = '$_POST[Telepon]',
          Handphone = '$_POST[Handphone]',
          Keterangan = '$_POST[Keterangan]',
          Kota = '$_POST[Kota]',
          Propinsi = '$_POST[Propinsi]',
          Negara = '$_POST[Negara]',
          Identitas_ID = '$_POST[identitas]',
          Homebase = '$_POST[Homebase]',
          Jurusan_ID = '$tag',      
          Gelar = '$_POST[Gelar]',
          Jenjang_ID = '$_POST[Jenjang_ID]',
          Keilmuan = '$_POST[Keilmuan]',
          Kelamin_ID = '$_POST[Kelamin_ID]',
          Jabatan_ID = '$_POST[Jabatan_ID]',
          JabatanDikti_ID = '$_POST[JabatanDikti_ID]',
          InstitusiInduk = '$_POST[InstitusiInduk]',
          TglBekerja= '$_POST[InstitusiInduk]',
          StatusDosen_ID = '$_POST[StatusDosen_ID]',
          StatusKerja_ID = '$_POST[StatusKerja_ID]',
          Aktif = '$_POST[Aktif]'
          WHERE dosen_ID   = '$_POST[id]'");
}
      defaultmstDosen();
  break;

  case "InputModulDosen":
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
    defaultmstDosen();         
  break;

  case "editmstDosen":
    editmstDosen();
  break;

  case "delmstdsn":
       $sql="DELETE FROM dosen WHERE username='$_GET[gos]'";
       $qry=mysql_query($sql)
       or die();
    defaultmstDosen();
  break;

}
?>
