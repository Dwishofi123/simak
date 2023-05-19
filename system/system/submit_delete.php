<? session_start();?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<? include "konek.php"; $tanggal=date("Y-m-d H:i:s");

if ($_GET[table]=="laporan_keuangan"){ // jika menghapus laporan keuangan, maka kirim pemberitahuan ke nmr khusus, lanjut dibawah
$query = mysql_query("SELECT * from laporan_keuangan where id=$_GET[id]"); while($b=mysql_fetch_row($query)) { $uraian=$b[3]; $nominal=$b[4];}
}


mysql_query("delete from $_GET[table] where id=$_GET[id]");
mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] berhasil menghapus data di table $_GET[table]')");


if ($_GET[table]=="laporan_keuangan"){ // jika menghapus laporan keuangan, maka kirim pemberitahuan ke nmr khusus
$query = mysql_query("SELECT sum(nominal) from laporan_keuangan where unit='$_SESSION[unit]'"); while($b=mysql_fetch_row($query)) { $total="Rp. ".number_format($b[0],2,',','.');}
$pesan="Hari ini $tanggal $_SESSION[nama_login] Menghapus Transaksi Keuangan :  $uraian sebesar $nominal. Total saldo saat ini Rp.$total"; 


 // kirim ke nmr khusus
 $query = mysql_query("SELECT tujuan from nomor_khusus"); while($b=mysql_fetch_row($query)) {
 mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)value('$b[0]','$pesan','SMS Laporan Keuangan ke Nomor Khusus','Online')");
 }
 }
?>

Data telah dihapus!