<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<link href=../../image/style.css rel=stylesheet type=text/css /> 

<form action="submit_daftar.php?action=tambah&info_from=<?  echo $_SESSION[info-from];?>" class="form_pendaftaran" method="POST" >
 <h2>Tambah Data Siswa Baru</h2><br>
<h3>Pilih jurusan dan kampus</h3><br>
<label>Pilihan Jurusan :</label> 
<select name="jurusan" placeholder="Jurusan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Jurusan'">
<? $queryu = mysql_query("select distinct(Jurusan) from siswa"); while($c=mysql_fetch_row($queryu)) {?><option><? echo $c[0];?></option><?}?>
	  
      </select>
	  <br><br>
<label>Pilihan Kampus :</label> 
<select name="kampus" >
<? $queryu = mysql_query("select distinct(Tempat_Kuliah) from siswa"); while($c=mysql_fetch_row($queryu)) {?><option><? echo $c[0];?></option><?}?>
	  
	  
      </select>
	  <br><br>
	  
<h2>Biodata Diri</h2><br>
<label>Nama lengkap:</label> <input name="nama" placeholder="Nama lengkap" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Nama lengkap'" type="text" >
<label>Nama panggilan:</label> <input name="nama_panggilan" placeholder="Nama panggilan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Nama panggilan'" type="text">
<label>Agama:</label> <input name="agama" placeholder="Agama" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Agama'" type="text">
<label>Suku:</label> <input name="suku" placeholder="Suku : Jawa, Batak, Bugis" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Suku : Jawa, Batak, Bugis'" type="text">
<label>Jenis kelamin:</label> <input  name="jenis_kelamin"  class="input_field" placeholder="L/P" onfocus="this.placeholder = '' " onblur="this.placeholder = 'L/P'" type="text">
<label>Tempat & tanggal lahir:</label> <input  name="ttl" placeholder="Contoh : Bantul, 02 September 1997" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : Bantul, 02 September 1997'" type="text">
<label>Usia:</label> <input  name="usia" placeholder="Usia" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Your birthday'" type="text">
<label>Tinggi badan:</label> <input  name="tinggi_badan" placeholder="Tinggi badan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Usia'" type="text">
<label>Berat badan:</label> <input  name="berat_badan" placeholder="Berat badan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Berat badan'" type="text">
<label>Hobi:</label> <input  name="hobi" placeholder="hobi"onfocus="this.placeholder = '' " onblur="this.placeholder = 'Hobi'" type="text">
<label>Golongan darah:</label> <input  name="golongan_darah" placeholder="Golongan darah" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Golongan darah'" type="text">
<label>Ukuran sepatu:</label> <input  name="ukuran_sepatu" placeholder="Ukuran sepatu" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Ukuran sepatu'" type="text">
<label>Ukuran baju/ T-Shirt:</label> <input  name="ukuran_baju" placeholder="Ukuran baju / T-Shirt" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Ukuran baju / T-Shirt'" type="text">
<label>Sumber Informasi : Input Langsung dari SISTEM INTEGRASI<br><br></label> 
<label>Motivasi masuk pspp:</label> <textarea name="motivasi" placeholder="Uraian Motivasi Masuk PSPP"  onfocus="this.placeholder = '' " onblur="this.placeholder = 'Uraian Motivasi Masuk PSPP'"></textarea>

<br><br>
<h2>Tempat Tinggal</h2><br>
<label>Alamat lengkap:</label> <input  name="alamat" placeholder="Contoh : Jl. Teuku Umar No XX Jakarta Utara" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : Jl. Teuku Umar No XX Jakarta Utara'" type="text">
<label>Telepon / Handphone:</label> <input  name="telp" placeholder="08XX-XXXX-XXXX" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = '08XX-XXXX-XXXX'" type="text">
<label>HP Ortu:</label> <input  name="hp_ortu" placeholder="08XX-XXXX-XXXX" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = '08XX-XXXX-XXXX'" type="text">

<br><br>
<h2>Pendidikan</h2><br>
<label>Pendidikan terakhir:</label> <input  name="pendidikan_terakhir" placeholder="Contoh : SMA/SMK" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : SMA/SMK'" type="text">
<label>Nama SMA/Universitas:</label> <input  name="nama_sma" placeholder="Contoh : SMAN 1 Jakarta" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : SMAN 1 Jakarta'" type="text">
<label>Alamat sekolah/universitas:</label> <input  name="alamat_sma" placeholder="Contoh : Jl. Gading Rejo No.09 Jakarta"  onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : Jl. Gading Rejo No.09 Jakarta'" type="text">

<br><br>
<h2>Pendidikan Formal</h2><br>
<label>Uraian:</label> <textarea name="pendidikan_formal" placeholder="Contoh : SDN 1 Marang : 2001-2007, SMP 1 Marang : 2007-2010, SMA 1 Jakarta : 2010-2013 "  onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh : SDN 1 Marang : 2001-2007, SMP 1 Marang : 2007-2010, SMA 1 Jakarta : 2010-2013 '"></textarea>

<br>
<h3>Kursus yang pernah diikuti</h3><br>
<label>Uraian:</label> <textarea name="kursus" placeholder="Contoh :  English Club Primagama"  onfocus="this.placeholder = '' " onblur="this.placeholder = 'Contoh :  English Club Primagama'"></textarea>

<label>Email address:</label> <input  name="email" placeholder="Email address" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Email address'" type="text"></input>
<label>Pin BBM :</label> <input  name="bbm" placeholder="BBM Contact" onfocus="this.placeholder = '' " onblur="this.placeholder = 'BBM Contact'" type="text"></input><br>


<input value=" Simpan " class="button" type="submit"></input> </form> 
<div class="clear"></div><p></p>
 </div>