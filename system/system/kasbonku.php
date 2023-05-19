<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<? $aidi=$_SESSION[id_login];
$tanggal=date("Y-m-d H:i:s");
mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] membuka halaman kasbon pribadinya')"); ?>
      
 <div class=col-md-9>
 <div class="block block-drop-shadow"> <div class="header"> <h2>History Transaksi Kasbon 
 <? $quera = mysql_query("select nama from pegawai where id=$_SESSION[id_login];");  
 while($b=mysql_fetch_array($quera)) 
 { echo $b[nama];}?> </h2> </div> <div class="content content-transparent np"> <div class="" style="height: 200px;"><div class="list list-contacts">
 <? $a=0; $query = mysql_query("select * from kasbon where kasbon.id_pegawai='$aidi' order by kasbon.id desc");  while($b=mysql_fetch_array($query)) { $a=$a+1; ?>
 <div class="list-item"> <div class="list-text"><? echo $a.". Tgl ".$b[tanggal]; $nominal=" Rp. " . number_format($b[nominal],2,',','.'); echo $nominal;?></div> </div>
 <?}?>
 <br><br>
 <div class="list-text" style="width:420px; font-size:18px;"> &nbsp; <br>&nbsp; &nbsp; Total kasbon anda saat ini : <?$query = mysql_query("select sum(nominal) from kasbon where kasbon.id_pegawai=$_SESSION[id_login]");  while($b=mysql_fetch_row($query)) { $nominal="Rp. " . number_format($b[0],2,',','.');  echo $nominal;} ?></div> </div> </div></div><div class="footer tac"> Silakan konfirmasi ke Accounting apabila ada kesalahan data kasbon! </div></div>
 </div>
 