<?php
function defaultIdenUniv(){
echo" <div id=headermodul>Identitas Universitas</div>";
echo" <div id=groupmodul1><a href='?page=masteridentitas&PHPIdSession=tambahidentitas'>Tambah Identitas</a>
      <table id=tablemodul>
      <tr><th>No</th><th>Kode</th><th>Nama</th><th>Aksi</th></tr>"; 
      $sql="SELECT * FROM identitas ORDER BY Identitas_ID";
      $qry= mysql_query($sql)
      or die ();
      while ($r=mysql_fetch_array($qry)){
      if(($no % 2)==0){
          $warna="#FFF";
      }
      else{
          $warna="#ebf0f5";
      } 
      $no++;
echo" <tr bgcolor=$warna><td>$no</td>
                                <td>$r[Identitas_ID]</td>
                                <td>$r[Nama_Identitas]</td>
                                <td><a  href='?page=masteridentitas&PHPIdSession=edit&gis=$r[ID]'><img src=../img/edit.png></a> |
                                <a href=\"?page=masteridentitas&PHPIdSession=HapusIdntUniv&gos=$r[ID]\"
                                onClick=\"return confirm('Apakah Anda benar-benar akan menghapus $r[Identitas_ID]?')\"><img src=../img/del.jpg></a>
                                </td></tr>";        
                             } 
echo" </table></div>";      
}

function tambahidentitas(){
echo"<div id=groupmodul1>
    <form action='?page=masteridentitas&PHPIdSession=InputIdntUniv' method='post'>
    <table id=tablemodul><h3>Tambah Identitas Universitas</h3>
    <tr><td class=cc>Kode</td>       <td><input type=text name='Kode'></td></tr>                  
    <tr><td class=cc>Kode Hukum</td>       <td><input type=text name='KodeHukum'></td></tr>
    <tr><td class=cc>Nama</td>     <td><input type=text name=Nama size=50></td></tr>
    <tr><td class=cc>Tanggal Mulai</td>   <td>";
        combotgl(1,31,'tgl_mulai',Tgl);
        combobln(1,12,'bln_mulai',Bulan);
        $t=date("Y");
        combotgl($t-100,$t+1,'thn_mulai',Tahun);
    echo"</td></tr>
    <tr><td class=cc>Alamat 1</td>          <td><input type=text name='Alamat1' size=50></td></tr>
    <tr><td class=cc>Kota</td>        <td><input type=text name='Kota'></td></tr>
    <tr><td class=cc>Kode pos</td>        <td><input type=text name='KodePos'></td></tr>
    <tr><td class=cc>Telepon</td>        <td><input type=text name='Telepon'></td></tr>
    <tr><td class=cc>Fax</td>        <td><input type=text name='Fax'></td></tr>
    <tr><td class=cc>Email</td>        <td><input type=text name='Email'></td></tr>
    <tr><td class=cc>Website</td>        <td><input type=text name='Website'></td></tr>
    <tr><td class=cc>No.Akta</td>        <td><input type=text name='NoAkta'></td></tr>
    <tr><td class=cc>Tanggal Akta</td>        <td>";
        combotgl(1,31,'tgl_akta',Tgl);
        combobln(1,12,'bln_akta',Bulan);
        combotgl($t-100,$t+1,'thn_akta',Tahun);
    echo"</td></tr>
    <tr><td class=cc>No. Pengesahan</td>        <td><input type=text name='NoSah'></td></tr>
    <tr><td class=cc>Tanggal Pengesahan</td><td>";
        combotgl(1,31,'tgl_sah',Tgl);
        combobln(1,12,'bln_sah',Bulan);
        combotgl($t-100,$t+1,'thn_sah',Tahun);
    echo"</td></tr>";
    if ($r[Aktif]=='Y'){
    echo "<tr><td class=cc>Aktif</td> <td> : <input type=radio name='NA' value='Y' checked>Y  
    <input type=radio name='NA' value='N'> N</td></tr>";
    }else{
    echo "<tr><td class=cc>Aktif</td> <td> : <input type=radio name='NA' value='Y'>Y  
                                      <input type=radio name='NA' value='N' checked>N</td></tr>";
    }
    echo"<tr><td colspan=2><input type=submit value=Simpan class=tombol>                      
                           <input type=button value=Batal class=tombol onclick=self.history.back()>
    </td></tr></table></form></div>";
}

function editidentitas(){
    $edit = mysql_query("SELECT * FROM identitas WHERE ID='$_GET[gis]' ORDER BY Identitas_ID");
    $r    = mysql_fetch_array($edit);
echo"<div id=groupmodul1>
    <form action='?page=masteridentitas&PHPIdSession=UpdateIdntUniv' method='post'>
    <table id=tablemodul><h3>Update Identitas Universitas</h3>
    <input type=hidden name='ID' value='$r[ID]'>
    <tr><td class=cc>Kode</td>       <td><input type=text name='Kode' value='$r[Identitas_ID]'></td></tr>                  
    <tr><td class=cc>Kode Hukum</td>       <td><input type=text name='KodeHukum' value='$r[KodeHukum]'></td></tr>
    <tr><td class=cc>Nama</td>     <td><input type=text name=Nama size=50 value='$r[Nama_Identitas]'></td></tr>
    <tr><td class=cc>Tanggal Mulai</td>   <td>";
          $gtg=substr("$r[TglMulai]",8,2);
          combotgl3(1,31,'tgl_mulai',$gtg);
          $gb=substr("$r[TglMulai]",5,2);
          combobln3(1,12,'bln_mulai',$gb);
          $gt=substr("$r[TglMulai]",0,4);
          $t=date("Y");
          combotgl3($t-100,$t+1,'thn_mulai',$gt);
    echo"</td></tr>
    <tr><td class=cc>Alamat 1</td>          <td><input type=text name='Alamat1' value='$r[Alamat1]'></td></tr>
    <tr><td class=cc>Kota</td>        <td><input type=text name='Kota' value='$r[Kota]'></td></tr>
    <tr><td class=cc>Kode pos</td>        <td><input type=text name='KodePos' value='$r[KodePos]'></td></tr>
    <tr><td class=cc>Telepon</td>        <td><input type=text name='Telepon' value='$r[Telepon]'></td></tr>
    <tr><td class=cc>Fax</td>        <td><input type=text name='Fax' value='$r[Fax]'></td></tr>
    <tr><td class=cc>Email</td>        <td><input type=text name='Email' value='$r[Email]'></td></tr>
    <tr><td class=cc>Website</td>        <td><input type=text name='Website' value='$r[Website]'></td></tr>
    <tr><td class=cc>No.Akta</td>        <td><input type=text name='NoAkta' value='$r[NoAkta]'></td></tr>
    <tr><td class=cc>Tanggal Akta</td>        <td>";
        $gtg=substr("$r[TglAkta]",8,2);
        combotgl3(1,31,'tgl_akta',$gtg);
        $gb=substr("$r[TglAkta]",5,2);
        combobln3(1,12,'bln_akta',$gb);
        $gt=substr("$r[TglAkta]",0,4);
        $t=date("Y");
        combotgl3($t-100,$t+1,'thn_akta',$gt);
        echo"</td></tr>
    <tr><td class=cc>No. Pengesahan</td>        <td><input type=text name='NoSah' value='$r[Nama_Identitas]'></td></tr>
    <tr><td class=cc>Tanggal Pengesahan</td><td>";
        $gtg=substr("$r[TglSah]",8,2);
        combotgl3(1,31,'tgl_sah',$gtg);
        $gb=substr("$r[TglSah]",5,2);
        combobln3(1,12,'bln_sah',$gb);
        $gt=substr("$r[TglSah]",0,4);
        $t=date("Y");
        combotgl3($t-100,$t+1,'thn_sah',$gt);
    echo"</td></tr>";
    if ($r[Aktif]=='Y'){
    echo "<tr><td class=cc>Aktif</td> <td> : <input type=radio name='NA' value='Y' checked>Y  
    <input type=radio name='NA' value='N'> N</td></tr>";
    }else{
    echo "<tr><td class=cc>Aktif</td> <td> : <input type=radio name='NA' value='Y'>Y  
                                      <input type=radio name='NA' value='N' checked>N</td></tr>";
    }
    echo"<tr><td colspan=2><input type=submit value=Simpan class=tombol>                      
                           <input type=button value=Batal class=tombol onclick=self.history.back()></td></tr>
          </table></form></div>";
}
?>
