<?php
function defaultmodul(){
echo"<div id=headermodul>Manajemen Modul</div>
      <form name=form1 method=post  action='?page=modul&PHPIdSession=CariModul'>           
          <div id=groupmodul1><table id=tablemodul>
          <tr><td>Group Modul</td><td> : <select name='relasi_modul' onChange='this.form.submit()'>
                                      <option value=0 selected></option>";
                                      $sql=mysql_query("SELECT * FROM groupmodul ORDER BY id_group");
                                      while($data=mysql_fetch_array($sql)){                                      
                                      echo "<option value='$data[relasi_modul]'>$data[nama]</option>";
                                      }
    echo" </select></td></form>
          <td><form name=form1 method=post action='?page=modul'>      <input type=submit name=button id=button value=Refresh>
          </form></td></tr></table></div>
          <div id=groupmodul1><div id=toolbar><a href='?page=modul&PHPIdSession=TambahModul'>Tambah Modul | </a>
                                            <a href='?page=modul&PHPIdSession=TambahGroup'>Group Modul |  </a></div>
          <table id=tablemodul>";
}

function defaultmodul1(){
echo"<tr><th>Group</th><th>Modul</th><th>Mn</th><th>Modul Link</th><th>Keterangan</th><th>Aksi</th></tr>";
      $tampil=mysql_query("SELECT 
                            t2.id_group AS id_group,
                            t1.id AS id,
                            t2.nama AS nama,
                            t1.judul AS judul,
                            t1.aktif AS aktif,
                            t1.url AS url,
                            t1.keterangan AS keterangan 
                          FROM 
                            (dropdownsystem t1 join groupmodul t2) 
                          WHERE 
                            (t1.parent_id = t2.relasi_modul) 
                          ORDER BY 
                            t2.id_group");
      $no=1;
      while ($data=mysql_fetch_array($tampil)){
echo" <tr><form method=post action='?page=modul&PHPIdSession=HapusModul'>
               <input type=hidden  name=id size=5 value=$data[id]>
               <td bgcolor=#ececec>$data[nama]</td>
               <td><a href=?page=modul&PHPIdSession=EditModul&id=$data[id]>$data[judul]</a></td>
  		         <td align=center>$data[aktif]</td>
  		         <td><? echo $data[url]</td>
  		         <td><? echo $data[keterangan]</td>
               <td><input type=submit value=HAPUS></td>
               </form></tr>";
        $no++; 
        }  
echo" </table></div>";     
}

function carimodul(){
      defaultmodul();
      ?><tr><th>Group</th><th>Modul</th><th>Menu</th><th>Modul Link</th><th>Keterangan</th><th>Aksi</th></tr>
      <?   $tampil=mysql_query("select 
                                t2.id_group AS id_group,
                                t1.id AS id,
                                t2.nama AS nama,
                                t1.judul AS judul,
                                t1.aktif AS aktif,
                                t1.url AS url,
                                t1.keterangan AS keterangan 
                              from 
                                (dropdownsystem t1 join groupmodul t2) 
                              where 
                                (t1.parent_id = t2.relasi_modul)and (t2.relasi_modul ='$_POST[relasi_modul]') 
                              order by 
                                t2.id_group");
            $no=1;
            while ($data=mysql_fetch_array($tampil)){
            ?> <tr>
               <form name=form1 method=post action='?page=modul&PHPIdSession=HapusModul'>
               <input type=hidden name=id value="<? echo $data['id'] ?>">           
               <td><? echo $data['nama'] ?></td>
               <td><a href=?page=modul&PHPIdSession=EditModul&id=<? echo $data['id'] ?>><? echo $data['judul'] ?></a></td>
        		   <td align=center><? echo $data['aktif'] ?></td>
        		   <td><? echo $data['url'] ?></td>
        		   <td><? echo $data['keterangan'] ?></td>
               <td><input type=submit value=HAPUS></td>
               </form></tr>
           <?  $no++; }  ?>
          </table></div>
          <?
}

function tambahmodul(){
      echo"<div id=headereditmdl>Tambah data</div>       
          <div id=groupmodul>          
          <form method=post action=?page=modul&PHPIdSession=TambahModul>
            <table id=tablemodul1>              
              <tr><td bgcolor=#265180>Group</td>
                  <td bgcolor=#C0DCC0>";            
                        echo"<select name=relasi_modul onChange='this.form.submit()'>
                             <option>";
                             $rela=$_POST['relasi_modul'];                             
                             $sql=mysql_query("SELECT * FROM groupmodul ORDER BY id_group");
                             while($data=mysql_fetch_array($sql)){
                             if ($data['relasi_modul']==$rela){
                             $cek="selected";
                             }
                             else{
                             $cek="";
                             }
                             echo "<option value='$data[relasi_modul]'$cek>$data[nama]</option>";
                             }
                         echo"</select></td></tr></td></form>";
           echo"<form  method=post action=?page=modul&PHPIdSession=InputModul>
                <input type=hidden name=relasi_modul size=2 value='$_POST[relasi_modul]'>                    
                </tr>           
                <tr><td bgcolor=#265180>Nama Modul</td><td bgcolor=#C0DCC0> <input type=text name=nama_modul></td></tr>
                <tr><td bgcolor=#265180>Menu Order</td><td bgcolor=#C0DCC0> <input type=text name=menu_order size=2></td></tr>
                <tr><td bgcolor=#265180>Modul Link </td><td bgcolor=#C0DCC0><input type=text name=url></textarea></td></tr>
                <tr><td bgcolor=#265180>Keterangan</td><td bgcolor=#C0DCC0> <textarea name=keterangan cols=45 rows=5></textarea></td></tr>
                <tr><td bgcolor=#265180>Status</td><td bgcolor=#C0DCC0>     <input type=radio name=aktif value=Y checked>Y 
                                                                            <input type=radio name=aktif value=N>N  </td></tr>                
                <tr><td colspan=2 align=center><input type=submit value=Simpan>
                                               <input type=reset value=Reset>
                                               <input type=button value=Batal onclick=self.history.back()></td></tr>
                </table></form></div>";             
          echo"<table id=tableperhatian>      
               <tr><th>Perhatian</th></tr>"; 
               $sql=mysql_query("SELECT * FROM error WHERE tabel='Group Modul'");
                                      while($data=mysql_fetch_array($sql)){
                                      echo "<td>$data[text]</td></tr>";
                                      }
          echo "</table>";
}

function editmodul(){
    $edit=mysql_query("SELECT * FROM dropdownsystem WHERE id='$_GET[id]'");
    $data=mysql_fetch_array($edit);
    ?>
    <div id=headermodul>Edit Group Modul</div>
          <div id=groupmodul1><form method=POST action='?page=modul&PHPIdSession=UpdateModul'>
          <input type=hidden name=id value="<? echo $data['id'] ?>">
          <table id=tablemodul1>
          <tr><td bgcolor=#265180>Parent ID</td>  <td bgcolor=#C0DCC0>  <input type=text name=parent_id size=2 value="<? echo $data['parent_id'] ?>"></td></tr>
          <tr><td bgcolor=#265180>Nama Modul</td> <td bgcolor=#C0DCC0>  <input type=text name=judul size=30 value="<? echo $data['judul'] ?>"></td></tr>
          <tr><td bgcolor=#265180>Menu Order</td> <td bgcolor=#C0DCC0>  <input type=text name=menu_order size=1  value="<? echo $data['menu_order'] ?>"></td></tr>
          <tr><td bgcolor=#265180>Modul Link</td> <td bgcolor=#C0DCC0>  <input type=text name=url size=30  value="<? echo $data['url'] ?>"></td></tr>
          <tr><td bgcolor=#265180>Keterangan</td> <td bgcolor=#C0DCC0>  <input type=text name=keterangan size=50  value="<? echo $data['keterangan'] ?>"></td></tr>
          <?
          if ($data[aktif]=='Y') { 
            ?><tr><td bgcolor=#265180>Status</td> <td bgcolor=#C0DCC0><input type=radio name=aktif value=Y checked>Y  
                                                                          <input type=radio name=aktif value=N> N</td></tr>
          <? } 
          else{
          ?>  <tr><td bgcolor=#265180>Status</td> <td bgcolor=#C0DCC0><input type=radio name=aktif value=Y>Y  
                                                                          <input type=radio name=aktif value=N checked>N</td></tr>
          <? } ?>
          <tr><td colspan=1><input type=submit value=Update></td></form>
            <form method=POST action='?page=modul'>
             <td colspan=1><input type=submit value=Kembali></td></tr>
          </table></form></div>
          <? 
}

function GroupModul(){
    ?><div id=groupmodul1>         
      <table id=tablemodul><tr><th>Id</th><th>Group Modul</th><th>Aksi</th></tr>
    <? 
    $tampil=mysql_query("SELECT * FROM groupmodul order BY id_group ");
    $no=1;
    while ($data=mysql_fetch_array($tampil)){
    ?>
    <tr><td align=center bgcolor=#ececec><? echo $data['relasi_modul'] ?></td>               
               <td><a href=?page=modul&PHPIdSession=EditGroupMdl&id=<? echo $data['nama'] ?>><? echo $data['nama'] ?></a></td>
               <td align=center><a href=?page=modul&PHPIdSession=EditGroupModul&id_group=<? echo $data['id_group'] ?>>EDIT |</a>
                                <a href=?page=modul&PHPIdSession=HapusGroupModul&relasi_modul=<? echo $data['relasi_modul'] ?>>HAPUS</a></td></tr>
    <?  $no++; }  ?>
    </table></div>  
    <?
}

function EditGroupModul(){
?>
    <div id=headermodul>Edit Group Modul</div>
    <?
    $edit=mysql_query("SELECT * FROM groupmodul WHERE id_group='$_GET[id_group]'");
    $data=mysql_fetch_array($edit);
?>  <form method=POST action='?page=modul&PHPIdSession=UpdateGroup'>
    <input type=hidden name=id_group value="<? echo $data['id_group'] ?>">
    <div id=groupmodul><table id=tablemodul1>
    <tr><td bgcolor=#265180>Id Group</td>         <td bgcolor=#C0DCC0> : <input type=text name='id_group' disabled=disable size=2 value="<? echo $data['id_group'] ?>"></td></tr>
    <tr><td bgcolor=#265180>Hub Relasi</td>       <td bgcolor=#C0DCC0> : <input type=hidden name='relasi_modul'  size=2 value="<? echo $data['relasi_modul'] ?>">
                                                                               <input type=text name='relasi_modul1'  size=2 value="<? echo $data['relasi_modul'] ?>"></td></tr>
    <tr><td bgcolor=#265180>Nama Group Modul</td> <td bgcolor=#C0DCC0> : <input type=text name='nama' size=30  value="<? echo $data['nama'] ?>"></td></tr>
    <tr><td colspan=2><input type=submit value=Update></td></tr></form>
    <form name=form1 method=post action='?page=modul&PHPIdSession=TambahGroup'>
                        <input type=submit name=button id=button value=Kembali>
    </table></form></div>
<?
}

function tambahgroup(){
echo"<div id=headermodul>Tambah Group Modul</div>
           <form name=form1 method=post  action='?page=modul&PHPIdSession=InputGroup'>
           
           <div id=groupmodul><table id=tablemodul1>
           <tr><td bgcolor=#265180>Nama Group</td>  <td bgcolor=#C0DCC0><input type=text name='nama_group'></td></tr>
           <tr><td bgcolor=#265180>Urutan Group</td>  <td bgcolor=#C0DCC0><input type=text name='urutan_group'></td></tr>
           <tr><td colspan=1><input type=submit value=Simpan></form></td>
                            <form name=form1 method=post action='?page=modul&PHPIdSession=TambahGroup'>
                     <td colspan=1>       <input type=submit value=Refresh></td></tr>";
           groupmodul();
           echo"</table></div></form>
           <div id=groupmodul1><div id=toolbar><a href='?page=modul'>Depan Modul |
                                <a href='?page=modul&PHPIdSession=TambahModul'>Tambah Modul | 
                                <a href='?page=modul&PHPIdSession=GroupModul'>Group Modul |
                                <a href='?page=modul&PHPIdSession=CetakModul&id=$data[judul]'>Cetak Modul | 
                                </div>
           <table id=tablemodul>";
     
      defaultmodul1();     
}
?>
