<?php
include "../config/koneksi.php";
include "../config/tanggal.php";
include "../librari/library.php";
include "../librari/fungsi_indotgl.php";
include "../librari/fungsi_combobox.php";
include "../librari/class_paging.php";
// tampilan pada modul system //
include "form/form_modul.php";
include "form/form_user.php";
include "form/form_karyawan.php";
// tampil pada modul master
include "form/form_masteridentitas.php";
include "form/form_masterjurusan.php";
include "form/form_masterprogram.php";
include "form/form_masterkampus.php";
include "form/form_masterruang.php";
include "form/form_masterdosen.php"; 
// tampil pada modul akademik //
include "form/form_baakademikkrs.php";
// tampil pda modul administrator //
include "form/form_akademikkrs.php";
// tampil pada modul mahasiswa //
include "form/form_mahasiswakrs.php";

 
if ($_GET[page]=='home'){
 echo"<div id=groupmodul1>
        <table id=tablemodul>               
       <tr><th>Pendahuluan</th></tr>"; 
                $sql=mysql_query("SELECT * FROM beritaawal WHERE aktif='Y'");
                while($data=mysql_fetch_array($sql)){  
                echo "<tr><td>";
             		if ($data[gambar]!=''){
            			echo "<img src='../img/$data[gambar]' width=180 height=160 hspace=10 border=0 align=left>";
            		}
            		$kalimat=strtok(nl2br($data[isi])," ");
                for ($i=1;$i<=100;$i++){
                  echo ($kalimat);
                  echo (" "); 
                  $kalimat=strtok(" "); 
                  }  
                }
   echo"</td></tr></table></div>";
}

  elseif ($_GET[page]=='profil'){
 echo"<div id=groupmodul1>
        <table id=tablemodul>               
       <tr><th>Profil</th></tr>"; 
                $sql=mysql_query("SELECT * FROM profil WHERE aktif='Y'");
                while($data=mysql_fetch_array($sql)){  
                echo "<tr><td>";
             		if ($data[gambar]!=''){
            			echo "<img src='../img/$data[gambar]' width=180 height=160 hspace=10 border=0 align=left>";
            		}
            		$kalimat=strtok(nl2br($data[isi])," ");
                for ($i=1;$i<=100;$i++){
                  echo ($kalimat);
                  echo (" "); 
                  $kalimat=strtok(" "); 
                  }  
                }
   echo"</td></tr></table></div>";
}

// Modul System //
elseif ($_GET[page]=='modul'){
    include "modul/AdminModul.php"; 
}

elseif ($_GET[page]=='AdminUser'){  
    include "modul/AdminUser.php";
}

elseif ($_GET[page]=='AdminKaryawan'){  
    include "modul/AdminKaryawan.php";
}


// Modul Master
elseif ($_GET[page]=='masteridentitas'){  
    include "master/masteridentitasact.php";
}
elseif ($_GET[page]=='masterjurusan'){  
    include "master/masterjurusanact.php";
}
elseif ($_GET[page]=='masterprogram'){  
    include "master/masterprogramact.php";
}
elseif ($_GET[page]=='masterkampus'){  
    include "master/masterkampusact.php";
}
elseif ($_GET[page]=='masterruang'){  
    include "master/masterruangact.php";
}
elseif ($_GET[page]=='masterdosen'){  
    include "master/masterdosenact.php";
}

//Modul Mahasiswa //
elseif ($_GET[page]=='mahasiswakrs'){  
    include "mahasiswa/mahasiswakrsact.php";
}
elseif ($_GET[page]=='mahasiswakhs'){  
    include "form/form_mahasiswakhs.php";
}
elseif ($_GET[page]=='mahasiswatranskrip'){  
    include "form/form_mahasiswatranskripnilai.php";
}
elseif ($_GET[page]=='mahasiswajadujian'){  
    include "form/form_mahasiswajadujian.php";
}

// Modul Adminstrator //
elseif ($_GET[page]=='akademikmatakuliah'){  
    include "form/form_akademikmtk.php";
}

elseif ($_GET[page]=='akademiktahun'){  
    include "form/form_akademiktahun.php";
}

elseif ($_GET[page]=='jadkulAkd'){  
    include "form/form_akademikjadkul.php";
}

elseif ($_GET[page]=='akademikmahasiswa'){  
    include "form/form_akademikmhs.php";
}

elseif ($_GET[page]=='akademikkrs'){  
    include "akademik/akademikkrsact.php";
}

elseif ($_GET[page]=='registrasimahasiswa'){  
    include "form/form_akademikregmhs.php";
}

elseif ($_GET[page]=='akademiknilai'){  
    include "form/form_akademikinputnilai.php";
}

elseif ($_GET[page]=='akademikkhs'){  
    include "form/form_akademikkhs.php";
}

elseif ($_GET[page]=='akademiktranskrip'){  
    include "form/form_akademiktranskripnilai.php";
}

// Modul BaAkademik //
elseif ($_GET[page]=='levelakademikmtk'){  
    include "form/form_baakademikmtk.php";
}

elseif ($_GET[page]=='levelakademiktahunakd'){  
    include "form/form_baakademiktahun.php";
}

elseif ($_GET[page]=='levelakademikjadkul'){  
    include "form/form_baakademikjadkul.php";
}

elseif ($_GET[page]=='levelakademikkrs'){  
    include "baakademik/baakademikkrsact.php";
}

elseif ($_GET[page]=='levelakademikmhs'){  
    include "form/form_baakademikmhs.php";
}

elseif ($_GET[page]=='levelakademiknilaimhs'){  
    include "form/form_baakademikinputnilai.php";
}

elseif ($_GET[page]=='levelakademikkhsmhs'){  
    include "form/form_baakademikkhs.php";
}

elseif ($_GET[page]=='levelakademikregmhs'){  
    include "form/form_baakademikregmhs.php";
}

elseif ($_GET[page]=='levelakademiktranskrip'){  
    include "form/form_baakademiktranskripnilai.php";
}
// Modul Dosen //
elseif ($_GET[page]=='dosenajar'){  
    include "form/form_dosenajar.php";
}

elseif ($_GET[page]=='dosennilai'){  
    include "form/form_doseninputnilai.php";
}

// Exit //
elseif ($_GET[page]=='exit'){  
    include "exit/exit.php";
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
