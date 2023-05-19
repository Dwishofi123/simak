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
     
              <h2 class="page_title">Biodata Diri</h2> 
     
              <div class="page_content"> 

              <p class="">
              Nama : <?php echo "$tampilkan[nama]";?><br>
			 
			  Alamat : <?php echo "$tampilkan[alamat]";?><br>
			 
			  HP :<?php echo "$tampilkan[hp]";?> <br>
			
              <p class="">
              Anda juga bisa mengubah biodata diri anda melalui menu <a href="pengaturan.php">pengaturan</a>. Pastikan nomor handphone dan email anda aktif mengingat sistem akan selalu melakukan pelaporan melalui kedua kontak tersebut. Terima kasih
              </p>

              
              
              </div>
      
      </div>
      
      
    </div>
  </div>
</div>