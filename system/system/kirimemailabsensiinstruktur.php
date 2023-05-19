
<?php //KIRIM LAPORAN HARIAN ABSENSI INSTRUKTUR KE BIRO PROSSES & IT DAN AKADEMIK
include "konek-e-sids-clouds-net.php";
$tanggal=date("Y-m-d"); $tgl=date("d/m/Y"); $a=0 ;
$name="AUTO REPORT PSPP INTEGRATED";
$subject="ABSENSI HARIAN INSTRUKTUR ".$tanggal;

$message="Dear BOS, <br>Berikut Laporan Absensi Instruktur <strong>Tanggal ".$tgl." : </strong><br> <br><table  cellpadding=0 cellspacing=0 width=100% style='text-align:left;'> <thead> 
 <tr> <th width='30'>No</th> <th>Nama Instruktur</th> <th >Jam Masuk</th> <th >Jam Keluar </th><th>Keterangan</th>  <th >Unit Kerja</th> </tr> 
</thead> <tbody> ";
$query = mysql_query("SELECT absensi.id,absensi.id_user, absensi.tanggal, absensi.jam_masuk, absensi.jam_keluar, absensi.keterangan,absensi.unit FROM absensi where absensi.tanggal='$tanggal' and status_user='Instruktur' order by absensi.tanggal desc limit 250");
  while($b=mysql_fetch_row($query)) { $a=$a+1; 
$message=$message."<tr><td>".$a."</td><td>".$b[1]."</td><td>".$b[3]."</td><td>".$b[4]."</td><td>". $b[5]."</td><td>".$b[6]."</td></tr>"; } 
$message=$message."</tbody> </table> <br><br>Demikian laporan harian ini saya sampaikan, atas perhatiannya diucapkan terima kasih.<br><br><br><strong>Best Regards<br>AUTO SYSTEM PSPP INTEGRATED</strong>";
 
$message="Pesan Dari : $name <br /><br />".$message;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";


echo "<strong>KIRIM EMAIL :</strong> ".$message."<br><br>";

for ($x = 0; $x <= 6; $x++) { 
if ($x==0){ $to="biroprossespendidikan@gmail.com"; }
if ($x==1){ $to="pspplampung.it@gmail.com"; }
if ($x==2){ $to="psppjakarta.it@gmail.com"; }
if ($x==3){ $to="psppjogja.it@gmail.com"; }
if ($x==4){ $to="psppmakassar.it@gmail.com"; }
if ($x==5){ $to="psppchief@yahoo.com"; }
if ($x==6){ $to="humanresource015@gmail.com"; }
	// More headers
	$headers .= 'From: <it.headofficepspp@gmail.com>' . "\r\n";
	$headers .= 'Cc: it.headofficepspp@gmail.com' . "\r\n";
	@mail($to,$subject,$message,$headers); // kirim pesan sekarang
	if(@mail){echo $x.". Laporan absensi harian instruktur sudah dikirim  ke <font color='red'>".$to."</font><br>";}
}


?>


