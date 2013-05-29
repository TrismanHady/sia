<?php 
  error_reporting(0);	
  session_start();
  include "../config/koneksi.php";
if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){
  echo "<center><link href='../css/style.css' rel='stylesheet' type='text/css'>
<div>
  <table width=301>
    <tr>
      <td align='center' bgcolor='#FF0000'><div id='font-error'>Kesalahan</div></td>
    </tr>
    <tr>
      <td align='center'>Maaf..!!, anda harus login terlebih dahulu untuk masuk ke E-KAMPUS Menu: <a href='../menu-login.php'>Login</a> | <a href='../index.php'>Depan</a></td>
    </tr>
  </table></div>";
}
else{
?>
<title>SISTEM INFORMASI AKADEMIK UNIVERSITAS ALFASOFT</title>
<link rel="stylesheet" href="../css/all.css" type="text/css" />

<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/jquery.form.js" type="text/javascript"></script>
<script src="../js/superfish.js" type="text/javascript"></script>
<script src="../js/tabs.js" type="text/javascript"></script>
	<script type="text/javascript">
      $(document).ready(function(){
			   $('ul.nav').superfish();
		  });	
  </script>
  
<style type="text/css">
</style>
<body>
<div id="tabel"><img src="../img/header.jpg"></div>
<div id="tabelsystem">
<div id="top">
<ul class="nav">
<?php 
      $level= $_SESSION[id_level];
      function get_menu($data, $parent = 0) {
	      static $i = 1;
	      $tab = str_repeat(" ", $i);
	      if ($data[$parent]) {
		      $html = "$tab<ul class='sf-menu'>";
		      $i++;
		      foreach ($data[$parent] as $v) {
			       $child = get_menu($data, $v->id_group);
			       $html .= "$tab<li>";
			       $html .= '<a href="'.$v->url.'">'.$v->judul.'</a>';
			       if ($child) {
				       $i--;
				       $html .= $child;
				       $html .= "$tab";
			       }
			       $html .= '</li>';
		      }
		      $html .= "$tab</ul>";
		      return $html;
	      } 
        else {
		      return false;
	      }
      }
      $result = mysql_query("SELECT *
                             FROM hakmodul t1,dropdownsystem t2
                             WHERE t1.id=t2.id AND t1.id_level='$level'
                             ORDER BY t2.menu_order");
      while ($row = mysql_fetch_object($result)) {
	       $data[$row->parent_id][] = $row;
      }
      $menu = get_menu($data);
      echo "$menu"; 
      ?>
      			<li class="sep">&nbsp;</li>
				<li class="right">&nbsp;</li>
	</ul>			
</div></div>

<?php include "content.php"; ?>
<div id=footer><center>Sistem Informasi Akademik Universitas Alfasoft</div>
<?php
}
?>
