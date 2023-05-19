<?php 
session_start();
if(empty($_SESSION['id_instruktur']))
{
	echo "<script>window.location='index.php';</script>";
}
include "koneksi.php";
$kueriprofil = mysql_query("select * from akademik_profil_instruktur where id = '$_SESSION[id_instruktur]' ");
$tampilkan = mysql_fetch_array($kueriprofil);
?>

 <script src="js/jquery-1.10.1.min.js"></script>
<script>

//AWAL SCRIPT UNTUK MENAMPILKAN PILIHAN COMBO KELAS  
var htmlobjek;
$(document).ready(function()
{
	$("#kelas").change(function(){
	var kelas = $("#kelas").val();
	$.ajax({
	url: "action.php?pil=materi",
	data: "kelas="+kelas,
	cache: false,
	success: function(msg){

	$("#materi").html(msg);
	}
	});
	});
});
//AKHIR SCRIPT UNTUK MENAMPILKAN PILIHAN COMBO KELAS  
  </script>
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	
	border-width: 1px;
	border-color: #85af5d;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #85af5d;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #85af5d;
}
</style>
<?php 
	 switch ($_GET['pil'])
{
	
// #########################################################################
 	// #########################################################################
// AWAL TAMPILAN PENAGTURAN PROFIL  
 case "profil":
 ?>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/colors/magenta.css">
 <div class="contactform">
	<?php
$kueriprofil = mysql_query("select * from akademik_profil_instruktur where id = '$_SESSION[id_instruktur]' ");
$tampilkan = mysql_fetch_array($kueriprofil);
?>	
  <form action="action.php?pil=saveprofil" method="post" enctype="multipart/form-data" >
               
                <label>Nama:</label>
                <input type="text" name="nama" value="<?php echo "$tampilkan[nama]";?>" class="form_input" />
			

                <label>Alamat:</label>
                <textarea name="alamat" class="form_textarea" rows="" cols=""><?php echo "$tampilkan[alamat]";?></textarea>
			
				
				<label>HP:</label>
                <input type="text" name="hp" value="<?php echo "$tampilkan[hp]";?>" class="form_input" />
				
			
			
                <input type="submit" name="submit" class="form_submit" id="submit" value="Simpan" />
                </form>
			</div>	
 <?php
 break;
 // #########################################################################
// SCRIPT PENYIMPANAN EDIT PROFIL 
 case "saveprofil":
 $nama = $_POST['nama'];

$nohp = $_POST['hp'];
$alamat = $_POST['alamat'];


$s = mysql_query("update akademik_profil_instruktur set nama = '$nama',hp = '$nohp', alamat = '$alamat' where id = '".$_SESSION['id_instruktur']."'") ;
	
echo "<script>alert('Data tersimpan!'); window.location='?pil=profil&pesan=DataTersimpan';</script>";
 BREAK;

 // #########################################################################
// AWAL TAMPILAN UBAH PASSWORD  
 case "password":?>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/colors/magenta.css">

<div class="contactform">
                <form  action="action.php?pil=savepassword" method="post" enctype="multipart/form-data">
                
                <label>Password Lama :</label>
                <input type="text" name="lama" value="" class="form_input" />
				
				<label>Password baru :</label>
                <input type="text" name="baru" value="" class="form_input" />

                
				
                <input type="submit" name="submit" class="form_submit" id="submit" value="UBAH" />
                
			   </form>
                </div>
 <?php BREAK;
 
  // #########################################################################
// SCRIPT UBAH PASSWORD
 case "savepassword":


$passwordbaru = $_POST['baru'];

$passwordlama = $_POST['lama'];

$cek = mysql_query("select * from akademik_profil_instruktur where  password = '".$passwordlama."' and id = '".$_SESSION['id_instruktur']."' ");
$cekhit = mysql_num_rows($cek);
if( $cekhit == 0){
	?>
	<h4><?php
	echo "<script>alert('Anda tidak bisa mengubah password karna pasword lama anda tidak valid');window.location='?pil=password';</script>";
	
	//secho "Anda tidak bisa mengubah password karna pasword lama anda tidak valid";
	?></h4>
	<?php
}
else{
	
$sql = "update akademik_profil_instruktur set password = '".$passwordbaru."' where id = '".$_SESSION['id_instruktur']."'";
$kue = mysql_query($sql); 
if($kue == true){
	 echo "<script>alert('Selamat, pasword anda berhasil diganti menjadi $passwordbaru');window.location='?pil=password';</script>";
	//echo "Selamat, pasword anda berhasil diganti menjadi $passwordbaru";
}
else
{
	 echo "<script>window.location='?pil=password';</script>";
}

}
	
 BREAK;
 	
case "tampilsoal": ?>
	
	Input soal angkatan <?php echo "$_SESSION[angkatan]";?> Ujian Ke <?php echo "$_SESSION[ujian_ke]";?> berakhir pada tanggal <?PHP
	$bulan = date('m', strtotime($_SESSION['tgl_batas']));
	$thnb = date('Y', strtotime($_SESSION['tgl_batas']));
	echo $tglb = date('d', strtotime($_SESSION['tgl_batas']));

	$araibulan = array('01' => 'Januari','02' => 'Febrari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember');	
	echo " $araibulan[$bulan] $thnb";
	?>. Pastikan anda menginput soal sebelum tanggal tersebut.<br><br>
	<?PHP 
	$tglsekarang = date('Y-m-d'); 

	//IF($tglsekarang < $tgl_batas)
	IF($tglsekarang < $_SESSION['tgl_batas'])
	{
			//echo "<a href='action.php?pil=input_soal'>TAMBAH SOAL</a>";
		?><input type="button" onclick="window.location='action.php?pil=input_soal';" value="TAMBAH SOAL"><?PHP
		
	}
	?>
	<BR><BR>Pertanyaan dan Jawaban
	<TABLE class=altrowstable>
		<TR><TD bgcolor="">NO</TD><TD>UJIAN</TD><TD>MATERI</TD><TD>PERTANYAAN</TD><TD>JAWABAN A</TD><TD>JAWABAN B</TD><TD>JAWABAN C</TD><TD>JAWABAN D</TD><TD>JAWABAN E</TD><TD>JAWABAN BENAR</TD><TD>TANGGAL SUBMIT</TD></TR>
		<?php 
		$n = 1;
		$kuerisoal = mysql_query("select * from banksoal where diinput_oleh ='$_SESSION[id_instruktur]' and batch = '$_SESSION[angkatan]' and materi like '%$_SESSION[ujian_ke]%' order by soalid desc");
		$kueripegawai = mysql_query("select * from akademik_profil_instruktur where id ='$_SESSION[id_instruktur]'");
		$cetakpegawai = mysql_fetch_array($kueripegawai);
		$cekjum = mysql_num_rows($kuerisoal);
		if($cekjum < 1 )
		{
			echo "<tr><td colspan='12' bgcolo'#FFFFFFF' align=center>Belum ada soal</td></tr>";
		}
		else
		{
			while($cetaksoal = mysql_fetch_array($kuerisoal))
			{ 
			@$i+=1;
			$sisa=$i%2;
			if ($sisa == 0) 
			{ $warnanya = '#FFFFFFF'; }
			else 
			{  $warnanya = '#E6E6E6';  }
			echo "<tr><td bgcolor='$warnanya'>$n</td><td bgcolor='$warnanya'>$cetaksoal[materi]</td><td bgcolor='$warnanya'>$cetaksoal[sub_materi]</td><td bgcolor='$warnanya'>$cetaksoal[pertanyaan]</td><td bgcolor='$warnanya'>$cetaksoal[pilihan_a]</td><td bgcolor='$warnanya'>$cetaksoal[pilihan_b]</td><td bgcolor='$warnanya'>$cetaksoal[pilihan_c]</td><td bgcolor='$warnanya'>$cetaksoal[pilihan_d]</td><td bgcolor='$warnanya'>$cetaksoal[pilihan_e]</td><td bgcolor='$warnanya'>$cetaksoal[jawaban]</td><td bgcolor='$warnanya'>$cetaksoal[tgl_submit]</td></tr>";
			$n++;
			} 
		} ?>
	</TABLE><?PHP
break;

case "input_soal":
	$kuerisoal2 = mysql_query("select * from banksoal_temp where diinput_oleh ='$_SESSION[id_instruktur]' and batch = '$_SESSION[angkatan]' and materi like '%$_SESSION[ujian_ke]%' order by soalid asc");
	$isitbl2 = mysql_num_rows($kuerisoal2);
	$cetakkelas = mysql_fetch_array($kuerisoal2);
	?>
	<script type="text/javascript">
function cek(form){


if (form.kelas.value == ""){
alert("Anda belum memilih Kelas");
form.kelas.focus();
return (false);
}
if (form.materi.value == ""){
alert("Anda belum memilih Materi");
form.materi.focus();
return (false);
}
if (form.pertanyaan.value == ""){
alert("Anda belum mengisikan Pertanyaan");
form.pertanyaan.focus();
return (false);
}
if (form.pilihana.value == ""){
alert("Anda belum mengisikan pilihan A");
form.pilihana.focus();
return (false);
}

if (form.pilihanb.value == ""){
alert("Anda belum mengisikan pilihan B");
form.pilihanb.focus();
return (false);
}

if (form.pilihanc.value == ""){
alert("Anda belum mengisikan pilihan C");
form.pilihanc.focus();
return (false);
}

if (form.pilihand.value == ""){
alert("Anda belum mengisikan pilihan D");
form.pilihand.focus();
return (false);
}


if((form.jawaban[0].checked == false) && (form.jawaban[1].checked == false) && (form.jawaban[2].checked == false) && (form.jawaban[3].checked == false) && (form.jawaban[4].checked == false))
{
	alert("Anda belum memilih jawaban");
	return (false);
}
return (true);
}
</script>
	<input type="button" onclick="window.location='action.php?pil=tampilsoal';" value="KEMBALI">
	
		<br><Br>
	PENYIMPANAN SOAL SEMENTARA<BR>
	<TABLE class=altrowstable>
		<TR><TD>NO</TD><TD>UJIAN</TD><TD>MATERI</TD><TD>PERTANYAAN</TD><TD>JAWABAN A</TD><TD>JAWABAN B</TD><TD>JAWABAN C</TD><TD>JAWABAN D</TD><TD>JAWABAN E</TD><TD>JAWABAN BENAR</TD></TR>
		<?php 
		$n = 1;
		$kuerisoal = mysql_query("select * from banksoal_temp where diinput_oleh ='$_SESSION[id_instruktur]' and batch = '$_SESSION[angkatan]' and materi like '%$_SESSION[ujian_ke]%' order by soalid desc");
		$isitbl = mysql_num_rows($kuerisoal);
		$kueripeg = mysql_query("select * from akademik_profil_instruktur where id ='$_SESSION[id_instruktur]'");
		$cetakpeg = mysql_fetch_array($kueripeg);
		if($isitbl < 1)
		{
			echo "<tr><td colspan='10' bgcolor='#FFFFFFF' align=center><h4>Belum ada soal</h4></td></tr>";
		}
		else
		{
			while($cetaksoal = mysql_fetch_array($kuerisoal))
			{ 
			@$i+=1;
			$sisa=$i%2;
			if ($sisa == 0) 
			{ $warnanya = '#FFFFFFF'; }
			else {  $warnanya = '#E6E6E6';  }
			echo "<tr><td bgcolor='$warnanya'>$n</td><td bgcolor='$warnanya'>$cetaksoal[materi]</td><td bgcolor='$warnanya'>$cetaksoal[sub_materi]</td><td bgcolor='$warnanya'>$cetaksoal[pertanyaan]</td><td bgcolor='$warnanya'>$cetaksoal[pilihan_a]</td><td bgcolor='$warnanya'>$cetaksoal[pilihan_b]</td><td bgcolor='$warnanya'>$cetaksoal[pilihan_c]</td><td bgcolor='$warnanya'>$cetaksoal[pilihan_d]</td><td bgcolor='$warnanya'>$cetaksoal[pilihan_e]</td><td bgcolor='$warnanya'>$cetaksoal[jawaban]</td></tr>";
			$n++;
			}
		} ?>
	</TABLE><BR>
	<?php if($isitbl > 1 ) { ?>
	<input type="button" onclick="window.location='action.php?pil=submit_soal';" value="SUBMIT SOAL">
 <?php }
else
{
	?><input type="button" onclick="alert('Maaf anda belum bisa mensubmit soal. Agar soal bisa tersubmit, anda harus menginputkan minimal 2 soal.')" value="SUBMIT SOAL"><?php
}
	
	if($isitbl > 0 ) //JIKA DI TABEL BANKSOALTEMP BELUM ADA SOAL JANGAN TAMPILKAN TOMBOL BATAL TERSEBUT
	{ ?>
	<script language="javascript">
	function batal()
	{ tanya=confirm("Soal yang belum tersubmit akan terhapus jika anda membatalkan, anda yakin ingin membatalkan ?")
		if (tanya !="0")
		{ window.location="action.php?pil=delete_soal" }
	}
	</script>
<input type="button" onclick="batal()" value="BATAL">
	<?php } ?><br>
	 <div class="contactform">
	 <h3>Silakan Input Soal melalui form dibawah ini : </h3>
	<FORM action="action.php?pil=simpan_soal" enctype="multipart/form-data" method="post" onSubmit="return cek(this)">
		Kelas<br>
		<select name="kelas" id="kelas"><?php 
			if($isitbl2 > 0 )
			{
				$kelasnya = "$cetakkelas[materi]";
				$ambilkelas = substr($kelasnya , 0, 3);
				if($ambilkelas == "PRA")
				{
					$cetakkelasnya = "PRAMUGARI";
				}
				ELSE IF($ambilkelas == "STA")
				{
					$cetakkelasnya = "STAFF-PENERBANGAN";
				}
				ELSE IF($ambilkelas == "AVI")
				{
					$cetakkelasnya = "AVIATION-SECURITY";
				}
				?>
				<option value="<?php echo "$cetakkelasnya";?>"><?php echo "$cetakkelasnya";?></option><?php
			}
			else
			{ ?>
				<option value="">Pilihan Kelas</option><option value="PRAMUGARI">PRAMUGARI</option><option value="STAFF PENERBANGAN">STAFF PENERBANGAN</option><option value="AVSEC">AVIATION SECURITY</option><?php 
			} ?>
		</select><BR>
		Materi<br>
		<select name="materi" id="materi"><?php 
			if($isitbl2 > 0 )
			{
				?><option value="<?php echo "$cetakkelas[sub_materi]";?>"><?php echo "$cetakkelas[sub_materi]";?></option><?php
			}
			else
			{
				?><option value="">Pilih Kelas Dahulu</option><?php 
			
			} ?>
		</select>
		<br>
		Pertanyaan :<br><textarea name="pertanyaan"></textarea><br>
		Piihan A :<br><textarea name="pilihana" class="form_textarea"></textarea><BR>Piihan B :<br><textarea name="pilihanb"></textarea><BR>Piihan C :<br><textarea name="pilihanc"></textarea><BR>Piihan D :<br><textarea name="pilihand"></textarea><BR>Piihan E :<br><textarea name="pilihane"></textarea><BR>
		Jawaban Benar :<br><BR><input type="radio" name="jawaban" value="a" >A <input type="radio" name="jawaban" value="b">B <input type="radio" name="jawaban" value="c">C <input type="radio" name="jawaban" value="d">D <input type="radio" name="jawaban" value="e">E<br/>  
		<INPUT TYPE="SUBMIT" VALUE="SIMPAN SOAL">
	</FORM> </div>

<?php
break;

case "simpan_soal" :
	//$kueriujian = mysql_query("select * from config_app_input_soal_ujian where tanggal_berlaku_aplikasi ='$tgl_batas'");
	$kueriujian = mysql_query("select * from config_app_input_soal_ujian where tanggal_berlaku_aplikasi ='$_SESSION[tgl_batas]'");
	$cetakujian = mysql_fetch_array($kueriujian);
	//AWAL QUERY UNTUK MENCARI NO ID BANK SOAL TTEMP
	$kuerino = mysql_query("select max(soalid) as no from banksoal_temp");
	$cetakno = mysql_fetch_array($kuerino);
	$no = $cetakno['no'] + 1;
	//AKHIR QUERY UNTUK MENCARI NO ID BANK SOAL TTEMP
	//AWAL SCRIPT MENGHITUNG JUMLAH SOAL DI TABEL BANK SOAL TEMP
	$kueritemp = mysql_query("select * from banksoal_temp where diinput_oleh ='$_SESSION[id_instruktur]' and batch = '$_SESSION[angkatan]' and materi like '%$_SESSION[ujian_ke]%' order by soalid asc");
	$isitbltemp = mysql_num_rows($kueritemp);
	//AKHIR SCRIPT MENGHITUNG JUMLAH SOAL DI TABEL BANK SOAL TEMP
	if($isitbltemp > 0 )
	{
		$kelas = $_POST['kelas'];
	}
	else
	{
		IF($_POST['kelas'] == "PRAMUGARI")
		{
			$kelas = "PRAMUGARI";
		}
		ELSE IF($_POST['kelas'] == "STAFF PENERBANGAN")
		{
			$kelas = "STAFF-PENERBANGAN";
		}
		ELSE IF($_POST['kelas'] == "AVSEC")
		{
			$kelas = "AVIATION-SECURITY";
		}
	}
	//$kelas = $_POST['kelas'];
	
	$materi = $_POST['materi'];$pertanyaan = $_POST['pertanyaan'];$pilihana = $_POST['pilihana'];$pilihanb = $_POST['pilihanb'];$pilihanc = $_POST['pilihanc'];$pilihand = $_POST['pilihand'];$pilihane = $_POST['pilihane'];$jawaban = $_POST['jawaban'];
	
	$cek = mysql_query("insert into banksoal_temp (soalid,materi,pertanyaan,pilihan_a,pilihan_b,pilihan_c,pilihan_d,pilihan_e,jawaban,sub_materi,input_dari,batch,diinput_oleh ) values ('$no',
	'$kelas-Ujian-$cetakujian[ujian_aktif_ke]',
	'$pertanyaan','$pilihana','$pilihanb','$pilihanc','$pilihand','$pilihane','$jawaban','$materi','$_SESSION[unit_instruktur]','$cetakujian[angkatan_aktif]','$_SESSION[id_instruktur]')");
	echo "<script>window.location='action.php?pil=input_soal';</script>";
break;

case "delete_soal":
	mysql_query("delete  from banksoal_temp where diinput_oleh ='$_SESSION[id_instruktur]'");
	echo "<script>window.location='action.php?pil=input_soal';</script>";
break;
case "submit_soal":
	$tglsekarang = date('Y-m-d');
	$kuerisoal = mysql_query("select * from banksoal_temp where diinput_oleh ='$_SESSION[id_instruktur]'");
	$cek = mysql_num_rows($kuerisoal);
	while($cetaksoal = mysql_fetch_array($kuerisoal))
	{
		$kuerinosoal = mysql_query("select max(soalid) as noid from banksoal");
		$nosoal = mysql_fetch_array($kuerinosoal);
		$cetaknomorsoal =$nosoal['noid'] + 1;
		mysql_query("insert into banksoal (soalid,input_dari,batch,materi,pilihan_a,pilihan_b,pilihan_c,pilihan_d,pilihan_e,jawaban,sub_materi,tgl_submit,pertanyaan,diinput_oleh) values 	('$cetaknomorsoal','$cetaksoal[input_dari]','$cetaksoal[batch]','$cetaksoal[materi]','$cetaksoal[pilihan_a]','$cetaksoal[pilihan_b]','$cetaksoal[pilihan_c]','$cetaksoal[pilihan_d]','$cetaksoal[pilihan_e]','$cetaksoal[jawaban]','$cetaksoal[sub_materi]','$tglsekarang',	'$cetaksoal[pertanyaan]','$cetaksoal[diinput_oleh]')");
		mysql_query("delete from banksoal_temp where soalid ='$cetaksoal[soalid]'");
	}
	echo "<script>window.location='action.php?pil=tampilsoal';</script>";
break;
case "materi":
	//AWAL QUERI UNTUK MENAMPILKAN MATERI DARI PILIHAN KELAS
	$kuerimateri = mysql_query("select * from akademik_mata_kuliah where prodi ='$_GET[kelas]'");
	while($cetakmateri = mysql_fetch_array($kuerimateri))
	{ 
		echo "<option value='$cetakmateri[mata_kuliah]'>$cetakmateri[mata_kuliah]</option>";
	}
	//AKHIR QUERI UNTUK MENAMPILKAN MATERI DARI PILIHAN KELAS
break;
case "jadwal": 
	//AWAL SCRIPT UNTUK MENCARI TANGGALA MINGUDEPAN DAN MINGGU LALU
	$tgl = date('Y-m-d');
	$sebelum = strtotime(date("Y-m-d", strtotime($tgl)) . " -1 week");
	$tsebelum = date("Y-m-d", $sebelum);
	$depan = strtotime(date("Y-m-d", strtotime($tgl)) . " +1 week");
	$tdepan = date("Y-m-d", $depan);
	//AKHIR SCRIPT UNTUK MENCARI TANGGALA MINGUDEPAN DAN MINGGU LALU
	$no = 1;
	echo "<table class='altrowstable'><tr><td>No</td><td>Tanggal Mengajar</td><td>Jam Mengajar</td><td>Sesi</td><td>Matakuliah</td><td>Prodi</td><td>Kelas</td></tr>";
	$kuerijadwal = mysql_query("select * from akademik_laporan_kbm where instruktur = '$_SESSION[id_instruktur]' and tanggal between '$tsebelum' and '$tdepan' order by tanggal desc ");
	$cekjadwal = mysql_num_rows($kuerijadwal);
	if($cekjadwal < 1)
	{
		echo "<tr align=center><td colspan=6>Belum ada jadwal</td></tr>";
	}
	else
	{
		while($cetakjadwal = mysql_fetch_array($kuerijadwal))
		{
		//AWAL  SCRIPT UNTUK MEBUAT WARNA RECORD TABLE
		@$i+=1;
		$sisa=$i%2;
		if ($sisa == 0) 
		{ $warnanya = '#FFFFFFF'; }
		else {  $warnanya = '#E6E6E6';  }
		//AKHIR  SCRIPT UNTUK MEBUAT WARNA RECORD TABLE
		echo "<tr><td>$no</td><td>$cetakjadwal[tanggal]</td><td>$cetakjadwal[jam]</td><td>$cetakjadwal[sesi]</td><td>$cetakjadwal[mata_kuliah]</td><td>$cetakjadwal[prodi]</td><td>$cetakjadwal[kelas]</td></tr>";
		$no++;
		}
	}
	echo "</table>";
break;
}
?>