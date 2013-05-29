<?php 
    $edit=mysql_query("SELECT * FROM karyawan WHERE username='$_SESSION[username]'");
    $data=mysql_fetch_array($edit);
switch($_GET[PHPIdSession]){

    default:
    $kode= $_REQUEST['codd'];
    ?>
    <script language="javascript" type="text/javascript">
    <!--
    function MM_jumpMenu(targ,selObj,restore){// v3.0
     eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
    if (restore) selObj.selectedIndex=0;
    }
    //-->
    </script>
    <?
       echo"<div id=headermodul>Master Mahasiswa</div>            
            <div id=groupmodul1>
            <table id=tablemodul><form method=post  action='?page=levelakademikmhs&PHPIdSession=sercmhs'>
          <input name=kode_jurusan type=hidden value=$data[kode_jurusan]></td>
        </tr>
        <tr><td class=cc>Cari Nama Mahasiswa </td>    <td colspan=2 class=cb> : <input type=text name=nmhs size=25> <input type=submit name=submit value=Cari class=tombol></tr></td>		
        <tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a class=s href=?page=levelakademikmhs&PHPIdSession=TambahMhs>Tambah Mahasiswa</a> </tr></td>					
            <table id=tablemodul>
            <tr><th>No</th><th>NIM</th><th>Nama Lengkap</th><th>Program Studi/<br>Jurusan</th><th>Program</th><th>Status<br>MHS</th><th>Angkatan</th><th>Penasehat<br>Akademik</th><th>Aksi</th></tr>";
            $p      = new Paging;
            $batas  = 10;
            $posisi = $p->cariPosisi($batas);
        
                     
                      $sql="SELECT * FROM view_mahasiswa WHERE kode_jurusan='$data[kode_jurusan]' ORDER BY NIM LIMIT $posisi,$batas";
                    	$qry= mysql_query($sql)
                    	or die ();
                    	while ($r=mysql_fetch_array($qry)){
                      if(($no % 2)==0){
                          $warna="#FFFFFF";
                      }
                      else{
                          $warna="#E1E1E1";
                      }            	
                    	$no++;
                         echo "<tr bgcolor=$warna>                            
                               <td>$no</td>
                  		         <td>$r[NIM]</td>
                  		         <td>$r[Nama]</td>
                  		         <td>$r[kode_jurusan] - $r[nama_jurusan]</td>
                  		         <td>$r[Program_ID]</td>
                               <td>$r[StatusMhsw_ID]</td>
                   		         <td>$r[Angkatan]</td>
                   		         <td>$r[npa], $r[Gelar]</td>
                               <td><a href='?page=levelakademikmhs&PHPIdSession=chagmstmhs&gis=$r[NIM]&codd=$r[kode_jurusan]'><img src=../img/edit.png></a> |
                               <a href=\"baakademik/baakademikmahasiswaact.php?page=levelakademikmhs&PHPIdSession=delmstmhsw&gos=$r[NIM]&codd=$r[kode_jurusan]\"
                               onClick=\"return confirm('Apakah Anda benar-benar akan menghapus $r[NIM] - $r[Nama]?')\"><img src=../img/del.jpg></a>
                               </td></tr>";        
                      }
                      echo"</table>";
    
              $jmldata = mysql_num_rows(mysql_query("SELECT * FROM mahasiswa WHERE kode_jurusan='$data[kode_jurusan]'"));
           
              $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
              $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
          
              echo "<p>$linkHalaman</p></div>";     
        break;

  case "sercmhs":
    $kode= $_REQUEST['codd'];
    ?>
    <script language="javascript" type="text/javascript">
    <!--
    function MM_jumpMenu(targ,selObj,restore){// v3.0
     eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
    if (restore) selObj.selectedIndex=0;
    }
    //-->
    </script>
    <?
       echo"<div id=headermodul>Master Mahasiswa</div>            
            <div id=groupmodul1>
            <table id=tablemodul><form method=post  action='?page=levelakademikmhs&PHPIdSession=sercmhs'>
          <input name=kode_jurusan type=hidden value=$data[kode_jurusan]></td>
        </tr>
        <tr><td class=cc>Cari Nama Mahasiswa </td>    <td colspan=2 class=cb> : <input type=text name=nmhs size=25> <input type=submit name=submit value=Cari class=tombol></tr></td>		
        <tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a class=s href=?page=levelakademikmhs&PHPIdSession=TambahMhs>Tambah Mahasiswa</a> </tr></td>					
            <table id=tablemodul>
            <tr><th>No</th><th>NIM</th><th>Nama Lengkap</th><th>Program Studi/<br>Jurusan</th><th>Program</th><th>Status<br>MHS</th><th>Angkatan</th><th>Penasehat<br>Akademik</th><th>Aksi</th></tr>";
            $p      = new Paging;
            $batas  = 10;
            $posisi = $p->cariPosisi($batas);
        
                     
                      $sql="SELECT * FROM view_mahasiswa WHERE kode_jurusan='$data[kode_jurusan]' AND Nama LIKE '%$_POST[nmhs]%' ORDER BY NIM LIMIT $posisi,$batas";
                    	$qry= mysql_query($sql)
                    	or die ();
                    	while ($r=mysql_fetch_array($qry)){
                      if(($no % 2)==0){
                          $warna="#FFFFFF";
                      }
                      else{
                          $warna="#E1E1E1";
                      }            	
                    	$no++;
                         echo "<tr bgcolor=$warna>                            
                               <td>$no</td>
                  		         <td>$r[NIM]</td>
                  		         <td>$r[Nama]</td>
                  		         <td>$r[kode_jurusan] - $r[nama_jurusan]</td>
                  		         <td>$r[Program_ID]</td>
                               <td>$r[StatusMhsw_ID]</td>
                   		         <td>$r[Angkatan]</td>
                   		         <td>$r[npa], $r[Gelar]</td>
                               <td><a href='?page=levelakademikmhs&PHPIdSession=chagmstmhs&gis=$r[NIM]&codd=$r[kode_jurusan]'><img src=../img/edit.png></a> |
                               <a href=\"baakademik/baakademikmahasiswaact.php?page=levelakademikmhs&PHPIdSession=delmstmhsw&gos=$r[NIM]&codd=$r[kode_jurusan]\"
                               onClick=\"return confirm('Apakah Anda benar-benar akan menghapus $r[NIM] - $r[Nama]?')\"><img src=../img/del.jpg></a>
                               </td></tr>";        
                      }
                      echo"</table>";
    
              $jmldata = mysql_num_rows(mysql_query("SELECT * FROM mahasiswa WHERE kode_jurusan='$data[kode_jurusan]'"));
           
              $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
              $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
          
              echo "<p>$linkHalaman</p></div>";     
  break;
  
  case "chagmstmhs":
  $id= $_REQUEST['id'];
  $kode= $_REQUEST['codd'];
echo"<div id=headermodul>Master Mahasiswa</div>";  
              $e=mysql_query("SELECT * FROM view_mahasiswa WHERE NIM='$_GET[gis]' AND kode_jurusan='$_GET[codd]'");
              $r=mysql_fetch_array($e); 
         echo"<div id=groupmodul1><table id=tablemodul>
                <tr><th colspan=3><h3>Data Mahasiswa</h3></th></tr>
                <tr><td class=cc>NIM</td>    <td class=cb><h3>: $r[NIM]</h3></td>
                                    <td rowspan=5><img alt='galeri' src='foto_mhs/$r[Foto]' height=160></td></tr>
                <tr><td class=cc>Nama Lengkap</td class=cb>          <td class=cb><h3>: $r[Nama]</h3></td></tr>
                <tr><td class=cc>Program</td>    <td class=cb><h3>: $r[Program_ID]</h3></td></tr>
                <tr><td class=cc>Program Studi</td>    <td class=cb><h3>: $r[kode_jurusan] - $r[nama_jurusan]</h3></td></tr>
                <tr><td class=cc>Pilihan  </td><td class=cb> : <a class='s' href='?page=levelakademikmhs&codd=$_GET[codd]'>Kembali Ke Daftar Mahasiswa</a> </td></tr>
              </table></div>";
           ?>   
          <div id="groupmodul1">
            <div id="tabsview">
		          <div id="tab1" class="tab_sel" onclick="javascript: displayPanel('1');" align="center">&nbsp; Akademik &nbsp;</div>
 		          <div id="tab2" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('2');" align="center">&nbsp; Data Pribadi &nbsp;</div>
 		          <div id="tab3" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('3');" align="center">&nbsp; Alamat Tetap &nbsp;</div>
 		          <div id="tab4" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('4');" align="center">&nbsp; Orang Tua &nbsp;</div>
 		          <div id="tab5" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('5');" align="center">&nbsp; Asal Sekolah &nbsp;</div>
            </div>
	          <div class="tab_bdr"></div>
            <div class="panel" id="panel1" style="display: block;">
              <span>
              <ul>        
                <?php
                      echo"<form method=post action='baakademik/baakademikmahasiswaact.php?page=levelakademikmhs&PHPIdSession=updmhsw' enctype='multipart/form-data'> 
                            <table id=tablemodul>
                            <tr><td class=cc>Institusi *</td>    <td class=cb>      <select name='cmi' id=cmi1>
                                      <option value=0 selected>- Pilih Institusi -</option>";
                                      $t=mysql_query("SELECT * FROM identitas ORDER BY ID");
                                      while($w=mysql_fetch_array($t)){
                                      if ($r[identitas_ID]==$w[Identitas_ID]){
                                       echo "<option value=$w[Identitas_ID] selected>$w[Identitas_ID] - $w[Nama_Identitas]</option>";
                                        }
                                        else{            
                                        echo "<option value=$w[Identitas_ID]>$w[Identitas_ID] - $w[Nama_Identitas]</option>";
                                      }}
                              echo "</select></td></tr>
                                
                            <tr><td class=cc>Program Studi *</td>    <td class=cb>      <select name='cmbj' id=cmbj1>
                                      <option value=0 selected>- Pilih Jurusan -</option>";
                                      $tampil=mysql_query("SELECT * FROM jurusan WHERE Identitas_ID='$r[identitas_ID]' ORDER BY jurusan_ID");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($r[kode_jurusan]==$w[kode_jurusan]){
                                       echo "<option value=$w[kode_jurusan] selected>$w[kode_jurusan] - $w[nama_jurusan]</option>";
                                        }
                                        else{            
                                        echo "<option value=$w[kode_jurusan]>$w[kode_jurusan] - $w[nama_jurusan]</option>";
                                      }}
                              echo "</select></td></tr>
                            <tr><td class=cc>Program *</td>    <td class=cb><select name='cmbp' id=cmbp>
                                      <option value=0 selected>- Pilih Program -</option>";
                                      $tampil=mysql_query("SELECT * FROM program WHERE Identitas_ID='$r[identitas_ID]' ORDER BY Identitas_ID");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($r[IDProg]==$w[ID]){
                                          echo "<option value=$w[ID] selected>$w[Program_ID] - $w[nama_program]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[ID]>$w[Program_ID] - $w[nama_program]</option>";
                                      }
                                 }                                
                              echo "</select></td></tr>
                            <tr><td class=cc>Status Awal *</td>    <td class=cb><select name='StatusAwal_ID'>
                                      <option value=0 selected>- Pilih Status Awal Mahasiswa -</option>";
                                      $tampil=mysql_query("SELECT * FROM statusawal ORDER BY StatusAwal_ID");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($r[StatusAwal_ID]==$w[StatusAwal_ID]){
                                          echo "<option value=$w[StatusAwal_ID] selected>$w[StatusAwal_ID] - $w[Nama]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[StatusAwal_ID]>$w[StatusAwal_ID] - $w[Nama]</option>";
                                      }
                                 }                                
                              echo "</select></td></tr>
                            <tr><td class=cc>Status Mahasiswa *</td>    <td class=cb><select name='StatusMhsw_ID'>
                                      <option value=0 selected>- Pilih Status Mahasiswa -</option>";
                                      $tampil=mysql_query("SELECT * FROM statusmhsw ORDER BY StatusMhsw_ID");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($r[StatusMhsw_ID]==$w[StatusMhsw_ID]){
                                          echo "<option value=$w[StatusMhsw_ID] selected>$w[StatusMhsw_ID] - $w[Nama]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[StatusMhsw_ID]>$w[StatusMhsw_ID] - $w[Nama]</option>";
                                      }
                                 }                                
                              echo "</select></td></tr>
                          <tr><td class=cc>Penasehat Akademik *</td>    <td class=cb><select name='pa'>
                                      <option value=0 selected>- Pilih Penasehat Akademik -</option>";
                                      $tampil=mysql_query("SELECT * FROM dosen WHERE Identitas_ID='$r[identitas_ID]' AND jurusan_ID LIKE '%$r[kode_jurusan]%' ORDER BY dosen_ID");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($r[pa]==$w[NIDN]){
                                          echo "<option value=$w[NIDN] selected>$w[nama_lengkap], $w[Gelar]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[NIDN]>$w[nama_lengkap], $w[Gelar]</option>";
                                      }
                                 }                                
                              echo "</select></td></tr>
                          </table>";
                ?>      
              </ul>
              </span>
            </div>
            <div class="panel" id="panel3" style="display: none;">
              <span>
              <ul>            
                <?php             
                    echo" 
                          <table id=tablemodul><input type=hidden name=NIDN value='$r[NIDN]'>
                          <tr><td colspan=2 class=cc><strong>Alamat Menetap Bagi Mahasiswa Luar Daerah</strong></td></tr>
                          <tr><td class=cc>Alamat</td>    <td class=cb><input type=text name=Alamat size=60 value='$r[Alamat]'></td></tr>
                          <tr><td class=cc>RT</td>    <td class=cb><input type=text name=RT size=10 value='$r[RT]'>
                                  RW    <input type=text name=RW size=10 value='$r[RW]'></td></tr>
                          <tr><td class=cc>Kota</td>    <td class=cb><input type=text name=Kota value='$r[Kota]'>
                                  Kodepos      <input type=text name=KodePos size=10 value='$r[KodePos]'></td></tr>
                          <tr><td class=cc>Propinsi</td>    <td class=cb><input type=text name=Propinsi size=40 value='$r[Propinsi]'></td></tr>
                          <tr><td class=cc>Negara</td>    <td class=cb><input type=text name=Negara value='$r[Negara]'></td></tr>
                          <tr><td class=cc>Telepon</td>    <td class=cb><input type=text name=Telepon value='$r[Telepon]'></td></tr></table>";
                ?>                    
              </ul>
              </span>
            </div>
            <div class="panel" id="panel2" style="display: none;">
              <span>
              <ul>            
                <?php
                      $e=mysql_query("SELECT * FROM mahasiswa WHERE NIM='$_GET[gis]'");
                      $re=mysql_fetch_array($e);
                  
                 echo"<input type=hidden name=NIM value='$re[NIM]'>
                      <table id=tablemodul>
                      <tr><td colspan=2 class=cc><strong>Sesuai Dengan KTP atau Identitas Resmi Lainnya..!!!</strong></td></tr>
                      <tr><td class=cc>Username</td>  <td class=cb><input type=text name=username size=10 value='$re[username]'></td></tr>
                      <tr><td class=cc>Password</td>  <td class=cb><input type=text name=password size=10> * Kosongkan Jika Tidak diubah</td></tr>
                      <tr><td class=cc>Tempat Lahir</td>  <td class=cb><input type=text name=TempatLahir size=40 value='$re[TempatLahir]'></td></tr>
                      <tr><td class=cc>Tanggal Lahir</td>    <td class=cb>";
                                                    $get_tgl=substr("$re[TanggalLahir]",8,2);
                                                    combotgl3(1,31,'tgltl',$get_tgl);
                                                    $get_bln=substr("$re[TanggalLahir]",5,2);
                                                    combobln3(1,12,'blntl',$get_bln);
                                                    $get_thn=substr("$re[TanggalLahir]",0,4);
                                                    $t=date("Y");
                                                    combotgl3($t-50,$t+1,'thntl',$get_thn);  
                        echo "</td></tr>";
                        if ($re[Kelamin]=='L'){
                          echo "<tr><td class=cc>Jenis Kelamin</td> <td class=cb> : <input type=radio name='Kelamin' value='L' checked> Laki-laki  
                                                            <input type=radio name='Kelamin' value='P'> Perempuan</td></tr>";
                        }
                        else{
                          echo "<tr><td class=cc>Jenis Kelamin</td> <td class=cb> : <input type=radio name='Kelamin' value='L'> Laki-laki  
                                                            <input type=radio name='Kelamin' value='P' checked> Perempuan</td></tr>";
                        }
                        if ($re[WargaNegara]=='WNA'){
                          echo "<tr><td class=cc>Warga Negara</td> <td class=cb> : <input type=radio name='WargaNegara' value='WNA' checked> Warga Negara Asing  
                                                            <input type=radio name='WargaNegara' value='WNI'> Warga Negara Indonesia</td></tr>";
                        }
                        else{
                          echo "<tr><td class=cc>Warga Negara</td> <td class=cb> : <input type=radio name='WargaNegara' value='WNA'> Warga Negara Asing  
                                                            <input type=radio name='WargaNegara' value='WNI' checked> Warga Negara Indonesia</td></tr>";
                        }
                    echo"<tr><td class=cc>Jika Asing Sebutkan  <td class=cb>  <input type=text name='Kebangsaan' value='$re[Kebangsaan]'></td></tr>
                      <tr><td class=cc>Agama</td>    <td class=cb>     <select name='Agama'>
                                <option value=0 selected>- Pilih Kategori -</option>";
                                $tampil=mysql_query("SELECT * FROM agama ORDER BY agama_ID");
                                while($w=mysql_fetch_array($tampil)){
                                      if ($re[Agama]==$w[agama_ID]){
                                          echo "<option value=$w[agama_ID] selected>$w[agama_ID] - $w[nama]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[agama_ID]>$w[agama_ID] - $w[nama]</option>";
                                      }
                                 }                                
                                 echo "</select></td></tr>
                      <tr><td class=cc>Status Sipil</td>    <td class=cb><select name='StatusSipil'>
                                <option value=0 selected>- Pilih Kategori -</option>";
                                $tampil=mysql_query("SELECT * FROM StatusSipil ORDER BY StatusSipil");
                                while($w=mysql_fetch_array($tampil)){
                                      if ($re[StatusSipil]==$w[StatusSipil]){
                                          echo "<option value=$w[StatusSipil] selected>$w[StatusSipil] - $w[Nama]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[StatusSipil]>$w[StatusSipil] - $w[Nama]</option>";
                                      }
                                 }                                
                        echo "</select></td></tr>
                      <tr><td class=cc>Alamat</td>    <td class=cb><input type=text name='AlamatAsal' size=60 value='$re[AlamatAsal]'></td></tr>
                      <tr><td class=cc>RT</td>    <td class=cb><input type=text name='RTAsal' size=5 value='$re[RTAsal]'>
                              RW       <input type=text name='RWAsal' size=5 value='$re[RWAsal]'></td></tr>
                      <tr><td class=cc>Kota</td>    <td class=cb><input type=text name='KotaAsal' value='$re[KotaAsal]'>
                              Kodepos    <input type=text name='KodePosAsal' size=10 value='$re[KodePosAsal]'></td></tr>
                      <tr><td class=cc>Propinsi</td>    <td class=cb><input type=text name='PropinsiAsal' size=40 value='$re[PropinsiAsal]'></td></tr>
                      <tr><td class=cc>Negara</td>    <td class=cb><input type=text name='NegaraAsal' value='$re[NegaraAsal]'></td></tr>
                      <tr><td class=cc>Telepon</td>    <td class=cb><input type=text name='TeleponAsal' value='$re[TeleponAsal]'> 
                              HP <input type=text name='Handphone' value='$re[Handphone]'></td></tr>
                      <tr><td class=cc>E-Mail</td>    <td class=cb><input type=text name='Email' size=30 value='$re[Email]'></td></tr>
                      
                    </table>";
                 ?>          
              </ul>
              </span>
            </div>            
            
            <div class="panel" id="panel4" style="display: none;">
              <span>
              <ul>            
                <?php             
                    echo" <table id=tablemodul>
                          <tr><td colspan=2 class=cc><strong>Data Ayah</strong></td></tr>
                          <tr><td class=cc>Nama</td>    <td class=cb>     <input type=text name=NamaAyah size=50 value='$re[NamaAyah]'></td></tr>
                          <tr><td class=cc>Agama</td>    <td class=cb><select name='AgamaAyah'>
                                    <option value=0 selected>- Pilih Kategori -</option>";
                                    $tampil=mysql_query("SELECT * FROM agama ORDER BY agama_ID");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($re[AgamaAyah]==$w[agama_ID]){
                                          echo "<option value=$w[agama_ID] selected>$w[agama_ID] - $w[nama]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[agama_ID]>$w[agama_ID] - $w[nama]</option>";
                                      }
                                 }                                
                            echo "</select></td></tr>
                          <tr><td class=cc>Pendidikan</td>    <td class=cb><select name='PendidikanAyah'>
                                    <option value=0 selected>- Pilih Kategori -</option>";
                                    $tampil=mysql_query("SELECT * FROM Pendidikanortu ORDER BY Pendidikan");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($re[PendidikanAyah]==$w[Pendidikan]){
                                          echo "<option value=$w[Pendidikan] selected>$w[Pendidikan] - $w[Nama]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[Pendidikan]>$w[Pendidikan] - $w[Nama]</option>";
                                      }
                                 }                                
                            echo "</select></td></tr>
                          <tr><td class=cc>Pekerjaan</td>    <td class=cb><select name='PekerjaanAyah'>
                                    <option value=0 selected>- Pilih Kategori -</option>";
                                    $tampil=mysql_query("SELECT * FROM pekerjaanortu ORDER BY Pekerjaan");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($re[PekerjaanAyah]==$w[Pekerjaan]){
                                          echo "<option value=$w[Pekerjaan] selected>$w[Pekerjaan] - $w[Nama]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[Pekerjaan]>$w[Pekerjaan] - $w[Nama]</option>";
                                      }
                                 }                                
                            echo "</select></td></tr>
                          <tr><td class=cc>Hidup</td>    <td class=cb><select name='HidupAyah'>
                                    <option value=0 selected>- Pilih Kategori -</option>";
                                    $tampil=mysql_query("SELECT * FROM hidup ORDER BY Hidup");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($re[HidupAyah]==$w[Hidup]){
                                          echo "<option value=$w[Hidup] selected>$w[Hidup] - $w[Nama]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[Hidup]>$w[Hidup] - $w[Nama]</option>";
                                      }
                                 }                                
                            echo "</select></td></tr>
                          <tr><td colspan=2 class=cc><strong>Data Ibu</strong></td></tr>
                          <tr><td class=cc>Nama</td>    <td class=cb><input type=text name='NamaIbu' size=50 value='$re[NamaIbu]'></td></tr>
                          <tr><td class=cc>Agama</td>    <td class=cb><select name='AgamaIbu'>
                                    <option value=0 selected>- Pilih Kategori -</option>";
                                    $tampil=mysql_query("SELECT * FROM agama ORDER BY agama_ID");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($re[AgamaIbu]==$w[agama_ID]){
                                          echo "<option value=$w[agama_ID] selected>$w[agama_ID] - $w[nama]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[agama_ID]>$w[agama_ID] - $w[nama]</option>";
                                      }
                                 }                                
                            echo "</select></td></tr>
                          <tr><td class=cc>Pendidikan</td>    <td class=cb><select name='PendidikanIbu'>
                                    <option value=0 selected>- Pilih Kategori -</option>";
                                    $tampil=mysql_query("SELECT * FROM Pendidikanortu ORDER BY Pendidikan");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($re[PendidikanIbu]==$w[Pendidikan]){
                                          echo "<option value=$w[Pendidikan] selected>$w[Pendidikan] - $w[Nama]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[Pendidikan]>$w[Pendidikan] - $w[Nama]</option>";
                                      }
                                 }                                
                            echo "</select></td></tr>
                          <tr><td class=cc>Pekerjaan</td>    <td class=cb><select name='PekerjaanIbu'>
                                    <option value=0 selected>- Pilih Kategori -</option>";
                                    $tampil=mysql_query("SELECT * FROM pekerjaanortu ORDER BY Pekerjaan");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($re[PekerjaanIbu]==$w[Pekerjaan]){
                                          echo "<option value=$w[Pekerjaan] selected>$w[Pekerjaan] - $w[Nama]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[Pekerjaan]>$w[Pekerjaan] - $w[Nama]</option>";
                                      }
                                 }                                
                            echo "</select></td></tr>
                          <tr><td class=cc>Hidup</td>    <td class=cb><select name='HidupIbu'>
                                    <option value=0 selected>- Pilih Kategori -</option>";
                                    $tampil=mysql_query("SELECT * FROM hidup ORDER BY Hidup");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($re[HidupIbu]==$w[Hidup]){
                                          echo "<option value=$w[Hidup] selected>$w[Hidup] - $w[Nama]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[Hidup]>$w[Hidup] - $w[Nama]</option>";
                                      }
                                 }                                
                            echo "</select></td></tr>
                          <tr><td colspan=2 class=cc><strong>Alamat Orang Tua</strong></td></tr>
                          <tr><td class=cc>Alamat</td>    <td class=cb><input type=text name='AlamatOrtu' size=50 value='$re[AlamatOrtu]'></td></tr>
                          <tr><td class=cc>Kota</td>    <td class=cb><input type=text name=KotaOrtu value='$re[KotaOrtu]'>
                                  Kodepos      <input type=text name=KodePosOrtu value='$re[KodePosOrtu]'></td></tr>
                          <tr><td class=cc>Propinsi</td>    <td class=cb><input type=text name=PropinsiOrtu value='$re[PropinsiOrtu]'></td></tr>
                          <tr><td class=cc>Negara</td>  <td class=cb><input type=text name=NegaraOrtu value='$re[NegaraOrtu]'></td></tr>
                          <tr><td colspan=2 class=cc><strong>Kontak</strong></td></tr>
                          <tr><td class=cc>Telepon</td>    <td class=cb><input type=text name=TeleponOrtu value='$re[TeleponOrtu]'></td></tr>
                          <tr><td class=cc>HP</td>   <td class=cb><input type=text name=HandphoneOrtu value='$re[HandphoneOrtu]'></td></tr>
                          <tr><td class=cc>E-Mail</td>    <td class=cb><input type=text name=EmailOrtu value='$re[EmailOrtu]'></td></tr>
                        </table>";
                ?>                    
              </ul>
              </span>
            </div>            
            <div class="panel" id="panel5" style="display: none;">
              <span>
              <ul>            
                <?php             
                    echo"<table id=tablemodul>
                      <tr><td colspan=2 class=cc><strong>Asal Sekolah Mahasiswa</strong></td></tr>
                      <tr><td class=cc>Sekolah Asal</td>    <td class=cb>      <input type=text name='AsalSekolah' size=50 value='$re[AsalSekolah]'></td></tr>
                      <tr><td class=cc>Jenis Sekolah</td>    <td class=cb><select name='JenisSekolah_ID'>
                                <option value=0 selected>- Pilih Kategori -</option>";
                                $tampil=mysql_query("SELECT * FROM jenisSekolah ORDER BY JenisSekolah_ID");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($re[JenisSekolah_ID]==$w[JenisSekolah_ID]){
                                          echo "<option value=$w[JenisSekolah_ID] selected>$w[JenisSekolah_ID] - $w[Nama]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[JenisSekolah_ID]>$w[JenisSekolah_ID] - $w[Nama]</option>";
                                      }
                                 }                                
                        echo "</select></td></tr>
                      <tr><td class=cc>Jurusan</td>    <td class=cb><select name='JurusanSekolah'>
                                <option value=0 selected>- Pilih Kategori -</option>";
                                $tampil=mysql_query("SELECT * FROM jurusanSekolah ORDER BY JurusanSekolah_ID");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($re[JurusanSekolah]==$w[JurusanSekolah_ID]){
                                          echo "<option value=$w[JurusanSekolah_ID] selected>$w[JurusanSekolah_ID] - $w[Nama] - $w[NamaJurusan]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[JurusanSekolah_ID]>$w[JurusanSekolah_ID] - $w[Nama] - $w[NamaJurusan]</option>";
                                      }
                                 }                                
                        echo "</select></td></tr>
                      <tr><td class=cc>Tahun Lulus</td>    <td class=cb><input type=text name='TahunLulus' value='$re[TahunLulus]'></td></tr>
                      <tr><td class=cc>Nilai Sekolah</td>    <td class=cb><input type=text name='NilaiSekolah' size=8 value='$re[NilaiSekolah]'></td></tr>
                    </table>";
                ?>                    
              </ul>
              </span>
            </div>
            <div class="panel" id="panel7" style="display: none;">
              <span>
              <ul>            
                <?php
                ?>                    
              </ul>
              </span>
            </div>  
          <? echo"<input type=submit value=Simpan class=tombol></form>"; ?>
          </div> 
<?


  break;

  case "TambahMhs":
   echo"<div id=groupmodul1>
        <table id=table_3>
          <tr>
            <td class=ce width=40 rowspan=3><img src=../img/mhs.png width=70 height=70></td>
            <td class=ce width=40>&nbsp;</td>
            <td class=ce rowspan=3 height=0></td>
          </tr>
          <tr><td class=ce width=480><span class=top>Mahasiswa Manager : Tambah Mahasiswa</span></td></tr>
          <tr><td class=ce>&nbsp;</td>
          </tr></table>
   <table id=tablemodul><tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a class=s href=javascript:history.go(-1)><img src=../img/back.png> Kembali Ke Dafar Mhs |</a></table>
     <form action='baakademik/baakademikmahasiswaact.php?page=levelakademikmhs&PHPIdSession=addmhsw' method='post'>
                            <table id=tablemodul>
                            <tr><td colspan=2><strong>Sesuai Dengan KTP atau Identitas Resmi Lainnya..!!!</strong></td></tr>
                    <input name=identitas type=hidden value=$data[Identitas_ID]>
                    <input name=cmbj1 type=hidden value=$data[kode_jurusan]></td>
                  </tr>";
         echo"   <tr><td class=cc>Program *</td>  <td>  <select name='cmbp1'>
                  <option value=0 selected>- Pilih Program -</option>";
                  $t=mysql_query("SELECT * FROM program WHERE Identitas_ID='$data[Identitas_ID]' ORDER BY ID");
                  while($r=mysql_fetch_array($t)){
                    echo "<option value=$r[ID]>$r[Program_ID] - $r[nama_program]</option>";
                  }
          echo" </select></td></tr> 
                <tr><td class=cc>Nama Kurikulum *</td>  <td>  <select name='nkur'>
                  <option value=0 selected>- Pilih Nama Kurikulum -</option>";
                  $t=mysql_query("SELECT * FROM kurikulum WHERE Identitas_ID='$data[Identitas_ID]' AND Jurusan_ID='$data[kode_jurusan]' ORDER BY Kurikulum_ID");
                  while($r=mysql_fetch_array($t)){
                    echo "<option value=$r[Kurikulum_ID]>$r[Kode] - $r[Nama]</option>";
                  }
          echo "</select></td></tr>
                           <tr><td class=cc>Nama Lengkap *</td>  <td><input type=text name=Nama size=40></td></tr>
                            <tr><td class=cc>NIM/NoBp *</td>  <td><input type=text name=NIM size=16></td></tr>
                            <tr><td class=cc>Angkatan *</td>  <td><input type=text name=Angkatan size=7></td></tr>
                            <tr><td class=cc>Username *</td>  <td><input type=text name=username size=15> Username Harus NIM</td></tr>
                            <tr><td class=cc>Password *</td>  <td><input type=text name=password size=15></td></tr>
                            <tr><td class=cc>Tempat Lahir</td>  <td><input type=text name=TempatLahir size=40></td></tr>
                            <tr><td class=cc>Tanggal Lahir</td>    <td>";
                combotgl(1,31,'tgltl',Tgl);
                combobln(1,12,'blntl',Bulan);
                $t=date("Y");
                combotgl($t-50,$t+1,'thntl',Tahun); 
                              echo "</td></tr>";
                echo"<tr><td class=cc>Jenis Kelamin</td>      <td> <input type=radio name='Kelamin' value='L' checked> Laki-Laki 
                                               <input type=radio name='Kelamin' value='P'> Perempuan  </td></tr>
      <tr><td class=cc>Warga Negara</td>      <td><input type=radio name='WargaNegara' value='WNA' checked> Warga Negara Asing
                                               <input type=radio name='WargaNegara' value='WNI'> Warga Negara Indonesia  </td></tr>
                            <tr><td class=cc>Jika WNA Sebutkan</td>  <td><input type=text name=Kebangsaan size=20></td></tr>
                <tr><td class=cc>Agama</td>  <td> 
                <select name='Agama'>
                  <option value=0 selected>- Pilih Agama -</option>";
                  $t=mysql_query("SELECT * FROM agama ORDER BY agama_ID");
                  while($r=mysql_fetch_array($t)){
                    echo "<option value=$r[agama_ID]>$r[agama_ID] - $r[nama]</option>";
                  }
          echo "</select></td></tr>
                <tr><td class=cc>Status Sipil</td>  <td>
                <select name='StatusSipil'>
                  <option value=0 selected>- Pilih Status Sipil -</option>";
                  $t=mysql_query("SELECT * FROM statussipil ORDER BY StatusSipil");
                  while($r=mysql_fetch_array($t)){
                    echo "<option value=$r[StatusSipil]>$r[StatusSipil] - $r[Nama]</option>";
                  }
          echo "</select></td></tr>
      
                            <tr><td class=cc>Alamat</td>    <td> <input type=text name='Alamat' size=60></td></tr>
                            <tr><td class=cc>RT</td>    <td> <input type=text name='RT' size=5>
                                    RW       <input type=text name='RW' size=5></td></tr>
                            <tr><td class=cc>Kota</td>    <td> <input type=text name='Kota'>
                                    Kodepos    <input type=text name='KodePos' size=10></td></tr>
                            <tr><td class=cc>Propinsi</td>    <td> <input type=text name='Propinsi' size=40 ></td></tr>
                            <tr><td class=cc>Negara</td>    <td> <input type=text name='Negara'></td></tr>
                            <tr><td class=cc>Telepon</td>   <td> <input type=text name='Telepon'> 
                                    HP <input type=text name='Handphone'></td></tr>
                <tr><td class=cc>Status Awal *</td>  <td> 
                <select name='StatusAwal_ID'>
                  <option value=0 selected>- Pilih Status Awal Mahasiswa -</option>";
                  $t=mysql_query("SELECT * FROM statusawal ORDER BY StatusAwal_ID");
                  while($r=mysql_fetch_array($t)){
                    echo "<option value=$r[StatusAwal_ID]>$r[StatusAwal_ID] - $r[Nama]</option>";
                  }
          echo "</select></td></tr>
                <tr><td class=cc>Penasehat Akademik *</td>  <td> 
                <select name='pa'>
                  <option value=0 selected>- Pilih Penasehat Akademik -</option>";
                  $t=mysql_query("SELECT * FROM dosen WHERE Identitas_ID='$data[Identitas_ID]' AND Jurusan_ID LIKE '%$data[kode_jurusan]%' ORDER BY dosen_ID");
                  while($r=mysql_fetch_array($t)){
                    echo "<option value=$r[NIDN]>$r[nama_lengkap], $r[Gelar]</option>";
                  }
          echo "</select></td></tr>
                                </table>";
       echo"<input type=submit value=Simpan class=tombol></td></tr></form></div>";  
  break;
}     
        
?>
