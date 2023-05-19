<script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
<? session_start();
 
 if (empty($_SESSION[ps_nodaf])){echo "<script>window.location='login.php'; </script>";}else{include "koneksi.php";?>
 
 
 <meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
<div class="portlet-grid panel-primary"> 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Password Ujian Online</h3>
    		  </div> 
<div class="panel-body">
<?php

$sq1 = mysql_query("select sum(by_nom) jum from bayar_detail where by_nodaf = '".$_SESSION[ps_nodaf]."' and by_status='verified'");
	$arai1 = mysql_fetch_array($sq1);
	


	
	////select pasword tahap 1
	$password="- - - - - -";
	$jumbiaya=0;
	
	
	for ($i = 1; $i <= 2; $i++) {
	$sq = mysql_query("select nominal from biaya_pendidikan where pembayaran_ke=$i and jurusan='$_SESSION[ps_prodi]'");
	$t = mysql_fetch_array($sq);
	$jumbiaya=$jumbiaya+$t['nominal'];
	}
	
	
	if ($arai1['jum'] < $jumbiaya){$keterangan= "Mohon maaf, saat ini anda belum bisa mendapatkan pasword ujian online karna alasan biaya pendidikan yang belum terselesaikan pada tahap ujian ini. Silakan hubungi bagian keuangan untuk prosses lebih lanjut. Terima kasih";} 
	else {  $keterangan=" Selamat, anda mendapatkan pasword ujian online karna anda telah memenuhi persyaratan pembayaran angsuran pertama. Silakan gunakan pasword ini untuk mengikuti ujian online.";
	
	$sqpas = mysql_query("select * from profil_siswa where ps_nodaf = '$_SESSION[ps_nodaf]'");
	$araipas = mysql_fetch_array($sqpas);
	$password=$araipas['ps_pwduji1'];
	if($password == ""){  echo "Mohon maaf, terjadi kesalahan sistem!"; $keterangan="";} } ?>
	<h3> PASSWORD UJIAN PERTAMA : <strong><font color=green><?php 	echo $password;?></font></strong> </h3>
	<? echo $keterangan."<br><br><br>";
	
	
	
	
	////select pasword tahap 2
	$password="- - - - - -";
	$jumbiaya=0;
	
	
	for ($i = 1; $i <= 3; $i++) {
	$sq = mysql_query("select nominal from biaya_pendidikan where pembayaran_ke=$i and jurusan='$_SESSION[ps_prodi]'");
	$t = mysql_fetch_array($sq);
	$jumbiaya=$jumbiaya+$t['nominal'];
	}
	
	
	if ($arai1['jum'] < $jumbiaya){$keterangan= "Mohon maaf, saat ini anda belum bisa mendapatkan pasword ujian online karna alasan biaya pendidikan yang belum terselesaikan pada tahap ujian ini. Silakan hubungi bagian keuangan untuk prosses lebih lanjut. Terima kasih";} 
	else {  $keterangan=" Selamat, anda mendapatkan pasword ujian online karna anda telah memenuhi persyaratan pembayaran angsuran kedua. Silakan gunakan pasword ini untuk mengikuti ujian online.";
	
	$sqpas = mysql_query("select * from profil_siswa where ps_nodaf = '$_SESSION[ps_nodaf]'");
	$araipas = mysql_fetch_array($sqpas);
	$password=$araipas['ps_pwduji2'];
	if($password == ""){  echo "Mohon maaf, terjadi kesalahan sistem!"; $keterangan="";} } ?>
	<h3> PASSWORD UJIAN KEDUA : <strong><font color=green><?php 	echo $password;?></font></strong> </h3>
	<? echo $keterangan."<br><br><br>";
	
	
	
	
	
	
	////select pasword tahap 3
	$password="- - - - - -";
	$jumbiaya=0;
	
	
	for ($i = 1; $i <= 4; $i++) {
	$sq = mysql_query("select nominal from biaya_pendidikan where pembayaran_ke=$i and jurusan='$_SESSION[ps_prodi]'");
	$t = mysql_fetch_array($sq);
	$jumbiaya=$jumbiaya+$t['nominal'];
	}
	
	
	if ($arai1['jum'] < $jumbiaya){$keterangan= "Mohon maaf, saat ini anda belum bisa mendapatkan pasword ujian online karna alasan biaya pendidikan yang belum terselesaikan pada tahap ujian ini. Silakan hubungi bagian keuangan untuk prosses lebih lanjut. Terima kasih";} 
	else {  $keterangan=" Selamat, anda mendapatkan pasword ujian online karna anda telah memenuhi persyaratan pembayaran angsuran ketiga. Silakan gunakan pasword ini untuk mengikuti ujian online.";
	
	$sqpas = mysql_query("select * from profil_siswa where ps_nodaf = '$_SESSION[ps_nodaf]'");
	$araipas = mysql_fetch_array($sqpas);
	$password=$araipas['ps_pwduji3'];
	if($password == ""){  echo "Mohon maaf, terjadi kesalahan sistem!"; $keterangan="";} } ?>
	<h3> PASSWORD UJIAN KETIGA : <strong><font color=green><?php 	echo $password;?></font></strong> </h3>
	<? echo $keterangan."<br><br><br>";
	
	?>
	

    		
    	</div>
		</div><?}?>
		
