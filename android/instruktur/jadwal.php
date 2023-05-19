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
			<?php 
			$tgl = date('Y-m-d');
			$sebelum = strtotime(date("Y-m-d", strtotime($tgl)) . " -1 week");
			$tsebelum = date("Y-m-d", $sebelum);
			$depan = strtotime(date("Y-m-d", strtotime($tgl)) . " +1 week");
			$tdepan = date("Y-m-d", $depan);
			;?>
              <h2 class="page_title">Berikut jadwal mengajar anda dari Tanggal <?php echo "$tsebelum Sampai Tanggal $tdepan"; ?></h2> 
     
              <div class="page_content"> 


              <p class="">
			  
			  <object width="100%" height="700"  frameborder="no" id="jadwal" name="jadwal" data="action.php?pil=jadwal"></object>
             </p>

              
              
              </div>
      
      </div>
      
      
    </div>
  </div>
</div>