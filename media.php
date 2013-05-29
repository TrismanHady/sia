<?php 
  error_reporting(0);
  ob_start();	
  session_start();
  include "config/koneksi.php";
?>
<title>SISTEM INFORMASI UNIVERSITAS ALFASOFT</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script src="js/jquery-1.4.js" type="text/javascript"></script>
<script src="js/superfish.js" type="text/javascript"></script>
<script src="js/hoverIntent.js" type="text/javascript"></script>
	<script type="text/javascript">
      $(document).ready(function(){
			   $('ul.nav').superfish();
		  });
  </script>
<style type="text/css">
</style>
<body>
<div id="tabel"><img src="img/header.jpg"></div>
<div id="tabelsystem">
<div id="top">
<ul class="nav">            
<?php
      function get_menu($data, $parent = 0) {
	      static $i = 1;
	      $tab = str_repeat(" ", $i);
	      if ($data[$parent]) {
		      $html = "$tab<ul class='sf-menu'>";
		      $i++;
		      foreach ($data[$parent] as $v) {
			       $child = get_menu($data, $v->id);
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
      $result = mysql_query("SELECT * FROM dropdownawal ORDER BY menu_order");
      while ($row = mysql_fetch_object($result)) {
	       $data[$row->parent_id][] = $row;
      }
      $menu = get_menu($data);
      echo "$menu"; 
      ?>            
<li class="sep"></li>
<li class="right"></li>
</ul>			
</div></div>
<?php include "kiri.php"; ?>
<?php include "tengah.php"; ?>
<div id=footer><center>Sistem Informasi Akademik Universitas Alfasoft</div>
