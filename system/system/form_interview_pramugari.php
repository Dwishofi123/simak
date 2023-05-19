<?php 
session_start();
include "konek.php";
$query = mysql_query("select * from siswa where ID = '$_GET[id]'");
$cet_siswa = mysql_fetch_array($query);
$sekarang = date('Y-m-d');

//menampilkan nama marketing
$query_pegawai = mysql_query("select * from pegawai where ID = '$cet_siswa[Marketing]'");
$arai_marketing = mysql_fetch_array($query_pegawai);

//MENGAMBIL JURUSAN DAN Angkatan

$jurusan_pertama=explode(" (",$cet_siswa['Jurusan']);
$jurusan = "$jurusan_pertama[0]";

$ambil_angkatan=explode(")",$jurusan_pertama[1]);
$angkatan = "$ambil_angkatan[0]";

$harinya = date('d', strtotime($sekarang));
		
		$bulanya = date('m', strtotime($sekarang));
		$tahunya = date('Y', strtotime($sekarang));
		$araibulan = array('01' => 'Januari','02' => 'Febrari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember');	
	

if(@$_GET['cetak'] == "true")
{
echo "<a href='../../system/system/export_interview_pramugari.php?nomor=$_GET[nomor_inter]'>Export Word</a><Br><BR>";
//	echo "<a href='export_interview_pramugari.php?nomor=$_GET[nomor_inter]'>Export Word</a><Br><BR>";
}
?>

<BR>
<script type="text/javascript">
function validateForm() {

	var nama = document.forms["form"]["nama"].value;
    if (nama == null || nama == "") {
        alert("Mohon Isi Nama Terlebih Dahulu!");
        return false;
    }	
		
	var tempat_lahir = document.forms["form"]["tempat_lahir"].value;
    if (tempat_lahir == null || tempat_lahir == "") {
        alert("Mohon Isi Tempat Lahir Terlebih Dahulu!");
        return false;
    }	
	var tgl_lahir = document.forms["form"]["tgl_lahir"].value;
    if (tgl_lahir == null || tgl_lahir == "") {
        alert("Mohon Isi Tanggal Lahir Terlebih Dahulu!");
        return false;
    }		
	var email = document.forms["form"]["email"].value;
    if (email == null || email == "") {
        alert("Mohon Isi Email Terlebih Dahulu!");
        return false;
    }	
		var ukuran_baju = document.forms["form"]["ukuran_baju"].value;
    if (ukuran_baju == null || ukuran_baju == "") {
        alert("Mohon Isi Ukuran Baju Terlebih Dahulu!");
        return false;
    }		
	var ukuran_sepatu = document.forms["form"]["ukuran_sepatu"].value;
    if (ukuran_sepatu == null || ukuran_sepatu == "") {
        alert("Mohon Isi Ukuran Sepatu Terlebih Dahulu!");
        return false;
    }	
		var asal_sekolah = document.forms["form"]["asal_sekolah"].value;
    if (asal_sekolah == null || asal_sekolah == "") {
        alert("Mohon Isi Asal Sekolah Terlebih Dahulu!");
        return false;
    }	
	var kota_sekolah = document.forms["form"]["kota_sekolah"].value;
    if (kota_sekolah == null || kota_sekolah == "") {
        alert("Mohon Isi Kota Sekolah Terlebih Dahulu!");
        return false;
    }	
			
	var nama_ortu = document.forms["form"]["nama_ortu"].value;
    if (nama_ortu == null || nama_ortu == "") {
        alert("Mohon Isi Nama Ortu Terlebih Dahulu!");
        return false;
    }	
			
	var alamat = document.forms["form"]["alamat"].value;
    if (alamat == null || alamat == "") {
        alert("Mohon Isi Alamat Terlebih Dahulu!");
        return false;
    }	
			
	var kode_pos = document.forms["form"]["kode_pos"].value;
    if (kode_pos == null || kode_pos == "") {
        alert("Mohon Isi Kode Pos Terlebih Dahulu!");
        return false;
    }	
		var kemampuan_khusus = document.forms["form"]["kemampuan_khusus"].value;
    if (kemampuan_khusus == null || kemampuan_khusus == "") {
        alert("Mohon Isi Kemampuan Khusus Terlebih Dahulu!");
        return false;
    }	
			var berat_badan = document.forms["form"]["berat_badan"].value;
    if (berat_badan == null || berat_badan == "") {
        alert("Mohon Isi Berat Badan Terlebih Dahulu!");
        return false;
    }	
			var tinggi_badan = document.forms["form"]["tinggi_badan"].value;
    if (tinggi_badan == null || tinggi_badan == "") {
        alert("Mohon Isi Tinggi Badan Terlebih Dahulu!");
        return false;
    }	
			var catatan = document.forms["form"]["catatan"].value;
    if (catatan == null || catatan == "") {
        alert("Mohon Isi Catatan Interview Terlebih Dahulu!");
        return false;
    }	
		
	var jilbab = document.forms["form"]["jilbab"].value;
    if (jilbab == null || jilbab == "") {
        alert("Mohon Pilih Jilbab Terlebih Dahulu!");
        return false;
    }
	var dukungan_ortu = document.forms["form"]["dukungan_ortu"].value;
    if (dukungan_ortu == null || dukungan_ortu == "") {
        alert("Mohon Pilih Dukungan Ortu Terlebih Dahulu!");
        return false;
    }
	var biaya_pendidikan = document.forms["form"]["biaya_pendidikan"].value;
    if (biaya_pendidikan == null || biaya_pendidikan == "") {
        alert("Mohon Pilih Biaya Pendidikan Terlebih Dahulu!");
        return false;
    }
	var pengetahuan = document.forms["form"]["pengetahuan"].value;
    if (pengetahuan == null || pengetahuan == "") {
        alert("Mohon Pilih Pengetahuan Terlebih Dahulu!");
        return false;
    }
	var etika = document.forms["form"]["etika"].value;
    if (etika == null || etika == "") {
        alert("Mohon Pilih Etika Terlebih Dahulu!");
        return false;
    }
	var berbicara = document.forms["form"]["berbicara"].value;
    if (berbicara == null || berbicara == "") {
        alert("Mohon Pilih Speaking ability Terlebih Dahulu!");
        return false;
    }
		var komunikasi = document.forms["form"]["komunikasi"].value;
    if (komunikasi == null || komunikasi == "") {
        alert("Mohon Pilih Communication skills Terlebih Dahulu!");
        return false;
    }
		var performance = document.forms["form"]["performance"].value;
    if (performance == null || performance == "") {
        alert("Mohon Pilih performance Terlebih Dahulu!");
        return false;
    }	
	var dijanjikan = document.forms["form"]["dijanjikan"].value;
    if (dijanjikan == null || dijanjikan == "") {
        alert("Mohon Pilih Perjanjian Pekerjaan Terlebih Dahulu!");
        return false;
    }	
	var status = document.forms["form"]["status"].value;
    if (status == null || status == "") {
        alert("Mohon Pilih Status Interview Terlebih Dahulu!");
        return false;
    }	
	
	var diterima_jurusan = document.forms["form"]["diterima_jurusan"].value;
    if (diterima_jurusan == null || diterima_jurusan == "") {
        alert("Mohon Pilih Diterima Dijurusan Terlebih Dahulu!");
        return false;
    }
	var diterima_kampus = document.forms["form"]["diterima_kampus"].value;
    if (diterima_kampus == null || diterima_kampus == "") {
        alert("Mohon Pilih Kampus Terlebih Dahulu!");
        return false;
    }
	var jalur_interview = document.forms["form"]["jalur_interview"].value;
    if (jalur_interview == null || jalur_interview == "") {
        alert("Mohon Pilih Jalur Interview Dahulu!");
        return false;
    } 
	var gigi = document.forms["form"]["gigi"].value;
    if (gigi == null || gigi == "") {
        alert("Mohon Pilih Gigi Dahulu!");
        return false;
    }

	
	var mata = document.forms["form"]["mata"].value;
    if (mata == null || mata == "") {
        alert("Mohon Pilih Fisik Mata Dahulu!");
        return false;
    }	

	var bahu = document.forms["form"]["bahu"].value;
    if (bahu == null || bahu == "") {
        alert("Mohon Pilih Fisik Bahu Dahulu!");
        return false;
    }

var tangan = document.forms["form"]["tangan"].value;
    if (tangan == null || tangan == "") {
        alert("Mohon Pilih Fisik Tangan Dahulu!");
        return false;
    }
	
	var bekas_luka = document.forms["form"]["bekas_luka"].value;
    if (bekas_luka == null || bekas_luka == "") {
        alert("Mohon Pilih Fisik Bekas Luka Dahulu!");
        return false;
    }
	
var berenang = document.forms["form"]["berenang"].value;
    if (berenang == null || berenang == "") {
        alert("Mohon Pilih Kemampuan Berenang Dahulu!");
        return false;
    }
	
	var bertato = document.forms["form"]["bertato"].value;
    if (bertato == null || bertato == "") {
        alert("Mohon Pilih Fisik Bertato Permanen Dahulu!");
        return false;
    }
	var bentuk_kaki = document.forms["form"]["bentuk_kaki"].value;
    if (bentuk_kaki == null || bentuk_kaki == "") {
        alert("Mohon Pilih Bentuk Kaki Dahulu!");
        return false;
    }
		
var ketinggian = document.forms["form"]["ketinggian"].value;
    if (ketinggian == null || ketinggian == "") {
        alert("Mohon Pilih Takut Ketinggian Atau Tidak !");
        return false;
    }
	

var jenis_kulit = document.forms["form"]["jenis_kulit"].value;
    if (jenis_kulit == null || jenis_kulit == "") {
        alert("Mohon Pilih Jenis Kulit Dahulu!");
        return false;
    }	

var wajah = document.forms["form"]["wajah"].value;
    if (wajah == null || wajah == "") {
        alert("Mohon Pilih Wajah Dahulu!");
        return false;
    }	

var pindah_jurusan = document.forms["form"]["pindah_jurusan"].value;
    if (pindah_jurusan == null || pindah_jurusan == "") {
        alert("Mohon Pilih Kesanggupan Pindah Jurusan Dahulu!");
        return false;
    }	
	var catatan_khusus_pramugari = document.forms["form"]["catatan_khusus_pramugari"].value;
    if (catatan_khusus_pramugari == null || catatan_khusus_pramugari == "") {
        alert("Mohon Isi Catatan Khusus Terlebih Dahulu!");
        return false;
    }	
			var penyakit_bawaan = document.forms["form"]["penyakit_bawaan"].value;
    if (penyakit_bawaan == null || penyakit_bawaan == "") {
        alert("Mohon Isi Penyakit Bawaan Terlebih Dahulu!");
        return false;
    }
}			
</script>
<style type="text/css">
tr 
{
	height:40px;
}

</style>
<iframe width=174 height=100 name="gToday:normal:../calender/agenda.js" id="gToday:normal:../calender/agenda.js" src="../calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-300px; left:-500px;"></iframe>
 
 <table>
 <tr><td colspan="3"><h3>Pilihan jurusan dan kampus</h3></td></tr>
 <tr><td>Jurusan </td><td>:</td><td><?php echo "$cet_siswa[Jurusan]";?></td></tr>
 <tr><td>Kampus </td><td>:</td><td><?php echo "$cet_siswa[Tempat_Kuliah]";?></td></tr>
 <tr><td colspan=3><h3>Biodata Diri</h3></td></tr>
 
 <tr><td>Nama </td><td>:</td><td><?php echo "$cet_siswa[Nama]";?></td></tr>
 <tr><td>Agama</td><td>:</td><td><?php echo "$cet_siswa[agama]";?></td></tr>
 <tr><td>Suku</td><td>:</td><td><?php echo "$cet_siswa[suku]";?></td></tr>
 <tr><td>Jenis Kelamin</td><td>:</td><td><?php echo "$cet_siswa[jenis_kelamin]";?></td></tr>
 <tr><td>Tempat / Tgl Lahir</td><td>:</td><td><?php echo "$cet_siswa[tempat_lahir] / $cet_siswa[tanggal_lahir]";?></td></tr>

 
 <tr><td>Usia</td><td>:</td><td><?php echo "$cet_siswa[usia]";?></td></tr>
 <tr><td>Tinggi / Berat Badan</td><td>:</td><td><?php echo "$cet_siswa[tinggi_badan] / $cet_siswa[berat_badan]";?></td></tr>
 <tr><td>Hobi</td><td>:</td><td><?php echo "$cet_siswa[hoby]";?></td></tr>
 <tr><td>Golongan Darah</td><td>:</td><td><?php echo "$cet_siswa[golongan_darah]";?></td></tr>
 <tr><td>Ukuran Sepatu / Ukuran Sepatu</td><td>:</td><td><?php echo "$cet_siswa[ukuran_sepatu] / $cet_siswa[ukuran_baju]";?></td></tr>

 <tr><td>Marketing</td><td>:</td><td><?php echo "$arai_marketing[nama]";?></td></tr>
 <tr><td>Motivasi Masuk PSPP</td><td>:</td><td><?php echo "$cet_siswa[motivasi_masuk_pspp]";?></td></tr>
 <tr><td colspan=3><h3>Informasi kontak dan tempat tinggal</h3></td></tr>
 <tr><td>Alamat lengkap</td><td>:</td><td><?php echo "$cet_siswa[Alamat]";?></td></tr>
 <tr><td>No HP Siswa</td><td>:</td><td><?php echo "$cet_siswa[No_Telp]";?></td></tr>
 <tr><td>No HP Ortu</td><td>:</td><td><?php echo "$cet_siswa[HP_Ortu]";?></td></tr>
 <tr><td>Pekerjaan Ortu</td><td>:</td><td><?php echo "$cet_siswa[pekerjaan_ortu]";?></td></tr>
 <tr><td>Alamat Ortu</td><td>:</td><td><?php echo "$cet_siswa[alamat_ortu]";?></td></tr>
 <tr><td colspan=3><h3>Pendidikan</h3><td></tr>
 <tr><td>Pendidikan Terakhir</td><td>:</td><td><?php echo "$cet_siswa[nama_pendidikan_terakhir]";?></td></tr>
 <tr><td>Alamat Sekolah</td><td>:</td><td><?php echo "$cet_siswa[alamat_pendidikan_terakhir]";?></td></tr>
 <tr><td>NPSN</td><td>:</td><td><?php echo "$cet_siswa[npsn]";?></td></tr>
 <tr><td>Uraian Pendidikan Formal</td><td>:</td><td><?php echo "$cet_siswa[pendidikan_formal]";?></td></tr>
 <tr><td>Kurusus yg pernah diikuti</td><td>:</td><td><?php echo "$cet_siswa[kursus]";?></td></tr>
 <tr><td>Email</td><td>:</td><td><?php echo "$cet_siswa[email]";?></td></tr>
 <tr><td>Pin BBM</td><td>:</td><td><?php echo "$cet_siswa[bbm]";?></td></tr>
<tr><td colspan=3><h3>Berkas Pendaftaran</h3></td></tr>
<tr><td>Foto</td><td> : </td><td><img src="../../uploads/foto-<?php echo "$cet_siswa[ID]";?>.jpg" WIDTH="100PX" HEIGHT="100PX"></TD></TR>
<tr><td>Foto Full Badan</td><td> : </td><td><img src="../../uploads/foto-full-badan-<?php echo "$cet_siswa[ID]";?>.jpg" WIDTH="100PX" HEIGHT="100PX"></TD></TR>
<tr><td>Surat Ket. Sehat</td><td> : </td><td><img src="../../uploads/surat-<?php echo "$cet_siswa[ID]";?>.jpg" WIDTH="100PX" HEIGHT="100PX"></TD></TR>
<tr><td>Identitas Diri yg Masih Berlaku (KTP/KTP Sementara)</td><td> : </td><td><img src="../../uploads/cover-raport-<?php echo "$cet_siswa[ID]";?>.jpg" WIDTH="100PX" HEIGHT="100PX"></TD></TR>
<tr><td>Kartu Pelajar / Sampul Raport</td><td> : </td><td><img src="../../uploads/kartu-pelajar-<?php echo "$cet_siswa[ID]";?>.jpg" WIDTH="100PX" HEIGHT="100PX"></TD></TR>
</table>
 
 <?php
if($cet_siswa['tgl_interview'] == "")
 {
	 $link = "../../system/system/submit_interview_pramugari.php?page=staff";

 }
 else
 {
	 $link = "#";
 }
 ?>
 <form action="<?php echo $link;?>" method="post" name="form" onsubmit="return validateForm()">
  <input type="hidden" name="from" value="staff">
<table width="100%">
<input type="hidden" name="idnya" value="<?php echo "$cet_siswa[ID]";?>">
<tr><td colspan=5><center><b>DATA INTERVIEW CALON SISWA/I PSPP</b></center></td></tr>
<tr><Td width="2%">1.</td ><td width="15%">Tanggal Interview</td><td width="1%"> : </td><td colspan=4><input type="text" name="tgl_interview" id="tgl_interview" value="<?php echo "$harinya $araibulan[$bulanya] $tahunya";?>" readonly></td></tr>
<tr><td>2.</td><td>Nama Lkp(<I>tdk disingkat</I>)</td><Td> : </td><td colspan=4><input type="text" name="nama" value="<?php if(@$_GET['nama'] == "") {	echo "$cet_siswa[Nama]"; } else {	echo $_GET['nama'];	} ?>"  ></td></tr>
<tr><td>3.</td><td>Tempat / Tgl Lahir</td><Td> : </td><td colspan=4>(<I>sesuai identitas</I>) <input type="text" name="tempat_lahir" value="<?php if(@$_GET['tempat_lahir'] == "") {	echo "$cet_siswa[tempat_lahir]"; } else {	echo $_GET['tempat_lahir']; }	?>" > / <input type="text" name="tgl_lahir" id="tgl_lahir" value="<?php if(@$_GET['tgl_lahir'] <> "") { echo "$_GET[tgl_lahir]"; } else { echo "$cet_siswa[tanggal_lahir]"; } ?>" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form.tgl_lahir);return false;"></td></tr>
<tr><td>4.</td><td>Email (<I>dipastikan aktif</I>)</td><Td> : </td><td colspan=4><input type="text" name="email" value="<?php if(@$_GET['email'] <> "")	{	echo "$_GET[email]"; } else { echo "$cet_siswa[email]"; } ?>"></td></tr>
<tr><td>5.</td><td>Ukuran Baju / Sepatu</td><Td> : </td>
	<td colspan=4>
		<input type="text" name="ukuran_baju" value="<?php if(@$_GET['ukuran_baju'] <> "") { echo "$_GET[ukuran_baju]"; } else { echo "$cet_siswa[ukuran_baju]"; } ?>" > / 
		<input type="text" name="ukuran_sepatu" value="<?php if(@$_GET['ukuran_sepatu'] <> "") { echo "$_GET[ukuran_sepatu]"; } else { echo "$cet_siswa[ukuran_sepatu]"; } ?>" >
	</td>
</tr>
<tr><td>6.</td><td>Asal Sekolah</td><Td> : </td><td colspan=4><input type="text" name="asal_sekolah" value="<?php 
if(@$_GET['asal_sekolah'] <> "") { echo "$_GET[asal_sekolah]"; } else { 
echo "$cet_siswa[Asal_Sekolah]"; }
?>"> Kota Sekolah : <input type="text" name="kota_sekolah" value="<?php 
if(@$_GET['kota_sekolah'] <> "") { echo "$_GET[kota_sekolah]"; } else { 
echo "$cet_siswa[kota_sekolah]";
}
?>"  ></td></tr>
<tr><td>7.</td><td>Jilbab</td><td> : </td><td width="14%"><input type="radio" <?PHP  if(@$_GET['jilbab'] <> "") { if($_GET['jilbab'] == "Ya") { echo "checked"; } } else {	if($cet_siswa['jilbab'] == "Ya") { echo "checked"; } } ?> name="jilbab" value='Ya' > Ya
	</td><td><input type="radio" <?PHP if(@$_GET['jilbab'] <> "") { if($_GET['jilbab'] == "Tidak") { echo "checked"; } } else { if($cet_siswa['jilbab'] == "Tidak") { echo "checked"; } }	?> name="jilbab" value='Tidak' > Tidak</td></tr>
<tr><Td>8.</td><td>Dukungan Ortu</td><td> : </td>
	<td>
		<input type="radio" <?PHP if(@$_GET['dukungan_ortu'] <> "") { if($_GET['dukungan_ortu'] == "Ya") { echo "checked"; } } ?> name="dukungan_ortu" value='Ya'> Ya 
		</td><td><input type="radio" <?PHP if(@$_GET['dukungan_ortu'] <> "") { if($_GET['dukungan_ortu'] == "Tidak") { echo "checked"; } } ?> name="dukungan_ortu" value='Tidak'> Tidak <input type="radio" <?PHP if(@$_GET['dukungan_ortu'] <> "") { if($_GET['dukungan_ortu'] == "Ragu-ragu") { echo "checked"; } } ?> name="dukungan_ortu" value='Ragu-ragu'> Ragu-ragu</td></tr>
<tr><td>9.</td><td> Biaya Pendidikan</td><td> : </td>
	<td>
		<input type="radio" <?PHP if(@$_GET['biaya_pendidikan'] <> "") { if($_GET['biaya_pendidikan'] == "Biaya Siap") { echo "checked"; } } ?> name="biaya_pendidikan" value='Biaya Siap'> Biaya Siap
	</td><td>	<input type="radio" <?PHP if(@$_GET['biaya_pendidikan'] <> "") { if($_GET['biaya_pendidikan'] == "Biaya Diusahakan") { echo "checked"; } } ?> name="biaya_pendidikan" value='Biaya Diusahakan'> Biaya Diusahakan
	</td>
</tr>
<tr><td>10.</td><td> Nama Ortu	</td><td> : </td><td colspan=4><input type="text" name="nama_ortu"  value="<?php 
if(@$_GET['nama_ortu'] <> "")	{	echo "$_GET[nama_ortu]"; } else {
echo "$cet_siswa[nama_ortu]";
}
?>" ></td></tr>
<tr><td>11.</td><td>Alamat (<I>ditujukan utk alamat pengiriman surat</I>) </td><td> : </td><td colspan=4>
<?php /*<input type="text" name="alamat" value="<?PHP if(@$_GET['alamat'] <> "") { ECHO "$_GET[alamat]"; } 
else
{
	echo "$cet_siswa[Alamat]";
}
?>">
*/
?>
<textarea  name="alamat" onBlur="javascript:{this.value = this.value.toUpperCase();}"><?PHP if(@$_GET['alamat'] <> "") { ECHO "$_GET[alamat]"; } else {	echo "$cet_siswa[Alamat]"; } ?></textarea>
 kd. Pos <input type="text" name="kode_pos" value="<?PHP if(@$_GET['kode_pos'] <> "") { ECHO "$_GET[kode_pos]"; } ?>"></td></tr>

<tr><td>12.</td><td> Pengetahuan</td><td> : </td>
	<td>
		<input type="radio" <?PHP if(@$_GET['pengetahuan'] <> "") { if($_GET['pengetahuan'] == "Kurang") { echo "checked"; } } ?> name="pengetahuan" value='Kurang'> Kurang
	</td><td>	<input type="radio" <?PHP if(@$_GET['pengetahuan'] <> "") { if($_GET['pengetahuan'] == "Cukup") { echo "checked"; } } ?> name="pengetahuan" value='Cukup'> Cukup
		<input type="radio" <?PHP if(@$_GET['pengetahuan'] <> "") { if($_GET['pengetahuan'] == "Baik") { echo "checked"; } } ?> name="pengetahuan" value='Baik'> Baik
	</td>
</tr>
<tr><td>13.</td><td>Etika</td><td> : </td>
	<td>
		<input type="radio" <?PHP if(@$_GET['etika'] <> "") { if($_GET['etika'] == "Kurang") { echo "checked"; } } ?> name="etika" value='Kurang'> Kurang
	</td><td>	<input type="radio" <?PHP if(@$_GET['etika'] <> "") { if($_GET['etika'] == "Cukup") { echo "checked"; } } ?> name="etika" value='Cukup'> Cukup
		<input type="radio" <?PHP if(@$_GET['etika'] <> "") { if($_GET['etika'] == "Baik") { echo "checked"; } } ?> name="etika" value='Baik'> Baik
	</td>
</tr>
<tr><td>14.</td><td>Kemampuan Khusus</td><td> : </td><td colspan=4>
<!--<input type="text" name="kemampuan_khusus" value="<?PHP if(@$_GET['kemampuan_khusus'] <> "") { ECHO "$_GET[kemampuan_khusus]"; } ?>">-->
<textarea  name=kemampuan_khusus onBlur="javascript:{this.value = this.value.toUpperCase();}"><?PHP if(@$_GET['kemampuan_khusus'] <> "") { ECHO "$_GET[kemampuan_khusus]"; } ?></textarea>
</td></tr>
<tr><td>15.</td><td>Speaking ability</td><td> : </td>
	<td>
		<input type="radio" <?PHP if(@$_GET['berbicara'] <> "") { if($_GET['berbicara'] == "Average/Poor") { echo "checked"; } } ?> name="berbicara" value='Average/Poor'> Average/Poor
	</td><td>	<input type="radio" <?PHP if(@$_GET['berbicara'] <> "") { if($_GET['berbicara'] == "Middle") { echo "checked"; } } ?> name="berbicara" value='Middle'> Middle
		<input type="radio" <?PHP if(@$_GET['berbicara'] <> "") { if($_GET['berbicara'] == "Good") { echo "checked"; } } ?> name="berbicara" value='Good'> Good
	</td>
</tr>
<tr><td>16.</td><td>Communication skills</td><td> : </td>
	<td>
		<input type="radio" <?PHP if(@$_GET['komunikasi'] <> "") { if($_GET['komunikasi'] == "Average/Poor") { echo "checked"; } } ?> name="komunikasi" value='Average/Poor'> Average/Poor
	</td><td>	<input type="radio" <?PHP if(@$_GET['komunikasi'] <> "") { if($_GET['komunikasi'] == "Middle") { echo "checked"; } } ?> name="komunikasi" value='Middle'> Middle
		<input type="radio" <?PHP if(@$_GET['komunikasi'] <> "") { if($_GET['komunikasi'] == "Good") { echo "checked"; } } ?> name="komunikasi" value='Good'> Good
	</td>
</tr>
<tr><td>17.</td><td>Performance</td><td> : </td>
	<td>
		<input type="radio" <?PHP if(@$_GET['performance'] <> "") { if($_GET['performance'] == "Average/Poor") { echo "checked"; } } ?> name="performance" value='Average/Poor'> Average/Poor
		</td><td><input type="radio" <?PHP if(@$_GET['performance'] <> "") { if($_GET['performance'] == "Middle") { echo "checked"; } } ?> name="performance" value='Middle'> Middle
		<input type="radio" <?PHP if(@$_GET['performance'] <> "") { if($_GET['performance'] == "Good") { echo "checked"; } } ?> name="performance" value='Good'> Good
		</td></tr>
		<tr><td></td><Td></td><td></td><td colspan=4>Berat : <input type="text" name="berat_badan"  value="<?php 
		if(@$_GET['berat_badan'] <> "")	{	echo "$_GET[berat_badan]"; } else {	echo "$cet_siswa[berat_badan]";	} ?>"> Tinggi : <input type="text" name="tinggi_badan" value="<?php 	if(@$_GET['tinggi_badan'] <> "")	{	echo "$_GET[tinggi_badan]"; } else { echo "$cet_siswa[tinggi_badan]"; } ?>" >
	</td>
</tr>

<tr><td>18.</td><td>Dijanjikan Kerja</td><td> : </td>
	<td>
		<input type="radio" <?PHP if(@$_GET['dijanjikan'] <> "") { if($_GET['dijanjikan'] == "Ya") { echo "checked"; } } ?> name="dijanjikan" value='Ya'> Ya 
	</td><td>	<input type="radio" <?PHP if(@$_GET['dijanjikan'] <> "") { if($_GET['dijanjikan'] == "Tidak") { echo "checked"; } } ?> name="dijanjikan" value='Tidak'> Tidak
	</td>
</tr>
<tr><td>19.</td><td>Status</td><td> : </td>
	<td>
	<input type="radio" <?PHP if(@$_GET['status'] <> "") { if($_GET['status'] == "Diterima") { echo "checked"; } } ?> name="status" value='Diterima'> Diterima
	</td><td><input type="radio" <?PHP if(@$_GET['status'] <> "") { if($_GET['status'] == "Tidak Diterima") { echo "checked"; } } ?> name="status" value='Tidak Diterima'> Tidak Diterima
	</td>
</tr>
<tr><td>20.</td><td>Diterima Program</td><td> : </td>
	<td>
	
	<input type="radio" <?PHP 
	if(@$_GET['diterima_jurusan'] <> "") 
	{ 
		if($_GET['diterima_jurusan'] == "Pramugari") { echo "checked"; }
	} 
	else
	{
		if($jurusan == "Pramugari") { echo "checked"; }
	}
	
	?> name="diterima_jurusan" value='Pramugari'> Pramugari
	
	</td><td>	<input type="radio"  <?PHP if(@$_GET['diterima_jurusan'] <> "") { if($_GET['diterima_jurusan'] == "Staff Penerbangan") { echo "checked"; } } else
	{
		if($jurusan == "Staff Penerbangan") { echo "checked"; }
	} ?> name="diterima_jurusan" value='Staff Penerbangan'> Staff Penerbangan
		<input type="radio" <?PHP if(@$_GET['diterima_jurusan'] <> "") { if($_GET['diterima_jurusan'] == "AVSEC") { echo "checked"; } } else
	{
		if($jurusan == "AVSEC") { echo "checked"; }
	} ?> name="diterima_jurusan" value='AVSEC'> AVSEC
	</td>
</tr>
<tr><td>21.</td><td>Kampus</td><td> : </td>
	<td>
		<input type="radio" 
		<?PHP 
		if(@$_GET['diterima_kampus'] <> "")
		{ 
			if($_GET['diterima_kampus'] == "PSPP Lampung") 
			{ echo "checked"; } }
else
{
	if($cet_siswa['Tempat_Kuliah'] == "PSPP Lampung") 
			{ echo "checked"; }
}	?> name="diterima_kampus" value='PSPP Lampung'>PSPP Lampung
	</td><td>	<input type="radio" <?PHP if(@$_GET['diterima_kampus'] <> "") {
		if($_GET['diterima_kampus'] == "PSPP Jakarta") { echo "checked"; } } 
		else
{
	if($cet_siswa['Tempat_Kuliah'] == "PSPP Jakarta") 
			{ echo "checked"; }
}
		?> name="diterima_kampus" value='PSPP Jakarta'>PSPP Jakarta
		<input type="radio" <?PHP if(@$_GET['diterima_kampus'] <> "")
			{ if($_GET['diterima_kampus'] == "PSPP Yogyakarta") { echo "checked"; } }
	else
{
	if($cet_siswa['Tempat_Kuliah'] == "PSPP Yogyakarta") 
			{ echo "checked"; }
}
		?> name="diterima_kampus" value='PSPP Yogyakarta'>PSPP Yogyakarta
		<input type="radio" <?PHP if(@$_GET['diterima_kampus'] <> "") 
		{ if($_GET['diterima_kampus'] == "PSPP Makassar") { echo "checked"; } }
else
{
	if($cet_siswa['Tempat_Kuliah'] == "PSPP Makassar") 
			{ echo "checked"; }
}
	?> name="diterima_kampus" value='PSPP Makassar'>PSPP Makassar
	</td>
</tr>
<tr><td>22.</td><td>Angkatan</td><td> : </td>
	<td colspan=4>
<select name="diterima_angkatan">
<option <?php if(@$_GET['diterima_angkatan'] == "") { if($angkatan == "Februari 2015") { echo "selected"; } } else { if($_GET['diterima_angkatan'] == "Februari 2015") { echo "selected"; } } ;?> value="Februari 2015">Februari 2015</option>
<option <?php if(@$_GET['diterima_angkatan'] == "") { if($angkatan == "Juni 2015") { echo "selected"; } } else { if($_GET['diterima_angkatan'] == "Juni 2015") { echo "selected"; } } ;?> value="Juni 2015">Juni 2015</option>
<option <?php if(@$_GET['diterima_angkatan'] == "") { if($angkatan == "Oktober 2015") { echo "selected"; } } else { if($_GET['diterima_angkatan'] == "Oktober 2015") { echo "selected"; } } ;?> value="Oktober 2015">Oktober 2015</option>

<option <?php if(@$_GET['diterima_angkatan'] == "") { if($angkatan == "Februari 2016") { echo "selected"; } } else { if($_GET['diterima_angkatan'] == "Februari 2016") { echo "selected"; } } ;?> value="Februari 2016">Februari 2016</option>
<option <?php if(@$_GET['diterima_angkatan'] == "") { if($angkatan == "Juni 2016") { echo "selected"; } } else { if($_GET['diterima_angkatan'] == "Juni 2016") { echo "selected"; } } ;?> value="Juni 2016">Juni 2016</option>
<option <?php if(@$_GET['diterima_angkatan'] == "") { if($angkatan == "Oktober 2016") { echo "selected"; } } else { if($_GET['diterima_angkatan'] == "Oktober 2016") { echo "selected"; } } ;?> value="Oktober 2016">Oktober 2016</option>

<option <?php if(@$_GET['diterima_angkatan'] == "") { if($angkatan == "Februari 2017") { echo "selected"; } } else { if($_GET['diterima_angkatan'] == "Februari 2017") { echo "selected"; } } ;?> value="Februari 2017">Februari 2017</option>
<option <?php if(@$_GET['diterima_angkatan'] == "") { if($angkatan == "Juni 2017") { echo "selected"; } } else { if($_GET['diterima_angkatan'] == "Juni 2017") { echo "selected"; } } ;?> value="Juni 2017">Juni 2017</option>
<option <?php if(@$_GET['diterima_angkatan'] == "") { if($angkatan == "Oktober 2017") { echo "selected"; } } else { if($_GET['diterima_angkatan'] == "Oktober 2017") { echo "selected"; } } ;?> value="Oktober 2017">Oktober 2017</option>
</select>
		<!--<input type="text" name="diterima_angkatan" value="<?PHP if(@$_GET['diterima_angkatan'] == "") 
		{
				echo "$cet_siswa[Jurusan]";
		}
		else

		{ ECHO "$_GET[diterima_angkatan]"; } 
		
		
		?>">-->
	    	Marketing : <input type="text" name="marketing" value="<?PHP echo "$arai_marketing[nama]";?>" readonly>
	</td>
</tr>
<tr><td>23.</td><td>Catatan Interview</td><td> : </td>
	<td>
		<input type="radio" <?PHP if(@$_GET['jalur_interview'] <> "") { if($_GET['jalur_interview'] == "Datang Langsung") { echo "checked"; } } ?> name="jalur_interview" value='Datang Langsung'> Datang Langsung
	</td><td>	<input type="radio" <?PHP if(@$_GET['jalur_interview'] <> "") { if($_GET['jalur_interview'] == "Online") { echo "checked"; } } ?> name="jalur_interview" value='Online'> Online
	</td>
</tr>
<tr><td></td><td ></td><td></td><td colspan=4><!--
<input  type="text" name="catatan" value="<?PHP if(@$_GET['catatan'] <> "") { ECHO "$_GET[catatan]"; } ?>">-->
<textarea  name=catatan onBlur="javascript:{this.value = this.value.toUpperCase();}"><?PHP if(@$_GET['catatan'] <> "") { ECHO "$_GET[catatan]"; } ?></textarea>
</td></tr>

</table>

<TABLE WIDTH="100%">
<tr><td colspan=2>Nama</td><td> : </td> <td colspan=3><input type="text" name=""></tD></tr>
<TR><TD WIDTH="3%">A.</TD><TD>FISIK</TD></TR>
<TR><TD></TD><tD WIDTH="20%">1. &nbsp Gigi</TD><TD width="1%"> : </TD> <TD width="12%"> 
	<input type="radio" <?PHP if(@$_GET['gigi'] <> "") { if($_GET['gigi'] == "Rapi") { echo "checked"; } } ?> name="gigi" value='Rapi'> Rapi
</td><td width="9%">	<input type="radio" <?PHP if(@$_GET['gigi'] <> "") { if($_GET['gigi'] == "Tidak Rapi") { echo "checked"; } } ?> name="gigi" value='Tidak Rapi'> Tidak Rapi
</td><td>	<input type="radio" <?PHP if(@$_GET['gigi'] <> "") { if($_GET['gigi'] == "Memakai Behel") { echo "checked"; } } ?> name="gigi" value='Memakai Behel'> Memakai Behel
</TD></TR>
<TR><TD></TD><tD>2. &nbsp Mata</TD><TD> : </TD> <TD > 
	
	<input type="radio" <?PHP if(@$_GET['mata'] <> "") { if($_GET['mata'] == "Berkacamata") { echo "checked"; } } ?> name="mata" value='Berkacamata'> Berkacamata
</td><td width="9%">	<input type="radio" <?PHP if(@$_GET['mata'] <> "") { if($_GET['mata'] == "Minus") { echo "checked"; } } ?> name="mata" value='Minus'> Minus
	</td><td><input type="radio" <?PHP if(@$_GET['mata'] <> "") { if($_GET['mata'] == "Normal") { echo "checked"; } } ?> name="mata" value='Normal'> Normal
</TD></TR>
<TR><TD></TD><tD>3. &nbsp Bahu</TD><TD> : </TD> <TD> 
	<input type="radio" <?PHP if(@$_GET['bahu'] <> "") { if($_GET['bahu'] == "Sejajar") { echo "checked"; } } ?> name="bahu" value='Sejajar'> Sejajar
</td><td>	<input type="radio" <?PHP if(@$_GET['bahu'] <> "") { if($_GET['bahu'] == "Tidak Sejajar") { echo "checked"; } } ?> name="bahu" value='Tidak Sejajar'> Tidak Sejajar
</TD></TR>
<TR><TD></TD><tD>4. &nbsp Tangan</TD><TD> : </TD> <TD> 
	<input type="radio" <?PHP if(@$_GET['tangan'] <> "") { if($_GET['tangan'] == "Lurus") { echo "checked"; } } ?> name="tangan" value='Lurus'> Lurus
</td><td>	<input type="radio" <?PHP if(@$_GET['tangan'] <> "") { if($_GET['tangan'] == "Tidak Lurus") { echo "checked"; } } ?> name="tangan" value='Tidak Lurus'> Tidak Lurus
</TD></TR>
<TR><TD></TD><tD>5. &nbsp Bekas luka (keloid)</TD><TD> : </TD> <TD> 
	<input type="radio" <?PHP if(@$_GET['bekas_luka'] <> "") { if($_GET['bekas_luka'] == "Ada") { echo "checked"; } } ?> name="bekas_luka" value='Ada'> Ada
</td><td>	<input type="radio" <?PHP if(@$_GET['bekas_luka'] <> "") { if($_GET['bekas_luka'] == "Tidak Ada") { echo "checked"; } } ?> name="bekas_luka" value='Tidak Ada'> Tidak Ada
</TD></TR>
<TR><TD></TD><tD>6. &nbsp Berenang</TD><TD> : </TD> <TD> 
	<input type="radio" <?PHP if(@$_GET['berenang'] <> "") { if($_GET['berenang'] == "Terlatih") { echo "checked"; } } ?> name="berenang" value='Terlatih'> Terlatih
</td><td >	<input type="radio" <?PHP if(@$_GET['berenang'] <> "") { if($_GET['berenang'] == "Biasa") { echo "checked"; } } ?> name="berenang" value='Biasa'> Biasa
</td><td>	<input type="radio" <?PHP if(@$_GET['berenang'] <> "") { if($_GET['berenang'] == "Tidak Bisa") { echo "checked"; } } ?> name="berenang" value='Tidak Bisa'> Tidak Bisa
</TD></TR>
<TR><TD></TD><tD>7. &nbsp Bertato permanen</TD><TD> : </TD> <TD> 
	<input type="radio" <?PHP if(@$_GET['bertato'] <> "") { if($_GET['bertato'] == "Ya") { echo "checked"; } } ?> name="bertato" value='Ya'> Ya
</td><td>	<input type="radio" <?PHP if(@$_GET['bertato'] <> "") { if($_GET['bertato'] == "Tidak") { echo "checked"; } } ?> name="bertato" value='Tidak'> Tidak
</TD></TR>
<TR><TD></TD><tD>8. &nbsp Bentuk kaki</TD><TD> : </TD> <TD> 
	<input type="radio" <?PHP if(@$_GET['bentuk_kaki'] <> "") { if($_GET['bentuk_kaki'] == "Normal") { echo "checked"; } } ?> name="bentuk_kaki" value='Normal'> Normal
</td><td>	<input type="radio" <?PHP if(@$_GET['bentuk_kaki'] <> "") { if($_GET['bentuk_kaki'] == "X") { echo "checked"; } } ?> name="bentuk_kaki" value='X'> X
</td><td>	<input type="radio" <?PHP if(@$_GET['bentuk_kaki'] <> "") { if($_GET['bentuk_kaki'] == "O") { echo "checked"; } } ?> name="bentuk_kaki" value='O'> O
</TD></TR>
<TR><TD></TD><tD>9. &nbsp Takut Ketinggian</TD><TD> : </TD> <TD> 
	<input type="radio" <?PHP if(@$_GET['ketinggian'] <> "") { if($_GET['ketinggian'] == "Ya") { echo "checked"; } } ?> name="ketinggian" value='Ya'> Ya
</td><td>	<input type="radio" <?PHP if(@$_GET['ketinggian'] <> "") { if($_GET['ketinggian'] == "Tidak") { echo "checked"; } } ?> name="ketinggian" value='Tidak'> Tidak
</TD></TR>
<TR><TD></TD><tD>10. Jenis Kulit</TD><TD> : </TD> <TD> 
	<input type="radio" <?PHP if(@$_GET['jenis_kulit'] <> "") { if($_GET['jenis_kulit'] == "Normal") { echo "checked"; } } ?> name="jenis_kulit" value='Normal'> Normal
</td><td>	<input type="radio" <?PHP if(@$_GET['jenis_kulit'] <> "") { if($_GET['jenis_kulit'] == "Kering") { echo "checked"; } } ?> name="jenis_kulit" value='Kering'> Kering
</td><td><input type="radio" <?PHP if(@$_GET['jenis_kulit'] <> "") { if($_GET['jenis_kulit'] == "Berminyak") { echo "checked"; } } ?> name="jenis_kulit" value='Berminyak'> Berminyak
</TD></TR>
<TR><TD></TD><tD>11. Wajah</TD><TD> : </TD> <TD> 
	<input type="radio" <?PHP if(@$_GET['wajah'] <> "") { if($_GET['wajah'] == "Berjerawat") { echo "checked"; } } ?> name="wajah" value='Berjerawat'> Berjerawat
</td><td>	<input type="radio" <?PHP if(@$_GET['wajah'] <> "") { if($_GET['wajah'] == "Bersih") { echo "checked"; } } ?> name="wajah" value='Bersih'> Bersih
</TD></TR>
<TR><TD></TD><tD>12. Penyakit bawaan</TD><TD> : </TD> <TD colspan=3> 
	<input type="text" name="penyakit_bawaan" VALUE="<?PHP if(@$_GET['penyakit_bawaan'] <> "") { echo $_GET['penyakit_bawaan']; } ?>">
</TD></TR>
<TR><TD>B. </TD><tD>Kesanggupan pindah jurusan</TD><TD> : </TD> <TD> 
	<input type="radio" <?PHP if(@$_GET['pindah_jurusan'] <> "") { if($_GET['pindah_jurusan'] == "Ya") { echo "checked"; } } ?> name="pindah_jurusan" value='Ya'> Ya
</td><td>	<input type="radio" <?PHP if(@$_GET['pindah_jurusan'] <> "") { if($_GET['pindah_jurusan'] == "Tidak") { echo "checked"; } } ?> name="pindah_jurusan" value='Tidak'> Tidak
</TD></TR>
<TR><TD>C. </TD><tD>Catatan Khusus</TD><TD> : </TD> <TD colspan=3> 
<textarea  name="catatan_khusus_pramugari" onBlur="javascript:{this.value = this.value.toUpperCase();}"><?PHP if(@$_GET['catatan_khusus_pramugari'] <> "") { echo $_GET['catatan_khusus_pramugari']; } ?></textarea>
<?php /*	<input type="text" name="catatan_khusus_pramugari" VALUE="<?PHP if(@$_GET['catatan_khusus_pramugari'] <> "") { echo $_GET['catatan_khusus_pramugari']; } ?>"> */
?>
</TD></TR>


<tr><td colspan=6>
<?php 
if(@$_GET['cetak'] == "true")
{
echo "<a href='../../system/system/export_interview_pramugari.php?nomor=$_GET[nomor_inter]'>Export Word</a><Br><BR>";
//	echo "<a href='export_interview_pramugari.php?nomor=$_GET[nomor_inter]'>Export Word</a><Br><BR>";
}
else
{ 
	if($cet_siswa['tgl_interview'] == "")
	 {
		 ?><input type="submit" value="simpan"><?php
	 }
	 else
	 {
		 ?><input type="button" onclick="alert('Data siswa tersebut sudah dilakukan interview. Silakan refresh kembali halaman input data interview.')" value="simpan"><?php
	 }
 } ?>
</td></tr>
</TABLE>
</form>
