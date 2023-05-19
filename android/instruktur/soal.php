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
    
     <div class="navbarpages">
       <div class="nav_left_logo"><a href="index.php"><img src="images/logo.png" alt="" title="" /></a></div>
       <div class="nav_right_button"><a href="menu.php"><img src="images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">
     
              <h2 class="page_title">INPUT SOAL HARIAN</h2> 
     
              <div class="page_content"> 

              <p class="">
			   <object width="100%" height="500"  frameborder="no" id="iframetest" name="iframetest" data="action.php?pil=tampilsoal"></object>
		
            </p>
             

              
              
              </div>
      
      </div>
      
      
    </div>
  </div>
</div>