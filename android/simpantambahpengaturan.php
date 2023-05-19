<?php

include "koneksi.php";

?>
<?php   
				if ($post['simpan'] = 'simpan'){
         $passwordbaru=(md5($_POST['passwordbaru']));
		 $passwordlama=(md5($_POST['passwordlama']));
		 $usernamelama=$_POST['usernamelama'];
		 $sq = mysql_query("select * from profil_siswa where ps_nodaf = '".$_SESSION[ps_nodaf]."'");
		 $ar = mysql_fetch_array($sq);

		if($usernamelama == "$ar[ps_uname]" && $passwordlama == "$ar[ps_pass]") { 
		
		$sqlr = mysql_query( "update profil_siswa set ps_pass = '$passwordbaru' where ps_nama = '".$_SESSION['ps_nama']."'");
	
		echo "<script>alert('Password Anda Sudah Terganti. Silakan Login Kembali Utuk Masuk Kembali.');
		window.location='?page=logout'; </script>";
		} 
		
		else { echo "<script>alert('Maaf Anda Tidak Bisa Menggati Password karena password dan username lama anda tidak sesuai. Silahkan coba lagi.');history.back();</script>";}
				} ;?>