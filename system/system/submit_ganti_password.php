<? session_start();?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<?  
 include "konek.php";
 $query = mysql_query("select password from pegawai where id='$_SESSION[id_login]' "); while($b=mysql_fetch_row($query)){ $pass=$b[0];}

if ($_GET[password_lama]<>$pass){ ?>
     Mohon maaf, passwod lama anda salah! Silakan coba lagi!
	  
	 <? }	else{  
     mysql_query("update pegawai set password='$_GET[password_baru]' where id=$_SESSION[id_login]"); ?>
Selamat, password anda telah diganti dengan "<? echo $_GET[password_baru];?>". Silakan logout untuk mencoba password baru anda!
<? }?>