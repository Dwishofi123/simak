<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<?php require_once 'konek.php'; 
if ($_GET[action]==""){
$query = mysql_query("SELECT * FROM siswa WHERE id='$_GET[id]'");
while($b = mysql_fetch_array($query)){?>

<link href=../../image/style.css rel=stylesheet type=text/css /> 
 
 
<form action="edit_data_psb.php?action=simpan&id=<? echo $_GET[id];?>" class="form_pendaftaran" method="POST" >
<h3>Pilih jurusan dan kampus</h3><br>
<label>Pilihan Jurusan :</label> 
<select name="jurusan" placeholder="Jurusan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Jurusan'">
<? $queryu = mysql_query("select distinct(Jurusan) from siswa"); while($c=mysql_fetch_row($queryu)) {?><option  <? if($b[10]==$c[0]){ echo "selected=selected";}?>><? echo $c[0];?></option><?}?>
	  
      </select>
	  <br><br>
<label>Pilihan Kampus :</label> 
<select name="kampus" >
<? $queryu = mysql_query("select distinct(Tempat_Kuliah) from siswa"); while($c=mysql_fetch_row($queryu)) {?><option  <? if($b[11]==$c[0]){ echo "selected=selected";}?>><? echo $c[0];?></option><?}?>
	  
	  
      </select>
	  <br><br>
	  
<h2>Biodata Diri</h2><br>
<label>Nama lengkap:</label> <input value="<? echo $b[2];?>" name="nama" placeholder="Nama lengkap" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Nama lengkap'" type="text" >
<label>Nama panggilan:</label> <input value="<? echo $b[51];?>" name="nama_panggilan" placeholder="Nama panggilan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Nama panggilan'" type="text">
<label>Agama:</label> <input value="<? echo $b[52];?>" name="agama" placeholder="Agama" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Agama'" type="text">
<label>Suku:</label> <input value="<? echo $b[53];?>" name="suku" placeholder="Suku : Jawa, Batak, Bugis" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Suku : Jawa, Batak, Bugis'" type="text">
<label>Jenis kelamin:</label> <input value="<? echo $b[54];?>" name="jenis_kelamin"  class="input_field" placeholder="L/P" onfocus="this.placeholder = '' " onblur="this.placeholder = 'L/P'" type="text">
<label>Tempat & tanggal lahir:</label> <input value="<? echo $b[55];?>" name="ttl" placeholder="Contoh : Bantul, 02 September 1997" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : Bantul, 02 September 1997'" type="text">
<label>Usia:</label> <input value="<? echo $b[79];?>" name="usia" placeholder="Usia" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Your birthday'" type="text">
<label>Tinggi badan:</label> <input value="<? echo $b[63];?>" name="tinggi_badan" placeholder="Tinggi badan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Usia'" type="text">
<label>Berat badan:</label> <input value="<? echo $b[69];?>" name="berat_badan" placeholder="Berat badan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Berat badan'" type="text">
<label>Hobi:</label> <input value="<? echo $b[56];?>"  name="hobi" placeholder="hobi"onfocus="this.placeholder = '' " onblur="this.placeholder = 'Hobi'" type="text">
<label>Golongan darah:</label> <input value="<? echo $b[57];?>" name="golongan_darah" placeholder="Golongan darah" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Golongan darah'" type="text">
<label>Ukuran sepatu:</label> <input value="<? echo $b[58];?>" name="ukuran_sepatu" placeholder="Ukuran sepatu" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Ukuran sepatu'" type="text">
<label>Ukuran baju/ T-Shirt:</label> <input value="<? echo $b[59];?>" name="ukuran_baju" placeholder="Ukuran baju / T-Shirt" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Ukuran baju / T-Shirt'" type="text">
<label>Sumber Informasi : <? if ($_GET[id]==""){ echo $_SESSION[info-from]; }else{echo $b[64];}?><br><br></label> 
<label>Motivasi masuk pspp:</label> <textarea name="motivasi" placeholder="Uraian Motivasi Masuk PSPP"  onfocus="this.placeholder = '' " onblur="this.placeholder = 'Uraian Motivasi Masuk PSPP'"><? echo $b[70];?></textarea>

<br><br>
<h2>Tempat Tinggal</h2><br>
<label>Alamat lengkap:</label> <input value="<? echo $b[3];?>" name="alamat" placeholder="Contoh : Jl. Teuku Umar No XX Jakarta Utara" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : Jl. Teuku Umar No XX Jakarta Utara'" type="text">
<label>Telepon / Handphone:</label> <input value="<? echo $b[4];?>" name="telp" placeholder="08XX-XXXX-XXXX" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = '08XX-XXXX-XXXX'" type="text">
<label>HP Ortu:</label> <input value="<? echo $b[5];?>" name="hp_ortu" placeholder="08XX-XXXX-XXXX" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = '08XX-XXXX-XXXX'" type="text">

<br><br>
<h2>Pendidikan</h2><br>
<label>Pendidikan terakhir:</label> <input value="<? echo $b[71];?>" name="pendidikan_terakhir" placeholder="Contoh : SMA/SMK" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : SMA/SMK'" type="text">
<label>Nama SMA/Universitas:</label> <input value="<? echo $b[6];?>" name="nama_sma" placeholder="Contoh : SMAN 1 Jakarta" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : SMAN 1 Jakarta'" type="text">
<label>Alamat sekolah/universitas:</label> <input value="<? echo $b[73];?>" name="alamat_sma" placeholder="Contoh : Jl. Gading Rejo No.09 Jakarta"  onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : Jl. Gading Rejo No.09 Jakarta'" type="text">

<br><br>
<h2>Pendidikan Formal</h2><br>
<label>Uraian:</label> <textarea name="pendidikan_formal" placeholder="Contoh : SDN 1 Marang : 2001-2007, SMP 1 Marang : 2007-2010, SMA 1 Jakarta : 2010-2013 "  onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : SDN 1 Marang : 2001-2007, SMP 1 Marang : 2007-2010, SMA 1 Jakarta : 2010-2013 '"><? echo $b[74];?></textarea>

<br>
<h3>Kursus yang pernah diikuti</h3><br>
<label>Uraian:</label> <textarea name="kursus" placeholder="Contoh :  English Club Primagama"  onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh :  English Club Primagama'"><? echo $b[75];?></textarea>

<label>Email address:</label> <input value="<? echo $b[77];?>" name="email" placeholder="Email address" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Email address'" type="text"></input>
<label>Pin BBM :</label> <input value="<? echo $b[78];?>" name="bbm" placeholder="BBM Contact" onfocus="this.placeholder = '' " onblur="this.placeholder = 'BBM Contact'" type="text"></input><br>

<label>Foto :</label>
<img src="../../uploads/foto-<?echo $_GET[id];?>.jpg" width='300px' height='200px'>
<label>Foto Full Badan :</label>
<img src="../../uploads/foto-full-badan-<?echo $_GET[id];?>.jpg" width='300px' height='200px'>
<label>Surat Ket. Sehat :</label>
<img src="../../uploads/surat-<?echo $_GET[id];?>.jpg" width='300px' height='200px'>
<label>Foto Cover Raport:</label>
<img src="../../uploads/cover-raport-<?echo $_GET[id];?>.jpg" width='300px' height='200px'>

		

		
		<br><br>
		
<input value=<? if ($_GET[id]==""){echo" Daftar ";}else{echo " Simpan ";}?> class="button" type="submit"></input> <input value=" Cetak Formulir Pendaftaran " class="button" type="button" onclick="javascript:void window.open('formulir_psb.php?id=<?echo $_GET[id];?>','1386361733215','width=840px,height=840px,toolbar=0,menubar=1,location=0,status=0,scrollbars=1,resizable=0,left=0,top=0');return false;"></input></form> 
	
	
<?}}else{

mysql_query("update siswa set nama='$_POST[nama]',jurusan='$_POST[jurusan]',tempat_kuliah='$_POST[kampus]',Alamat='$_POST[alamat]',No_Telp='$_POST[telp]',hp_ortu='$_POST[hp_ortu]',Asal_Sekolah='$_POST[nama_sma]',nama_pendidikan_terakhir='$_POST[nama_sma]',nama_panggilan='$_POST[nama_panggilan]',agama='$_POST[agama]',suku='$_POST[suku]',jenis_kelamin='$_POST[jenis_kelamin]',ttl='$_POST[ttl]',hoby='$_POST[hobi]',golongan_darah='$_POST[golongan_darah]',ukuran_sepatu='$_POST[ukuran_sepatu]',ukuran_baju='$_POST[ukuran_baju]',tinggi_badan='$_POST[tinggi_badan]',berat_badan='$_POST[berat_badan]',motivasi_masuk_pspp='$_POST[motivasi]',pendidikan_terakhir='$_POST[pendidikan_terakhir]',alamat_pendidikan_terakhir='$_POST[alamat_sma]',pendidikan_formal='$_POST[pendidikan_formal]',kursus='$_POST[kursus]',email='$_POST[email]',bbm='$_POST[bbm]',usia='$_POST[usia]' where id='$_GET[id]'");
echo "Data telah dierbarui!";

}?>


