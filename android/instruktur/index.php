<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
INCLUDE "koneksi.php";

//MECARI TANGGAL INPUT SOAL
$kuericonfig = mysql_query("select MAX(id) as no from config_app_input_soal_ujian ");
$cetakno = mysql_fetch_array($kuericonfig);
$kueriinput = mysql_query("select * from config_app_input_soal_ujian where id ='$cetakno[no]'");
$cetak = mysql_fetch_array($kueriinput);

$_SESSION['tgl_batas'] ="$cetak[tanggal_berlaku_aplikasi]"; //BATAS TANGGAL UNTUK MENGINPUT SOAL HARIAN PSPP (FORMAT TANGGAL HARUS TAHUN-BULAN-TANGGAL)
$_SESSION['ujian_ke'] ="$cetak[ujian_aktif_ke]";
$_SESSION['angkatan'] ="$cetak[angkatan_aktif]";
include "koneksi.php";
//$hi =mysql_query("select count(diberikanke) from tugas_kerja where nip_ygmemberi = '$_SESSION[nip]' and status_tugas = 'Pending' order by id desc ") ;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="apple-touch-startup-image-640x1096.html">
<title>PSPP REPORTS</title>
<link rel="stylesheet" href="css/framework7.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/colors/magenta.css">
<link type="text/css" rel="stylesheet" href="css/swipebox.css" />
<link type="text/css" rel="stylesheet" href="css/animations.css" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
</head>
<body id="mobile_wrap">

    <div class="statusbar-overlay"></div>

    <div class="panel-overlay"></div>
	   <?php if (empty($_SESSION['id_instruktur'])){ }
	   else
	{ ?>
    <div class="panel panel-left panel-cover">
          <div class="user_login_info">
                <div class="user_thumb">
                <img src="images/profile.jpg" alt="" title="" />
                  <div class="user_details">
				   <?php if (empty($_SESSION['id_instruktur'])){ }
				   else{ 
				 
				   ?>
					   <p>Haii, <span><?php echo "$_SESSION[nama]";?></span></p>
				<?php   }?>
                   
                  </div>  
                      
                </div>

                  <nav class="user-nav">
                    <ul>
                      <li><a href="pengaturan.php" class="close-panel"><img src="images/icons/white/settings.png" alt="" title="" /><span>Pengaturan</span></a></li>
                      <li><a href="profil.php" class="close-panel"><img src="images/icons/white/user.png" alt="" title="" /><span>Profil</span></a></li>
                      <li><a href="soal.php" class="close-panel"><img src="images/icons/white/tulis.png" alt="" title="" /><span>Input Soal</span></a></li> <!-- cari jumlah total point user login -->
                      <li><a href="jadwal.php" class="close-panel"><img src="images/icons/white/tables.png" alt="" title="" /><span>Jadwal </span></a></li> <!-- cari jumlah total tugas pending user login -->
                      <li><a href="" onclick="window.location='logout.php';" class="close-panel"><img src="images/icons/white/lock.png" alt="" title="" /><span>Logout</span></a></li>
                    </ul>
                  </nav>
          </div>
    </div>
	<?php } ?>
    <div class="panel panel-right panel-cover"> 
      
        <h2>Kosong..</h2>
        
    </div>

    <div class="views">

      <div class="view view-main">

        <div class="pages  toolbar-through">

          <div data-page="index" class="page homepage">
            <div class="page-content">
					<div class="logo"><img src="images/logo.png" alt="" title="" /></div> 
            </div>
          </div>
          
        </div>
        
        <!-- Bottom Toolbar-->
        <div class="toolbar">
              <div class="toolbar-inner">
              <ul class="toolbar_icons">
   
			  <?php if (empty($_SESSION['id_instruktur'])){ ?>
			  
			  <li><a href="#" data-popup=".popup-login" class="open-popup"><img src="images/icons/white/user.png" alt="Menu User" title="Menu User" /></a></li>
			  <li><a href="#" data-popup=".popup-login" class="open-popup"><img src="images/icons/white/tulis.png" alt="Input Soal" title="Input Soal" /></a></li>
              <li class="menuicon"><a href="#" data-popup=".popup-login" class="open-popup"><img src="images/icons/white/menu.png" alt="" title="" /></a></li>
              <li><a href="#" data-popup=".popup-login" class="open-popup"><img src="images/icons/white/tables.png" alt="Jadwal" title="Jadwal" /></a></li>
              <li><a href="#" data-popup=".popup-login" class="open-popup"><img src="images/icons/white/settings.png" alt="Pengaturan" title="Pengaturan" /></a></li>
			  
			  <?php } else{ ?>
			  
			  <li><a href="#" data-panel="left" class="open-panel"><img src="images/icons/white/user.png" alt="Menu User" title="Menu User" /></a></li>
			  <li><a href="soal.php"><img src="images/icons/white/tulis.png" alt="Input Soal" title="Input Soal" /></a></li>
              <li class="menuicon"><a href="menu.php"><img src="images/icons/white/menu.png" alt="" title="" /></a></li>
              <li><a href="jadwal.php"><img src="images/icons/white/tables.png" alt="Jadwal" title="Jadwal" /></a></li>
              <li><a href="pengaturan.php"><img src="images/icons/white/settings.png" alt="Settings" title="Settings" /></a></li>
			  <?php } ?>
			  
			  
              </ul>
              </div>  
        </div>
      </div>
    </div>
    
    <!-- Login Popup -->
    <div class="popup popup-login">
    <div class="content-block-login">
      <h4>Please Login First..</h4>
      <div class="form_logo"><img src="images/logo.png" alt="" title="" /></div>
            <div class="loginform">
            <form id="LoginForm" action="" method="post">
            <!--<input type="text" name="username" value="" class="form_input required" placeholder="username" />-->
			 <select  placeholder="username" name="username" class="form_select"><?php $query = mysql_query("select nama from akademik_profil_instruktur order by nama asc"); while($b=mysql_fetch_row($query)) {?>
<option ><?php echo $b[0];?></option>
<?php }?></select>
<br>
            <input type="password" name="password" value="" class="form_input required" placeholder="password" />
            <div class="forgot_pass"><a href="#" data-popup=".popup-forgot" class="open-popup">Lupa Password?</a></div>
            <input type="submit" name="submit" class="form_submit" id="submit" value="LOGIN" />
            </form>
            <div class="signup_bottom">
            <p>Butuh Bantuan?</p>Klik 
            <a href="#" data-popup=".popup-signup" class="open-popup">IT SUPPORT</a>            </div>
            </div>
      <div class="close_loginpopup_button"><a href="#" class="close-popup"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>
    </div>
    </div>
    
    <!-- Register Popup -->
    <div class="popup popup-signup">
    <div class="content-block-login">
      <h4>IT SUPPORT</h4>
      <div class="form_logo"><img src="images/logo.png" alt="" title="" /></div>
            <div class="loginform"><center>
            Fast Respons IT SUPPORT<br>
			Call Mas Diyan : 0856-4378-5502 
			<br>Online 24 Jam</center>
            </div>
      <div class="close_loginpopup_button"><a href="#" class="close-popup"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>
    </div>
    </div>
    
    <!-- Login Popup -->
    <div class="popup popup-forgot">
    <div class="content-block-login">
      <h4>LUPA PASSWORD?</h4>
      <div class="form_logo"><img src="images/logo.png" alt="" title="" /></div>
            <div class="loginform">
            <form id="ForgotForm" method="post">
            <input type="text" name="Email" value="" class="form_input required" placeholder="email" />
            <input type="submit" name="submit" class="form_submit" id="submit" value="MINTA PASSWORD" />
            </form>
            <div class="signup_bottom">
            <p>Password akan kami kirimkan melalui SMS!</p>
            </div>
            </div>
      <div class="close_loginpopup_button"><a href="#" class="close-popup"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>
    </div>
    </div>
    
    
    <!-- Social Popup -->
    <div class="popup popup-social">
    <div class="content-block">
      <h4>Follow Us</h4>
      <p>Social icons solution that allows you share and increase your social popularity.</p>
      <ul class="social_share">
      <li><a href="http://twitter.com/" class="external"><img src="images/icons/white/twitter.png" alt="" title="" /></a></li>
      <li><a href="http://www.facebook.com/" class="external"><img src="images/icons/white/facebook.png" alt="" title="" /></a></li>
      <li><a href="http://plus.google.com/" class="external"><img src="images/icons/white/googleplus.png" alt="" title="" /></a></li>
      <li><a href="http://www.dribbble.com/" class="external"><img src="images/icons/white/dribbble.png" alt="" title="" /></a></li>
      <li><a href="http://www.linkedin.com/" class="external"><img src="images/icons/white/linkedin.png" alt="" title="" /></a></li>
      <li><a href="http://www.pinterest.com/" class="external"><img src="images/icons/white/pinterest.png" alt="" title="" /></a></li>
      </ul>
      <div class="close_popup_button"><a href="#" class="close-popup"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>
    </div>
    </div>
    
	<?php
	if(EMPTY($_POST)){
		
	}
	ELSE {
function antiinjection($data){
$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
return $filter_sql;
}
@$use=antiinjection($_POST['username']);
@$pass=antiinjection($_POST['password']);
$query=mysql_query("select * from akademik_profil_instruktur where nama ='$use' and password='$pass' ") ;
$cek=mysql_num_rows($query) ;

if($cek > 0)
{


$b = time();

$hour = date("G",$b);

if ($hour>=0 && $hour<=11)
{
$selamat="Selamat Pagi ";
}
elseif ($hour >=12 && $hour<=14)
{
$selamat="Selamat Siang ";
}
elseif ($hour >=15 && $hour<=17)
{
$selamat="Selamat Sore ";
}
elseif ($hour >=17 && $hour<=18)
{
$selamat="Selamat Petang ";
}
elseif ($hour >=19 && $hour<=23)
{
$selamat="Selamat Malam ";
}

$data_kar = mysql_fetch_array($query);
//$_SESSION['']=$data_kar['ID'];
$_SESSION['id_instruktur']=$data_kar['id'];

$_SESSION['nama']=$data_kar['nama'];

$_SESSION['unit_instruktur']=$data_kar['kampus'];

	echo "<script> alert('$selamat... Semoga hari Anda menyenangkan...'); window.location='index.php';</script>";
	}
		echo "<script> window.location='index.php';</script>";
	}

?>
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/framework7.js"></script>
<script type="text/javascript" src="js/my-app.js"></script>
<script type="text/javascript" src="js/jquery.swipebox.js"></script>
<script type="text/javascript" src="js/email.js"></script>
  </body>
</html>