
<?php //KIRIM LAPORAN HARIAN PENGELUARAN KEUANGAN CABANG
include "konek.php";
$tanggal=date("Y-m-d"); $tgl=date("d/m/Y");
$name="AUTO REPORT PSPP INTEGRATED";
$subject="REPORT PENGELUARAN KEUANGAN HARIAN PSPP PENERBANGAN ".$tgl;

$message="Dear accounting, <br>Berikut pengeluaran keuangan yang anda input hari ini, mohon selalu input laporan pengeluaran setiap hari agar data pengeluaran bisa terpantau. Terima kaasih<br> <br>";


$debet=0; $kredit=0;  $a=0 ;
$message=$message. "Laporan Pengeluaran Harian Keuangan <strong>PSPP Jakarta</strong> tanggal $tgl<br><table  cellpadding=0 cellspacing=0 width=100% style='text-align:left;'> <thead> 
 <tr> <th width='30'>No</th> <th>Tanggal</th> <th>Uraian</th> <th >Debet</th> <th >Kredit </th></tr> 
</thead> <tbody> ";
$query = mysql_query("select * from jurnal_kas_kecil where unit='PSPP Jakarta' and  laporan_by_email=''");
  while($b=mysql_fetch_row($query)) { $a=$a+1;  $debet=$debet+$b[4]; $kredit=$kredit+$b[5];
$message=$message."<tr><td>".$a."</td><td>".$b[2]."</td><td>".$b[3]."</td><td>Rp. ".number_format($b[4],2,',','.')."</td><td>Rp. ".number_format($b[5],2,',','.')."</td></tr>"; } 
$total=$debet-$kredit;
$message=$message."<tr><td></td><td></td><td><strong>TOTAL</strong></td><td><strong>Rp. ".number_format($debet,2,',','.')."</strong></td><td><strong>Rp. ".number_format($kredit,2,',','.')."</strong></td></tr>";  
$message=$message."<tr><td><td></td></td><td><strong>PERUBAHAN SALDO KAS PSPP Jakarta= Rp. ".number_format($total,2,',','.')."</strong></td><td></td><td></td></tr>";  
$message=$message."</tbody> </table> <br><br> ";

$message=$message."<br><br>Demikian email ini kami kirimkan agar bisa menjadi data kroscek pengeluaran harian cabang. Terima kasih.";
 
$message="Pesan Dari : $name <br /><br />".$message;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";


echo "<strong>KIRIM EMAIL :</strong> ".$message."<br><br>";

for ($x = 0; $x <= 1; $x++) { 
if ($x==0){ $to="lisnawati.dewi87@yahoo.com"; }
if ($x==1){ $to="keuanganho@gmail.com"; }

	// More headers
	$headers .= 'From: <it.headofficepspp@gmail.com>' . "\r\n";
	$headers .= 'Cc: it.headofficepspp@gmail.com' . "\r\n";
	@mail($to,$subject,$message,$headers); // kirim pesan sekarang
	if(@mail){echo $x.". Laporan pengeluaran keuangan harian sudah dikirim  ke <font color='red'>".$to."</font><br>";}
}


?>

<br><br>=============================================================================================================================<br><br>