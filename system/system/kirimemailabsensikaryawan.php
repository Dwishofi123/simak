
<br><br>=============================================================================================================================<br><br>
<?php //KIRIM LAPORAN HARIAN ABSENSI KARYAWAN KE BIRO PROSSES & IT DAN AKADEMIK
include "konek-e-sids-clouds-net.php";
$tanggal=date("Y-m-d"); $tgl=date("d/m/Y"); $a=0 ;
$name="AUTO REPORT PSPP INTEGRATED";
$subject="ABSENSI HARIAN KARYAWAN ".$tanggal;

$message="Dear BOS, <br>Berikut Laporan Absensi Karyawan <strong>Tanggal ".$tgl." : </strong><br> <br><table  cellpadding=0 cellspacing=0 width=100% style='text-align:left;'> <thead> 
 <tr> <th width='30'>No</th> <th>Nama Karyawan</th> <th >Jam Masuk</th> <th >Jam Keluar </th><th>Keterangan</th>  <th >Unit Kerja</th> </tr> 
</thead> <tbody> ";
$query = mysql_query("SELECT absensi.id,absensi.id_user, absensi.tanggal, absensi.jam_masuk, absensi.jam_keluar, absensi.keterangan,absensi.unit FROM absensi where absensi.tanggal='$tanggal' and status_user='Manajemen' order by absensi.tanggal desc limit 250");
  while($b=mysql_fetch_row($query)) { $a=$a+1; 
$message=$message."<tr><td>".$a."</td><td>".$b[1]."</td><td>".$b[3]."</td><td>".$b[4]."</td><td>". $b[5]."</td><td>".$b[6]."</td></tr>"; } 
$message=$message."</tbody> </table> <br><br>Demikian laporan harian ini saya sampaikan, atas perhatiannya diucapkan terima kasih.<br><br><br><strong>Best Regards<br>AUTO SYSTEM PSPP INTEGRATED</strong>";
 
$message="Pesan Dari : $name <br /><br />".$message;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

echo "<strong>KIRIM EMAIL :</strong> ".$message."<br><br>";

for ($x = 0; $x <= 3; $x++) { 
if ($x==0){ $to="psppchief@yahoo.com"; }
if ($x==1){ $to="humanresource015@gmail.com"; }
if ($x==2){ $to="mayaagustiya@yahoo.com"; }
if ($x==3){ $to="biroprossespendidikan@gmail"; }
	// More headers
	$headers .= 'From: <it.headofficepspp@gmail.com>' . "\r\n";
	$headers .= 'Cc: it.headofficepspp@gmail.com' . "\r\n";
	@mail($to,$subject,$message,$headers); // kirim pesan sekarang
	if(@mail){echo $x.". Laporan absensi harian karyawan sudah dikirim  ke <font color='red'>".$to."</font><br>";}
}


?>