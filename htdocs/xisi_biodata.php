<?php 
@session_start();
include "system/system/konek.php";
$tgls=date("Y-m-d H:i:s");

$URL_REF = parse_url($_SERVER['HTTP_REFERER']); $URL_REF_HOST= $URL_REF['host'];

if ($URL_REF_HOST <> "localhost" and $URL_REF_HOST<>"www.pspp-integrated.com")
{
	
	$query = mysql_query("select * from domain where domain='$URL_REF_HOST'");	
	while($b=mysql_fetch_row($query)){	$status=$b[3];	}

	if ($status=="BLOCK")
	{
		echo "<font color=red>Sorry, your site was blocked. Please contact administrator..<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></font>";
		mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$URL_REF_HOST (BLOKED SITE) trying connect to PSPP-Integrated.com')");
	} 
	elseif ($status=="" || empty($status))
	{
		echo "<font color=red>Formulir ditutup! Anda menggunakan URL tidak wajar!<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></font>";
		mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$URL_REF_HOST (PHISING URL) trying connect to PSPP-Integrated.com')");
	} 
} 
else
{
	
?>
<link href="plugin_tanggal/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="plugin_tanggal/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<script type="text/javascript" src="system/js/jquery-1.10.2.min.js"></script>
<link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">
    
<script type="text/javascript">
$(document).ready(function(){
	  $("#tgllahir").datepicker({
		altFormat : "dd MM yy",
		changeMonth : true,
		changeYear : true
		});
	  $( "#tgllahir").change(function(){
		  $( "#tgllahir").datepicker( "option", "dateFormat","mm/dd/yy");
		  
	  });
  }
  
  );
  
    $(document).ready(function(){
	  $("#tgl_awal").datepicker({
		altFormat : "dd MM yy",
		changeMonth : true,
		changeYear : true
		});
	  $( "#tgl_awal").change(function(){
		  $( "#tgl_awal").datepicker( "option", "dateFormat","yy-mm-dd");
		  
	  });
  }
  
  );
  
window.onload=function(){
$('#tgllahir').on('change', function() {
var dob = new Date(this.value);
var today = new Date();
var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
$('#umur').val(age);

});
}
function tampil(select){
	var selectedOption =select.options[select.selectedIndex];
		
if(selectedOption.value == "Perempuan" ){
	
	document.getElementById("cetak").innerHTML = ('<label>Mengenakan Jilbab :</label> <select name="jilbab" ><option>Tidak</option><option>Ya</option></select>');
}

else {
	document.getElementById("cetak").innerHTML = ('<input type="hidden" name="jilbab" value="Tidak"> ');
}
//else if {
//	document.getElementById("demo1").innerHTML = ('');
//}

}
</script>






<script type="text/javascript" src="jquery.js"></script>


<script>
	function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggest.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}
	
	function fill(thisValue) {
		$('#country').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 100);
	}
	
	function fill2(thisValue) {
		$('#kode').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 100);
	}
	
	function fill3(thisValue) {
		$('jenjang').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 100);
	}
	
	function fill4(thisValue) {
		$('kota').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 100);
	}	
	
	function fill5(thisValue) {
		$('provinsi').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 100);
	}	

	</script>
	
	<style>
	#result {
		height:20px;
		font-size:12px;
		font-family:Arial, Helvetica, sans-serif;
		color:#333;
		padding:5px;
		margin-bottom:10px;
		background-color:#FFFF99;
	}
	#country{
		padding:3px;
		border:1px #CCC solid;
		font-size:12px;
	}
	.suggestionsBox {
		position: absolute;
		left: 0px;
		top:40px;
		margin: 26px 0px 0px 0px;
		width: 200px;
		padding:0px;
		background-color:#999999;
		border-top: 3px solid #999999;
		color: #fff;
	}
	.suggestionList {
		margin: 0px;
		padding: 0px;
	}
	.suggestionList ul li {
		list-style:none;
		margin: 0px;
		padding: 6px;
		border-bottom:1px dotted #666;
		cursor: pointer;
	}
	.suggestionList ul li:hover {
		background-color: #FC3;
		color:#000;
	}
	ul {
		font-family:Arial, Helvetica, sans-serif;
		font-size:11px;
		color:#FFF;
		padding:0;
		margin:0;
	}
	
	.load{
	background-image:url(loader.gif);
	background-position:right;
	background-repeat:no-repeat;
	}
	
	#suggest {
		position:relative;
	}
	</style>
	

<style>
.resizedimages {max-height: 200px; max-width: 200px}
</style>

<?php

if (@$_GET['from']=="")
{ 

	if ($_SESSION['idpendaftaran']==$_GET['id'])
	{

		$query = mysql_query("SELECT * FROM siswa WHERE id='$_GET[id]'");
		while($b = mysql_fetch_array($query))
		{ 	?>
	<script>
function validateForm() {


	    var nama = document.forms["myForm"]["nama"].value;
    if (nama == null || nama == "") {
        alert("Mohon isi nama lengkap anda!");
        return false;
    }
	var jenis_kelamin = document.forms["myForm"]["jenis_kelamin"].value;
    if (jenis_kelamin == null || jenis_kelamin == "") {
        alert("Anda Belum Memilih Jenis Kelamin");
        return false;
    } 
		var tempat_lahir = document.forms["myForm"]["tempat_lahir"].value;
    if (tempat_lahir == null || tempat_lahir == "") {
        alert("Mohon Lengkapi Tempat Lahir anda!");
        return false;
    }
 var tanggal_lahir = document.forms["myForm"]["tanggal_lahir"].value;
    if (tanggal_lahir == null || tanggal_lahir == "") {
        alert("Mohon Lengkapi Tanggal Lahir anda!");
        return false;
    }
	var umurnya = document.forms["myForm"]["usia"].value;
	 if (umurnya < 15) {
        alert("Usia minimal pendaftar 16 tahun!");
		 return false;
	 }
	var tinggi_badan = document.forms["myForm"]["tinggi_badan"].value;
    if (tinggi_badan == null || tinggi_badan == "") {
        alert("Mohon Lengkapi Tinggi Badan Anda Karna Kami Membutuhkannya");
        return false;
    }	
	var berat_badan = document.forms["myForm"]["berat_badan"].value;
    if (berat_badan == null || berat_badan == "") {
        alert("Mohon Lengkapi Berat Badan Anda Karna Kami Membutuhkannya");
        return false;
    }
	var ukuran_sepatu = document.forms["myForm"]["ukuran_sepatu"].value;
    if (ukuran_sepatu == null || ukuran_sepatu == "") {
        alert("Mohon Isi Ukuran Sepatu Anda!");
        return false;
    }
	
	var ukuran_baju = document.forms["myForm"]["ukuran_baju"].value;
    if (ukuran_baju == null || ukuran_baju == "") {
        alert("Mohon Isi Ukuran Baju Anda Karna Kami Membutuhkannya");
        return false;
    }
   var alamat = document.forms["myForm"]["alamat"].value;
    if (alamat == null || alamat == "") {
        alert("Mohon isi alamat anda!");
        return false;
    }
	
	var telp = document.forms["myForm"]["telp"].value;
    if (telp == null || telp == "") {
        alert("Mohon isi Nomor Telepon anda!");
        return false;
    }
	var nama_ortu = document.forms["myForm"]["nama_ortu"].value;
    if (nama_ortu == null || nama_ortu == "") {
        alert("Mohon Lengkapi Nama Orang Tua Anda Karna Kami Membutuhkannya");
        return false;
    }
	
  
	
	var pendidikan_formal = document.forms["myForm"]["pendidikan_formal"].value;
    if (pendidikan_formal == null || pendidikan_formal == "") {
        alert("Mohon Lengkapi Riwayat Pendidikan Formal Anda Karna Kami Membutuhkannya");
        return false;
    }
	var email = document.forms["myForm"]["email"].value;
    if (email == null || email == "") {
        alert("Mohon Isi Email Anda Karna Kami Membutuhkannya");
        return false;
    }
	
	
	
	
	
	
	
}




function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    } 

</script>
			<div class="form_pendaftaran">	
							<h1 class="title">Formulir Pendaftaran Online</h1>
							<div class="post-content"> <p><strong>Terms & Conditions</strong><br>Isi formulir pendaftaran ini dengan benar.<br> Dengan menekan tombol 'DAFTAR' berarti anda 
						menyatakan bahwa anda :<br>
						1. Tidak buta warna <br>2. Tinggi anda tidak kurang dari 157cm <br>
						3. Tidak mempunyai riwayat penyakit hepatitis <br>
						4. Membayar segala bentuk pembayaran <strong><i>hanya melalui</i></strong> nmr rekening resmi Bank BRI  0098-01-002137-30-3 an PSPP Penerbangan. <br><br>
						Dan dengan ini anda menyatakan bahwa data yang anda isikan pada Formulir Pendaftaran ini adalah <strong><i>benar-benar data valid</i></strong> dan anda memberikan ijin kepada PSPP (Pendidikan Staff Penerbangan & Pramugari) untuk mengolah data tersebut untuk keperluan pendaftaran program pendidikan yang diselenggarakan oleh PSPP Penerbangan. <br>
			</p>


			<form action="submit_daftar.php?action=edit&id=<?php echo $_GET['id'];?>" class="form_pendaftaran" name="myForm" method="POST" onsubmit="return validateForm()">



			<h3>Lengkapi Persyaratan Berkas Pendaftaran Berikut Ini :</h3>
			<i>Ekstensi format file yang diminta : ".jpg"</i><br>



			<label><br>Foto : <a href="uploads/foto-<?php echo $_GET['id'];?>.jpg" target="_blank"><img src="uploads/foto-<?php echo $_GET['id'];?>.jpg" class="resizedimages"></a></label>
			<iframe src="uppld-foto.html" width="100%" height="190px" frameBorder="0"></iframe>
			<label>Foto Full Badan : <a href="uploads/foto-full-badan-<?php echo $_GET['id'];?>.jpg" target="_blank"><img src="uploads/foto-full-badan-<?php echo $_GET['id'];?>.jpg" class="resizedimages"></a></label>
			<iframe src="uppld-foto-full-badan.html" width="100%" height="190px" frameBorder="0"></iframe>
			<label>Surat Ket. Sehat : <a href="uploads/surat-<?php echo $_GET['id'];?>.jpg" target="_blank"><img src="uploads/surat-<?php echo $_GET['id'];?>.jpg" class="resizedimages"></a></label>
			<iframe src="uppld-surat.html" width="100%" height="190px" frameBorder="0"></iframe>
			<label>Identitas Diri yg Masih Berlaku (KTP/KTP Sementara)  : <a href="uploads/cover-raport-<?php echo $_GET['id'];?>.jpg" target="_blank"><img src="uploads/cover-raport-<?php echo $_GET['id'];?>.jpg" class="resizedimages"></a></label>
			<iframe src="uppld-cover-raport.html" width="100%" height="190px" frameBorder="0"></iframe>
			<label>Kartu Pelajar / Sampul Rapor  : <a href="uploads/kartu-pelajar-<?php echo $_GET['id'];?>.jpg" target="_blank"><img src="uploads/kartu-pelajar-<?php echo $_GET['id'];?>.jpg" class="resizedimages"></a></label>
			<iframe src="uppld-kartu-pelajar.html" width="100%" height="190px" frameBorder="0"></iframe>
			<br>
			
			<br>
			Isilah formulir pendaftaran dibawah ini dengan lengkap.<br><br>



			<h3>Pilih jurusan dan kampus</h3><br>
			<label>Pilihan Jurusan :</label> 
			<select name="jurusan" placeholder="<?php echo $b[10];?>" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Jurusan'">
			<option selected="selected"><?php echo $b[10];?></option>
			</select>

			  <br><br>
			<label>Pilihan Kampus :</label> 
			<select name="kampus"  >
			<option  selected="selected"><?php echo $b[11];?></option>
			</select>
			  <br><br>
				  
			<h2>Biodata Diri</h2><br>
			<label><i>Pastikan anda mengisi formulir pendaftaran ini dengan lengkap dan benar. <br>Data yang anda isikan pada formulir ini akan digunakan sebagai pembuatan polis asuransi, pembuatan sertifikat kelulusan, id card, dan keperluan pendidikan lainnya. <br>Kesalahan penulisan data & pengisian formulir berakibat terhambatnya prosses pendataan & pembagian fasilitas pendidikan kepada calon peserta.</i><br><br></label>
			<label>Nama lengkap : </label> <input value="<?php echo $b[2];?>" name="nama" placeholder="Nama lengkap" class="input_field" onfocus="this.placeholder = '' " type="text"  onBlur="javascript:{this.value = this.value.toUpperCase();this.value = this.value.trim();}" >
			<label>Nama panggilan:</label> <input value="<?php echo $b[51];?>" name="nama_panggilan" placeholder="Nama panggilan" class="input_field" onfocus="this.placeholder = '' "  type="text"  onBlur="javascript:{this.value = this.value.toUpperCase();this.value = this.value.trim();}">
			<label>Agama:</label> <input value="<?php echo $b[52];?>" name="agama" placeholder="Agama" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
			<label>Suku:</label> <input value="<?php echo $b[53];?>" name="suku" placeholder="Suku : Jawa, Batak, Bugis" onfocus="this.placeholder = '' "onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
			<label>Jenis kelamin:</label> <select name="jenis_kelamin" onchange="tampil(this)"><option value="<?php echo $b[54];?>"><?php echo $b[54];?></option><option value="Perempuan">Perempuan</option><option value="Laki-Laki">Laki-Laki</option></select>
			<label>Tempat lahir:</label> <input value="<?php echo $b[55];?>" name="tempat_lahir" placeholder="Contoh : Bantul" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text"></input>
			
			<label>Tanggal lahir:</label>
			<input type="text" id="tgllahir" value="<?php echo $b[85];?>" readonly name="tanggal_lahir" class="controls date form_date" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1"></input>
			<script type="text/javascript" src="plugin_tanggal/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
			<script type="text/javascript" src="plugin_tanggal/bootstrap/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="plugin_tanggal/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
			<script type="text/javascript" src="plugin_tanggal/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
			<script type="text/javascript">
				$('.form_datetime').datetimepicker({ language:  'id',weekStart: 1,todayBtn:  1,autoclose: 1,todayHighlight: 1,startView: 2,minView: 0,maxView: 1,forceParse: 0,showMeridian: 0	});
				$('.form_date').datetimepicker({   language:  'id',weekStart: 1,todayBtn:  1,autoclose: 1,todayHighlight: 1,startView: 2,minView: 2,forceParse: 0    });
				$('.form_time').datetimepicker({   language:  'id',weekStart: 1,todayBtn:  1,autoclose: 1,todayHighlight: 1,startView: 1,minView: 0,maxView: 1,forceParse: 0  });
			</script>	

			<label>Usia:</label> <input readonly id="umur" value="<?php echo $b[79];?>" name="usia" placeholder="Usia" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text" onkeypress="javascript:return isNumber (event)">
			<label>Tinggi badan:</label> 
			<select name="tinggi_badan"><?php 
				$tinggi_bdan_pertama1 = 135 ;$bts_tinggi_bdan1 = 185 ;
				while($tinggi_bdan_pertama1 <= $bts_tinggi_bdan1)
				{
					if($b[63] == "$tinggi_bdan_pertama1")	{	$stat_tinggi = "selected";	}	else	{	$stat_tinggi = "";	}
					echo "<option $stat_tinggi value='$tinggi_bdan_pertama1'>$tinggi_bdan_pertama1 Cm</option>";
					$tinggi_bdan_pertama1++;
				}	?>
			</select>
			<label>Berat badan:</label> 
			<select name="berat_badan"><?php 
				$berat_bdan_pertama1 = 30;$bts_berat_bdan1 = 90;
				while($berat_bdan_pertama1 <= $bts_berat_bdan1)
				{
					if($b[69] == "$berat_bdan_pertama1")	{	$stat_berat = "selected";	}	else	{	$stat_berat = "";	}
					echo "<option $stat_berat value='$berat_bdan_pertama1'>$berat_bdan_pertama1 Kg</option>";
					$berat_bdan_pertama1++;
				}	?>
			</select>
			<label>Hobi:</label> <input value="<?php echo $b[56];?>"  name="hobi" placeholder="hobi"onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
			<label>Golongan darah:</label> 
			<SELECT NAME="golongan_darah">
				<option <?PHP IF($b[57] == "A") { ECHO "selected"; } ?> value="A">A</option><option <?PHP IF($b[57] == "AB") { ECHO "selected"; } ?> value="AB">AB</option><option <?PHP IF($b[57] == "B") { ECHO "selected"; } ?> value="B">B</option><option <?PHP IF($b[57] == "O") { ECHO "selected"; } ?> value="O">O</option><option <?PHP IF($b[57] == "-") { ECHO "selected"; } ?> value="-">-</option>
			</select>

			<label>Ukuran sepatu : <i>Cara mengukur <a href="http://pspp-integrated.com/index.php?id=467&grup=berita&read=berapa-ukuran-sepatu-kamu-gaes?.html" target="_blank">klik disini</a></i></label> <input value="<?php echo $b[58];?>" onkeypress="javascript:return isNumber (event)" name="ukuran_sepatu" placeholder="Ukuran sepatu" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
			<label>Ukuran baju/ T-Shirt:</label> <input value="<?php echo $b[59];?>" name="ukuran_baju" placeholder="Ukuran baju / T-Shirt" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
			<div id="cetak"><?php 
			if ($b['jenis_kelamin'] == "Perempuan")
			{
				echo "<label>Mengenakan Jilbab :</label><select name='jilbab'><option>$b[81]</option><option>Ya</option><option>Tidak</option></select>";
			}
			else
			{
				echo "<input type='hidden' name='jilbab'>";
			}
			
			?></div><!--<label>Mengenakan Jilbab :</label> <select name="jilbab" ><option><?php echo $b[81];?></option><option>Ya</option><option>Tidak</option></select>-->
			<label>Sumber Informasi : <?php if ($_GET['id']==""){ echo $_SESSION[info-from]; }else{echo $b[64];} echo " (".$b[86].") ";?><br><br></label> 
			<label>Motivasi masuk pspp:</label> <textarea name="motivasi" placeholder="Uraian Motivasi Masuk PSPP"  onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}"><?php echo $b[70];?></textarea>

			<br><br>

			<h2>Informasi Kontak & Tempat Tinggal</h2><br>
			<label>Alamat lengkap:</label> <textarea name="alamat" placeholder="Contoh : Jl. Teuku Umar No XX Jakarta Utara" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text"><?php echo $b[3];?></textarea>
			<label>HP Siswa</label> <input  value="<?php echo $b[4];?>" name="telp" placeholder="08XXXXXXXXXX" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text" onkeypress="javascript:return isNumber (event)">

			<label>Nama Orang Tua</label> <input  value="<?php echo $b[82];?>" name="nama_ortu" placeholder="" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
			<label>HP Orang Tua:</label> <input  value="<?php echo $b[5];?>" name="hp_ortu" placeholder="08XXXXXXXXXX" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text" onkeypress="javascript:return isNumber (event)">
			<label>Pekerjaan Orang Tua:</label> <input  value="<?php echo $b[83];?>" name="pekerjaan_ortu" placeholder="" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
			<label>Alamat Orang Tua:</label> <input  value="<?php echo $b[84];?>" name="alamat_ortu" placeholder="" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">



			<br><br>
			<h2>Pendidikan</h2><br>
			<label>Asal Sekolah  :</label> <input value="<?php echo $b[6];?>" name="nama_sma" class="input_field" readonly onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">

			<label>NPSN (Nomor Pokok Sekolah Nasional)  :</label> <input value="<?php echo $b[90];?>" name="npsn" class="input_field" readonly onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">


			<label>Alamat Sekolah :</label> <input value="<?php echo $b[73];?>" name="alamat_sma" placeholder="Contoh : Jl. Gading Rejo No.09 Jakarta"  readonly onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">

			<label>Jenjang:</label> <input value="<?php echo $b[87];?>" name="jenjang_sekolah"  readonly onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">

			<label>Kota/Kab :</label> <input value="<?php echo $b[88];?>" name="kota_sekolah" readonly onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">

			<label>Provinsi :</label> <input value="<?php echo $b[89];?>" name="provinsi_sekolah" readonly onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">

			<br><br>
			<h2>Pendidikan Formal</h2><br>
			<label>Uraian:</label> <textarea name="pendidikan_formal" placeholder="Contoh : SDN 1 Marang : 2001-2007, SMP 1 Marang : 2007-2010, SMA 1 Jakarta : 2010-2013 "  onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}"><?php echo $b[74];?></textarea>

			<br>
			<h3>Kursus yang pernah diikuti</h3><br>
			<label>Uraian:</label> <textarea name="kursus" placeholder="Contoh :  English Club Primagama"  onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}"><?php echo $b[75];?></textarea>

			<label>Email address:</label> <input value="<?php echo $b[77];?>" name="email" placeholder="Email address" onBlur="javascript:{this.value = this.value.toLowerCase();}" type="text"></input>
			<label>Pin BBM :</label> <input value="<?php echo $b[78];?>" name="bbm" placeholder="BBM Contact" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text"></input><br>
			<br><br>
			<input value=<?php if ($_GET['id']=="")	{	echo" Daftar ";	}	else	{	echo " Simpan ";	}	?> class="button" type="submit"></input>
			<input value=" Cetak Formulir Pendaftaran " class="button" type="button"  onclick="<?php if($b['tes_online'] == "sudah") { echo "javascript:void window.open('system/system/formulir_psb.php?id=$_SESSION[idpendaftaran]','1386361733215','width=840px,height=840px,toolbar=0,menubar=1,location=0,status=0,scrollbars=1,resizable=0,left=0,top=0');return false;"; } else { echo "alert('Maaf, Cetak Formulir Hanya Dapat Dilakukan Setelah Pendaftar Mengikuti Tes Online');"; } ;?>"></input></form> 
			<div class="clear"></div><p></p>
			</div>
			<br><br><br><br>			
			</div><?php 
		} 
	} 
	else
	{
		echo "<font color=red>URL yang anda gunakan tidak valid, formulir ditutup!<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></font>";
	}
} 
else 
{
	?>
	
	<script>
function validateForm() {

	var jurusan = document.forms["myForm"]["jurusan"].value;
    if (jurusan == null || jurusan == "" || jurusan == "Pilih Jurusan Disini") {
        alert("Mohon Pilih Jurusan Terlebih Dahulu!");
        return false;
    }
	
	var bulan = document.forms["myForm"]["bulan_pendidikan"].value;
    if (bulan == null || bulan == "" || bulan == "Pilih Bulan Pendidikan") {
        alert("Mohon Pilih Bulan Pendidikan Terlebih Dahulu!");
        return false;
    }
	
	var tahun = document.forms["myForm"]["tahun_pendidikan"].value;
    if (tahun == null || tahun == "" || tahun == "Pilih Tahun Pendidikan") {
        alert("Mohon Pilih Tahun Pendidikan Terlebih Dahulu!");
        return false;
    }
	
	var kampus = document.forms["myForm"]["kampus"].value;
    if (kampus == null || kampus == "" || kampus == "Pilih Kampus Disini") {
        alert("Anda Belum Memilih Pilihan Kampus");
        return false;
    }
	    var nama = document.forms["myForm"]["nama"].value;
    if (nama == null || nama == "") {
        alert("Mohon isi nama lengkap anda!");
        return false;
    }
	var jenis_kelamin = document.forms["myForm"]["jenis_kelamin"].value;
    if (jenis_kelamin == null || jenis_kelamin == "") {
        alert("Anda Belum Memilih Jenis Kelamin");
        return false;
    } 
		var tempat_lahir = document.forms["myForm"]["tempat_lahir"].value;
    if (tempat_lahir == null || tempat_lahir == "") {
        alert("Mohon Lengkapi Tempat Lahir anda!");
        return false;
    }
 var tanggal_lahir = document.forms["myForm"]["tanggal_lahir"].value;
    if (tanggal_lahir == null || tanggal_lahir == "") {
        alert("Mohon Lengkapi Tanggal Lahir anda!");
        return false;
    }
	var umurnya = document.forms["myForm"]["usia"].value;
	 if (umurnya < 15) {
        alert("Usia minimal pendaftar 16 tahun!");
		 return false;
	 }
	var tinggi_badan = document.forms["myForm"]["tinggi_badan"].value;
    if (tinggi_badan == null || tinggi_badan == "") {
        alert("Mohon Lengkapi Tinggi Badan Anda Karna Kami Membutuhkannya");
        return false;
    }	
	var berat_badan = document.forms["myForm"]["berat_badan"].value;
    if (berat_badan == null || berat_badan == "") {
        alert("Mohon Lengkapi Berat Badan Anda Karna Kami Membutuhkannya");
        return false;
    }
	var ukuran_sepatu = document.forms["myForm"]["ukuran_sepatu"].value;
    if (ukuran_sepatu == null || ukuran_sepatu == "") {
        alert("Mohon Isi Ukuran Sepatu Anda!");
        return false;
    }
	
	var ukuran_baju = document.forms["myForm"]["ukuran_baju"].value;
    if (ukuran_baju == null || ukuran_baju == "") {
        alert("Mohon Isi Ukuran Baju Anda Karna Kami Membutuhkannya");
        return false;
    }
   var alamat = document.forms["myForm"]["jalan"].value;
    if (alamat == null || alamat == "") {
        alert("Mohon isi alamat jalan anda!");
        return false;
    }
	var desa = document.forms["myForm"]["desa"].value;
    if (desa == null || desa == "") {
        alert("Mohon isi Desa tempat tinggal anda!");
        return false;
    }
	var kelurahan = document.forms["myForm"]["kelurahan"].value;
    if (kelurahan == null || kelurahan == "") {
        alert("Mohon isi Kelurahan tempat tinggal anda anda!");
        return false;
    }
	var kecamatan = document.forms["myForm"]["kecamatan"].value;
    if (kecamatan == null || kecamatan == "") {
        alert("Mohon isi Kecamatan tempat tinggal anda anda!");
        return false;
    }
	var kabupaten = document.forms["myForm"]["kabupaten"].value;
    if (kabupaten == null || kabupaten == "") {
        alert("Mohon isi Kabupaten tempat tinggal anda anda!");
        return false;
    }
	var provinsi = document.forms["myForm"]["provinsi"].value;
    if (provinsi == null || provinsi == "") {
        alert("Mohon isi Provinsi tempat tinggal anda anda!");
        return false;
    }
/*	var alamat = document.forms["myForm"]["alamat"].value;
    if (alamat == null || alamat == "") {
        alert("Mohon isi alamat lengkap anda!");
        return false;
    }
*/
	var telp = document.forms["myForm"]["telp"].value;
    if (telp == null || telp == "") {
        alert("Mohon isi Nomor Telepon anda!");
        return false;
    }
	var nama_ortu = document.forms["myForm"]["nama_ortu"].value;
    if (nama_ortu == null || nama_ortu == "") {
        alert("Mohon Lengkapi Nama Orang Tua Anda Karna Kami Membutuhkannya");
        return false;
    }
	
   var asal_sekolah = document.forms["myForm"]["nama_sma"].value;
    if (asal_sekolah == null || asal_sekolah == "") {
        alert("Mohon isi Nama Sekolah anda!");
        return false;
    }	
   var npsn = document.forms["myForm"]["npsn"].value;
    if (npsn == null || npsn == "") {
        alert("Mohon isi NPSN Sekolah anda!");
        return false;
    }	


	
	
	var pendidikan_formal = document.forms["myForm"]["pendidikan_formal"].value;
    if (pendidikan_formal == null || pendidikan_formal == "") {
        alert("Mohon Lengkapi Riwayat Pendidikan Formal Anda Karna Kami Membutuhkannya");
        return false;
    }
	var email = document.forms["myForm"]["email"].value;
    if (email == null || email == "") {
        alert("Mohon Isi Email Anda Karna Kami Membutuhkannya");
        return false;
    }
	
	
	
	
	
	
	
}




function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    } 

</script>

	<div class="form_pendaftaran">	
					
					<div class="post-content"> <p><strong>Terms & Conditions</strong><br>Isi formulir pendaftaran ini dengan benar.<br> Dengan menekan tombol 'DAFTAR' berarti anda 
						menyatakan bahwa anda :<br>
						1. Tidak buta warna <br>2. Tinggi anda tidak kurang dari 157cm <br>
						3. Tidak mempunyai riwayat penyakit hepatitis <br>
						4. Membayar segala bentuk pembayaran <strong><i>hanya melalui</i></strong> nmr rekening resmi Bank BRI  0098-01-002137-30-3 an PSPP Penerbangan. <br><br>
						Dan dengan ini anda menyatakan bahwa data yang anda isikan pada Formulir Pendaftaran ini adalah <strong><i>benar-benar data valid</i></strong> dan anda memberikan ijin kepada PSPP (Pendidikan Staff Penerbangan & Pramugari) untuk mengolah data tersebut untuk keperluan pendaftaran program pendidikan yang diselenggarakan oleh PSPP Penerbangan. <br>
						
						
					</div>
</p>


<form action="submit_daftar.php?action=tambah&info_from=<?php  echo $_SESSION['info-from'];?>" class="form_pendaftaran" name="myForm" method="POST" onsubmit="return validateForm()">
<h3>Pilih jurusan dan kampus</h3><br>
<label>Pilihan Jurusan :</label> 
<select name="jurusan" placeholder="Jurusan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Jurusan'">
<option>Pilih Jurusan Disini</option>
<option>Staff Penerbangan</option>
<option>Pramugari</option>
<option>AVSEC</option>
</select>
	  <br><br>
	  
<label>Bulan Pendidikan :</label> 
<select name="bulan_pendidikan" placeholder="Bulan Pendidikan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Bulan Pendidikan'">
<option>Pilih Bulan Pendidikan</option>
<option>Februari</option>
<option>Juni</option>
<option>Oktober</option>
</select>
<br><br>

<label>Tahun Pendidikan :</label> 
<select name="tahun_pendidikan" placeholder="Tahun Pendidikan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Tahun Pendidikan'">
<option>Pilih Tahun Pendidikan</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
</select>
<br><br>	  
	  
<label>Pilihan Kampus :</label> 
<select name="kampus" >
<option>Pilih Kampus Disini</option>
<option>PSPP Jakarta</option>
<option>PSPP Yogyakarta</option>
<option>PSPP Makassar</option>
<option>PSPP Lampung</option>
      </select>
	  <br><br>
	  
<h2>Biodata Diri</h2><br>
<label><i>Pastikan anda mengisi formulir pendaftaran ini dengan lengkap dan benar. <br>Data yang anda isikan pada formulir ini akan digunakan sebagai pembuatan polis asuransi, pembuatan sertifikat kelulusan, id card, dan keperluan pendidikan lainnya. <br>Kesalahan penulisan data & pengisian formulir berakibat terhambatnya prosses pendataan & pembagian fasilitas pendidikan kepada calon peserta.</i><br><br></label>


<label>Nama lengkap :</label> <input name="nama" placeholder="Nama lengkap" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();this.value = this.value.trim();}" type="text" >
<label>Nama panggilan:</label> <input name="nama_panggilan" placeholder="Nama panggilan" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();this.value = this.value.trim();}" type="text">
<label>Agama:</label> <input name="agama" placeholder="Agama" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
<label>Suku:</label> <input name="suku" placeholder="Suku : Jawa, Batak, Bugis" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
<label>Jenis kelamin:</label> <select name="jenis_kelamin" onchange="tampil(this)"><option value="">Pilih Jenis Kelamin</option><option value="Perempuan">Perempuan</option><option value="Laki-Laki">Laki-Laki</option></select>
<label>Tempat lahir:</label> <input  name="tempat_lahir" placeholder="Contoh : Bantul" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">

<label>Tanggal lahir:</label>
		<input type="text" id="tgllahir" readonly name="tanggal_lahir" class="controls date form_date" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
		
		<span class="add-on"><i class="icon-th"></i></span></input>
		<script type="text/javascript" src="plugin_tanggal/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
		<script type="text/javascript" src="plugin_tanggal/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="plugin_tanggal/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<script type="text/javascript" src="plugin_tanggal/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
		<script type="text/javascript">
			$('.form_datetime').datetimepicker({ language:  'id',weekStart: 1,todayBtn:  1,autoclose: 1,todayHighlight: 1,startView: 2,minView: 0,maxView: 1,forceParse: 0,showMeridian: 0	});
			$('.form_date').datetimepicker({   language:  'id',weekStart: 1,todayBtn:  1,autoclose: 1,todayHighlight: 1,startView: 2,minView: 2,forceParse: 0    });
			$('.form_time').datetimepicker({   language:  'id',weekStart: 1,todayBtn:  1,autoclose: 1,todayHighlight: 1,startView: 1,minView: 0,maxView: 1,forceParse: 0  });
		</script>		


<label>Usia:</label> <input readonly id="umur" name="usia" placeholder="Usia" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text" onkeypress="javascript:return isNumber (event)">
<label>Tinggi badan:</label> 
<select name="tinggi_badan">
<option value="">Pilih Tinggi Badan Disini</option>
<?php 
$tinggi_pertama= 135;
$tinggi_batas= 185;

while($tinggi_pertama <= $tinggi_batas)
{

	echo "<option value='$tinggi_pertama'>$tinggi_pertama Cm</option>";
	$tinggi_pertama++;
}
?>
</select>
<label>Berat badan:</label> 

<SELECT NAME="berat_badan">
<option value="">Pilih Berat Badan Disini</option>
<?PHP 
$berat = 30;
$batas_berat = 90;
while($berat <= $batas_berat )
{
	echo "<option value='$berat'>$berat Kg</option>";
	$berat++;
}
?>
</SELECT>
<label>Hobi:</label> <input  name="hobi" placeholder="hobi"onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
<label>Golongan darah:</label> 

<SELECT NAME="golongan_darah">
<option value="A">A</option>
<option value="AB">AB</option>
<option value="B">B</option>
<option value="O">O</option>
<option value="-">-</option>
</select>
<label>Ukuran sepatu: <i>Cara mengukur <a href="http://pspp-integrated.com/index.php?id=467&grup=berita&read=berapa-ukuran-sepatu-kamu-gaes?.html" target="_blank">klik disini</a></i></label> <input  name="ukuran_sepatu" onkeypress="javascript:return isNumber (event)" placeholder="Ukuran sepatu" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
<label>Ukuran baju/ T-Shirt:</label> <input  name="ukuran_baju" placeholder="Ukuran baju / T-Shirt" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
<DIV ID="cetak"></div>
<label>Sumber Informasi : <?php  echo $_SESSION['info-from'];?> ( <?php echo $_SESSION['pemilik_domain'];?> )<br><br></label> 
<label>Motivasi masuk pspp:</label> <textarea name="motivasi" placeholder="Uraian Motivasi Masuk PSPP"  onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}"></textarea>

<br><br>
<h2>Informasi Kontak & Tempat Tinggal</h2><br>
<label>Alamat lengkap:</label> 

<label>Jalan : </label><textarea name="jalan" placeholder="Contoh : Jl. Teuku Umar No XX Jakarta Utara" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}"></textarea>
<label> RT : </label><input type="text" name="rt" onkeypress="javascript:return isNumber (event)" placeholder="Contoh : 01" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}">
<label> RW : </label><INPUT TYPE="text" onkeypress="javascript:return isNumber (event)" name="rw" placeholder="Contoh : 10 " class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}"></label>
<label>Desa : </label> <input type="text" name="desa" placeholder="Desa" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}">
<label>Kelurahan : </label> <input type="text" name="kelurahan" placeholder="Kelurahan" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}">
<label>Kecamatan : </label> <input type="text" name="kecamatan" placeholder="kecamatan" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}">
<label>Kabupaten : </label> <input type="text" name="kabupaten" placeholder="kabupaten" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}">
<label>Provinsi : </label><input  type="text" name="provinsi" placeholder="provinsi" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}">
 <!--<input  name="alamat" placeholder="Contoh : Jl. Teuku Umar No XX Jakarta Utara" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">-->

<label>HP Siswa</label> <input  name="telp" placeholder="08XXXXXXXXXX" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text" onkeypress="javascript:return isNumber (event)">

<label>Nama Orang Tua</label> <input  name="nama_ortu" placeholder="" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
<label>HP Orang Tua:</label> <input  name="hp_ortu" placeholder="08XXXXXXXXXX" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text" onkeypress="javascript:return isNumber (event)">
<label>Pekerjaan Orang Tua:</label> <input  name="pekerjaan_ortu" placeholder="" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">
<label>Alamat Orang Tua:</label> <input  name="alamat_ortu" placeholder="" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text">



<br><br>
<h2>Pendidikan</h2><br>

<label>Pilih Kabupaten/Kota Pendidikan : </label> 


<select name="kotta_pendidikan"  id="kotta_pendidikan" onchange="suggest(this.value);">
<?php $kottasql = mysql_query("SELECT distinct(kota) as kota FROM database_sekolah order by kota asc");
while($kotta = mysql_fetch_array($kottasql)){	?>
<option ><?php echo $kotta['kota'];?> </option>
<?php } ?>
</select>



<div id="suggest">
					  
					   <div class="suggestionsBox" id="suggestions" style="display: none;"> <img src="arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
					   <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
					   </div>
 </div> 
 
<label>Nama Sekolah : (Pilih <strong onfocus="suggest(this.value);">Kabupaten/Kota Pendidikan</strong> untuk mencari nama sekolah)</label>   <input  name="nama_sma"  onBlur="fill2();" readonly id="kode" class="input_field"   type="text" >


<label>NPSN (Nomor Pokok Sekolah Nasional):</label> <input  id="country" readonly name="npsn" placeholder="XXX XXX"  onfocus="this.placeholder = '' " onBlur="fill();" type="text">




		   
<br> <img src="http://cdn.freshdesk.com/data/helpdesk/attachments/production/1001103890/original/help.png?1394490712" align="left"> &nbsp; &nbsp; Nama sekolah kamu belum ada? Silakan lakukan pengaduan <a href="#pengaduan" onclick="javascript:void window.open('pengaduan15.php','1462933597438','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=0,resizable=0','center');return false;">ke sini!</a>	   

<br><br>

<?php 
/*

<label>Pilih Kabupaten/Kota Pendidikan : </label> 
<select name="kotta_pendidikan"  id="kotta_pendidikan" onchange="suggest(this.value);">

<option >Kab. Badung </option>

</select>


 </div> 
 
<label>Nama Sekolah : (Pilih <strong onfocus="suggest(this.value);">Kabupaten/Kota Pendidikan</strong> untuk mencari nama sekolah)</label>   <input value="SMK PGRI 1 BADUNG" name="nama_sma"  onBlur="fill2();" readonly id="kode" class="input_field"   type="text" >


<label>NPSN (Nomor Pokok Sekolah Nasional):</label> <input  id="country" readonly value="50101606" name="npsn" placeholder="XXX XXX"  onfocus="this.placeholder = '' " onBlur="fill();" type="text">
*/?>
<h2>Pendidikan Formal</h2><br>
<label>Uraian:</label> <textarea name="pendidikan_formal" placeholder="Contoh : SDN 1 Marang : 2001-2007, SMP 1 Marang : 2007-2010, SMA 1 Jakarta : 2010-2013 "  onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}"></textarea>

<br>
<h3>Kursus yang pernah diikuti</h3><br>
<label>Uraian:</label> <textarea name="kursus" placeholder="Contoh :  English Club Primagama"  onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}"></textarea>

<label>Email address:</label> <input  name="email" placeholder="Email address" onBlur="javascript:{this.value = this.value.toLowerCase();}"  onfocus="this.placeholder = '' " type="text"></input>
<label>Pin BBM :</label> <input  name="bbm" placeholder="BBM Contact" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" type="text"></input><br>

<label>Apakah sebelumnya anda sudah pernah menghubungi tim promosi kami? Apabila sudah, silakan uraikan disini.</label> <textarea name="uraianpromosi" placeholder="Contoh : saya sudah pernah menghubungi kak bejo PSPP sebelum mengisi biodata ini"  onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}"></textarea>


					
					<div class="post-content"> <p><strong>Terms & Conditions</strong><br>Isi formulir pendaftaran ini dengan benar.<br> Dengan menekan tombol 'DAFTAR' berarti anda 
						menyatakan bahwa anda :<br>
						1. Tidak buta warna <br>2. Tinggi anda tidak kurang dari 157cm <br>
						3. Tidak mempunyai riwayat penyakit hepatitis <br>
						4. Membayar segala bentuk pembayaran <strong><i>hanya melalui</i></strong> nmr rekening resmi Bank BRI  0098-01-002137-30-3 an PSPP Penerbangan. <br><br>
						Dan dengan ini anda menyatakan bahwa data yang anda isikan pada Formulir Pendaftaran ini adalah <strong><i>benar-benar data valid</i></strong> dan anda memberikan ijin kepada PSPP (Pendidikan Staff Penerbangan & Pramugari) untuk mengolah data tersebut untuk keperluan pendaftaran program pendidikan yang diselenggarakan oleh PSPP Penerbangan. <br>
						
						
					<br><i>Catatan : PSPP (Pendidikan Staff Penerbangan dan Pramugari) tidak pernah memberikan jaminan pekerjaan bagi peserta pendidikan. Terima kasih</i><br><br></div>
</p>


<input value=" Daftar " class="button" type="submit"></input> </form> 
<div class="clear"></div><p></p>
 </div>

					
	<br><br><br><br>			
</div>




<?php } ?>

	<iframe width=174 height=189 name="gToday:normal:image/calender/agenda.js" id="gToday:normal:image/calender/agenda.js" src="image/calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>
	
<?php 

} // akhir tutup php dari paling atas?>