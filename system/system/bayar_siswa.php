<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek176.php";
$_SESSION[temp_id]="$_GET[id]";
?><link href=../css/stylesheets.css rel=stylesheet type=text/css /> 
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
 <div class=col-md-12 >
<? $query = mysql_query("SELECT * from siswa_aktif where siswa_aktif.id='$_GET[id]'"); while($b=mysql_fetch_array($query)) { $_SESSION[temp_nama]=$b[2]; $_SESSION[temp_hp_ortu]=$b[5];
$querye = mysql_query("SELECT * from pegawai where id='$b[marketing]'"); while($c=mysql_fetch_array($querye)) {$_SESSION[marketing]=$c[3]; $_SESSION[hp_marketing]=$c[8];}?>
<div class="block"> 

<div class="content controls"> 
 <form action="index.php?page=perlengkapan_siswa">
<div class="form-row"> <div class="col-md-3">Pembayaran Angsuran   :</div> <div class="col-md-9"><input name="" class="form-control" value="<? echo $b[2];?> , siswa dari marketing <? echo $_SESSION[marketing];?> jurusan <? echo $b[jurusan];?> <? echo $b[11];?>" type="text" disabled="disabled"></div> </div> 


</form>




<? }?> 


 </div></div></div>
 
<iframe src="kwitansi_pembayaran_siswa.php" width="100%" height="350" border=0></iframe>

<div class=modal-footer> 

<div><button type=button class="btn btn-default" data-dismiss=modal>Tutup</button></div> 


 </div>