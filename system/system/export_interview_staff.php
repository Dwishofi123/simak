<?PHP 
include "konek.php";
$tgl_sekarang = date("Y-m-d");

$kueri_peg = mysql_query("select * from interview where id = '$_GET[nomor]'");
//$kueri_peg = mysql_query("select * from interview where id = '14'");
$cetak = mysql_fetch_array($kueri_peg);
$ubah_nama = str_replace(" ","_",$cetak['nama']);

		$tgl = $cetak['tgl_interview'];
		$harinya = date('d', strtotime($tgl));
		
		$bulanya = date('m', strtotime($tgl));
		$tahunya = date('Y', strtotime($tgl));
		$araibulan = array('01' => 'Januari','02' => 'Febrari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember');	
header("Content-Type: application/msword");
header("Expires: 0");
header("Cache-Control : must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment;Filename=$ubah_nama.doc");

?>
<style type="text/css">
.font
{
		font-size:12px;	
}
.judul
{
	border: 1px solid;
	font-size:15px;
}
</style>
<table width="100%">
	<tr>
	
		<td width="50%" align="left"><img src="../../../xampp/htdocs/KERJAAN/integrated/system/img/logo_pspp.png"></td>
		<td width="50%" height="10%" align=right><table class="judul"><tr height="70px"><td><i><b><CENTER>Semua isian wajib diisi. Bagi siswa yang datang langsung ke kampus, WAJIB dilakukan pengukuran SEPATU & SERAGAM dengan sampel yang ada</CENTER></b></i></td></tr></table></td>
		</TR>
</TABLE>

<table width="100%">

<tr><td> &nbsp </td></tr>
<tr><td colspan=4><center><b>DATA INTERVIEW CALON SISWA/I PSPP</b></center></td></tr>
<tr><Td width="2%">1.</td ><td width="30%">Tanggal Interview</td><td width="1%"> : </td><td><?php echo "$harinya  $araibulan[$bulanya], $tahunya";?></td></tr>
<tr><td>2.</td><td>Nama Lkp(<I>tdk disingkat</I>)</td><Td> : </td><td><?php echo "$cetak[nama]";?></td></tr>
<tr><td>3.</td><td>Tempat / Tgl Lahir</td><Td> : </td><td>(<I>sesuai identitas</I>) <?php echo "$cetak[tempat_lahir]";?> / <?php echo "$cetak[tgl_lahir]";?></td></tr>
<tr><td>4.</td><td>Email (<I>dipastikan aktif</I>)</td><Td> : </td><td><?php echo "$cetak[email]";?></td></tr>
<tr><td>5.</td><td>Ukuran Baju / Sepatu</td><Td> : </td>
	<td><?php echo "$cetak[ukuran_baju] / $cetak[ukuran_sepatu]";?>	</td>
</tr>
<tr><td>6.</td><td>Asal Sekolah</td><Td> : </td><td><?php echo "$cetak[asal_sekolah] Kota Sekolah : $cetak[kota_sekolah]";?></td></tr>
<tr><td>7.</td><td>Jilbab</td><td> : </td><td><?php echo "$cetak[jilbab]";?></td></tr>
<tr><Td>8.</td><td>Dukungan Ortu</td><td> : </td><td><?php echo "$cetak[dukungan_ortu]";?></td></tr>
<tr><td>9.</td><td> Biaya Pendidikan</td><td> : </td>
	<td>
		<?php echo "$cetak[biaya_pendidikan]";?></td>
</tr>
<tr><td>10.</td><td> Nama Ortu	</td><td> : </td><td><?php echo "$cetak[nama_ortu]";?></td></tr>
<tr><td>11.</td><td> Alamat (<I>ditujukan utk alamat pengiriman surat</I>) </td><td> : </td><td><?php echo "$cetak[alamat] kd. Pos $cetak[kode_pos]";?> </td></tr>

<tr><td>12.</td><td> Pengetahuan</td><td> : </td>
	<td>
		<?php echo "$cetak[pengetahuan]";?>
	</td>
</tr>
<tr><td>13.</td><td>Etika</td><td> : </td>
	<td>
		<?php echo "$cetak[etika]";?>
	</td>
</tr>
<tr><td>14.</td><td>Kemampuan Khusus</td><td> : </td><td><?php echo "$cetak[kemampuan_khusus]";?></td></tr>
<tr><td>15.</td><td>Speaking ability</td><td> : </td>
	<td>
		<?php echo "$cetak[speaking_ability]";?></td>
</tr>
<tr><td>16.</td><td>Communication skills</td><td> : </td>
	<td>
		<?php echo "$cetak[communication_skills]";?></td>
</tr>
<tr><td>17.</td><td>Performance</td><td> : </td>
	<td>
		<?php echo "$cetak[performance]<br> 1. Berat $cetak[berat_badan] Kg  2. Tinggi: $cetak[tinggi_badan] CM";?>
	
		</td>
</tr>

<tr><td>18.</td><td>Dijanjikan Kerja</td><td> : </td>
	<td><?php echo "$cetak[dijanjikan_kerja]";?></td>
</tr>
<tr><td>19.</td><td>Status</td><td> : </td>
	<td>
	<?php echo "$cetak[status]";?></td>
</tr>
<tr><td>20.</td><td>Diterima Program</td><td> : </td>
	<td>
		<?php echo "$cetak[diterima_jurusan]";?></td>
</tr>
<tr><td>21.</td><td>Kampus</td><td> : </td>
	<td>
		<?php echo "$cetak[kampus]";?></td>
</tr>
<tr><td>22.</td><td>Angkatan</td><td> : </td>
	<td>
		<?php echo "$cetak[angkatan]  Marketing : $cetak[marketing]";?></td>
</tr>
<tr><td>23.</td><td>Catatan Interview</td><td> : </td>
	<td>
	<?php echo "$cetak[jalur_interview]";?></td>
</tr>
<tr><td></td><td colspan=3><?php echo "$cetak[catatan_interview]";?></td></tr>
<tr>
	<Td colspan="4">
	<table width="100%">
		<tr><td width="50%" align=center></td><td width="50%" align=right><?php $tempat = explode(" ",$cetak['tempat_interview']);echo "$tempat[1], $harinya  $araibulan[$bulanya], $tahunya";?></td></tr>
		<tr><td width="50%" align=center>Petugas Jaga,<br><br>(.......................)</td><td width="50%" align=center>Interviewer<br><br> ( <u><?php echo "$cetak[interview_by]";?></u> ) </td></tr>
	</table>
	</td>
</tr>
<tr><td colspan=4><HR></HR><center><span class="font">
PSPP Lampung: Jl. Teuku Umar, No. 36 A-C Kedaton</font> Bandar Lampung 35417 Lampung Telp/Fax : 0721-77 22 77<br>
PSPP Jakarta: Jl. Aeropolis Commercial Park, Marsekal Suryadarma, Neglasari, Tanggerang. Telp/Fax : 021 - 222 51 227<br>
PSPP Yogyakarta: Jl. Seturan Raya No.13B, Catur Tunggal, Depok Sleman, Yogyakarta. Telp/Fax : 0274 - 486 287<br>
PSPP Makassar: Manggala Junction Park Blok B No. 17, Biringkanaya, Makassar. Telp./Fax : 0411 - 472 7272<br>
e-mail : <font color="blue">psbpspp@gmail.com</font>
</center></span></td></tr>
</table>

