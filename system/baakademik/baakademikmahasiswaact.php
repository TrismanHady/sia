<?php
session_start();
include "../../config/koneksi.php";
include "../../librari/library.php";

$page=$_GET[page];
$act=$_GET[PHPIdSession];

if ($page=='levelakademikmhs' AND $act=='addmhsw'){
  $kode= $_REQUEST['cmbj1'];

  $Tg=sprintf("%02d%02d%02d",$_POST[thntl],$_POST[blntl],$_POST[tgltl]);  
   $c=mysql_num_rows(mysql_query("SELECT * FROM mahasiswa WHERE NIM='$_POST[NIM]'"));
        if ($c > 0){
            ?>
            <script>
             alert('Data Anda Sudah Ada,\n.');                    
            </script>
            <?
        }
        else{
    $pass=md5($_POST[password]);
  $a=mysql_query("INSERT INTO mahasiswa (NIM,
  username,
  password,
  Angkatan,
  Kurikulum_ID,
  identitas_ID,
  Nama,StatusAwal_ID,
  StatusMhsw_ID,
  IDProg,
  kode_jurusan,
  PenasehatAkademik,
  Kelamin,
  WargaNegara,
  Kebangsaan,
  TempatLahir,
  TanggalLahir,
  Agama,
  StatusSipil,
  Telepon,
  Handphone,
  AlamatAsal,
  KotaAsal,
  RTAsal,
  RWAsal,
  KodePosAsal,
  PropinsiAsal,
  NegaraAsal)VALUES
  ('$_POST[NIM]','$_POST[username]','$pass','$_POST[Angkatan]','$_POST[nkur]','$_POST[identitas]','$_POST[Nama]','$_POST[StatusAwal_ID]','$_POST[StatusMhsw_ID]','$_POST[cmbp1]','$_POST[cmbj1]','$_POST[pa]','$_POST[Kelamin]','$_POST[WargaNegara]','$_POST[Kebangsaan]','$_POST[TempatLahir]','$Tg','$_POST[Agama]','$_POST[StatusSipil]','$_POST[Telepon]','$_POST[Handphone]','$_POST[Alamat]','$_POST[Kota]','$_POST[RT]','$_POST[RW]','$_POST[KodePos]','$_POST[Propinsi]','$_POST[Negara]')");
   }
  header('location:../media.php?page=levelakademikmhs&codd='.$kode);
}

elseif ($page=='levelakademikmhs' AND $act=='updmhsw'){
  $kode= $_REQUEST['cmbj'];
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  
  if (empty($_POST[password])){
  $Tg=sprintf("%02d%02d%02d",$_POST[thntl],$_POST[blntl],$_POST[tgltl]); 
  $tglls=sprintf("%02d%02d%02d",$_POST[thntlls],$_POST[blntlls],$_POST[tgltlls]); 
  mysql_query("UPDATE mahasiswa SET username='$_POST[username]',TempatLahir='$_POST[TempatLahir]',
  TanggalLahir='$Tg',
  Kelamin='$_POST[Kelamin]',
  WargaNegara='$_POST[WargaNegara]',
  Kebangsaan='$_POST[Kebangsaan]',
  Agama='$_POST[Agama]',
  StatusSipil='$_POST[StatusSipil]',
  AlamatAsal='$_POST[AlamatAsal]',
  RTAsal='$_POST[RTAsal]',
  RWAsal='$_POST[RWAsal]',
  KotaAsal='$_POST[KotaAsal]',
  KodePosAsal='$_POST[KodePosAsal]',
  PropinsiAsal='$_POST[PropinsiAsal]',
  NegaraAsal='$_POST[NegaraAsal]',
  Handphone='$_POST[Handphone]',
  Email='$_POST[Email]',
  Alamat='$_POST[Alamat]',
  RT='$_POST[RT]',
  RW='$_POST[RW]',
  Kota='$_POST[Kota]',
  KodePos='$_POST[KodePos]',
  Propinsi='$_POST[Propinsi]',
  Negara='$_POST[Negara]',
  Telepon='$_POST[Telepon]',
  identitas_ID='$_POST[cmi]',
  IDProg='$_POST[cmbp]',
  kode_jurusan='$_POST[cmbj]',
  PenasehatAkademik='$_POST[pa]',
  StatusAwal_ID='$_POST[StatusAwal_ID]',
  StatusMhsw_ID='$_POST[StatusMhsw_ID]',
  NamaAyah='$_POST[NamaAyah]',
  AgamaAyah='$_POST[AgamaAyah]',
  PendidikanAyah='$_POST[PendidikanAyah]',
  PekerjaanAyah='$_POST[PekerjaanAyah]',
  HidupAyah='$_POST[HidupAyah]',
  NamaIbu='$_POST[NamaIbu]',
  AgamaIbu='$_POST[AgamaIbu]',
  PendidikanIbu='$_POST[PendidikanIbu]',
  PekerjaanIbu='$_POST[PekerjaanIbu]',
  HidupIbu='$_POST[HidupIbu]',
  AlamatOrtu='$_POST[AlamatOrtu]',
  KotaOrtu='$_POST[KotaOrtu]',
  KodePosOrtu='$_POST[KodePosOrtu]',
  PropinsiOrtu='$_POST[PropinsiOrtu]',
  NegaraOrtu='$_POST[NegaraOrtu]',
  TeleponOrtu='$_POST[TeleponOrtu]',
  HandphoneOrtu='$_POST[HandphoneOrtu]',
  EmailOrtu='$_POST[EmailOrtu]',
  AsalSekolah='$_POST[AsalSekolah]',
  JenisSekolah_ID='$_POST[JenisSekolah_ID]',
  JurusanSekolah='$_POST[JurusanSekolah]',
  TahunLulus='$_POST[TahunLulus]',
  NilaiSekolah='$_POST[NilaiSekolah]',  
  aktif='$_POST[Aktif]'
  WHERE NIM='$_POST[NIM]'");  
  }
  else{
  $pass=md5($_POST[password]);
 // move_uploaded_file($lokasi_file,"foto_mhs/$nama_file");
  $Tg=sprintf("%02d%02d%02d",$_POST[thntl],$_POST[blntl],$_POST[tgltl]); 
  $tglls=sprintf("%02d%02d%02d",$_POST[thntlls],$_POST[blntlls],$_POST[tgltlls]); 
  mysql_query("UPDATE mahasiswa SET username='$_POST[username]',password='$pass',TempatLahir='$_POST[TempatLahir]',
  TanggalLahir='$Tg',
  Kelamin='$_POST[Kelamin]',
  WargaNegara='$_POST[WargaNegara]',
  Kebangsaan='$_POST[Kebangsaan]',
  Agama='$_POST[Agama]',
  StatusSipil='$_POST[StatusSipil]',
  AlamatAsal='$_POST[AlamatAsal]',
  RTAsal='$_POST[RTAsal]',
  RWAsal='$_POST[RWAsal]',
  KotaAsal='$_POST[KotaAsal]',
  KodePosAsal='$_POST[KodePosAsal]',
  PropinsiAsal='$_POST[PropinsiAsal]',
  NegaraAsal='$_POST[NegaraAsal]',
  Handphone='$_POST[Handphone]',
  Email='$_POST[Email]',
  Alamat='$_POST[Alamat]',
  RT='$_POST[RT]',
  RW='$_POST[RW]',
  Kota='$_POST[Kota]',
  KodePos='$_POST[KodePos]',
  Propinsi='$_POST[Propinsi]',
  Negara='$_POST[Negara]',
  Telepon='$_POST[Telepon]',
  identitas_ID='$_POST[cmi]',
  IDProg='$_POST[cmbp]',
  kode_jurusan='$_POST[cmbj]',
  PenasehatAkademik='$_POST[pa]',
  StatusAwal_ID='$_POST[StatusAwal_ID]',
  StatusMhsw_ID='$_POST[StatusMhsw_ID]',
  NamaAyah='$_POST[NamaAyah]',
  AgamaAyah='$_POST[AgamaAyah]',
  PendidikanAyah='$_POST[PendidikanAyah]',
  PekerjaanAyah='$_POST[PekerjaanAyah]',
  HidupAyah='$_POST[HidupAyah]',
  NamaIbu='$_POST[NamaIbu]',
  AgamaIbu='$_POST[AgamaIbu]',
  PendidikanIbu='$_POST[PendidikanIbu]',
  PekerjaanIbu='$_POST[PekerjaanIbu]',
  HidupIbu='$_POST[HidupIbu]',
  AlamatOrtu='$_POST[AlamatOrtu]',
  KotaOrtu='$_POST[KotaOrtu]',
  KodePosOrtu='$_POST[KodePosOrtu]',
  PropinsiOrtu='$_POST[PropinsiOrtu]',
  NegaraOrtu='$_POST[NegaraOrtu]',
  TeleponOrtu='$_POST[TeleponOrtu]',
  HandphoneOrtu='$_POST[HandphoneOrtu]',
  EmailOrtu='$_POST[EmailOrtu]',
  AsalSekolah='$_POST[AsalSekolah]',
  JenisSekolah_ID='$_POST[JenisSekolah_ID]',
  JurusanSekolah='$_POST[JurusanSekolah]',
  TahunLulus='$_POST[TahunLulus]',
  NilaiSekolah='$_POST[NilaiSekolah]',  
  aktif='$_POST[Aktif]'
  WHERE NIM='$_POST[NIM]'");   

  }    
  header('location:../media.php?page=levelakademikmhs&codd='.$kode);
}

elseif ($page=='levelakademikmhs' AND $act=='delmstmhsw'){
  $kode= $_REQUEST['codd'];
  mysql_query("DELETE FROM mahasiswa WHERE NIM='$_GET[gos]'");
  header('location:../media.php?page=levelakademikmhs&codd='.$kode);
}
?>
