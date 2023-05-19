
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 <link rel="stylesheet" href="css/swipebox.min.css">
 
<div class="portlet-grid panel-primary" > 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Foto Selfie Kamu...</h3>
    		  </div> 

			  
			  


            <div class="mdl-grid gallery masonry"> <!-- grid container -->
              <div class="mdl-cell mdl-cell--6-col"> <!-- left column -->
                <a href="index.php?page=tambahfotoselfie" class="swipeboxax" title="Upload Foto Selfiemu Disini!"><img src="img/selfie/opening1.png" alt="" /></a>
				<?php 
				include "koneksi.php";
				$sql = mysql_query("select * from fotoselfie where status = 'Approve' order by id desc limit 40 ");
				$a=0;
				while($t = mysql_fetch_array($sql)){
				$gam = "img/selfie/".$t[nama_file];
				$splituploader=explode("Jurusan",$t[uploader]);
				$judul=$t[judul]." By:".$splituploader[0];
				$a=$a+1;
				if($a % 2 == 0)	{// filter genap ganjil		
				echo "<a href='$gam' class='swipebox' title='$judul'><img src='$gam' alt=''/></a>";}
				
				}
				?>				

              </div>
              <div class="mdl-cell mdl-cell--6-col"> <!-- right column -->
				<?php 
				$sql = mysql_query("select * from fotoselfie where status = 'Approve' order by id desc limit 40 ");
				$a=0;
				while($t = mysql_fetch_array($sql)){
				$gam = "img/selfie/".$t[nama_file];
				$splituploader=explode("Jurusan",$t[uploader]);
				$judul=$t[judul]." By:".$splituploader[0];
				$a=$a+1;
				if($a % 2 <> 0)	{// filter genap ganjil		
				echo "<a href='$gam' class='swipebox' title='$judul'><img src='$gam' alt=''/></a>";}
				
				}
				?>				  

              </div>
            </div>


<br><br>



</div>



   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/3.5.2/js/jquery.animsition.js"></script>
    <script src="js/sweetalert.min.js"></script> 
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.min.js"></script>
    <script src="js/jquery.swipebox.min.js"></script>
    <script src="js/function.js"></script>