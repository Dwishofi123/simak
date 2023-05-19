<? session_start();
if (!isset($_SESSION[ps_nodaf])){?> <script> window.location='login.php'; </script><?}?>
<?php include "koneksi.php"; ?>
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 

      <div class="profile-page">  
	  <?php include "koneksi.php";
			$d = mysql_query("select * from profil_siswa where ps_nodaf = '$_SESSION[ps_nodaf]'") ;
			$tampilke = mysql_fetch_array($d);
			if($tampilke['ps_foto'] == ""){
			$gb = "img/user/no.png";
			echo "<img src=\"$gb\" alt=''>";
			}
			else {
			$gb = "img/user/".$tampilke['ps_foto'];
			
			echo "<img src=\"$gb\" alt=''>";
			}
			?>
   
        <div class="contact-info">
          <button onclick="location.href='index.php?page=gantifoto'" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" data-upgraded=",MaterialButton,MaterialRipple">
            <i class="material-icons" >photo</i>
          <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>
          <h3 style="text-align:center;"><? echo $_SESSION[ps_nama];?></h3>  
        </div>
      </div>

        <div class="contact-about">
          <div class="mdl-card mdl-shadow--2dp about">
            <h4>About Me</h4>
			
			<?php echo $tampilke['ps_nama'];echo "<br>";
			echo $tampilke['ps_tglahir'];echo "<br>";
			echo  $tampilke['ps_prodi'];echo "<br>";
			echo  $tampilke['ps_ang'];echo "<br>";
			echo  $tampilke['ps_kampus'];echo "<br>";
			echo  $tampilke['ps_nodaf'];echo "<br>";
			?>
            <p>"<? echo $tampilke['ps_bio'];?>"</p>    
			
			<a class="mdl-navigation__link animsition-link" href="index.php?page=editprofil">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" data-upgraded=",MaterialButton,MaterialRipple">
         Edit Bio
            <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button></a>
			
			<a class="mdl-navigation__link animsition-link" href="index.php?page=gantifoto">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" data-upgraded=",MaterialButton,MaterialRipple">
         Ganti Foto
            <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button></a>
			
			
          </div>
          <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-grid">
              <div class="mdl-cell mdl-cell--4-col">
                <a class="no-accent-color" href="<? echo  "call:".$tampilke['ps_'];?>"><i class="material-icons">call</i></a>
                <span>Call</span>
              </div>
              <div class="mdl-cell mdl-cell--4-col">
                <a class="no-accent-color" href="#"><i class="material-icons">message</i></a>
                <span>Message</span>
              </div>
              <div class="mdl-cell mdl-cell--4-col">
                <a><i class="material-icons">favorite</i></a>
                <span>Like</span>
              </div>
            </div>
          </div>





        </div>
