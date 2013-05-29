<?
    $edit=mysql_query("SELECT * FROM karyawan WHERE username='$_SESSION[username]'");
    $data=mysql_fetch_array($edit);
switch($_GET[PHPIdSession]){
  default:
  $idp= $_REQUEST['id'];
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
     echo"<div id=headermodul>Kalender Akademik</div>            
          <div id=groupmodul1>
          <table id=tablemodul>";
  ?>   
      <tr>
        <td class="cc">Program</td>   <td colspan=2 class="cb"> : <select name="program" onChange="MM_jumpMenu('parent',this,0)">
          <option value="media.php?page=levelakademiktahunakd">- Pilih Program -</option>
      <?php
  	  $sqlp="SELECT * FROM program WHERE Identitas_ID='$data[Identitas_ID]'";
  	  $qryp=mysql_query($sqlp)
  	  or die();
  	  while ($d2=mysql_fetch_array($qryp)){
      if ($d2['ID']==$idp){
        $cek="selected";
        }
        else{
          $cek="";
        }
        echo "<option value='?page=levelakademiktahunakd&codd=$data[Identitas_ID]&kode=$data[kode_jurusan]&id=$d2[ID]' $cek> $d2[Program_ID] - $d2[nama_program]</option>";
  		}
  		?>
        </select>
        <input name="program" type="hidden" value="<?= $idp; ?>"></td>
      </tr>
      <tr><td class="cc">Pilihan </td> <td colspan=2 class="cb"> : <a class="s" href="?page=levelakademiktahunakd&PHPIdSession=tambahtahun">Tambah Tahun Akademik</a> </tr></td>
      <?php
          echo" 					
          			<table id=tablemodul>
              <tr><th>No</th><th>Tahun</th><th>Nama</th><th>Program Studi/<br>Jurusan</th><th>KRS</th><th>Cetak KHS</th><th>Masa Bayar</th><th>Masa Kuliah</th><th>Masa UTS</th><th>Masa UAS</th><th>Penilaian</th><th>Aktif</th></tr>";
            $sql="SELECT t1.*,t2.nama_jurusan FROM tahun t1,jurusan t2 WHERE t1.Jurusan_ID=t2.kode_jurusan AND t1.Jurusan_ID='$data[kode_jurusan]' AND t1.Program_ID='$idp'";
          	$qry= mysql_query($sql)
          	or die ();
          	while ($r=mysql_fetch_array($qry)){
          	$tgl = tgl_indo($r[TglKRSMulai]);
          	$tgl1 = tgl_indo($r[TglKRSSelesai]);
          	$tgl12 = tgl_indo($r[TglCetakKHS]);
          	$tgl2 = tgl_indo($r[TglBayarMulai]);
          	$tgl3 = tgl_indo($r[TglBayarSelesai]);
          	$tgl4 = tgl_indo($r[TglKuliahMulai]);
          	$tgl5 = tgl_indo($r[TglKuliahSelesai]);
          	$tgl6 = tgl_indo($r[TglUTSMulai]);
          	$tgl7 = tgl_indo($r[TglUTSSelesai]);                  	
          	$tgl9 = tgl_indo($r[TglUASMulai]);
          	$tgl10 = tgl_indo($r[TglUASSelesai]);
          	$tgl11 = tgl_indo($r[TglNilaiMulai]);
          	$tgl12 = tgl_indo($r[TglNilaiSelesai]);
            if($r[Aktif]=='Y'){
                $warna="#FFFFFF";
            }
            else{
                $warna="#E1E1E1";
            }            	
          	$no++;
               echo "<tr bgcolor=$warna>                            
                     <td>$no</td>
        		         <td><a class=s href='?page=levelakademiktahunakd&PHPIdSession=chagta&gis=$r[ID]'>$r[Tahun_ID] <img src=../img/edit.png></a></td>
        		         <td>$r[Nama]</td>
        		         <td>$r[nama_jurusan]</td>
        		         <td>$tgl<br>$tgl1</td>
        		         <td>$tgl12</td>
        		         <td>$tgl2<br>$tgl3</td>
         		         <td>$tgl4<br>$tgl5</td>
         		         <td>$tgl6<br>$tgl7</td>
         		         <td>$tgl9<br>$tgl10</td>
         		         <td>$tgl11<br>$tgl12</td>
         		         <td>$r[Aktif]</td></tr>";        
                    }
                    echo"</table></div>";
  break;  
  

  case"chagta":
  $e=mysql_query("SELECT * FROM tahun WHERE ID='$_GET[gis]'");
  $r=mysql_fetch_array($e);

     echo"<div id=groupmodul1>               
          <form method=post action=baakademik/baakademiktahunact.php?page=levelakademiktahunakd&PHPIdSession=upta>
 <input type=hidden name='ID' value='$r[ID]'>         
 <input type=hidden name='cmi2' value='$data[Identitas_ID]'>
 <input type=hidden name='cmbj2' value='$data[kode_jurusan]'>
  <h3>Edit Tahun Akademik</h3> <table id=tablemodul>
    <tr><td class=cc>Program :</td>   <td colspan=2 class=cb><select name=cmbp2 id=cmbp2>
    <option value=>Pilih Program</option>";
                                      $tampil=mysql_query("SELECT * FROM program WHERE Identitas_ID='$data[Identitas_ID]' ORDER BY ID");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($r[Program_ID]==$w[ID]){
                                          echo "<option value=$w[ID] selected>$w[Program_ID] - $w[nama_program]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[ID]>$w[Program_ID] - $w[nama_program]</option>";
                                      }
                                 }                                
                              echo "</select></td></tr>

  <tr><td class=cc>Tahun Akademik</td>    <td class=cb>      <input type=text name='ta' size=8 value='$r[Tahun_ID]'></td></tr>
  <tr><td class=cc>Nama Tahun</td>    <td class=cb>      <input type=text name='nm' size=30 value='$r[Nama]'></td></tr>
  <tr><td colspan=2><strong>KRS</strong></td></tr>
  <tr><td class=cc>Mulai KRS</td><td class=cb>";        
                                                   $get_tgl=substr("$r[TglKRSMulai]",8,2);
                                                    combotgl3(1,31,'tgkrsm',$get_tgl);
                                                    $get_bln=substr("$r[TglKRSMulai]",5,2);
                                                    combobln3(1,12,'blkrsm',$get_bln);
                                                    $get_thn=substr("$r[TglKRSMulai]",0,4);
                                                    $t=date("Y");
                                                    combotgl3($t-2,$t+1,'tkrsm',$get_thn);    
    echo "</td></tr>
  <tr><td class=cc>Selesai KRS</td><td class=cb>";        
                                                   $get_tgl=substr("$r[TglKRSSelesai]",8,2);
                                                    combotgl3(1,31,'tgkrss',$get_tgl);
                                                    $get_bln=substr("$r[TglKRSSelesai]",5,2);
                                                    combobln3(1,12,'blkrss',$get_bln);
                                                    $get_thn=substr("$r[TglKRSSelesai]",0,4);
                                                    combotgl3($t-2,$t+1,'tkrss',$get_thn);     
    echo "</td></tr>
  <tr><td colspan=2><strong>Cetak KHS</strong></td></tr>
  <tr><td class=cc>Cetak KHS</td><td class=cb>";        
                                                   $get_tgl=substr("$r[TglCetakKHS]",8,2);
                                                    combotgl3(1,31,'tgkhsc',$get_tgl);
                                                    $get_bln=substr("$r[TglCetakKHS]",5,2);
                                                    combobln3(1,12,'blkhsc',$get_bln);
                                                    $get_thn=substr("$r[TglCetakKHS]",0,4);
                                                    $t=date("Y");
                                                    combotgl3($t-2,$t+1,'tkhsc',$get_thn);    
    echo "</td></tr>

  <tr><td colspan=2><strong>Masa Pembayaran</strong></td></tr>
  <tr><td class=cc>Mulai Pembayaran</td>   <td class=cb>";        
                                                   $get_tgl=substr("$r[TglBayarMulai]",8,2);
                                                    combotgl3(1,31,'tgbym',$get_tgl);
                                                    $get_bln=substr("$r[TglBayarMulai]",5,2);
                                                    combobln3(1,12,'blbym',$get_bln);
                                                    $get_thn=substr("$r[TglBayarMulai]",0,4);
                                                    combotgl3($t-2,$t+1,'thbym',$get_thn);     

    echo "</td></tr>
  <tr><td class=cc>Selesai Pembayaran</td>    <td class=cb>";        
                                                   $get_tgl=substr("$r[TglBayarSelesai]",8,2);
                                                    combotgl3(1,31,'tgbys',$get_tgl);
                                                    $get_bln=substr("$r[TglBayarSelesai]",5,2);
                                                    combobln3(1,12,'blbys',$get_bln);
                                                    $get_thn=substr("$r[TglBayarSelesai]",0,4);
                                                    combotgl3($t-2,$t+1,'thbys',$get_thn);     
    echo "</td></tr>
  <tr><td colspan=2><strong>Tanggal Kuiah</strong></td></tr>
  <tr><td class=cc>Mulai Kuliah</td>    <td class=cb>";        
                                                   $get_tgl=substr("$r[TglKuliahMulai]",8,2);
                                                    combotgl3(1,31,'tgkulm',$get_tgl);
                                                    $get_bln=substr("$r[TglKuliahMulai]",5,2);
                                                    combobln3(1,12,'blkulm',$get_bln);
                                                    $get_thn=substr("$r[TglKuliahMulai]",0,4);
                                                    combotgl3($t-2,$t+1,'thkulm',$get_thn);      
    echo "</td></tr>
  <tr><td class=cc>Selesai Kuliah</td>    <td class=cb>";        
                                                  $get_tgl=substr("$r[TglKuliahSelesai]",8,2);
                                                    combotgl3(1,31,'tgkuls',$get_tgl);
                                                    $get_bln=substr("$r[TglKuliahSelesai]",5,2);
                                                    combobln3(1,12,'blkuls',$get_bln);
                                                    $get_thn=substr("$r[TglKuliahSelesai]",0,4);
                                                    combotgl3($t-2,$t+1,'thkuls',$get_thn);      
    echo "</td></tr>
  <tr><td colspan=2><strong>Tanggal Ujian Tengah Semester</strong></td></tr>
  <tr><td class=cc>Mulai UTS</td>    <td class=cb>";        
                                                  $get_tgl=substr("$r[TglUTSMulai]",8,2);
                                                    combotgl3(1,31,'tgutsm',$get_tgl);
                                                    $get_bln=substr("$r[TglUTSMulai]",5,2);
                                                    combobln3(1,12,'blutsm',$get_bln);
                                                    $get_thn=substr("$r[TglUTSMulai]",0,4);
                                                    combotgl3($t-2,$t+1,'thutsm',$get_thn);      
    echo "</td></tr>
  <tr><td class=cc>Selesai UTS</td>    <td class=cb>";        
                                                  $get_tgl=substr("$r[TglUTSSelesai]",8,2);
                                                    combotgl3(1,31,'tgutss',$get_tgl);
                                                    $get_bln=substr("$r[TglUTSSelesai]",5,2);
                                                    combobln3(1,12,'blutss',$get_bln);
                                                    $get_thn=substr("$r[TglUTSSelesai]",0,4);
                                                    combotgl3($t-2,$t+1,'thutss',$get_thn);       
    echo "</td></tr>
  <tr><td colspan=2><strong>Tanggal Ujian Akhir Semester</strong></td></tr>
  <tr><td class=cc>Mulai UAS</td>    <td class=cb>";        
                                                  $get_tgl=substr("$r[TglUASMulai]",8,2);
                                                    combotgl3(1,31,'tguasm',$get_tgl);
                                                    $get_bln=substr("$r[TglUASMulai]",5,2);
                                                    combobln3(1,12,'bluasm',$get_bln);
                                                    $get_thn=substr("$r[TglUASMulai]",0,4);
                                                    combotgl3($t-2,$t+1,'thuasm',$get_thn);       
    echo "</td></tr>
  <tr><td class=cc>Selesai UAS</td>    <td class=cb>";        
                                                  $get_tgl=substr("$r[TglUASSelesai]",8,2);
                                                    combotgl3(1,31,'tguass',$get_tgl);
                                                    $get_bln=substr("$r[TglUASSelesai]",5,2);
                                                    combobln3(1,12,'bluass',$get_bln);
                                                    $get_thn=substr("$r[TglUASSelesai]",0,4);
                                                    combotgl3($t-2,$t+1,'thuass',$get_thn);      
    echo "</td></tr>
  <tr><td class=cc>Mulai Penilaian</td>    <td class=cb>";        
                                                  $get_tgl=substr("$r[TglNilaiMulai]",8,2);
                                                    combotgl3(1,31,'mtgak',$get_tgl);
                                                    $get_bln=substr("$r[TglNilaiMulai]",5,2);
                                                    combobln3(1,12,'mblak',$get_bln);
                                                    $get_thn=substr("$r[TglNilaiMulai]",0,4);
                                                    combotgl3($t-2,$t+1,'mthak',$get_thn);       
    echo "</td></tr>
  <tr><td class=cc>Akhir Penilaian</td>    <td class=cb>";        
                                                  $get_tgl=substr("$r[TglNilaiSelesai]",8,2);
                                                    combotgl3(1,31,'atgak',$get_tgl);
                                                    $get_bln=substr("$r[TglNilaiSelesai]",5,2);
                                                    combobln3(1,12,'ablak',$get_bln);
                                                    $get_thn=substr("$r[TglNilaiSelesai]",0,4);
                                                    combotgl3($t-2,$t+1,'athak',$get_thn);       
    echo "</td></tr>
  <tr><td class=cc>Catatan</td>    <td class=cb>      <textarea name=ctt cols=45 rows=5>$r[Catatan]</textarea></td></tr>";
                        if ($r[Aktif]=='Y'){
                          echo "<tr><td class=cc>Aktif</td> <td class=cb><input type=radio name='Aktif' value='Y' checked> Y  
                                                            <input type=radio name='Aktif' value='N'> N</td></tr>";
                        }
                        else{
                          echo "<tr><td class=cc>Aktif</td> <td class=cb><input type=radio name='Aktif' value='Y'> Y  
                                                            <input type=radio name='Aktif' value='N' checked> N</td></tr>";
                        }
  echo"                      
  <tr><td colspan=2>
      <input type=submit name=button value=Simpan class=tombol>
      <input type=button value=Batal onclick=self.history.back() class=tombol>
    </form></td></tr></table></div>";

  break;

  case "tambahtahun":
    $idp= $_REQUEST['id'];
    echo"<div id=groupmodul1>
      <table id=tablemodul>
          <tr><td class=cc>Pilihan </td> <td colspan=2> : <a class=s href=javascript:history.go(-1)>Kembali Ke Daftar Tahun</a> </tr></td>
      <form action='baakademik/baakademiktahunact.php?page=levelakademiktahunakd&PHPIdSession=addta' method='post'>
      <h3>Tambah Tahun Akademik</h3> <table id=tablemodul>
          <input name=cmi1 type=hidden value=$data[Identitas_ID]></td>
          <input name=cmbj1 type=hidden value=$data[kode_jurusan]></td>
        <tr><td class=cc>Program Jawab *</td>    <td>      <select name='cmbp1'>
            <option value=0 selected>- Pilih Program -</option>";
                  $tampil=mysql_query("SELECT * FROM program WHERE Identitas_ID='$data[Identitas_ID]' ORDER BY ID");
                  while($r=mysql_fetch_array($tampil)){
                  echo "<option value=$r[ID]>$r[Program_ID] -- $r[nama_program]</option>";
                  }
        echo "</select></td></tr>
           
      <tr><td class=cc>Tahun Akademik *</td>    <td >      <input type=text name=ta size=8></td></tr>
      <tr><td class=cc>Nama Tahun *</td>    <td >      <input type=text name=nm size=30></td></tr>
     
      <tr><td colspan=2><strong>KRS</strong></td></tr>
      <tr><td class=cc>Mulai KRS *</td><td >";        
              $thn_sekarang=date("Y");
              combotgl(1,31,'tgkrsm',Tgl);
              combobln(1,12,'blkrsm',Bulan);
              combotgl($thn_sekarang-2,$thn_sekarang+1,'tkrsm',Tahun);  
        echo "</td></tr>
      <tr><td class=cc>Selesai KRS *</td><td >";        
              combotgl(1,31,'tgkrss',Tgl);
              combobln(1,12,'blkrss',Bulan);
              combotgl($thn_sekarang-2,$thn_sekarang+1,'tkrss',Tahun);  
        echo "</td></tr>
      <tr><td colspan=2><strong>Cetak KHS *</strong></td></tr>
      <tr><td class=cc>Cetak KHS</td><td >";        
              $thn_sekarang=date("Y");
              combotgl(1,31,'tgkhsc',Tgl);
              combobln(1,12,'blkhsc',Bulan);
              combotgl($thn_sekarang-2,$thn_sekarang+1,'tkhsc',Tahun);  
        echo "</td></tr>
      <tr><td colspan=2><strong>Masa Pembayaran</strong></td></tr>
      <tr><td class=cc>Mulai Pembayaran *</td>   <td >";        
              combotgl(1,31,'tgbym',Tgl);
              combobln(1,12,'blbym',Bulan);
              combotgl($thn_sekarang-2,$thn_sekarang+1,'thbym',Tahun);  
        echo "</td></tr>
      <tr><td class=cc>Selesai Pembayaran *</td>    <td >";        
              combotgl(1,31,'tgbys',Tgl);
              combobln(1,12,'blbys',Bulan);
              combotgl($thn_sekarang-2,$thn_sekarang+1,'thbys',Tahun);  
        echo "</td></tr>
      <tr><td colspan=2><strong>Tanggal Kuiah</strong></td></tr>
      <tr><td class=cc>Mulai Kuliah *</td>    <td >";        
              combotgl(1,31,'tgkulm',Tgl);
              combobln(1,12,'blkulm',Bulan);
              combotgl($thn_sekarang-2,$thn_sekarang+1,'thkulm',Tahun);  
        echo "</td></tr>
      <tr><td class=cc>Selesai Kuliah *</td>    <td >";        
              combotgl(1,31,'tgkuls',Tgl);
              combobln(1,12,'blkuls',Bulan);
              combotgl($thn_sekarang-2,$thn_sekarang+1,'thkuls',Tahun);  
        echo "</td></tr>
      <tr><td colspan=2><strong>Tanggal Ujian Tengah Semester</strong></td></tr>
      <tr><td class=cc>Mulai UTS *</td>    <td >";        
              combotgl(1,31,'tgutsm',Tgl);
              combobln(1,12,'blutsm',Bulan);
              combotgl($thn_sekarang-2,$thn_sekarang+1,'thutsm',Tahun);  
        echo "</td></tr>
      <tr><td class=cc>Selesai UTS *</td>    <td >";        
              combotgl(1,31,'tgutss',Tgl);
              combobln(1,12,'blutss',Bulan);
              combotgl($thn_sekarang-2,$thn_sekarang+1,'thutss',Tahun);  
        echo "</td></tr>
      <tr><td colspan=2><strong>Tanggal Ujian Akhir Semester</strong></td></tr>
      <tr><td class=cc>Mulai UAS *</td>    <td >";        
              combotgl(1,31,'tguasm',Tgl);
              combobln(1,12,'bluasm',Bulan);
              combotgl($thn_sekarang-2,$thn_sekarang+1,'thuasm',Tahun);  
        echo "</td></tr>
      <tr><td class=cc>Selesai UAS *</td>    <td >";        
              combotgl(1,31,'tguass',Tgl);
              combobln(1,12,'bluass',Bulan);
              combotgl($thn_sekarang-2,$thn_sekarang+1,'thuass',Tahun);  
        echo "</td></tr>
      <tr><td colspan=2><strong>Tanggal Penilaian Ujian</strong></td></tr>
      <tr><td class=cc>Mulai Penilaian *</td>    <td >";        
              combotgl(1,31,'mtgak',Tgl);
              combobln(1,12,'mblak',Bulan);
              combotgl($thn_sekarang-2,$thn_sekarang+1,'mthak',Tahun);  
        echo "</td></tr>
      <tr><td class=cc>Akhir Penilaian *</td>    <td >";        
              combotgl(1,31,'atgak',Tgl);
              combobln(1,12,'ablak',Bulan);
              combotgl($thn_sekarang-2,$thn_sekarang+1,'athak',Tahun);  
        echo "</td></tr>
      <tr><td class=cc>Catatan</td>    <td >      <textarea name=ctt cols=45 rows=5></textarea></td></tr>
      <tr><td class=cc>Aktif *</td>   <td ><input type=radio name=Aktif value=Y>Y 
                               <input type=radio name=Aktif value=N>N </td></tr>
      <tr><td colspan=2>
          <input type=submit name=button id=button value=Simpan class=tombol>
        </form></td></tr></table></div>";  
  break;    
}
?>
