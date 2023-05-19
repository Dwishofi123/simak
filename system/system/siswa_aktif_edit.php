<div style="visibility:hidden; height:0px;"><? session_start();?></div>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "konek176.php";?>
 <? include "pikachu.php";?>
 <script type=text/javascript src=../js/plugins/jquery/jquery.min.js></script>
 <link href=../css/stylesheets.css rel=stylesheet type=text/css /> 

<br><br>
 <div class=col-md-12>
 
 <? if ($_GET[simpan]=="true") {
 mysql_query("update siswa_aktif set nama='$_POST[nama]',jurusan='$_POST[jurusan]',tempat_kuliah='$_POST[kampus]',alamat='$_POST[alamat]',No_Telp='$_POST[telp]',hp_ortu='$_POST[hp_ortu]', Asal_Sekolah='$_POST[nama_sma]',nama_pendidikan_terakhir='$_POST[nama_sma]' ,nama_panggilan='$_POST[nama_panggilan]',agama='$_POST[agama]',suku='$_POST[suku]',jenis_kelamin='$_POST[jenis_kelamin]',hoby='$_POST[hobi]',golongan_darah='$_POST[golongan_darah]',ukuran_sepatu='$_POST[ukuran_sepatu]',ukuran_baju='$_POST[ukuran_baju]',tinggi_badan='$_POST[tinggi_badan]',berat_badan='$_POST[berat_badan]',motivasi_masuk_pspp='$_POST[motivasi]',pendidikan_terakhir='$_POST[pendidikan_terakhir]',alamat_pendidikan_terakhir='$_POST[alamat_sma]',pendidikan_formal='$_POST[pendidikan_formal]',kursus='$_POST[kursus]',email='$_POST[email]',bbm='$_POST[bbm]',usia='$_POST[usia]',bekerja='$_POST[status]', tempat_kerja='$_POST[tempat]', tempat_tanggal_lahir='$_POST[ttl]' where id=$_GET[id]");
 echo "<br><br>Data <strong>$_GET[nama]</strong> telah diubah dengan status <strong>$_POST[status] $_POST[tempat]</strong>!";
 
 }else{ 
 
 $query = mysql_query("SELECT * from siswa_aktif where siswa_aktif.id=$_GET[id]"); while($b=mysql_fetch_array($query)) {?>
<div class="block"> 
<div class="header"> <h2>Edit Biodata  - <? echo $b[nama]; $nama=$b[nama]; ?></h2> </div> 
<div class="content controls"> 
 <form action="siswa_aktif_edit.php?id=<? echo $_GET[id];?>&nama=<? echo $b[2];?>&simpan=true" method="POST">
<div class="form-row"> 

<div class="col-md-3"><h3>Pilih jurusan dan kampus</h3><br></div>
<div class="col-md-3"><label>Pilihan Jurusan :</label></div> 
<select name="jurusan" placeholder="Jurusan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Jurusan'">
<? $queryu = mysql_query("select distinct(Jurusan) from siswa_aktif"); while($c=mysql_fetch_row($queryu)) {?><option  <? if($b[jurusan]==$c[0]){ echo "selected=selected";}?>><? echo $c[0];?></option><?}?>
	  
      </select>
	  <br><br>
<div class="col-md-3"><label>Pilihan Kampus :</label> </div>
<select name="kampus" >
<? $queryu = mysql_query("select distinct(Tempat_Kuliah) from siswa_aktif"); while($c=mysql_fetch_row($queryu)) {?><option  <? if($b[kampus]==$c[0]){ echo "selected=selected";}?>><? echo $c[0];?></option><?}?>
	  
	  
      </select>
	  <br><br>
	  
<div class="col-md-3"><h2>Biodata Diri</h2><br></div>
<div class="col-md-3"><label>Nama lengkap:</label> </div><input value="<? echo $b[nama];?>" name="nama" placeholder="Nama lengkap" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Nama lengkap'" type="text" >
<div class="col-md-3"><label>Nama panggilan:</label> </div><input value="<? echo $b[nama_panggilan];?>" name="nama_panggilan" placeholder="Nama panggilan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Nama panggilan'" type="text">
<div class="col-md-3"><label>Agama:</label> </div><input value="<? echo $b[agama];?>" name="agama" placeholder="Agama" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Agama'" type="text">
<div class="col-md-3"><label>Suku:</label> </div><input value="<? echo $b[suku];?>" name="suku" placeholder="Suku : Jawa, Batak, Bugis" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Suku : Jawa, Batak, Bugis'" type="text">
<div class="col-md-3"><label>Jenis kelamin:</label></div><input value="<? echo $b[jenis_kelamin];?>" name="jenis_kelamin"  class="input_field" placeholder="L/P" onfocus="this.placeholder = '' " onblur="this.placeholder = 'L/P'" type="text">
<div class="col-md-3"><label>Tempat & tanggal lahir:</label> </div><input value="<? echo $b[tempat_tanggal_lahir];?>" name="ttl" placeholder="Contoh : Bantul, 02 September 1997" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : Bantul, 02 September 1997'" type="text">
<div class="col-md-3"><label>Usia:</label> </div><input value="<? echo $b[usia];?>" name="usia" placeholder="Usia" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Your birthday'" type="text">
<div class="col-md-3"><label>Tinggi badan:</label> </div><input value="<? echo $b[tinggi_badan];?>" name="tinggi_badan" placeholder="Tinggi badan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Usia'" type="text">
<div class="col-md-3"><label>Berat badan:</label> </div><input value="<? echo $b[berat_badan];?>" name="berat_badan" placeholder="Berat badan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Berat badan'" type="text">
<div class="col-md-3"><label>Hobi:</label> </div><input value="<? echo $b[hoby];?>"  name="hobi" placeholder="hobi"onfocus="this.placeholder = '' " onblur="this.placeholder = 'Hobi'" type="text">
<div class="col-md-3"><label>Golongan darah:</label> </div><input value="<? echo $b[golongan_darah];?>" name="golongan_darah" placeholder="Golongan darah" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Golongan darah'" type="text">
<div class="col-md-3"><label>Ukuran sepatu:</label> </div><input value="<? echo $b[ukuran_sepatu];?>" name="ukuran_sepatu" placeholder="Ukuran sepatu" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Ukuran sepatu'" type="text">
<div class="col-md-3"><label>Ukuran baju/ T-Shirt:</label> </div><input value="<? echo $b[ukuran_baju];?>" name="ukuran_baju" placeholder="Ukuran baju / T-Shirt" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Ukuran baju / T-Shirt'" type="text">

<div class="col-md-3"><label>Motivasi masuk pspp:</label> </div><textarea name="motivasi" placeholder="Uraian Motivasi Masuk PSPP"  onfocus="this.placeholder = '' " onblur="this.placeholder = 'Uraian Motivasi Masuk PSPP'"><? echo $b[motivasi_masuk_pspp];?></textarea>

<br><br>
<div class="col-md-3"><h2>Tempat Tinggal & Kontak</h2></div><br>
<div class="col-md-3"><label>Alamat lengkap:</label></div> <input value="<? echo $b[alamat];?>" name="alamat" placeholder="Contoh : Jl. Teuku Umar No XX Jakarta Utara" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : Jl. Teuku Umar No XX Jakarta Utara'" type="text">
<div class="col-md-3"><label>Telepon / Handphone:</label> </div><input value="<? echo $b[no_telp];?>" name="telp" placeholder="08XX-XXXX-XXXX" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = '08XX-XXXX-XXXX'" type="text">
<div class="col-md-3"><label>HP Ortu:</label> </div><input value="<? echo $b[hp_ortu];?>" name="hp_ortu" placeholder="08XX-XXXX-XXXX" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = '08XX-XXXX-XXXX'" type="text">

<br><br>
<div class="col-md-3"><h2>Pendidikan</h2></div><br>
<div class="col-md-3"><label>Pendidikan terakhir:</label> </div><input value="<? echo $b[pendidikan_terakhir];?>" name="pendidikan_terakhir" placeholder="Contoh : SMA/SMK" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : SMA/SMK'" type="text">
<div class="col-md-3"><label>Nama SMA/Universitas:</label> </div><input value="<? echo $b[nama_pendidikan_terakhir];?>" name="nama_sma" placeholder="Contoh : SMAN 1 Jakarta" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : SMAN 1 Jakarta'" type="text">
<div class="col-md-3"><label>Alamat sekolah/universitas:</label> </div> <input value="<? echo $b[alamat_pendidikan_terakhir];?>" name="alamat_sma" placeholder="Contoh : Jl. Gading Rejo No.09 Jakarta"  onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : Jl. Gading Rejo No.09 Jakarta'" type="text">

<br><br>
<div class="col-md-3"><h2>Pendidikan Formal</h2></div><br>
<div class="col-md-3"><label>Uraian:</label> </div><textarea name="pendidikan_formal" placeholder="Contoh : SDN 1 Marang : 2001-2007, SMP 1 Marang : 2007-2010, SMA 1 Jakarta : 2010-2013 "  onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : SDN 1 Marang : 2001-2007, SMP 1 Marang : 2007-2010, SMA 1 Jakarta : 2010-2013 '"><? echo $b[pendidikan_formal];?></textarea>

<br>
<div class="col-md-3"><h3>Kursus yang pernah diikuti</h3></div><br>
<div class="col-md-3"><label>Uraian:</label> </div> <textarea name="kursus" placeholder="Contoh :  English Club Primagama"  onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh :  English Club Primagama'"><? echo $b[kursus];?></textarea>

<div class="col-md-3"><label>Email address:</label> </div><input value="<? echo $b[email];?>" name="email" placeholder="Email address" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Email address'" type="text"></input>
<div class="col-md-3"><label>Pin BBM :</label></div> <input value="<? echo $b[bbm];?>" name="bbm" placeholder="BBM Contact" onfocus="this.placeholder = '' " onblur="this.placeholder = 'BBM Contact'" type="text"></input><br>


<div class="col-md-3">Status Bekerja :</div> 
<div class="col-md-9">
<select class="form-control" name=status id=status> 
<option selected=selected><? echo $b[bekerja];?></option> 
 <option>Sudah Bekerja</option> 
 <option>Belum Bekerja</option>
 </select></div> </div> 
<div class="form-row"> <div class="col-md-3">Tempat Bekerja :</div> <div class="col-md-9"><input class="form-control" value="<? echo $b[tempat_kerja];?>" type="text" name="tempat" id="tempat"></div> </div> 
 

&nbsp; &nbsp; <button   type=submit class="btn  btn-default" data-dismiss=modal>Simpan </button>
<div><br><br></div></form>
<? }?>



 </div> </div>
 
 <?}?>
 </div>