
<?php //KIRIM LAPORAN HARIAN PENGELUARAN KEUANGAN CABANG
include "konek176.php";
$tanggal=date("Y-m-d"); $tgl=date("d/m/Y");
$name="AUTO REPORT PSPP INTEGRATED";
$subject="REKAP HARIAN PEMBAYARAN ANGSURAN SISWA ".$tanggal;

$message="Dear BOS, <br>Berikut rekap pembayaran siswa hari ini <strong>tanggal ".$tgl." : </strong><br> <br>";


$message=$message. "Pembayaran angsuran siswa <strong>PSPP Lampung</strong><br><table  cellpadding=0 cellspacing=0 width=100% style='text-align:left;'> <thead> 
 <tr> <th width='30'>No</th> <th>Nama Siswa</th> <th >Angsuran</th> <th > Nominal </th><th >Detil Transfer</th><th >No. Ref</th><th >Marketing</th></tr> 
</thead> <tbody> ";  $a=0 ;
$query = mysql_query("select * from pembayaran_log where tanggal='$tgl' and unit='PSPP Lampung'");
  while($b=mysql_fetch_row($query)) { $a=$a+1;  
$message=$message."<tr><td>".$a."</td><td>".$b[2]."</td><td>".$b[3]."</td>><td>".$b[4]."</td><td>".$b[5]."</td><td>".$b[6]."</td><td>".$b[7]."</td></tr>"; } 
$message=$message."</tbody> </table> <br><br> ";

$message=$message. "Pembayaran angsuran siswa <strong>PSPP Jakarta</strong><br><table  cellpadding=0 cellspacing=0 width=100% style='text-align:left;'> <thead> 
 <tr> <th width='30'>No</th> <th>Nama Siswa</th> <th >Angsuran</th> <th > Nominal </th><th >Detil Transfer</th><th >No. Ref</th><th >Marketing</th></tr> 
</thead> <tbody> ";  $a=0 ;
$query = mysql_query("select * from pembayaran_log where tanggal='$tgl' and unit='PSPP Jakarta'");
  while($b=mysql_fetch_row($query)) { $a=$a+1;  
$message=$message."<tr><td>".$a."</td><td>".$b[2]."</td><td>".$b[3]."</td>><td>".$b[4]."</td><td>".$b[5]."</td><td>".$b[6]."</td><td>".$b[7]."</td></tr>"; } 
$message=$message."</tbody> </table> <br><br> ";


$message=$message. "Pembayaran angsuran siswa <strong>PSPP Yogyakarta</strong><br><table  cellpadding=0 cellspacing=0 width=100% style='text-align:left;'> <thead> 
 <tr> <th width='30'>No</th> <th>Nama Siswa</th> <th >Angsuran</th> <th > Nominal </th><th >Detil Transfer</th><th >No. Ref</th><th >Marketing</th></tr> 
</thead> <tbody> ";  $a=0 ;
$query = mysql_query("select * from pembayaran_log where tanggal='$tgl' and unit='PSPP Yogyakarta'");
  while($b=mysql_fetch_row($query)) { $a=$a+1;  
$message=$message."<tr><td>".$a."</td><td>".$b[2]."</td><td>".$b[3]."</td>><td>".$b[4]."</td><td>".$b[5]."</td><td>".$b[6]."</td><td>".$b[7]."</td></tr>"; } 
$message=$message."</tbody> </table> <br><br> ";

$message=$message. "Pembayaran angsuran siswa <strong>PSPP Makassar</strong><br><table  cellpadding=0 cellspacing=0 width=100% style='text-align:left;'> <thead> 
 <tr> <th width='30'>No</th> <th>Nama Siswa</th> <th >Angsuran</th> <th > Nominal </th><th >Detil Transfer</th><th >No. Ref</th><th >Marketing</th></tr> 
</thead> <tbody> ";  $a=0 ;
$query = mysql_query("select * from pembayaran_log where tanggal='$tgl' and unit='PSPP Makassar'");
  while($b=mysql_fetch_row($query)) { $a=$a+1;  
$message=$message."<tr><td>".$a."</td><td>".$b[2]."</td><td>".$b[3]."</td>><td>".$b[4]."</td><td>".$b[5]."</td><td>".$b[6]."</td><td>".$b[7]."</td></tr>"; } 
$message=$message."</tbody> </table> <br><br> ";


$message=$message."<br><br>Demikian email ini saya sampaikan, atas perhatiannya diucapkan terima kasih.<br><br><br><strong>Best Regards<br>AUTO SYSTEM PSPP INTEGRATED</strong>";
 
$message="Pesan Dari : $name <br /><br />".$message;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";


echo "<strong>KIRIM EMAIL :</strong> ".$message."<br><br>";

for ($x = 0; $x <= 2; $x++) { 
if ($x==0){ $to="psppchief@yahoo.com"; }
if ($x==1){ $to="cahmangir@gmail.com"; }


	// More headers
	$headers .= 'From: <it.headofficepspp@gmail.com>' . "\r\n";
	$headers .= 'Cc: it.headofficepspp@gmail.com' . "\r\n";
	@mail($to,$subject,$message,$headers); // kirim pesan sekarang
	if(@mail){echo $x.". Laporan pengeluaran keuangan harian sudah dikirim  ke <font color='red'>".$to."</font><br>";}
}


?>

<br><br>=============================================================================================================================<br><br>