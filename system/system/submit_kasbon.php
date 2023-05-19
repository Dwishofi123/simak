<? session_start();?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<? 
 
 include "konek.php";
  $tanggal=date("Y-m-d H:i:s");
  if ($_POST[status]<>"Pengambilan Kasbon (+)"){ $nominal=-$_POST[nominal];}else{$nominal=$_POST[nominal];}
 mysql_query("insert into kasbon(id_pegawai,tanggal,keterangan,nominal,user_id,status_kasbon,unit)value('$_GET[id]','$tanggal','$_POST[status] ($_GET[nama]) - $_POST[uraian]','$nominal','$_SESSION[nama_login]','$_POST[status]','Online')");
mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] melakukan transaksi $_POST[status] $_GET[nama] $_POST[uraian]  sebesar Rp.$nominal,-')");

 //kirim sms ke pegawai bersangkutan
 $query = mysql_query("SELECT hp from pegawai where id='$_GET[id]'"); while($b=mysql_fetch_row($query)) {
$nominal=" Rp. " . number_format($_POST[nominal],2,',','.');
mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)value('$b[0]','Hari ini anda melakukan transaksi $_POST[status] $_POST[uraian] sebesar $nominal. Terima kasih. Info:www.pspp-integrated.cpm','Kirim info transaksi kasbon ke pegawai','online')");
} 


// kirim pesan ke nomor khusus
 $query = mysql_query("SELECT tujuan from nomor_khusus"); while($b=mysql_fetch_row($query)) {
$nominal=" Rp. " . number_format($_POST[nominal],2,',','.');
mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)value('$b[0]','Hari ini $_GET[nama] melakukan transaksi $_POST[status] $_POST[uraian] sebesar $nominal. Terima kasih. Info:www.pspp-integrated.com','Kirim info transaksi nomor khusus','online')");
} 


 echo "Transaksi kasbon telah tersimpan! Silakan tekan tombol refresh pada halaman pengelolaan kasbon.";
?>

				