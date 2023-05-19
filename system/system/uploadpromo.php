<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 <title>Upload Desain Promosi</title>
 
 <?php include "konek.php";
 mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','AdminWEb membuka halaman desain promosi')");?>
 <div class=col-md-9> 
 <div class="block block-transparent"> 
 <div class=header> <h2>Hay BOSS, semoga harimu menyenangkan ... <br>Cemungut.....!!</h2> 
 <div class="content gallery">

 <div class="content gallery-list"> 
 


<form action="proses_simpan_desain_promosi.php" method="post" enctype="multipart/form-data">
<br><table  cellpadding="6">
<tr>
<td>Upload Foto</td>
<td><input name="foto" type="file"></td>
</tr>
<tr>
<td>Judul Foto</td>
<td><input name="judul" type="text"></td>
</tr>
<tr>
<td>Pemilik Desain</td>
<td><input name="upload" type="text"></td>
</tr>
</table>
<input  type="submit" name="simpan" value="UPLOAD">
</form>
 
 <? ///////////// CATATAN BUAT MAS DWI ////////////////////////
 
// TUGAS BUAT MAS DWI
// MAS DWI TOLONG BUATIN PAGE UNTUK UPLOAD FOTO. PAGE BERISI FORM YANG ISINYA : 
// JUDUL PROMO :
// UPLOADED BY :
// dan button uploadernya

//hasil upload foto tampilkan seperti div dibawah ini mas.., tp data ambil dari database.
?>

 <?php
$sqltam = mysql_query("select * from desain_promo order by tanggal desc") ;
 
 while($tampilkan = mysql_fetch_array($sqltam)){
	 $foto="../img/promo/".$tampilkan['foto'];
	 $bulanya = date('m', strtotime($tampilkan['tanggal']));
$tgls = date('d', strtotime($tampilkan['tanggal']));
$TAH = date('Y', strtotime($tampilkan['tanggal']));
$jam = date('H:i:s', strtotime($tampilkan['tanggal']));
$araibulan = array(
'01' => 'Januari',
'02' => 'Febrari','03' => 'Maret',
'04' => 'April','05' => 'Mei',
'06' => 'Juni','07' => 'Juli',
'08' => 'Agustus','09' => 'September',
'10' => 'Oktober','11' => 'November',
'12' => 'Desember'

);	
	 ?><br><br><br>
	  <div class=gallery-item> <div class=gallery-image><?php echo "<img src='$foto' width='150px' height='115px' class='img-thumbnail'>";?></div> <div class=gallery-content> <div class=title>Judul Desain : <?php echo $tampilkan['judul'];?></div> <div class=text><?php echo "Pemilik Desain : "; echo $tampilkan['upload_by'];echo ", $tgls  $araibulan[$bulanya] $TAH $jam";?></div> <div class=text><a href="<?php echo  $foto="../img/promo/".$tampilkan['foto'];?>" target="_blank"></a> </div> </div> </div>
   
	 <?php
 }
 
 ?>
     
 <?// looping hasil uploader berakhir disini. DATA YANG LAMA JANGAN ADA YANG DIHAPUS YA.. ?>
 
 <!--
	<div class=gallery-item> <div class=gallery-image><img src=img/promo/20.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Kenali Dirimu dan Lakukan..</div> <div class=text>Uploaded by : mas budi, 1 November 2016 </div> <div class=text><a href="img/promo/20.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
 
     <div class=gallery-item> <div class=gallery-image><img src=img/promo/19.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Raih Mimipi Dan...</div> <div class=text>Uploaded by : mas awan, 1 November 2016 </div> <div class=text><a href="img/promo/19.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
	 
	 
 
  <div class=gallery-item> <div class=gallery-image><img src=img/promo/23.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Tata Cara Pemeriksaan</div> <div class=text>Uploaded by : mas aji, 15 Oktober 2016 </div> <div class=text><a href="img/promo/23.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
  
   <div class=gallery-item> <div class=gallery-image><img src=img/promo/22.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Yuk Daftar...</div> <div class=text>Uploaded by : mas awan, 15 Oktober 2016 </div> <div class=text><a href="img/promo/22.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
   
    <div class=gallery-item> <div class=gallery-image><img src=img/promo/21.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Mau Cari Sekolah Pramugari?</div> <div class=text>Uploaded by : mas budi, 15 Oktober 2016 </div> <div class=text><a href="img/promo/21.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
	
 

	 
  <div class=gallery-item> <div class=gallery-image><img src=img/promo/desain-mas-budi-01-09-2016.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Jangan ngaku...</div> <div class=text>Uploaded by : mas budi, 1 September 2016 </div> <div class=text><a href="img/promo/desain-mas-budi-01-09-2016.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
 
 <div class=gallery-item> <div class=gallery-image><img src=img/promo/desain-mas-awan-01-09-2016.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Masih Binung?</div> <div class=text>Uploaded by : mas awan, 1 September 2016</div> <div class=text><a href="img/promo/desain-mas-awan-01-09-2016.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
 
 
 
 <div class=gallery-item> <div class=gallery-image><img src=img/promo/desain-mas-awan-15-08-2016.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Pilih kampus mana?</div> <div class=text>Uploaded by : mas awan, 1 Agustus 2016 </div> <div class=text><a href="img/promo/desain-mas-awan-15-08-2016.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
 
 <div class=gallery-item> <div class=gallery-image><img src=img/promo/desain-mas-aji-15-08-2016.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Praktek terbang</div> <div class=text>Uploaded by : mas aji, 15 Agustus 2016</div> <div class=text><a href="img/promo/desain-mas-aji-15-08-2016.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
 
 <div class=gallery-item> <div class=gallery-image><img src=img/promo/desain-mas-budi-15-08-2016.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Jadilah pramugari</div> <div class=text>Uploaded by : mas budi, 15 Agustus 2016</div> <div class=text><a href="img/promo/desain-mas-budi-15-08-2016.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
 
	 <div class=gallery-item> <div class=gallery-image><img src=img/promo/desain-mas-budi-01-08-2016.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Pengen Jadi Pramugari?</div> <div class=text>Uploaded by : mas budi, 1 Agustus 2016</div> <div class=text><a href="img/promo/desain-mas-budi-01-08-2016.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
	 
	 
  	 <div class=gallery-item> <div class=gallery-image><img src=img/promo/desain-mas-awan-18-17-2016.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Pilihan program studi</div> <div class=text>Uploaded by : mas awan, 18 juli 2016</div> <div class=text><a href="img/promo/desain-mas-awan-18-17-2016.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
	 
 
  	 <div class=gallery-item> <div class=gallery-image><img src=img/promo/desain-mas-budi-18-17-2016.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Mereka Bilang</div> <div class=text>Uploaded by : mas budi lampung, 18 juli 2016</div> <div class=text><a href="img/promo/desain-mas-budi-18-17-2016.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
	 
 
 
 	 <div class=gallery-item> <div class=gallery-image><img src=img/promo/happy-ied2-by-mas-aji.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Selamat Idul Fitri 1437H</div> <div class=text>Uploaded by : adjie septiawan jakarta, 01 juli 2016</div> <div class=text><a href="img/promo/happy-ied2-by-mas-aji.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
	 
	 	 <div class=gallery-item> <div class=gallery-image> <img src=img/promo/happy-ied-by-mas-ilham.jpg class=img-thumbnail width=150 height=115> </div> <div class=gallery-content> <div class=title>Selamat Idul Fitri 1437H</div> <div class=text>Uploaded by : Mas Ilham Makassar, 1 Juli 2016</div> <div class=text><a href="img/promo/happy-ied-by-mas-ilham.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
		 
		 

	 <div class=gallery-item> <div class=gallery-image> <img src=img/promo/happy-ied-by-mas-awan.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Selamat Idul Fitri 1437H</div> <div class=text>Uploaded by : Awan Jogja, 01 juli 2016</div> <div class=text><a href="img/promo/happy-ied-by-mas-awan.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>
	 
   

       <div class=gallery-item> <div class=gallery-image><img src=img/promo/happy-ied-by-mas-budi-lampung.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Selamat Idul Fitri 1437H</div> <div class=text>Uploaded by : mas budi lampung, 29 jun 2016</div> <div class=text><a href="img/promo/happy-ied-by-mas-budi-lampung.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>  
	
	
    <div class=gallery-item> <div class=gallery-image> <img src=img/promo/promo3-by-mas-ilham.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Desain Promosi </div> <div class=text>Uploaded by : mas ilham makassar, 01 juli 2016</div> <div class=text><a href="img/promo/promo3-by-mas-ilham.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>  
	
	     <div class=gallery-item> <div class=gallery-image> <img src=img/promo/happy-ied-by-mas-aji-jakarta.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Selamat Idul Fitri 1437H</div> <div class=text>Uploaded by : aji septiawan, 16 jun 2016</div> <div class=text><a href="img/promo/happy-ied-by-mas-aji-jakarta.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>  
	
   <div class=gallery-item> <div class=gallery-image> <img src=img/promo/promo3.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Disini tmpatnya..</div> <div class=text>Uploaded by : admin, 16 jun 2016</div> <div class=text><a href="img/promo/promo3.jpg" target="_blank"> <button class="btn btn-warning btn-block">Download</button></a> </div> </div> </div>  
   
   
  <div class=gallery-item> <div class=gallery-image><img src=img/promo/promo2.jpg class=img-thumbnail width=150 height=115> </div> <div class=gallery-content> <div class=title>Sukses UNBK 2016</div> <div class=text>Uploaded by : admin, 16 jun 2016</div> <div class=text> <a href="img/promo/promo2.jpg" target="_blank"><button class="btn btn-warning btn-block">Download</button> </a></div> </div> </div>  
  

   
   <div class=gallery-item> <div class=gallery-image> <img src=img/promo/promo1.jpg class=img-thumbnail width=150 height=115></div> <div class=gallery-content> <div class=title>Selamat datang</div> <div class=text>Uploaded by : admin, 16 jun 2016</div> <div class=text> <a href="img/promo/promo1.jpg" target="_blank"><button class="btn btn-warning btn-block">Download</button> </a></div> </div> </div>  -->
   
 </div> </div><br></div></div>
 