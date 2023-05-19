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
      
          <h2 class="page_title">Pengaturan</h2>
          
          
          <div class="page_content">
          
              <div class="buttons-row">
                    <a href="#tab1" class="tab-link active button">Profil</a>
                    <a href="#tab2" class="tab-link button">Password</a>
              </div>
              
              <div class="tabs-animated-wrap">
                    <div class="tabs">
                          <div id="tab1" class="tab active">
						  
						  
                                <h3>Pengaturan Profil</h3>
                                <p>
                               
								
                <object width="100%" height="1000" scrolling="no" frameborder="no" id="profil" name="profil" data="action.php?pil=profil"></object>
             
			
                                </p>
                          </div>
    
                          <div id="tab2" class="tab">
						  
						  
                                <h3>Ubah Password</h3>
                                <p>
                 <object width="100%" height="400" scrolling="no" frameborder="no" id="password" name="password" data="action.php?pil=password"></object>
                            
                                </p>
                          </div> 
                    </div>
              </div>
          

          
          
          
        
          
          </div>     
          
         <iframe  scrolling="no" frameborder="no" id="framebiodata" name="framebiodata" ></iframe>  
          
      
      </div>
      
      
    </div>
  </div>
</div>
