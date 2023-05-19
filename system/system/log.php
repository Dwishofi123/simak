<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>


 <div class=col-md-9>


 <div class="block block-drop-shadow"> <div class="header"> <h2>Log Info.. ( Halaman ini khusus user dengan hak akses publik )</h2>

 </div> 
	<div class="content content-transparent np"> <div class="list list-contacts">
	<? $query = mysql_query("select * from tbl_log where uraian<>'' $filter_cari  order by id desc limit 500"); while($b=mysql_fetch_row($query)) {?>
	<a  class="list-item">	<div class="list-text"><? echo $b[1]." ".str_replace($_POST[cari],"<font color=yellow>$_POST[cari]</font>",$b[2]);?></div> </a>
	<? }?>
	<a href="index.php?page=recent_update" class="list-item">
</div>
</div>
</div>


</div>