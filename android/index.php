<? 
 session_start();


//else {
 INCLUDE "koneksi.php"; 
?>

<html class="no-js">
  

<head>
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
    <meta charset="utf-8">
    <title>PSPP Mobile</title>
    <meta name="description" content="">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,500" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="ajax/libs/animsition/3.5.2/css/animsition.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link rel="stylesheet" href="1.0.2/material.indigo-pink.min.css">  
    <link rel="stylesheet" href="css/swipebox.min.css">
    <link rel="stylesheet" href="css/style.css">
	
  	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','js/analytics.js','ga');

	  ga('create', 'UA-74264063-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>

  <body onload=javascript:document.getElementById("pop").click();>
  <div style="height:57px; background-color:#3f51b5; position:fixed; width:100%; text-align:center; color:white;"><br> Mohon tunggu.. </div>
    <div class="animsition">
      <!-- Header -->
      <div class="mdl-layout mdl-js-layout mdl-layout--overlay-drawer-button">
 <header class="mdl-layout__header mdl-layout__header--waterfall" >
          <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">PSPP Mobile</span>
            <!-- Spacer -->
            <div class="mdl-layout-spacer"></div>

            <button id="top-header-menu" class="mdl-button mdl-js-button mdl-button--icon">
              <i class="material-icons">more_vert</i>
            </button>
          </div>
        </header>
        <!-- Top-right Dropdown Menu -->
        <div class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="top-header-menu">
          
		  		  <?php 
					$sqlnya = mysql_query("select * from pengumuman where target = 'PSPP $_SESSION[ps_kampus]'");
					$di = mysql_num_rows($sqlnya);?>
          <a href="index.php?page=pemberitahuan" class="animsition-link"><span class="mdl-menu__item mdl-badge" <?php if ($di > 0) { ;?> data-badge='<?php echo "$di";?>' <?php }?>>Pengumuman</span></a>
		  

		  <a href="index.php?page=berita" class="animsition-link"><span class="mdl-menu__item">Berita Kampus</span></a>
          <a href="index.php?page=kalenderpendidikan" class="animsition-link"><span class="mdl-menu__item">Kalender Pendidikan</span></a>
		   <a href="index.php?page=motivasi" class="animsition-link"><span class="mdl-menu__item">Kata Motivasi</span></a>
          <a href="index.php?page=selfie" class="animsition-link"><span class="mdl-menu__item">Foto Selfie</span></a>
		  <a href="index.php?page=isipulsa" class="animsition-link"><span class="mdl-menu__item">Isi Pulsa</span></a>
		  <a href="index.php?page=video&item=<? $sqlnya = "select * from video order by RAND() limit 1 "; $ker = mysql_query($sqlnya); 
		while($vid = mysql_fetch_array($ker)){ echo $vid['ytv']."&title=".$vid['title'];}?>" class="animsition-link"><span class="mdl-menu__item">Video</span></a>
		   <a href="index.php?page=candid" class="animsition-link"><span class="mdl-menu__item"><font color=red>Foto CANDID*</font></span></a>
		   
		   <? if (!isset($_SESSION[ps_nodaf])){?><a href="login.php" class="animsition-link"><span class="mdl-menu__item">Login</span></a><?}else{?><a href="logout.php" class="animsition-link"><span class="mdl-menu__item">Logout (x)</span></a><?}?>
         
        </div>
        <!-- Sidebar -->
        <div class="mdl-layout__drawer">
          <!-- Top -->
          <div class="mdl-card mdl-shadow--2dp mdl-color--primary mdl-color-text--blue-grey-50 drawer-profile">
            <div class="mdl-card__title user">
			<a href="index.php?page=profil">
			<?php include "koneksi.php";
			$d = mysql_query("select * from profil_siswa where ps_nama = '".$_SESSION['ps_nama']."'") ;
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
			</a>
            <!--  <img src="img/user.jpg" alt="" />-->
              <span class="user-name"><? echo $_SESSION[ps_nama];?></span>
              <span class="user-mail"><? echo $_SESSION[ps_nodaf];?></span>
              <button id="user-menu" class="mdl-button mdl-js-button mdl-button--icon">
                <i class="material-icons">arrow_drop_down</i>
              </button>
            </div>
            <!-- Top-right User -->
            <div class="mdl-card__menu">
              <img class="sub-user" src="img/logo.png" alt="logo" />
            </div>
          </div>
          <!-- Dropdown Menu -->
          <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="user-menu">
            <li class="mdl-menu__item"><a href="index.php?page=profil" class="mdl-navigation__link animsition-link">Foto Profile</a></li>
			 <li class="mdl-menu__item"><a href="index.php?page=gantipasword" class="mdl-navigation__link animsition-link">Ubah Pasword</a></li>
            <li class="mdl-menu__item"><a href="logout.php" class="mdl-navigation__link animsition-link">Logout</a></li>
           
          </ul>
          <!-- Main Navigation -->
          <nav class="mdl-navigation">
             <a class="mdl-navigation__link animsition-link" href="index.php"><i class="material-icons">home</i><span>Home</span></a>
            <div class="mdl-collapse">
                <a class="mdl-navigation__link mdl-collapse__button"><i class="material-icons">star</i>
                    <i class="material-icons mdl-collapse__icon mdl-animation--default">expand_more</i>
                    Akademik
                </a>
                <div class="mdl-collapse__content-wrapper">
                  <div class="mdl-collapse__content mdl-animation--default" style="margin-top: -156px;">
				  <? // ini spesial untuk seleksi kelas khusus staff gaes...
				  //if ($_SESSION[ps_prodi]=="STAFF PENERBANGAN"){
				  //if (!empty($_SESSION[ps_nodaf])){echo "<a class='mdl-navigation__link animsition-link' href='index.php?page=nilai-seleksi-kelas-khusus'><font color=red>NILAI SELEKSI KELAS KHUSUS</font></a>";}
				  //}?>
                    <a class="mdl-navigation__link animsition-link" href="index.php?page=absensi">Kehadiran</a>
					 <a class="mdl-navigation__link animsition-link" href="index.php?page=jadwal">Jadwal Kuliah</a>
					  <a class="mdl-navigation__link animsition-link" href="index.php?page=latihan_ujian">Latihan Ujian Online</a><br>
					  <a class="mdl-navigation__link animsition-link" href="index.php?page=paswordujianonline"><strong>Ujian Online Akademik</strong></a>
					  <a class="mdl-navigation__link animsition-link" href="index.php?page=nilaiujianonline">Nilai Ujian Online</a>
					   

                  </div>
                </div>
            </div>
			
			 <div class="mdl-collapse">
                <a class="mdl-navigation__link mdl-collapse__button"><i class="material-icons">today</i>
                    <i class="material-icons mdl-collapse__icon mdl-animation--default">expand_more</i>
                    <span>Pembayaran</span>
                </a>
                <div class="mdl-collapse__content-wrapper">
                  <div class="mdl-collapse__content mdl-animation--default" style="margin-top: -156px;">
                    <a class="mdl-navigation__link animsition-link" href="index.php?page=carapembayaran">Tata Cara Pembayaran</a>
                    <a class="mdl-navigation__link animsition-link" href="index.php?page=tagihan">Tagihan Pembayaran</a>
					<a class="mdl-navigation__link animsition-link" href="index.php?page=konfirmasipembayaran">Konfirmasi Pembayaran</a>
					<a class="mdl-navigation__link animsition-link" href="index.php?page=pembayaran">History Pembayaran</a>
                  </div>
                </div>
            </div>
			
			 <div class="mdl-collapse">
                <a class="mdl-navigation__link mdl-collapse__button"><i class="material-icons">message</i>
                    <i class="material-icons mdl-collapse__icon mdl-animation--default">expand_more</i>
                    <span>Informasi</span>
                </a>
                <div class="mdl-collapse__content-wrapper">
                  <div class="mdl-collapse__content mdl-animation--default" style="margin-top: -156px;">
                   <!--  <a class="mdl-navigation__link animsition-link" href="index.php?page=inbox">Pesan Masuk</a> -->
                    <a class="mdl-navigation__link animsition-link" href="index.php?page=berita">Berita Kampus</a>
					<a class="mdl-navigation__link animsition-link" href="index.php?page=pemberitahuan">Pengumuman</a>
					
					
                  </div>
                </div>
            </div>
			<div class="mdl-collapse">
                <a class="mdl-navigation__link mdl-collapse__button"><i class="material-icons">message</i>
                    <i class="material-icons mdl-collapse__icon mdl-animation--default">expand_more</i>
                    <span>Karir</span>
                </a>
                <div class="mdl-collapse__content-wrapper">
                  <div class="mdl-collapse__content mdl-animation--default" style="margin-top: -156px;">
                    <a class="mdl-navigation__link animsition-link" href="http://kidora.co.id/pendaftaran/login.php">Lowongan Kerja</a>
					<a class="mdl-navigation__link animsition-link" href="index.php?page=siswakerja">Siswa Diterima Kerja</a>
									
                  </div>
                </div>
            </div>
			
			<div class="mdl-collapse">
                <a class="mdl-navigation__link mdl-collapse__button"><i class="material-icons">apps</i>
                    <i class="material-icons mdl-collapse__icon mdl-animation--default">expand_more</i>
                    <span>Lainnya</span>
                </a>
                <div class="mdl-collapse__content-wrapper">
                  <div class="mdl-collapse__content mdl-animation--default" style="margin-top: -156px;">
				  <a class="mdl-navigation__link animsition-link" href="index.php?page=isipulsa">Isi Pulsa</a>
				  <? if (!empty($_SESSION[ps_nodaf])){echo "<a class='mdl-navigation__link animsition-link' href='index.php?page=kritikdansaran'>Kritik & Saran</a>";}?>
                    <a class="mdl-navigation__link animsition-link" href="index.php?page=kalenderpendidikan">Kalender Akademik</a>
                    <a class="mdl-navigation__link animsition-link" href="index.php?page=motivasi">Kata Motivasi</a>
					<a class="mdl-navigation__link animsition-link" href="index.php?page=selfie">Foto Selfie</a>
					<a class="mdl-navigation__link animsition-link" href="index.php?page=video&item=<? $sqlnya = "select * from video order by RAND() limit 1 "; $ker = mysql_query($sqlnya); 
		while($vid = mysql_fetch_array($ker)){ echo $vid['ytv']."&title=".$vid['title'];}?>">Video</a>
					<a class="mdl-navigation__link animsition-link" href="index.php?page=candid"><font color=red>Foto CANDID*</font></a>
					
                  </div>
                </div>
            </div>

			 <!-- <div class="drawer-separator"></div>-->
			 <? if (empty($_SESSION[ps_nodaf])){?>
			 <a class="mdl-navigation__link animsition-link" href="login.php"><i class="material-icons">developer_mode</i><span>Login</span></a>
			 
			 <?} else{?>
			<a class="mdl-navigation__link animsition-link" href="logout.php"><i class="material-icons">developer_mode</i><span>Logout</span></a> <?}?>
          </nav>
        </div>

        <!-- Page Content -->
        <main class="mdl-layout__content"> <!-- vertical align container -->
          <div class="valign" style="padding-top:20px; margin-top:20px;> <!-- vertical align element -->
           <? if ($_GET[page]==""){ include "dashboard.php";}?>
		   <? if ($_GET[page]=="profil"){ include "profil.php";}?>
			<? if ($_GET[page]=="inbox"){ include "pesan.php";}?>
			<? if ($_GET[page]=="ujianonline"){ include "ujian_online.php";}?>
			<? if ($_GET[page]=="pemberitahuan"){ include "pemberitahuan.php";}?>
			<? if ($_GET[page]=="siswakerja"){ include "siswakerja.php";}?>
			<? if ($_GET[page]=="absensi"){ include "absensi.php";}?>
			<? if ($_GET[page]=="nilaiujianonline"){ include "nilaiujianonline.php";}?>
			<? if ($_GET[page]=="jadwal"){ include "jadwal.php";}?>
			<? if ($_GET[page]=="tagihan"){ include "tagihan.php";}?>
			<? if ($_GET[page]=="pembayaran"){ include "pembayaran.php";}?>
			<? if ($_GET[page]=="carapembayaran"){ include "carapembayaran.php";}?>
			<? if ($_GET[page]=="paswordujianonline"){ include "paswordujianonline.php";}?>
			<? if ($_GET[page]=="berita"){ include "berita.php";}?>
			<? if ($_GET[page]=="kritikdansaran"){ include "kritiksaran.php";}?>
			<? if ($_GET[page]=="motivasi"){ include "motivasi.php";}?>
			<? if ($_GET[page]=="editprofil"){ include "edit_profil.php";}?>
			<? if ($_GET[page]=="gantipasword"){ include "ganti_pasword.php";}?>
			<? if ($_GET[page]=="kalenderpendidikan"){ include "kalenderpendidikan.php";}?>
			<? if ($_GET[page]=="selfie"){ include "fotoselfie.php";}?>
			<? if ($_GET[page]=="candid"){ include "fotocandid.php";}?>
			<? if ($_GET[page]=="tambahfotoselfie"){ include "fotoselfie_uploadpage.php";}?>
			<? if ($_GET[page]=="gantifoto"){ include "gantifoto.php";}?>
			<? if ($_GET[page]=="latihan_ujian"){ include "latihan_ujian.php";}?>
			<? if ($_GET[page]=="konfirmasipembayaran"){ include "konfirmasipembayaran.php";}?>
			<? if ($_GET[page]=="loginn"){ include "login.php";}?>
			<? if ($_GET[page]=="isipulsa"){ include "isipulsa.php";}?>
			<? //if ($_GET[page]=="seleksi-kelas-khusus"){ include "seleksi_kelas_khusus_soal.php";}?>
			<? if ($_GET[page]=="nilai-seleksi-kelas-khusus"){ include "nilai_tes_kelas_khusus.php";}?>
			<? if ($_GET[page]=="video"){ include "video.php";}?>


          </div>
        </main>
		
		
		
		
<? 
if (!empty($_SESSION[ps_nama])) {
include "koneksi.php";
$query=mysql_query("select * from kritik_dan_saran where user like '%$_SESSION[ps_nama]%' and unit like '%SPECIAL%'");
$cek=mysql_fetch_array($query);

if(!$cek){ include "popup.php";   }}?>		

  
 
        
      </div>
    </div>

    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="ajax/libs/animsition/3.5.2/js/jquery.animsition.js"></script>
    <script src="js/sweetalert.min.js"></script> 
    <script src="1.0.2/material.min.js"></script>
<script src="js/jquery.swipebox.min.js"></script><script src="js/function.js"></script></body></html><?
// } 
?>
