<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<?php require_once 'konek.php'; 
if ($_GET[action]==""){
$query = mysql_query("SELECT * FROM siswa WHERE id='$_GET[id]'");
while($b = mysql_fetch_array($query)){?>

<link href=../../image/style.css rel=stylesheet type=text/css /> 
 
 
<form action="migrasi_siswa_edit.php?action=simpan&id=<? echo $_GET[id];?>&marketing=<? echo $b[7];?>&nama=<? echo $b[2];?>&asal_sma=<? echo $b[6];?>" class="form_pendaftaran" method="POST" >
<h3>Pindahkan Data Siswa Berikut Ini ke Marketing lain</h3><br>
<label>Nama Siswa : <? echo $b[2];?>, Asal Sekolah :  <? echo $b[6];?>, Sumber link : <? echo $b[64];?></label> <br>
<label>Dipindahkan ke marketing >></label> 
<select name="marketing"  class="input_field">
<? $queryu = mysql_query("select * from domain where pemilik <> 'dilarang'"); while($c=mysql_fetch_row($queryu)) { ?><option  ><? $querya = mysql_query("select nama from pegawai where id='$c[2]'"); while($s=mysql_fetch_row($querya)) { echo $s[0]." - ";} echo $c[1]." - ".$c[2];?></option><?}?>
</select>	
		<br>
Anda tidak perlu memberikan informasi atas migrasi data ini kepada kedua marketing karna sistem akan otomatis memberikan sms pemberitahuan kepada kedua marketing bersangkutan atas hal ini. <br><br>		
<input value="Pindahkan Sekarang!" class="button" type="submit"></input> </form> 
	
	
<?}}else{
$tanggal=date("Y-m-d H:i:s");
$queryu = mysql_query("select hp,nama from pegawai where id='$_GET[marketing]'"); while($c=mysql_fetch_row($queryu)) { $hp_marketing_awal=$c[0]; $nama_marketing_awal=$c[1]; }
$marketing_a=  explode(" - ",$_POST[marketing]); $marketing_akhir_id=$marketing_a[2]; $domain=$marketing_a[1];
$queryu = mysql_query("select hp,nama from pegawai where id='$marketing_akhir_id'"); while($c=mysql_fetch_row($queryu)) { $hp_marketing_akhir=$c[0]; $nama_marketing_akhir=$c[1];}

 mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$hp_marketing_awal','$tanggal $_GET[nama] $_GET[asal_sma] sebagai calon siswa anda telah dipindahkan ke marketing $nama_marketing_akhir. Terima kasih. Info:www.pspp-integrated.com','SMS Migrasi','Online')");
 mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$hp_marketing_akhir','$tanggal $_GET[nama] $_GET[asal_sma] sebagai calon siswa $nama_marketing_awal telah dipindahkan ke data calon siswa anda. Terima kasih. Info:www.pspp-integrated.com','SMS Migrasi','Online')");
mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tanggal','$tanggal $_GET[nama] $_GET[asal_sma] sebagai calon siswa $nama_marketing_awal telah dipindahkan ke marketing $nama_marketing_akhir','marketing')");

mysql_query("update siswa set marketing='$marketing_akhir_id',sumber_informasi='$domain' where id='$_GET[id]'");
echo "Data siswa berhasil di migrasikan dan kedua marketing bersangkutan akan segera mendapat pemberitahuan melalui sms. Terima kasih";

}?>


