<?php
   echo"<div id=groupmodul>
       <table id=tablemodul>               
       <tr><th>Menu</th></tr>";                 
                $menu=mysql_query("SELECT * FROM menuawalleft WHERE aktif='Y' ORDER BY id_menu");
                while($data=mysql_fetch_array($menu)){
                
                echo "<tr><td><a href=$data[link]> $data[nama]</a></td></tr>";
                }
   echo"</table></div>";
?>
