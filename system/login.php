<? session_start();  
include "system/konek.php"; ?>
<!DOCTYPE html> <html lang=en> 
<?php
$thisAgent  = $HTTP_SERVER_VARS["HTTP_USER_AGENT"];
WebsiteGuard();
function WebsiteGuard(){
    global $thisAgent;
    $isDenied = false;
    if (preg_match("/webzip|httrack|wget|FlickBot|downloader|production
    bot|superbot|PersonaPilot|NPBot|WebCopier|vayala|imagefetch|
    Microsoft URL Control|mac finder|
    emailreaper|emailsiphon|emailwolf|emailmagnet|emailsweeper|
    Indy Library|FrontPage|cherry picker|WebCopier|netzip|
    Share Program|TurnitinBot|full web bot|zeus/i",$thisAgent)){
        $isDenied = true;
        print "Fuck u!!!<br><br><br>Regards : Admin PSPP Penerbangan ( ./d1y4n_attacker.htm )";
        exit();
    }
}?>

<SCRIPT TYPE="text/javascript" LANGUAGE="javascript">

<!-- PreLoad Wait - Script -->
<!-- This script and more from http://www.rainbow.arch.scriptmania.com 

function waitPreloadPage() { //DOM
if (document.getElementById){
document.getElementById('prepage').style.visibility='hidden';
}else{
if (document.layers){ //NS4
document.prepage.visibility = 'hidden';
}
else { //IE4
document.all.prepage.style.visibility = 'hidden';
}
}
}
// End -->
</script>

<head> <title>PSPP Integrated System</title> 
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
<link href='img/app.ico' rel='icon' type='image/x-icon'/>

 
 </head> 
 <body class=bg-img-num1 onLoad="waitPreloadPage();" oncontextmenu="return false" >
	

  
 <DIV id="prepage" style="position:fixed;  left:0px; top:0px; background-color:#fff; layer-background-color:white; height:100%; width:100%; z-index:1000; text-align:center;"> 
<br><br><br><br><br><TABLE width=100%><TR><TD><B><font color=white>Loading ... ... Please wait!<br><br><img src="img/loading_login.gif"/></font></B></TD></TR></TABLE>
</DIV>



  <link href=css/stylesheets.css rel=stylesheet type=text/css /> <script type=text/javascript src=js/plugins/jquery/jquery.min.js></script>
 <script type=text/javascript src=js/plugins/jquery/jquery-ui.min.js></script> <script type=text/javascript src=js/plugins/jquery/jquery-migrate.min.js></script> 
 <script type=text/javascript src=js/plugins/jquery/globalize.js></script> <script type=text/javascript src=js/plugins/bootstrap/bootstrap.min.js></script> 
 <script type=text/javascript src=js/plugins/uniform/jquery.uniform.min.js></script> <script type=text/javascript src=js/js.js></script> 
 <script type=text/javascript src=js/settings.js></script> 
 
 <div class=container> <div class=login-block> 
 <div class="block block-transparent"> <div class=head> <div class=user> <div class="info user-change"> <img src=img/example/user/dmitry_b.jpg class="img-circle img-thumbnail"/>
 <div class=user-change-button> <span class=icon-off></span> </div> </div> </div> </div> <div class="content controls npt"> 
<? if ($_GET[validasi]=="gagal"){?>
<script>

function klik_gagal(){
 document.getElementById("pesan_gagal").click();
 setTimeout(function() {close_stat();},8000);
}

function close_stat(){
 document.getElementById("close_status_bar").click();
}
</script>
<div class="col-md-12 tac">   <font color=orange>Not Found! Please Try Again!</font> </div> <br><?}?>
 <div class="form-row"> 

 <form action="system/submit_login.php" method="post">
 <div class=col-md-12> <div class=input-group> <div class=input-group-addon> <span class=icon-user></span> </div>

  <select name="aidi" id="aidi"> 
 <? $query = mysql_query("SELECT pegawai.ID, pegawai.nama FROM pegawai where pegawai.status_pegawai='Aktif' order by nama asc"); while($b=mysql_fetch_row($query)) {?>
 <option ><? echo $b[1]." | ".$b[0];?></option> <?}?>
 </select> 
 </div> </div> 
 </div> 
 
  <div class=form-row> <div class=col-md-12> <div class=input-group> <div class=input-group-addon> <span class=icon-key></span> </div>
 <input type=password class=form-control placeholder="Password" name="pass"/> </div> </div> </div>
 
  <div class=form-row> <div class=col-md-12><button type=submit class="btn btn-default btn-block btn-clean"> Log In</button> </div> </div>
 </form>


 </div> <div class=form-row> <div class=col-md-12> <div class="btn btn-link btn-block"><a href="../daftar">Forgot your password?</a></div> </div> </div> <div class=form-row>
 <div class="col-md-12 tac"><strong>Please contact us on</strong></div> </div> 
 <div class=form-row> <div class=col-md-12> <a href="https://www.facebook.com/Pendidikan.Staff.dan.Pramugari?ref=ts&fref=ts" class="btn btn-primary btn-block"><span class=icon-facebook></span> &nbsp; Facebook</a> </div> </div> 
 <div class=form-row> <div class=col-md-12>  <a href="download/e-sids-clouds.apk" class="btn btn-success btn-block"><span class=icon-android></span> &nbsp; Instal E-SIDS Clouds for Android&nbsp; <span class="label label-warning">new</span></a> </div> </div> 
 <div class=form-row> <div class=col-md-12>  <a href="download/Setup.exe" class="btn btn-info btn-block"><span class=icon-windows></span> &nbsp; Instal E-SIDS Clouds for Windows </a> </div> </div> 
  
 </div> 
 </div> </div> </div> 
 <a href=#statusbar_6 class="stbar" id=pesan_gagal></a>
  <div class="statusbar statusbar-success" id=statusbar_6 style="z-index:1000;"> <div class=statusbar-icon><span class=icon-warning-sign></span></div> <div class=statusbar-text>Not Found! Please Try Again!</div> <div class="statusbar-close icon-remove" id=close_status_bar></div> </div> 
  
  <script language="javascript" type="text/javascript">
  $(window).load(function() {
    $('#loading').hide();
	klik_gagal();
  });
</script>
 </body> 

</html>