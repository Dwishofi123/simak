
<?php //KIRIM LAPORAN HARIAN PENGELUARAN KEUANGAN CABANG
include "konek.php";
$tanggal=date("Y-m-d"); $tgl=date("d/m/Y");
$name="AUTO REPORT PSPP INTEGRATED";
$subject="PENGELUARAN KEUANGAN HARIAN PSPP PENERBANGAN ".$tanggal;

$message="Dear BOS, <br>Berikut pengeluaran keuangan harian<br> <br>";


$debet=0; $kredit=0;  $a=0 ;
$message=$message. "Pengeluaran Harian Keuangan <strong>PSPP Lampung</strong><br><table  cellpadding=0 cellspacing=0 width=100% style='text-align:left;'> <thead> 
 <tr> <th width='30'>No</th> <th>Tanggal</th> <th>Uraian</th> <th >Debet</th> <th >Kredit </th></tr> 
</thead> <tbody> ";
$query = mysql_query("select * from jurnal_kas_kecil where unit='PSPP Lampung' and laporan_by_email=''");
  while($b=mysql_fetch_row($query)) { $a=$a+1;  $debet=$debet+$b[4]; $kredit=$kredit+$b[5];
$message=$message."<tr><td>".$a."</td><td>".$b[2]."</td><td>".$b[3]."</td><td>Rp. ".number_format($b[4],2,',','.')."</td><td>Rp. ".number_format($b[5],2,',','.')."</td></tr>"; } 
$total=$debet-$kredit;
$message=$message."<tr><td></td><td></td><td><strong>TOTAL</strong></td><td><strong>Rp. ".number_format($debet,2,',','.')."</strong></td><td><strong>Rp. ".number_format($kredit,2,',','.')."</strong></td></tr>";  
$message=$message."<tr><td><td></td></td><td><strong>PERUBAHAN SALDO KAS PSPP Lampung= Rp. ".number_format($total,2,',','.')."</strong></td><td></td><td></td></tr>";  
$message=$message."</tbody> </table> <br><br> ";


$debet=0; $kredit=0;  $a=0 ;
$message=$message. "Pengeluaran Harian Keuangan <strong>PSPP Jakarta</strong><br><table  cellpadding=0 cellspacing=0 width=100% style='text-align:left;'> <thead> 
 <tr> <th width='30'>No</th> <th>Tanggal</th> <th>Uraian</th> <th >Debet</th> <th >Kredit </th></tr> 
</thead> <tbody> ";
$query = mysql_query("select * from jurnal_kas_kecil where unit='PSPP Jakarta' and laporan_by_email=''");
  while($b=mysql_fetch_row($query)) { $a=$a+1;  $debet=$debet+$b[4]; $kredit=$kredit+$b[5];
$message=$message."<tr><td>".$a."</td><td>".$b[2]."</td><td>".$b[3]."</td><td>Rp. ".number_format($b[4],2,',','.')."</td><td>Rp. ".number_format($b[5],2,',','.')."</td></tr>"; } 
$total=$debet-$kredit;
$message=$message."<tr><td></td><td></td><td><strong>TOTAL</strong></td><td><strong>Rp. ".number_format($debet,2,',','.')."</strong></td><td><strong>Rp. ".number_format($kredit,2,',','.')."</strong></td></tr>";  
$message=$message."<tr><td><td></td></td><td><strong>PERUBAHAN SALDO KAS PSPP Jakarta= Rp. ".number_format($total,2,',','.')."</strong></td><td></td><td></td></tr>";  
$message=$message."</tbody> </table> <br><br> ";


$debet=0; $kredit=0;  $a=0 ;
$message=$message. "Pengeluaran Harian Keuangan <strong>PSPP Yogyakarta</strong><br><table  cellpadding=0 cellspacing=0 width=100% style='text-align:left;'> <thead> 
 <tr> <th width='30'>No</th> <th>Tanggal</th> <th>Uraian</th> <th >Debet</th> <th >Kredit </th></tr> 
</thead> <tbody> ";
$query = mysql_query("select * from jurnal_kas_kecil where unit='PSPP Yogyakarta' and laporan_by_email=''");
  while($b=mysql_fetch_row($query)) { $a=$a+1;  $debet=$debet+$b[4]; $kredit=$kredit+$b[5];
$message=$message."<tr><td>".$a."</td><td>".$b[2]."</td><td>".$b[3]."</td><td>Rp. ".number_format($b[4],2,',','.')."</td><td>Rp. ".number_format($b[5],2,',','.')."</td></tr>"; } 
$total=$debet-$kredit;
$message=$message."<tr><td></td><td></td><td><strong>TOTAL</strong></td><td><strong>Rp. ".number_format($debet,2,',','.')."</strong></td><td><strong>Rp. ".number_format($kredit,2,',','.')."</strong></td></tr>";  
$message=$message."<tr><td><td></td></td><td><strong>PERUBAHAN SALDO KAS PSPP Yogyakarta= Rp. ".number_format($total,2,',','.')."</strong></td><td></td><td></td></tr>";  
$message=$message."</tbody> </table> <br><br> ";


$debet=0; $kredit=0;  $a=0 ;
$message=$message. "Pengeluaran Harian Keuangan <strong>PSPP Makassar</strong><br><table  cellpadding=0 cellspacing=0 width=100% style='text-align:left;'> <thead> 
 <tr> <th width='30'>No</th> <th>Tanggal</th> <th>Uraian</th> <th >Debet</th> <th >Kredit </th></tr> 
</thead> <tbody> ";
$query = mysql_query("select * from jurnal_kas_kecil where unit='PSPP Makassar' and laporan_by_email=''");
  while($b=mysql_fetch_row($query)) { $a=$a+1;  $debet=$debet+$b[4]; $kredit=$kredit+$b[5];
$message=$message."<tr><td>".$a."</td><td>".$b[2]."</td><td>".$b[3]."</td><td>Rp. ".number_format($b[4],2,',','.')."</td><td>Rp. ".number_format($b[5],2,',','.')."</td></tr>"; } 
$total=$debet-$kredit;
$message=$message."<tr><td></td><td></td><td><strong>TOTAL</strong></td><td><strong>Rp. ".number_format($debet,2,',','.')."</strong></td><td><strong>Rp. ".number_format($kredit,2,',','.')."</strong></td></tr>";  
$message=$message."<tr><td><td></td></td><td><strong>PERUBAHAN SALDO KAS PSPP Makassar= Rp. ".number_format($total,2,',','.')."</strong></td><td></td><td></td></tr>";  
$message=$message."</tbody> </table> <br><br> ";



$debet=0; $kredit=0;  $a=0 ;
$message=$message. "Pengeluaran Harian Keuangan <strong>Head Office</strong><br><table  cellpadding=0 cellspacing=0 width=100% style='text-align:left;'> <thead> 
 <tr> <th width='30'>No</th>  <th>Tanggal</th><th>Uraian</th> <th >Debet</th> <th >Kredit </th></tr> 
</thead> <tbody> ";
$query = mysql_query("select * from jurnal_kas_kecil where unit='HO' and laporan_by_email=''");
  while($b=mysql_fetch_row($query)) { $a=$a+1;  $debet=$debet+$b[4]; $kredit=$kredit+$b[5];
$message=$message."<tr><td>".$a."</td><td>".$b[2]."</td><td>".$b[3]."</td><td>Rp. ".number_format($b[4],2,',','.')."</td><td>Rp. ".number_format($b[5],2,',','.')."</td></tr>"; } 
$total=$debet-$kredit;
$message=$message."<tr><td></td><td></td><td><strong>TOTAL</strong></td><td><strong>Rp. ".number_format($debet,2,',','.')."</strong></td><td><strong>Rp. ".number_format($kredit,2,',','.')."</strong></td></tr>";  
$message=$message."<tr><td><td></td></td><td><strong>PERUBAHAN SALDO KAS Head Office= Rp. ".number_format($total,2,',','.')."</strong></td><td></td><td></td></tr>";  
$message=$message."</tbody> </table> <br><br> ";


mysql_query("update jurnal_kas_kecil set laporan_by_email='Terkirim' where laporan_by_email=''");


$message=$message."<br><br>Demikian email ini saya sampaikan, atas perhatiannya diucapkan terima kasih.<br><br><br><strong>Best Regards<br>AUTO REPORT PSPP INTEGRATED</strong>";
 
$message="Pesan Dari : $name <br /><br />".$message;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";


echo "<strong>KIRIM EMAIL :</strong> ".$message."<br><br>";

for ($x = 0; $x <= 2; $x++) { 
if ($x==0){ $to="psppchief@yahoo.com"; }
if ($x==1){ $to="ch.paulus69@gmail.com"; }
if ($x==2){ $to="keuanganho@gmail.com"; }


	// More headers
	$headers .= 'From: <it.headofficepspp@gmail.com>' . "\r\n";
	$headers .= 'Cc: it.headofficepspp@gmail.com' . "\r\n";
	@mail($to,$subject,$message,$headers); // kirim pesan sekarang
	if(@mail){echo $x.". Laporan pengeluaran keuangan harian sudah dikirim  ke <font color='red'>".$to."</font><br>";}
}


?>

<br><br>=============================================================================================================================<br><br>