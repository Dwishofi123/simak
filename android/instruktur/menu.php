<?php 
session_start();
if(empty($_SESSION['id_instruktur']))
{
	echo "<script>window.location='index.php';</script>";
}
include "koneksi.php";
$kueriprofil = mysql_query("select * from akademik_profil_instruktur where id = '$_SESSION[id_instruktur]' ");
$tampilkan = mysql_fetch_array($kueriprofil);
?>
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">
    
      <div class="page_content_menu">
       <nav class="main-nav">

        <ul>
          <li><a href="index.php"><img src="images/icons/white/home.png" alt="" title="" /><span>Home</span></a></li>
          <li><a href="profil.php"><img src="images/icons/white/user.png" alt="" title="" /><span>Profil</span></a></li>

		  <li><a href="soal.php"><img src="images/icons/white/tulis.png" alt="" title="" /><span>Input Soal</span></a></li>
		
		    <li><a href="jadwal.php"><img src="images/icons/white/tables.png" alt="" title="" /><span>Jadwal</span></a></li>
		   <li><a href="pengaturan.php"><img src="images/icons/white/settings.png" alt="" title="" /><span>Pengaturan</span></a></li>
		 
          
          <li><a a href="" onclick="window.location='logout.php';" ><img src="images/icons/white/lock.png" alt="" title="" /><span>Logout</span></a></li>
          
         
        </ul>
      </nav>  
      <div class="close_popup_button"><a href="#" class="backbutton"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>
     </div> 
      
    </div>
  </div>
</div>