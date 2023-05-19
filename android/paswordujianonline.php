<script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
<? session_start();
 
 if (empty($_SESSION[ps_nodaf])){echo "<script>window.location='login.php'; </script>";}else{include "koneksi.php";?>
 
 
 <meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
<div class="portlet-grid panel-primary"> 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Persiapan Ujian Online</h3>
    		  </div> 
<div class="panel-body">
<?php
/*$keterangan="Saat ini anda dapat mengikuti ujian online ketiga. Untuk memulai ujian online <a href='index.php?page=ujianonline&periode=1'>klik disini</a>. Gunakan pasword diatas apabila anda diminta untuk memasukkan password login pada saat login ujian online.";
echo "$keterangan<br><Br>";
echo "Saat ini anda dapat mengikuti ujian online ketiga. Untuk memulai ujian online <a href='index.php?page=ujianonline&periode=2'>klik disini</a>. Gunakan pasword diatas apabila anda diminta untuk memasukkan password login pada saat login ujian online.";
*/

 $materiaktifo = mysql_query("select * from config_app_input_soal_ujian"); 
				while($j = mysql_fetch_array($materiaktifo)){ 
				$periode=$j[2];
				}
				
$sq1 = mysql_query("select sum(by_nom) jum from bayar_detail where by_nodaf = '".$_SESSION[ps_nodaf]."' and by_status='verified'");
	$arai1 = mysql_fetch_array($sq1);
	////select pasword tahap 1
	$password="-";
	$jumbiaya=0;
	
	
	for ($i = 1; $i <= 2; $i++)
	{
		$sq = mysql_query("select nominal from biaya_pendidikan where pembayaran_ke=$i and jurusan='$_SESSION[ps_prodi]'");
		$t = mysql_fetch_array($sq);
		$jumbiaya=$jumbiaya+$t['nominal'];
	}
	
	
	if ($arai1['jum'] < $jumbiaya)
	{
		$keterangan= "<font color=red>Mohon maaf, anda belum memenuhi persyaratan untuk mengikuti ujian online 1.</font>";} 
	else 
	{  
		if ($periode=='1'){ 
		$keterangan="Soal ujian tersedia untuk periode ujian online pertama. Klik <a href='index.php?page=ujianonline&periode=1'> disini</a> untuk mengikuti ujian online. Gunakan pasword diatas apabila anda diminta untuk memasukkan password ujian pada saat login di halaman ujian online.";
		}else{$keterangan="<font color=grey>Periode ujian ini tidak sedang berlangsung.</font>";}
	
	$sqpas = mysql_query("select * from profil_siswa where ps_nodaf = '$_SESSION[ps_nodaf]'");
	$araipas = mysql_fetch_array($sqpas);
	$password=$araipas['ps_pwduji1'];
	if($password == "")
	{  
		echo "Mohon maaf, terjadi kesalahan sistem!"; $keterangan="";} } ?>
	<h3 style="color:orange;"> PASSWORD UJIAN PERTAMA : <strong><font color=green><?php 	echo $password;?></font></strong> </h3>
	<? echo $keterangan."<br><br><br>";
	
	
	
	
	////select pasword tahap 2
	$password="-";
	$jumbiaya=0;
	
	
	for ($i = 1; $i <= 3; $i++) {
	$sq = mysql_query("select nominal from biaya_pendidikan where pembayaran_ke=$i and jurusan='$_SESSION[ps_prodi]'");
	$t = mysql_fetch_array($sq);
	$jumbiaya=$jumbiaya+$t['nominal'];
	}
	
	
	if ($arai1['jum'] < $jumbiaya){$keterangan= "<font color=red>Mohon maaf, anda belum memenuhi persyaratan untuk mengikuti ujian online 2.</font>";} 
	else {  
	
	if ($periode=='2'){ 
		$keterangan="Soal ujian tersedia untuk periode ujian online kedua. Klik <a href='index.php?page=ujianonline&periode=2'> disini</a> untuk mengikuti ujian online. Gunakan pasword diatas apabila anda diminta untuk memasukkan password ujian pada saat login di halaman ujian online.";
		}else{$keterangan="<font color=grey>Periode ujian ini tidak sedang berlangsung.</font>";}
	
	$sqpas = mysql_query("select * from profil_siswa where ps_nodaf = '$_SESSION[ps_nodaf]'");
	$araipas = mysql_fetch_array($sqpas);
	$password=$araipas['ps_pwduji2'];
	if($password == ""){  echo "Mohon maaf, terjadi kesalahan sistem!"; $keterangan="";} } ?>
	<h3 style="color:orange;"> PASSWORD UJIAN KEDUA : <strong><font color=green><?php 	echo $password;?></font></strong> </h3>
	<? echo $keterangan."<br><br><br>";
	
	
	
	
	
	
	////select pasword tahap 3
	$password="-";
	$jumbiaya=0;
	
	
	for ($i = 1; $i <= 4; $i++) {
	$sq = mysql_query("select nominal from biaya_pendidikan where pembayaran_ke=$i and jurusan='$_SESSION[ps_prodi]'");
	$t = mysql_fetch_array($sq);
	$jumbiaya=$jumbiaya+$t['nominal'];
	}
	
	
	if ($arai1['jum'] < $jumbiaya){$keterangan= "<font color=red>Mohon maaf, anda belum memenuhi persyaratan untuk mengikuti ujian online 3.</font>";} 
	else {  
	
	if ($periode=='3'){ 
		$keterangan="Soal ujian tersedia untuk periode ujian online ketiga. Klik <a href='index.php?page=ujianonline&periode=3'> disini</a> untuk mengikuti ujian online. Gunakan pasword diatas apabila anda diminta untuk memasukkan password ujian pada saat login di halaman ujian online.";
		}else{$keterangan="<font color=grey>Periode ujian ini tidak sedang berlangsung.</font>";}
	
	$sqpas = mysql_query("select * from profil_siswa where ps_nodaf = '$_SESSION[ps_nodaf]'");
	$araipas = mysql_fetch_array($sqpas);
	$password=$araipas['ps_pwduji3'];
	if($password == ""){  echo "Mohon maaf, terjadi kesalahan sistem!"; $keterangan="";} } ?>
	<h3 style="color:orange;"> PASSWORD UJIAN KETIGA : <strong><font color=green><?php 	echo $password;?></font></strong> </h3>
	<? echo $keterangan."<br><br><br>";
	
	?>
	

    		
    	</div>
		</div><?}?>
		
