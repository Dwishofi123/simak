<? session_start();?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<?  
 include "konek.php";
    $tgls=date("Y-m-d H:i:s"); 
	 
	if ($_GET[status]=="validasi"){?>
	Masukkan detail transfer (tgl & nama penstransfer):<br>
	<form action="submit_validasi_psb.php?id=<? echo $_GET[id];?>" method="POST">
	Tgl & Nama Penstranfer : <input type="text" name="detil" id="detil" value="<?  $query=mysql_query("select tgl_transfer_biaya_pendaftaran,No_Telp from siswa where id='$_GET[id]'"); while($b=mysql_fetch_row($query)) { echo $b[0];}?> "></input>
	<input type="submit" value="Submit"></input>
	</form>
	
	<?  
		 
		 
		} elseif ($_GET[status]=="batalkan"){
		mysql_query("update siswa set validasi_pendaftaran='Belum Divalidasi',tes_online='belum' where id='$_GET[id]'"); 
		$query=mysql_query("select No_Telp,nama,asal_sekolah,sumber_informasi,no_reg from siswa where id='$_GET[id]'"); while($b=mysql_fetch_row($query)) { $hp=$b[0]; $nama=$b[1]; $asal_sekolah=$b[2]; $sumber_info=$b[3]; $noreg=$b[4];}
		$inputlog= $_SESSION[nama_login]." membatalkan data pembayaran pendaftaran ".$nama." dari ".$asal_sekolah." (".$sumber_info.") ";
		mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$inputlog')");
		echo "Validasi berhasil dibatalkan. ";
		
		}
		
		
		if ($_POST[detil]<>""){
		$tanggal=date("d/m/Y");
		 mysql_query("update siswa set validasi_pendaftaran='Sudah Divalidasi', tgl_transfer_biaya_pendaftaran='$_POST[detil]',tes_online='allow' where id='$_GET[id]'"); 
		 $query=mysql_query("select No_Telp,nama,asal_sekolah,sumber_informasi,marketing,no_reg from siswa where id='$_GET[id]'"); while($b=mysql_fetch_row($query)) { $hp=$b[0]; $nama=$b[1]; $asal_sekolah=$b[2]; $sumber_info=$b[3]; $id_marketing=$b[4]; $noreg=$b[5];}
		 $query=mysql_query("select nama,hp from pegawai where id='$id_marketing'"); while($b=mysql_fetch_row($query)) { $marketing=$b[0]; $hpmarketing=$b[1];}
		 mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$hp','INFO PSPP Penerbangan. Transfer biaya pendaftaran anda sudah kami validasi. Password Tes Online Anda : $_GET[id]. Silakan login di www.pspp-integrated.com utuk mengikuti tes online. Terima kasih','Info Validasi Transfer Biaya Pendaftaran','Online')");
		 
		 $sms="(".$tanggal.") ".$nama." dari ".$asal_sekolah." (".$sumber_info."/".$marketing.") telah membayar biaya pendaftaran.";
		 $inputlog= $_SESSION[nama_login]." memprosses data pembayaran pendaftaran ".$nama." dari ".$asal_sekolah." (".$sumber_info."/".$marketing.") No.Register:$noreg";
		 
		 //kirim sms ke nomor marketing
		 mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$hpmarketing','$sms','SMS Pendaftaran','Online')"); 

		//$query = mysql_query("select hp from pegawai where status_pegawai='Aktif' and jabatan='Marketing'");	//sms ke all marketing
		//while($b=mysql_fetch_row($query)){ mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$b[0]','$sms','SMS Pendaftaran','Online')");}

		//$query = mysql_query("select tujuan from nomor_khusus");	//kirim ke nmr khusus
		//while($b=mysql_fetch_row($query)){ mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$b[0]','$sms','SMS Pendaftaran','Online')");}
		
		

		 
		mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$inputlog')");
		mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tgls','$inputlog','marketing')");

		 
		 echo "Data berhasil divalidasi.<br><br>Dibawah ini adalah akun untuk tes online :<b><br>Username : Nama Lengkap<br>Password : ".$_GET[id]."</b>";
		 }
	 
?>