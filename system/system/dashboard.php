<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>

<? $aidi=$_SESSION[id_login]; ?>

 
 <div class=col-md-10>

 
  
      <div class="block block-drop-shadow"> <div class="header"> <h2><a href="index.php?page=recent_update" >Recent Update..</a></h2> </div> 
	<div class="content content-transparent np"> <div class="list list-contacts">
	<? $query = mysql_query("select * from recent_update where tujuan='marketing' order by id desc limit 50"); while($b=mysql_fetch_row($query)) {?>
	<a  class="list-item">	<div class="list-text"><? echo $b[1]." ".$b[2];?></div> </a>
	<? }?>
	
	<div class="list-text"><a href="#a" class="list-item"><br> &nbsp; &nbsp; Load more....<br></a></div></div></div></div>
 
 
 
 
  </div>
 
 
 
 </div> 
 
 