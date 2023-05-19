<? session_start();
session_destroy(); // hapus all sesion
$ip=$_SERVER['REMOTE_ADDR'];
$pc_name=gethostbyaddr($_SERVER['REMOTE_ADDR']);
include "konek.php"; $tanggal=date("Y-m-d H:i:s");
mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] LOGOUT dari $pc IP $ip ')");

?> 

<script language="javascript" type="text/javascript">
window.location.href="../login.php";
</script>