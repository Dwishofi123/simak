<?php session_start();
 if (empty($_SESSION[ps_nodaf])){
 
 }
 else{
 echo "<script>window.location='index.php'; </script>";
 }
 
 
 ?>
 <div style="visibility:hidden;height:0px;width:0px;"></div>
 

    <meta charset="utf-8">
     <title>PSPP Mobile</title>
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,500" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="ajax/libs/animsition/3.5.2/css/animsition.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link rel="stylesheet" href="1.0.2/material.indigo-pink.min.css">  
    <link rel="stylesheet" href="css/swipebox.min.css">
    <link rel="stylesheet" href="css/style.css">
	
<body onload="onLoad();">


    <div class="animsition" >
      <!-- Page Content -->
      <main class="mdl-layout__content login-bg" style="background: url(img/10_blur.jpg)repeat;">
        <div class="login mdl-shadow--2dp" > <!-- card -->
          <div class="account-info mdl-color--primary">
            <div class="account-navigation"> <!-- top icons -->

              <button class="mdl-button mdl-js-button mdl-button--icon right" onclick="location.href='index.php'">
                 <i class="material-icons" >close</i>
              </button>
			  
			  
		
		
		
              <div class="clr"></div>

              <div class="minilogo-account user1"></div> <!-- user -->
              <span><strong>Please Login First..</strong></span>
            </div>
          </div>

		  
		  
		  <? include "koneksi.php";
 
function antiinjection($data){
 
$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
 
return $filter_sql;
 
}
 

@$username=antiinjection($_POST['username']);
@$password=antiinjection($_POST['password']);


$query=mysql_query("select * from profil_siswa where ps_uname='$username' and ps_pass='$password' and ps_absen<>'TIDAK AKTIF' ");
$cek=mysql_num_rows($query);

if($cek)
{
$datanya = mysql_fetch_array($query);
	$_SESSION[ps_uname]=$username;
	
	$_SESSION[ps_nama]=$datanya['ps_nama'];
	$_SESSION[ps_kampus]=$datanya['ps_kampus'];
	$_SESSION[ps_nodaf]=$datanya['ps_nodaf'];
	$_SESSION[ps_prodi]=$datanya['ps_prodi'];
	$_SESSION[ps_ang]=$datanya['ps_ang'];
	$_SESSION[ps_no]=$datanya['ps_no'];
	
	
	
	
$tanggal=date("Y-m-d H:i:s"); 
$browser = $_SERVER['HTTP_USER_AGENT'];
$ip=$_SERVER['REMOTE_ADDR'];
$pc_name=gethostbyaddr($_SERVER['REMOTE_ADDR']);
mysql_query("insert into tbl_log(datetime,uraian)values('$tanggal','PSPPMobile - $_SESSION[ps_nama] $_SESSION[ps_kampus] - login with $browser ( IP : $ip ) - $_SESSION[ps_prodi]')");


echo "<script> 
		window.location='index.php'; </script>";


}
else
{

//if (!empty($_POST[username])){
//echo "<div style='padding-left:45px;padding-top:20px;color:red;'>Sorry, not match, try again..</div>";	}

}

 ?>
 
 
 <script>
 function validasi(form)
 {
	if(form.username.value == "")
	{
		alert("Username harus diisi");
		form.username.focus();
		return (false);
	}
	if(form.password.value == "")
	{
		alert("Password harus diisi");
		form.password.focus();
		return (false);
	}
	return (true);
 }
 </script>
          <div class="account-data"> <!-- text fields -->
            <form action="login.php" method="POST" onSubmit="return validasi(this)">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" id="username" name="username"/>
                <label class="mdl-textfield__label" for="sample1">Masukkan Username Anda</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="password" id="password" name="password"/>
                <label class="mdl-textfield__label" for="sample2">Masukkan Password</label>
              </div>
			  
			  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary left" type="submit"">                
              Login
            </buttton>
            </form>

           
            
            <div class="clr"></div>
            
          </div>

        </div>
      </main>
    </div>

    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/jquery.animsition.js"></script>
    <script src="js/sweetalert.min.js"></script> 
    <script src="js/material.min.js"></script>
    <script src="js/jquery.swipebox.min.js"></script>
    <script src="js/function.js"></script>

</body>