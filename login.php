<? 
session_start();
$browser = $_SERVER['HTTP_USER_AGENT'];
$ip=$_SERVER['REMOTE_ADDR'];
include "system/system/konek.php";
	$query = mysql_query("SELECT * FROM siswa where nama_panggilan='$_GET[username]' and ID='$_GET[pass]' "); 
	$a=0;

	while($b=mysql_fetch_row($query)){
	$a=$a+1;
	$_SESSION[idpendaftaran]=$b[0];
	$_SESSION[nama]=$b[2];
	$_SESSION[asal_sekolah]=$b[6];
	$_SESSION[hasil_ujian]=$b[32]." <br><br>".$b[33];
	$_SESSION[status_login]="aktif";
	$_SESSION[marketing]=$b[7];
	}


$tanggal=date("Y-m-d H:i:s"); 
$uname=strtoupper($_GET[username]);
if ($a>0){

$_SESSION[status_login]="aktif";
mysql_query("insert into tbl_log(datetime,uraian)values('$tanggal','PSPPInt - User $uname success login with $browser IP $ip $_GET[pass]')");

?>
<script language="javascript" type="text/javascript">
window.location.href="index.php?&r=biodata&id=<? echo $_SESSION[idpendaftaran];?>&read=biodata-pendaftaran-online.html";
</script>

<?}else
{
mysql_query("insert into tbl_log(datetime,uraian)values('$tanggal','PSPPInt - User $uname gagal login with $browser IP $ip $_GET[pass]')");

$_SESSION[status_login]="gak aktif";
echo "<font color='red'>Sorry, Not Match!</font>";
}



?>
