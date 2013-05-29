<script type="text/javascript">
$(document).ready(function() {
	$('#identitas').change(function() { 
		var category = $(this).val();
		$.ajax({
			type: 'GET',
			url: 'ajaxcombo.php',
			data: 'identitas=' + category, // Untuk data di MySQL dengan menggunakan kata kunci tsb
			dataType: 'html',
			beforeSend: function() {
				$('#jurusan').html('<tr><td colspan=2>Loading ....</td></tr>');	
			},
			success: function(response) {
				$('#jurusan').html(response);
			}
		});
    });
});
</script>
<?
switch($_GET[PHPIdSession]){
  default:
  $id= $_REQUEST['codd'];
  $kode= $_REQUEST['kode'];
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
   echo"<div id=groupmodul1>
        <table id=table_3>
          <tr>
            <td class=ce width=40 rowspan=3><img src=../img/mtk.png width=70 height=70></td>
            <td class=ce width=40>&nbsp;</td>
            <td class=ce rowspan=3 height=0></td>
          </tr>
          <tr><td class=ce width=480><span class=top>Matakuliah Manager : Master Matakuliah</span></td></tr>
          <tr><td class=ce>&nbsp;</td>
          </tr></table>";
          ?>               
                <table id=tablemodul>             
                  <tr>
                    <td class="cc">Institusi</td>   <td colspan=2> : <select name="institusi" onChange="MM_jumpMenu('parent',this,0)">
                      <option value="media.php?page=2d77bdcc8a627e115024495d7db40db8">- Pilih Institusi -</option>
                  <?php
              	  $sqlp="SELECT * FROM identitas ORDER BY Identitas_ID";
              	  $qryp=mysql_query($sqlp)
              	  or die();
              	  while ($d=mysql_fetch_array($qryp)){
                  if ($d['Identitas_ID']==$id){
                    $cek="selected";
                    }
                    else{
                      $cek="";
                    }
                    echo "<option value='?page=akademikmatakuliah&codd=$d[Identitas_ID]' $cek> $d[Identitas_ID] - $d[Nama_Identitas]</option>";
              		}
              		?>
                    </select>
                    <input name="TxtKodeH" type="hidden" value="<?= $id; ?>"></td>
                  </tr>
                  <tr>
                    <td class="cc">Jurusan</td>   <td colspan=2> : <select name="jurusan" onChange="MM_jumpMenu('parent',this,0)">
                      <option value="media.php?page=akademikmatakuliah">- Pilih Jurusan -</option>
                  <?php
              	  $sqlp="SELECT * FROM jurusan WHERE Identitas_ID='$id'";
              	  $qryp=mysql_query($sqlp)
              	  or die();
              	  while ($d1=mysql_fetch_array($qryp)){
                  if ($d1['kode_jurusan']==$kode){
                    $cek="selected";
                    }
                    else{
                      $cek="";
                    }
                    echo "<option value='?page=akademikmatakuliah&codd=$id&kode=$d1[kode_jurusan]' $cek> $d1[kode_jurusan] - $d1[nama_jurusan]</option>";
              		}
              		?>
                    </select>
                    <input name="TxtKodeH" type="hidden" value="<?= $kode; ?>"></td>
                  </tr>
                  <?php
                  echo" <tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a class=s href=?page=akademikmatakuliah&PHPIdSession=TambahMtk><img src=../img/tambah.png> Tambah Matakuliah |</a> 
                                                                               <a class=s href=?page=akademikmatakuliah&PHPIdSession=DaftarMtkPilihan&codd=$id&kode=$kode><img src=../img/mtkpil.png> Daftar Mtk Pilihan |</a>
                                                                               <a class=s href=?page=akademikmatakuliah&PHPIdSession=StatusMtk&codd=$id&kode=$kode><img src=../img/mtkstat.png> Status Matakuliah |</a>
                                                                               <a class=s href=?page=akademikmatakuliah&PHPIdSession=Daftarkrklm&codd=$id&kode=$kode><img src=../img/tambah.png> Daftar Kurikulum |</a>
                                                                               <a class=s href='mtkprint.php?IDSessionSIAinst=$id&kodejurSIA=$kode' target='_new'><img src=../img/printer.GIF> Cetak Matakuliah |</a></tr></td>					
                      			<table id=tablemodul>
                      			<h3>Semester 1</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Identitas_ID='$id' AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%1%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID!='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){          	
                          	$n11++;
                               echo "<tr>                            
                                     <td>$n11</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                     <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>
                                     <td>$r[StatusMtk_ID] - $r[NamaSMk]</td>
                                     <td>$r[Semester]</td>     		         
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T9=$T9+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T9,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 2</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Identitas_ID='$id' AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%2%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID!='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){       	
                          	$n12++;
                               echo "<tr>                            
                                     <td>$n12</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>
                                      <td>$r[StatusMtk_ID] - $r[NamaSMk]</td>
                                      <td>$r[Semester]</td>     		         
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T12=$T12+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T12,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 3</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Identitas_ID='$id' AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%3%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID!='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){       	
                          	$n13++;
                               echo "<tr>                            
                                     <td>$n13</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>     		         
                                      <td>$r[StatusMtk_ID] - $r[NamaSMk]</td><td>$r[Semester]</td>
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T13=$T13+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T13,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 4</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Identitas_ID='$id' AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%4%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID!='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){
                          	$n14++;
                               echo "<tr>                            
                                     <td>$n14</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>     		         
                                     <td>$r[StatusMtk_ID] - $r[NamaSMk]</td><td>$r[Semester]</td>
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T14=$T14+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T14,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 5</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Identitas_ID='$id' AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%5%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID!='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){     	
                          	$n15++;
                               echo "<tr>                            
                                     <td>$n15</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>   		         
                                     <td>$r[StatusMtk_ID] - $r[NamaSMk]</td><td>$r[Semester]</td>
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T15=$T15+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T15,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 6</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Identitas_ID='$id' AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%6%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID!='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){      	
                          	$n16++;
                               echo "<tr>                            
                                     <td>$n16</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>     		         
                                     <td>$r[StatusMtk_ID] - $r[NamaSMk]</td><td>$r[Semester]</td>
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T16=$T16+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T16,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 7</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Identitas_ID='$id' AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%7%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID!='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){        	
                          	$n17++;
                               echo "<tr>                            
                                     <td>$n17</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>     		         
                                     <td>$r[StatusMtk_ID] - $r[NamaSMk]</td><td>$r[Semester]</td>
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T17=$T17+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T17,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 8</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Identitas_ID='$id' AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%8%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID!='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){       	
                          	$n18++;
                               echo "<tr>                            
                                     <td>$n18</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>     		         
                                     <td>$r[StatusMtk_ID] - $r[NamaSMk]</td><td>$r[Semester]</td>
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T18=$T18+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T18,0,',','.');
                                       echo "</tr></table>";                         
                       $Ttot=$T18+$T17+$T16+$T15+$T14+$T13+$T12+$T9;
                       echo"<h3>TOTAL SELURUH SKS : $Ttot</h3>";                   	
                ?>
               </table></div>          

<?php
  break;
  
  case "DaftarMtkPilihan":
  $id= $_REQUEST['codd'];
  $kode= $_REQUEST['kode'];
   echo"<div id=groupmodul1>
        <table id=table_3>
          <tr>
            <td class=ce width=40 rowspan=3><img src=../img/mtk.png width=70 height=70></td>
            <td class=ce width=40>&nbsp;</td>
            <td class=ce rowspan=3 height=0></td>
          </tr>
          <tr><td class=ce width=480><span class=top>Matakuliah Manager : Matakuliah Pilihan</span></td></tr>
          <tr><td class=ce>&nbsp;</td>
          </tr></table>";
?>               
                <table id=tablemodul>             
                  <tr>
                    <td class="cc">Institusi</td>   <td colspan=2> : <select name="institusi" onChange="MM_jumpMenu('parent',this,0)">
                      <option value="media.php?page=akademikmatakuliah">- Pilih Institusi -</option>
                  <?php
              	  $sqlp="SELECT * FROM identitas ORDER BY Identitas_ID";
              	  $qryp=mysql_query($sqlp)
              	  or die();
              	  while ($d=mysql_fetch_array($qryp)){
                  if ($d['Identitas_ID']==$id){
                    $cek="selected";
                    }
                    else{
                      $cek="";
                    }
                    echo "<option value='?page=akademikmatakuliah&PHPIdSession=DaftarMtkPilihan&codd=$d[Identitas_ID]' $cek> $d[Identitas_ID] - $d[Nama_Identitas]</option>";
              		}
              		?>
                    </select>
                    <input name="TxtKodeH" type="hidden" value="<?= $id; ?>"></td>
                  </tr>
                  <tr>
                    <td class="cc">Jurusan</td>   <td colspan=2> : <select name="jurusan" onChange="MM_jumpMenu('parent',this,0)">
                      <option value="media.php?page=akademikmatakuliah">- Pilih Jurusan -</option>
                  <?php
              	  $sqlp="SELECT * FROM jurusan WHERE Identitas_ID='$id'";
              	  $qryp=mysql_query($sqlp)
              	  or die();
              	  while ($d1=mysql_fetch_array($qryp)){
                  if ($d1['kode_jurusan']==$kode){
                    $cek="selected";
                    }
                    else{
                      $cek="";
                    }
                    echo "<option value='?page=akademikmatakuliah&PHPIdSession=DaftarMtkPilihan&codd=$id&kode=$d1[kode_jurusan]' $cek> $d1[kode_jurusan] - $d1[nama_jurusan]</option>";
              		}
              		?>
                    </select>
                    <input name="TxtKodeH" type="hidden" value="<?= $kode; ?>"></td>
                  </tr>
                  <?php
                  echo" <tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a class=s href=javascript:history.go(-1)><img src=../img/back.png> Kembali Ke Dafar Mtk |</a>  
                                                                               <a class=s href='mtkprint.php?IDSessionSIAinst=$id&kodejurSIA=$kode' target='_new'><img src=../img/printer.GIF> Cetak Matakuliah |</a></tr></td>";			
          
                      echo" 					 					
                      			<table id=tablemodul>
                      			<h3>Semester 1</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%1%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){          	
                          	$n11++;
                               echo "<tr>                            
                                     <td>$n11</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                     <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>
                                     <td>$r[StatusMtk_ID] - $r[NamaSMk]</td>
                                     <td>$r[Semester]</td>     		         
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T29=$T29+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T29,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 2</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%2%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){       	
                          	$n12++;
                               echo "<tr>                            
                                     <td>$n12</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>
                                      <td>$r[StatusMtk_ID] - $r[NamaSMk]</td>
                                      <td>$r[Semester]</td>     		         
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T22=$T22+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T22,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 3</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%3%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){       	
                          	$n13++;
                               echo "<tr>                            
                                     <td>$n13</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>     		         
                                      <td>$r[StatusMtk_ID] - $r[NamaSMk]</td><td>$r[Semester]</td>
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T23=$T23+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T23,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 4</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%4%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){
                          	$n14++;
                               echo "<tr>                            
                                     <td>$n14</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>     		         
                                     <td>$r[StatusMtk_ID] - $r[NamaSMk]</td><td>$r[Semester]</td>
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T24=$T24+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T24,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 5</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%5%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){     	
                          	$n15++;
                               echo "<tr>                            
                                     <td>$n15</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>   		         
                                     <td>$r[StatusMtk_ID] - $r[NamaSMk]</td><td>$r[Semester]</td>
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T25=$T25+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T25,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 6</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%6%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){      	
                          	$n16++;
                               echo "<tr>                            
                                     <td>$n16</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>     		         
                                     <td>$r[StatusMtk_ID] - $r[NamaSMk]</td><td>$r[Semester]</td>
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T26=$T26+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T26,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 7</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%7%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){        	
                          	$n17++;
                               echo "<tr>                            
                                     <td>$n17</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>     		         
                                     <td>$r[StatusMtk_ID] - $r[NamaSMk]</td><td>$r[Semester]</td>
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T27=$T27+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T27,0,',','.');
                                       echo "</tr></table>
                       			<table id=tablemodul>
                      			<h3>Semester 8</h3>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk,t3.Nama AS NamaJMK FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID, jenismk t3 WHERE t1.JenisMTK_ID=t3.JenisMK_ID AND t1.Jurusan_ID='$kode' AND t1.Semester LIKE '%8%' AND t1.Aktif='Y' AND t1.StatusMtk_ID='A' AND t1.JenisMTK_ID='B' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){       	
                          	$n18++;
                               echo "<tr>                            
                                     <td>$n18</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                      <td>$r[JenisMTK_ID] - $r[NamaJMK]</td>     		         
                                     <td>$r[StatusMtk_ID] - $r[NamaSMk]</td><td>$r[Semester]</td>
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T28=$T28+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T28,0,',','.');
                                       echo "</tr></table></div>";                                            	
                ?>       
            <?
  break;

  case "StatusMtk":
  $id= $_REQUEST['codd'];
  $kode= $_REQUEST['kode'];
   echo"<div id=groupmodul1>
        <table id=table_3>
          <tr>
            <td class=ce width=40 rowspan=3><img src=../img/mtk.png width=70 height=70></td>
            <td class=ce width=40>&nbsp;</td>
            <td class=ce rowspan=3 height=0></td>
          </tr>
          <tr><td class=ce width=480><span class=top>Matakuliah Manager : Status Matakuliah</span></td></tr>
          <tr><td class=ce>&nbsp;</td>
          </tr></table>";
?>               
                <table id=tablemodul>             
                  <tr>
                    <td class="cc">Institusi</td>   <td colspan=2> : <select name="institusi" onChange="MM_jumpMenu('parent',this,0)">
                      <option value="media.php?page=akademikmatakuliah">- Pilih Institusi -</option>
                  <?php
              	  $sqlp="SELECT * FROM identitas ORDER BY Identitas_ID";
              	  $qryp=mysql_query($sqlp)
              	  or die();
              	  while ($d=mysql_fetch_array($qryp)){
                  if ($d['Identitas_ID']==$id){
                    $cek="selected";
                    }
                    else{
                      $cek="";
                    }
                    echo "<option value='?page=akademikmatakuliah&PHPIdSession=StatusMtk&codd=$d[Identitas_ID]' $cek> $d[Identitas_ID] - $d[Nama_Identitas]</option>";
              		}
              		?>
                    </select>
                    <input name="TxtKodeH" type="hidden" value="<?= $id; ?>"></td>
                  </tr>
                  <tr>
                    <td class="cc">Jurusan</td>   <td colspan=2> : <select name="jurusan" onChange="MM_jumpMenu('parent',this,0)">
                      <option value="media.php?page=akademikmatakuliah">- Pilih Jurusan -</option>
                  <?php
              	  $sqlp="SELECT * FROM jurusan WHERE Identitas_ID='$id'";
              	  $qryp=mysql_query($sqlp)
              	  or die();
              	  while ($d1=mysql_fetch_array($qryp)){
                  if ($d1['kode_jurusan']==$kode){
                    $cek="selected";
                    }
                    else{
                      $cek="";
                    }
                    echo "<option value='?page=akademikmatakuliah&PHPIdSession=StatusMtk&codd=$id&kode=$d1[kode_jurusan]' $cek> $d1[kode_jurusan] - $d1[nama_jurusan]</option>";
              		}
              		?>
                    </select>
                    <input name="TxtKodeH" type="hidden" value="<?= $kode; ?>"></td>
                  </tr>
                  <?php
                  echo" <tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a class=s href=javascript:history.go(-1)><img src=../img/back.png> Kembali Ke Dafar Mtk |</a>  
                                                                               <a class=s href='mtkprint.php?IDSessionSIAinst=$id&kodejurSIA=$kode' target='_new'><img src=../img/printer.GIF> Cetak Matakuliah |</a></tr></td>";			
          
                      echo" <table id=tablemodul>
                            <tr><th>No</th><th>Kode Mtk</th><th>Nama Mtk</th><th>Jenis</th><th>Status</th><th>Sem</th><th>SKS</th><th>Aktif</th></tr>";
                            $sql="SELECT t1.*,t2.Nama AS NamaSMk FROM matakuliah t1 left join statusmtk t2 ON t1.StatusMtk_ID = t2.StatusMtk_ID WHERE t1.Jurusan_ID='$kode' GROUP BY t1.Matakuliah_ID ORDER BY t1.Matakuliah_ID,t1.Semester";
                          	$qry= mysql_query($sql)
                          	or die ();
                          	while ($r=mysql_fetch_array($qry)){          	
                          	$n1++;
                               echo "<tr>                            
                                     <td>$n1</td>
                                     <td><a class=s href=?page=akademikmatakuliah&PHPIdSession=EditMtk&gis=$r[Matakuliah_ID]><img src=../img/edit.png> $r[Kode_mtk]</td>
                        		         <td>$r[Nama_matakuliah]</td>  
                                     <td>$r[JenisMTK_ID]</td>
                                     <td>$r[StatusMtk_ID] - $r[NamaSMk]</td>
                                     <td>$r[Semester]</td>     		         
                                     <td>$r[SKS]</td><td>$r[Aktif]</td>    
                                     ";
                                     $T1=$T1+$r[SKS];
                               echo "</tr>";        
                            }
                                       echo "<tr>";
                                       echo "<tr class=style2><td colspan=6 align=right><h3>Total :</h3><td><h3>";
                                       echo number_format($T1,0,',','.');
                                       echo "</tr></table></div>";        
  break;

  case "Daftarkrklm";
  $id= $_REQUEST['codd'];
  $kode= $_REQUEST['kode'];
   echo"<div id=groupmodul1>
        <table id=table_3>
          <tr>
            <td class=ce width=40 rowspan=3><img src=../img/mtk.png width=70 height=70></td>
            <td class=ce width=40>&nbsp;</td>
            <td class=ce rowspan=3 height=0></td>
          </tr>
          <tr><td class=ce width=480><span class=top>Matakuliah Manager : Kurikulum Matakuliah</span></td></tr>
          <tr><td class=ce>&nbsp;</td>
          </tr></table>";
?>                <table id=tablemodul>             
                  <tr>
                    <td class="cc">Institusi</td>   <td colspan=2> : <select name="institusi" onChange="MM_jumpMenu('parent',this,0)">
                      <option value="media.php?page=akademikmatakuliah">- Pilih Institusi -</option>
                  <?php
              	  $sqlp="SELECT * FROM identitas ORDER BY Identitas_ID";
              	  $qryp=mysql_query($sqlp)
              	  or die();
              	  while ($d=mysql_fetch_array($qryp)){
                  if ($d['Identitas_ID']==$id){
                    $cek="selected";
                    }
                    else{
                      $cek="";
                    }
                    echo "<option value='?page=akademikmatakuliah&PHPIdSession=Daftarkrklm&codd=$d[Identitas_ID]' $cek> $d[Identitas_ID] - $d[Nama_Identitas]</option>";
              		}
              		?>
                    </select>
                    <input name="institusi" type="hidden" value="<?= $id; ?>"></td>
                  </tr>
                  <tr>
                    <td class="cc">Jurusan</td>   <td colspan=2> : <select name="jurusan" onChange="MM_jumpMenu('parent',this,0)">
                      <option value="media.php?page=akademikmatakuliah">- Pilih Jurusan -</option>
                  <?php
              	  $sqlp="SELECT * FROM jurusan WHERE Identitas_ID='$id'";
              	  $qryp=mysql_query($sqlp)
              	  or die();
              	  while ($d1=mysql_fetch_array($qryp)){
                  if ($d1['kode_jurusan']==$kode){
                    $cek="selected";
                    }
                    else{
                      $cek="";
                    }
                    echo "<option value='?page=akademikmatakuliah&PHPIdSession=Daftarkrklm&codd=$id&kode=$d1[kode_jurusan]' $cek> $d1[kode_jurusan] - $d1[nama_jurusan]</option>";
              		}
              		?>
                    </select>
                    <input name="jurusan" type="hidden" value="<?= $kode; ?>"></td>
                  </tr>
                  <?php
                  echo" <tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a class=s href=?page=akademikmatakuliah&codd=$id&kode=$kode><img src=../img/back.png> Kembali Ke Dafar Mtk |</a> 
                                                                               <a class='s' href='?page=akademikmatakuliah&PHPIdSession=TambahKrklm'><img src=../img/tambah.png> Tambah Kurikulum |</a> 
                                                                               <a class=s href='mtkprint.php?IDSessionSIAinst=$id&kodejurSIA=$kode' target='_new'><img src=../img/printer.GIF> Cetak Matakuliah |</a></tr></td>";			
          
                            echo" <table id=tablemodul><tr><th>Kode</th><th>Kurikulum</th><th>Sesi</th><th>Jml/tahun</th><th>Aktif</th><th>Aksi</th></tr>";											
                            $sql="SELECT * FROM kurikulum WHERE Identitas_ID='$id' AND Jurusan_ID='$kode' ORDER BY Kurikulum_ID";
                            $qry= mysql_query($sql)
                            or die ();
                            while ($d=mysql_fetch_array($qry)){
                            if(($no % 2)==0){
                            $warna="#FFFFFF";
                            }else{$warna="#E1E1E1";
                            }$no++;
                            echo "<tr bgcolor=$warna>             
                            <td align=center>$d[Kode]</td>
                            <td>$d[Nama]</td>
                            <td>$d[Sesi]</td>
                            <td>$d[JmlSesi]</td>
                            <td>$d[Aktif]</td>
                            <td><a href=\"akademik/akademikmatakuliahact.php?page=akademikmatakuliah&PHPIdSession=delprog&gos=$d[Kurikulum_ID]&mkiq=$id&mkjkq=$kode\"onClick=\"return confirm('Apakah Anda benar-benar akan menghapus $d[Kode] pada jurusan $d[Jurusan_ID]	?')\"> <img src=../img/del.jpg></a>
                            </td></tr>";        
                            }	echo"</table></div>";     
  break;

  case "TambahMtk":
   $id= $_REQUEST['id'];
   $kode= $_REQUEST['kode'];
   $nkur=$_REQUEST['nkur'];
   echo"<div id=groupmodul1>
        <table id=table_3>
          <tr>
            <td class=ce width=40 rowspan=3><img src=../img/tambahmtk.png width=70 height=70></td>
            <td class=ce width=40>&nbsp;</td>
            <td class=ce rowspan=3 height=0></td>
          </tr>
          <tr><td class=ce width=480><span class=top>Matakuliah Manager : Tambah Matakuliah</span></td></tr>
          <tr><td class=ce>&nbsp;</td>
          </tr></table>";  
  echo" <table id=tablemodul><tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a class=s href=javascript:history.go(-1)><img src=../img/back.png> Kembali Ke Dafar Mtk |</a></table>		
 
        <form action=akademik/akademikmatakuliahact.php?page=akademikmatakuliah&PHPIdSession=addmk method=post>
              <table id=tablemodul>";
    ?>
    <tr>
      <td class="cc">Institusi</td>   <td colspan=2>  <select name="i" onChange="MM_jumpMenu('parent',this,0)">
        <option value="media.php?page=akademikmatakuliah&PHPIdSession=TambahMtk">- Pilih Institusi -</option>
    <?php
	  $sqlp="select * from identitas ORDER BY ID";
	  $qryp=mysql_query($sqlp)
	  or die();
	  while ($d=mysql_fetch_array($qryp)){
    if ($d['Identitas_ID']==$id){
      $cek="selected";
      }
      else{
        $cek="";
      }
      echo "<option value='?page=akademikmatakuliah&PHPIdSession=TambahMtk&id=$d[Identitas_ID]' $cek> $d[Identitas_ID] - $d[Nama_Identitas]</option>";
		}
		?>
      </select>
      <input name="i" type="hidden" value="<?= $id; ?>"></td>
    </tr>
    <tr>
      <td class="cc">Jurusan</td>   <td colspan=2>  <select name="jur" onChange="MM_jumpMenu('parent',this,0)">
        <option value="media.php?page=akademikmatakuliah&PHPIdSession=TambahMtk">- Pilih Jurusan -</option>
    <?php
	  $sqlp="select * from jurusan WHERE Identitas_ID='$id' ORDER BY jurusan_ID";
	  $qryp=mysql_query($sqlp)
	  or die();
	  while ($d=mysql_fetch_array($qryp)){
    if ($d['kode_jurusan']==$kode){
      $cek="selected";
      }
      else{
        $cek="";
      }
      echo "<option value='?page=akademikmatakuliah&PHPIdSession=TambahMtk&id=$id&kode=$d[kode_jurusan]' $cek> $d[kode_jurusan] - $d[nama_jurusan]</option>";
		}
		?>
      </select>
      <input name="jur" type="hidden" value="<?= $kode; ?>"></td>
    </tr>
  <?echo" 
              <tr><td class=cc>Kode Matakuliah *</td>    <td>      <input type=text name=kmk></td></tr>
              <tr><td class=cc>Nama Matakuliah *</td>    <td>      <input type=text name=nm size=50></td></tr>
              <tr><td class=cc>Nama (Inggris) *</td>    <td>      <input type=text name=ne size=50></td></tr>
              <tr><td class=cc>Jenis *</td>    <td>      <select name='jmk'>
                        <option value=0 selected>- Pilih Jenis Matakuliah -</option>";
                        $tampil=mysql_query("SELECT * FROM jenismk ORDER BY JenisMK_ID");
                        while($r=mysql_fetch_array($tampil)){
                          echo "<option value=$r[JenisMK_ID]>$r[JenisMK_ID] - $r[Nama]</option>";
                        }
                echo "</select></td></tr>
              <tr><td class=cc>Kelompok Matakuliah *</td>    <td>      <select name='klmptk'>
                        <option value=0 selected>- Pilih Kelompok Matakuliah -</option>";
                        $tampil=mysql_query("SELECT * FROM kelompokmtk ORDER BY KelompokMtk_ID");
                        while($r=mysql_fetch_array($tampil)){
                          echo "<option value=$r[KelompokMtk_ID]>$r[KelompokMtk_ID] - $r[Nama]</option>";
                        }
                echo "</select></td></tr>
              <tr><td class=cc>Status Matakuliah *</td>    <td>      <select name='stmk'>
                        <option value=0 selected>- Pilih Status -</option>";
                        $tampil=mysql_query("SELECT * FROM statusmtk ORDER BY StatusMtk_ID");
                        while($r=mysql_fetch_array($tampil)){
                          echo "<option value=$r[StatusMtk_ID]>$r[StatusMtk_ID] - $r[Nama]</option>";
                        }
                echo "</select></td></tr>
              <tr><td class=cc>Jenis Kurikulum *</td>    <td>      <select name='jkur'>
                        <option value=0 selected>- Pilih Jenis -</option>";
                        $tampil=mysql_query("SELECT * FROM jeniskurikulum ORDER BY JenisKurikulum_ID");
                        while($r=mysql_fetch_array($tampil)){
                          echo "<option value=$r[JenisKurikulum_ID]>$r[JenisKurikulum_ID] - $r[Nama]</option>";
                        }
                echo "</select></td></tr>
             <tr><td class=cc>Nama Kurikulum *</td>    <td>      <select name='nkur'>
                        <option value=0 selected>- Pilih Nama Kurikulum -</option>";
                        $tampil=mysql_query("SELECT * FROM kurikulum WHERE Identitas_ID='$id' AND Jurusan_ID='$kode' ORDER BY Kurikulum_ID");
                        while($r=mysql_fetch_array($tampil)){
                          echo "<option value=$r[Kurikulum_ID]>$r[Kode] - $r[Nama]</option>";
                        }
                echo "</select></td></tr>
              <tr><td class=cc>Sesi *</td>    <td>      <input type=text name=sesi size=4></td></tr>
              <tr><td class=cc>SKS *</td>    <td>     <input type=text name=sks size=4></td></tr>
             <tr><td class=cc>Penanggung Jawab *</td>    <td>      <select name='pj'>
                        <option value=0 selected>- Pilih Penanggung Jawab -</option>";
                        $tampil=mysql_query("SELECT * FROM dosen WHERE Identitas_ID='$id' AND Jurusan_ID='$kode' ORDER BY dosen_ID");
                        while($r=mysql_fetch_array($tampil)){
                          echo "<option value=$r[dosen_ID]>$r[nama_lengkap], $r[Gelar]</option>";
                        }
                echo "</select></td></tr>
              <tr><td class=cc>Keterangan</td>    <td>      <textarea name=Ket cols=45 rows=5></textarea></td></tr>
              <tr><td class=cc>Aktif *</td>   <td>      <input type=radio name=ak value=Y> Y     
                                             <input type=radio name=ak  value=N>N
            </td></tr><tr><td colspan=2><input type=submit value=Simpan class=tombol>                      
      	 </td>
         </tr>
       </table>
      </form></div>";
  break;
  
  case "EditMtk";
    $id= $_REQUEST['codd'];
    $kode= $_REQUEST['kode'];
    $e = mysql_query("SELECT * FROM matakuliah WHERE Matakuliah_ID='$_GET[gis]'");
    $r    = mysql_fetch_array($e);
   echo"<div id=groupmodul1>
        <table id=table_3>
          <tr>
            <td class=ce width=40 rowspan=3><img src=../img/edit_1.png width=70 height=70></td>
            <td class=ce width=40>&nbsp;</td>
            <td class=ce rowspan=3 height=0></td>
          </tr>
          <tr><td class=ce width=480><span class=top>Matakuliah Manager : Edit Matakuliah</span></td></tr>
          <tr><td class=ce>&nbsp;</td>
          </tr></table>
   <table id=tablemodul><tr><td class=cc>Pilihan </td> <td colspan=2 class=cb> : <a class=s href=javascript:history.go(-1)><img src=../img/back.png> Kembali Ke Dafar Mtk |</a></table>
    <form action='akademik/akademikmatakuliahact.php?page=akademikmatakuliah&PHPIdSession=upmk' method='post'>

     <table id=tablemodul>
     <input type=hidden name='ID' value='$r[Matakuliah_ID]'>
      <tr><td class=cc>Institusi</td>    <td>      <select name='i' id='identitas'>
                <option value=0 selected>- Pilih Institusi -</option>";
                $t=mysql_query("SELECT * FROM identitas ORDER BY ID");
                while($w=mysql_fetch_array($t)){
                if ($r[Identitas_ID]==$w[Identitas_ID]){
                 echo "<option value=$w[Identitas_ID] selected>$w[Identitas_ID] - $w[Nama_Identitas]</option>";
                  }
                  else{            
                  echo "<option value=$w[Identitas_ID]>$w[Identitas_ID] - $w[Nama_Identitas]</option>";
                }}
        echo "</select></td></tr>
    
      <tr><td class=cc>Jurusan</td>    <td>      <select name='jur' id='jurusan'>
                <option value=0 selected>- Pilih Jurusan -</option>";
                $t=mysql_query("SELECT * FROM jurusan ORDER BY kode_jurusan");
                while($w=mysql_fetch_array($t)){
                if ($r[Jurusan_ID]==$w[kode_jurusan]){
                 echo "<option value=$w[kode_jurusan] selected>$w[kode_jurusan] - $w[nama_jurusan]</option>";
                  }
                  else{            
                  echo "<option value=$w[kode_jurusan]>$w[kode_jurusan] - $w[nama_jurusan]</option>";
                }}
        echo "</select></td></tr>
      <tr><td class=cc>Kode Matakuliah</td>    <td>      <input type=text name='kmk' value='$r[Kode_mtk]'></td></tr>
      <tr><td class=cc>Nama Matakuliah</td>    <td>      <input type=text name='nm' size=50 value='$r[Nama_matakuliah]'></td></tr>
      <tr><td class=cc>Nama (Inggris)</td>    <td>      <input type=text name='ne' value='$r[Nama_english]'></td></tr>
      <tr><td class=cc>Jenis</td>    <td>      <select name='jmk'>
                <option value=0 selected>- Pilih Jenis Matakuliah -</option>";
                $tampil=mysql_query("SELECT * FROM jenismk ORDER BY JenisMK_ID");
                while($w=mysql_fetch_array($tampil)){
                if ($r[JenisMTK_ID]==$w[JenisMK_ID]){
                 echo "<option value=$w[JenisMK_ID] selected>$w[JenisMK_ID] - $w[Nama]</option>";
                  }
                  else{            
                  echo "<option value=$w[JenisMK_ID]>$w[JenisMK_ID] - $w[Nama]</option>";
                }}
        echo "</select></td></tr>
      <tr><td class=cc>Kelompok Matakuliah</td>    <td>      <select name='klmptk'>
                <option value=0 selected>- Pilih Kelompok Matakuliah -</option>";
                $tampil=mysql_query("SELECT * FROM kelompokmtk ORDER BY KelompokMtk_ID");
                while($w=mysql_fetch_array($tampil)){
                if ($r[KelompokMtk_ID]==$w[KelompokMtk_ID]){  
                  echo "<option value=$w[KelompokMtk_ID] selected>$w[KelompokMtk_ID] - $w[Nama]</option>";
                }else{
                  echo "<option value=$w[KelompokMtk_ID]>$w[KelompokMtk_ID] - $w[Nama]</option>";            
                }}
        echo "</select></td></tr>
      <tr><td class=cc>Status Matakuliah</td>    <td>      <select name='stmk'>
                <option value=0 selected>- Pilih Status -</option>";
                $tampil=mysql_query("SELECT * FROM statusmtk ORDER BY StatusMtk_ID");
                while($w=mysql_fetch_array($tampil)){
                    if ($r[StatusMtk_ID]==$w[StatusMtk_ID]){
                 echo "<option value=$w[StatusMtk_ID] selected>$w[StatusMtk_ID] - $w[Nama]</option>";
                  }
                  else{
                  echo "<option value=$w[StatusMtk_ID]>$w[StatusMtk_ID] - $w[Nama]</option>";
                }}
        echo "</select></td></tr>
      <tr><td class=cc>Jenis Kurikulum</td>    <td>      <select name='jkur'>
                <option value=0 selected>- Pilih Jenis -</option>";
                $tampil=mysql_query("SELECT * FROM jeniskurikulum ORDER BY JenisKurikulum_ID");
                while($w=mysql_fetch_array($tampil)){
                    if ($r[JenisKurikulum_ID]==$w[JenisKurikulum_ID]){
                 echo "<option value=$w[JenisKurikulum_ID] selected>$w[JenisKurikulum_ID] - $w[Nama]</option>";
                  }
                  else{
                  echo "<option value=$w[JenisKurikulum_ID]>$w[JenisKurikulum_ID] - $w[Nama]</option>";
                }}
        echo "</select></td></tr>
       <tr><td class=cc>Nama Kurikulum</td>    <td>      <select name='nkur'>
                <option value=0 selected>- Pilih Nama Kurikulum -</option>";
                $tampil=mysql_query("SELECT * FROM kurikulum WHERE Identitas_ID='$r[Identitas_ID]' AND Jurusan_ID='$r[Jurusan_ID]' ORDER BY Kurikulum_ID");
                while($w=mysql_fetch_array($tampil)){
                    if ($r[Kurikulum_ID]==$w[Kurikulum_ID]){
                 echo "<option value=$w[Kurikulum_ID] selected>$w[Nama]</option>";
                  }
                  else{
                  echo "<option value=$w[Kurikulum_ID]>$w[Nama]</option>";
                }}
        echo "</select></td></tr>
      <tr><td class=cc>Sesi</td>    <td>      <input type=text name='sesi' size=4 value='$r[Semester]'></td></tr>
      <tr><td class=cc>SKS</td>    <td>     <input type=text name='sks' size=4 value='$r[SKS]'></td></tr>
      <tr><td class=cc>Penanggung Jawab</td>    <td>      <select name='pj' id=pj>
                <option value=0 selected>- Pilih Penanggung Jawab -</option>";
                $tampil=mysql_query("SELECT * FROM dosen WHERE Identitas_ID='$r[Identitas_ID]' AND Jurusan_ID='$r[Jurusan_ID]' ORDER BY dosen_ID");
                while($w=mysql_fetch_array($tampil)){
                    if ($r[Penanggungjawab]==$w[dosen_ID]){
                 echo "<option value=$w[dosen_ID] selected>$w[nama_lengkap],$w[Gelar]</option>";
                  }
                  else{            
    
                  echo "<option value=$w[dosen_ID]>$w[nama_lengkap],$w[Gelar]</option>";
                }}
        echo "</select></td></tr>
      <tr><td class=cc>Keterangan</td>    <td>      <textarea name='Ket' cols=45 rows=5>$r[Ket]</textarea></td></tr>";
        if ($r[Aktif]=='Y'){
          echo "<tr><td class=cc>Aktif</td> <td> : <input type=radio name='ak' value='Y' checked>Y  
                                            <input type=radio name='ak' value='N'> N</td></tr>";
        }
        else{
          echo "<tr><td class=cc>Aktif</td> <td> : <input type=radio name='ak' value='Y'>Y  
                                            <input type=radio name='ak' value='N' checked>N</td></tr>";
        }
        echo"<tr><td colspan=2><input type=submit value=Simpan class=tombol>                      
    	 </td>
       </tr>
     </table>
    </form></div>"; 
  break;
  
  case "TambahKrklm":
  $id= $_REQUEST['codd'];
  $kode= $_REQUEST['kode'];
  echo"<div id=groupmodul1>
      <form action='akademik/akademikmatakuliahact.php?page=akademikmatakuliah&PHPIdSession=upkrklmmk' method='post'>
       <table id=tablemodul>
          <h3>Tambah Kurikulum</h3>";
          ?>
                  <tr>
                    <td class="cc">Institusi</td>   <td colspan=2>  <select name="mkiq" onChange="MM_jumpMenu('parent',this,0)">
                      <option value="media.php?page=akademikmatakuliah&PHPIdSession=TambahKrklm">- Pilih Institusi -</option>
                  <?php
              	  $sqlp="SELECT * FROM identitas ORDER BY Identitas_ID";
              	  $qryp=mysql_query($sqlp)
              	  or die();
              	  while ($d=mysql_fetch_array($qryp)){
                  if ($d['Identitas_ID']==$id){
                    $cek="selected";
                    }
                    else{
                      $cek="";
                    }
                    echo "<option value='?page=akademikmatakuliah&PHPIdSession=TambahKrklm&codd=$d[Identitas_ID]' $cek> $d[Identitas_ID] - $d[Nama_Identitas]</option>";
              		}
              		?>
                    </select>
                    <input name="mkiq" type="hidden" value="<?= $id; ?>"></td>
                  </tr>
                  <tr>
                    <td class="cc">Jurusan</td>   <td colspan=2>  <select name="mkjkq" onChange="MM_jumpMenu('parent',this,0)">
                      <option value="media.php?page=akademikmatakuliah&PHPIdSession=TambahKrklm">- Pilih Jurusan -</option>
                  <?php
              	  $sqlp="SELECT * FROM jurusan WHERE Identitas_ID='$id'";
              	  $qryp=mysql_query($sqlp)
              	  or die();
              	  while ($d1=mysql_fetch_array($qryp)){
                  if ($d1['kode_jurusan']==$kode){
                    $cek="selected";
                    }
                    else{
                      $cek="";
                    }
                    echo "<option value='?page=akademikmatakuliah&PHPIdSession=TambahKrklm&codd=$id&kode=$d1[kode_jurusan]' $cek> $d1[kode_jurusan] - $d1[nama_jurusan]</option>";
              		}
              		?>
                    </select>
                    <input name="mkjkq" type="hidden" value="<?= $kode; ?>"></td>
                  </tr>
          <?echo"
          <tr><td class=cc>Kode/Tahun :</td>    <td> <input type=text name='Kode' size=5></td></tr>
          <tr><td class=cc>Nama Kurikulum :</td>    <td>      <input type=text name='Nama'></td></tr>
          <tr><td class=cc>Nama Sesi :</td>   <td>  <input type=text name='Sesi' size=30></td></tr>
          <tr><td class=cc>Jumlah Sesi/ Tahun :</td>    <td>    <input type=text name='JmlSesi' size=4></td></tr>
          <tr><td class=cc>Aktif :</td> <td> <input type=radio name='Aktif' value='Y'> Y  
                                            <input type=radio name='Aktif' value='N'> N</td></tr>
          <tr><td colspan=2><input type=submit value=Simpan class=tombol>
                           <input type=button class=tombol value=Batal onclick=self.history.back()>                            
      	 </td>
         </tr>
       </table>
      </form></div>";  
  break;
}
?>
