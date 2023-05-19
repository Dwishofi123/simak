<? session_start();

include "system/system/konek.php";
$query = mysql_query("SELECT Nama,Asal_Sekolah,Marketing FROM siswa where id='$_GET[id]'");
	while($b=mysql_fetch_row($query)){ $nama=$b[0]; $asal_sma=$b[1]; $marketing=$b[2];}
	
$query = mysql_query("SELECT nama,hp,Email from pegawai where id='$marketing'");
	while($b=mysql_fetch_array($query)){ $namam=$b[nama]; $hpm=$b[hp]; $emailm=$b[email];}	
	
	?>
<center>--------------------------------------------------------------------------------------------------<br></center>

 <tr>
 <td class="welcome" valign="top" align="left">

<center><h2>Surat Hasil Tes Seleksi PSPP Penerbangan</h2>Nama : <?echo $nama;?><br> Asal Sekolah : <? echo $asal_sma;?><br><br></center>
<center>Surat hasil tes seleksi anda akan kami kirimkan melalui email setelah anda mengikuti tes interview by phone. Silakan hubungi <font color='red'>kak <? echo $namam;?> <? echo $hpm." / ".$emailm;?> </font>untuk info lebih lengkap.</center>


<br><br><br>
<center>--------------------------------------------------------------------------------------------------<br></center>
</td></tr>