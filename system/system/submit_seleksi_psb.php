<? session_start();?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<?  
 include "konek.php";
 $tgls=date("Y-m-d H:i:s");
     
	 
	if ($_GET[status]=="terima"){
	 mysql_query("update siswa set status_seleksi='Sudah Diterima' where id='$_GET[id]'"); 
	$query=mysql_query("select No_Telp,nama from siswa where id='$_GET[id]'"); while($b=mysql_fetch_row($query)) { $hp=$b[0]; $nama=$b[1];}
	  mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$hp','INFO HASIL TES SELEKSI PSPP PENERBANGAN. Selamat bergabung bersama PSPP Penerbangan. Anda diterima sebagai salah satu siswa-i PSPP. Silakan login di wwww.pspp-integrated utuk melihat surat kelulusan. Password : $_GET[id]. Terima kasih','INFO HASIL TES SELEKSI PSPP PENERBANGAN. ','Online')");
		mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$_SESSION[nama_login] mengubah status seleksi $nama menjadi DITERIMA')");
		echo "Status seleksi siswa berhasil di ganti menjadi <b>DITERIMA</b>. ";
		 
		} elseif ($_GET[status]=="tolak"){
		mysql_query("update siswa set status_seleksi='Tidak Diterima' where id='$_GET[id]'"); 
		$query=mysql_query("select No_Telp,nama from siswa where id='$_GET[id]'"); while($b=mysql_fetch_row($query)) { $hp=$b[0]; $nama=$b[1];}
	    mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$hp','INFO HASIL TES SELEKSI PSPP PENERBANGAN. Mohon maaf saat ini anda belum bisa bergabung bersama kami. Silakan login di wwww.pspp-integrated utuk melihat surat hasil tes seleksi. Password : $_GET[id]. Terima kasih','INFO HASIL TES SELEKSI PSPP PENERBANGAN. ','Online')");
	   mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$_SESSION[nama_login] mengubah status seleksi $nama menjadi DITOLAK')");
	   echo "Status seleksi siswa berhasil di ganti menjadi <b>FAILED</b>. ";
		
		} elseif ($_GET[status]=="batal"){
		mysql_query("update siswa set status_seleksi='Belum Diseleksi' where id='$_GET[id]'"); 
		 echo "Status seleksi siswa berhasil di <b>DIBATALKAN</b>.";
		 }
?>