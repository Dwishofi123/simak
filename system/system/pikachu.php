<? session_start();
if ($_SESSION[pikachu]<>"Aktif"){
include "konek.php";

 //KIRIM PESAN BAHAYA KE NOMOR KHUSUS
 $query = mysql_query("SELECT tujuan from nomor_khusus"); while($b=mysql_fetch_row($query)) {
$file = basename($_SERVER["SCRIPT_FILENAME"], '.php') ;
$ip=$_SERVER['REMOTE_ADDR'];
$kode=$file."311".date("md-His");
//mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)value('$b[0]','ERROR JAVASCRIPT : CODE $kode from $ip Info:www.e-sids-clouds.net','PERINGATAN BAHAYA','Online')");
} 
$tanggal=date("Y-m-d H:i:s");
mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','<font color=red>PERINGATAN BAHAYA! FILE $file TELAH DIAKSES TIDAK WAJAR OLEH $ip! MOHON SEGERA ADAKAN TINDAKAN!</font> Info:www.pspp-integrated.com')");

}
?>