<? session_start();?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<?  
 include "konek.php";
 $tgls=date("Y-m-d H:i:s");
     mysql_query("update config set psb_aktif='$_GET[tahun]', biaya_psb='$_GET[biaya]',reg_format='$_GET[reg_format]', jurusan='$_GET[tahun]'"); 
	 mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$_SESSION[nama_login] mengubah setting psb aktif menjadi $_GET[tahun], biaya $_GET[biaya], format no.reg $_GET[reg_format]  ')");
	 $_SESSION['psb.aktif']=$_GET[tahun]; ?>
Pengaturan Tersimpan! Tahun PSB aktif <b><? echo $_GET[tahun];?></b>, biaya pendaftaran <b><? echo $_GET[biaya];?>, No.Registrasi : <? echo $_GET[reg_format];?></b>.