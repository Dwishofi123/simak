<? session_start();
$halaman=$_REQUEST['id'];
if ($halaman<>"100"){ $_SESSION[id_pagew]=$halaman;}
include "konek176.php";
if ($_GET[kelas]==""){$psb_aktif=" and jurusan='".$_SESSION['psb.aktif']."' ";}else{$psb_aktif=$_GET[kelas]; $_SESSION['psb.aktif']=$_GET[kelas];}

   $filter_cari=" and validasi_pendaftaran='Sudah Divalidasi' and status_seleksi='Sudah Diterima' and status_daftarulang='Sudah'";



$halaman=$_SESSION[id_pagew];

if ($halaman=="1"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			  <tr> <th width="30">No</th> <th>Nama</th> <th >Asal Sekolah</th> <th >Marketing </th><th>Tot_B_Penddkn</th> <th>Tota_Pembyrn</th><th>Sisa_B_Penddkn</th></tr>
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa_aktif where nama<>'' $hak_akses_publik $psb_aktif $filter_cari order by siswa_aktif.nama asc"); while($b=mysql_fetch_array($query)) {
			$a=$a+1;?>
			<tr>   
			<td><? echo $a; ?></td> 
			<td><a href="#view_angsuran" onClick=ViewAngsuran(<? echo $b[0];?>) ><? echo $b[2];?> <span class="icon-list"></span></a>  <a href="#bayar_angsuran" onClick=BayarAngsuran(<? echo $b[0];?>) ><span class="icon-plus-sign-alt"></span></a></td> 
			<td> <? echo $b[asal_sekolah];?></td> 
			<td><?  $quer = mysql_query("select nama from pegawai where id='$b[marketing]'"); while($y=mysql_fetch_array($quer)) { echo $y[0]; } ?></td> <td><? echo "Rp ". number_format($b[total_biaya_pendidikan],0,',','.');?></td> <td><? echo "Rp ". number_format($b[total_pembayaran],0,',','.');?></td><td><? echo "Rp ". number_format(strval($b[total_biaya_pendidikan])-strval($b[total_pembayaran]),0,',','.');?></td></tr> <? }?> 
	</tbody> </table> 
<? } elseif ($halaman=="2"){?>

		 <? $querye = mysql_query("select DISTINCT siswa_aktif.Tempat_Kuliah from siswa_aktif where siswa_aktif.Tempat_Kuliah<>'' $hak_akses_publik $psb_aktif"); while($e=mysql_fetch_row($querye)) {
		 $kampus=$e[0];
		  $quera = mysql_query("select * from siswa_aktif where siswa_aktif.Tempat_Kuliah='$kampus' $psb_aktif order by siswa_aktif.nama asc"); if ($quera){ 
		 ?>
		 
		 <div class="bg-default bg-light"><h2> Kampus PSPP <? echo $kampus." ".$jurusan;?></h2></div>
		  <table border=1 class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
		 <tr> <th width="30">No</th> <th>No.Register</th> <th >Nama</th> <th >Marketing </th><th>No. HP</th> <th>HP. Ortu</th><th>Asal Sekolah</th></tr> 
		</thead> <tbody> 
		<?$a=0; 
		$query = mysql_query("select * from siswa_aktif where nama<>''  and Tempat_Kuliah='$kampus'  $psb_aktif  $filter_cari  order by siswa_aktif.nama asc");  while($b=mysql_fetch_array($query)) {
		$a=$a+1;  ?>
		<tr>   
		<td><? echo $a; ?></td> 
		<td><? echo $b[1];?></td> <td><a href="#view_angsuran" onClick=ViewAngsuran(<? echo $b[0];?>) ><? echo $b[2];?> <span class="icon-list"></span></a>  <a href="#bayar_angsuran" onClick=BayarAngsuran(<? echo $b[0];?>) ><span class="icon-plus-sign-alt"></span></a> </td> <td><? echo $b[marketing];?></td> <td><? $hp = substr("$b[no_telp]", 0, -2); echo $hp."xx";?></td> <td><? $hp = substr("$b[hp_ortu]", 0, -2); echo $hp."xx";?></td><td><? echo $b[asal_sekolah];?></td></tr> 
		<?} ?> 
		 </tbody> </table> 
		<br>
		 <br><br>
		  
		 <? }}?>

<?} elseif ($halaman=="3"){?>
					
				 <? $querye = mysql_query("select DISTINCT siswa_aktif.Tempat_Kuliah from siswa_aktif where siswa_aktif.Tempat_Kuliah<>'' $hak_akses_publik $psb_aktif"); while($e=mysql_fetch_row($querye)) {
				 $kampus=$e[0];
				 $querys = mysql_query("select DISTINCT siswa_aktif.Jurusan from siswa_aktif where siswa_aktif.Jurusan<>'' $hak_akses_publik  $psb_aktif "); while($c=mysql_fetch_row($querys)) {
				 $jurusan=$c[0];
				 
				//cek isi siswa_aktif per kelas , jika kosong, kelas abaikan
				  $c=0; $query = mysql_query("select * from siswa_aktif where nama<>''  and tempat_Kuliah='$kampus' and siswa_aktif.Jurusan = '$jurusan' $psb_aktif  $filter_cari  order by siswa_aktif.nama asc");  while($b=mysql_fetch_array($query)) { $c=$c+1; } if ($c>0){?>
				 
				 
				 <div class="bg-default bg-light"><h2>Prodi <? echo $jurusan." ".$kampus;?></h2></div>
				  <table border=1 class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;"> <thead> 
				 <tr> <th width="30">No</th> <th>No.Register</th> <th >Nama</th> <th >Marketing </th><th>No. HP</th> <th>HP. Ortu</th><th>Asal Sekolah</th></tr> 
				</thead> <tbody> 
				<?$a=0; $query = mysql_query("select * from siswa_aktif where nama<>'' and Tempat_Kuliah='$kampus' and siswa_aktif.Jurusan = '$jurusan'  $psb_aktif  $filter_cari  order by siswa_aktif.nama asc");  while($b=mysql_fetch_array($query)) {
				$a=$a+1;  ?>
				<tr>   <td><? echo $a; ?></td> <td><? echo $b[1];?></td> <td><a href="#view_angsuran" onClick=ViewAngsuran(<? echo $b[0];?>) ><? echo $b[2];?> <span class="icon-list"></span></a>  <a href="#bayar_angsuran" onClick=BayarAngsuran(<? echo $b[0];?>) ><span class="icon-plus-sign-alt"></span></a></td> <td><? echo $b[marketing];?></td> <td><? $hp = substr("$b[no_telp]", 0, -2); echo $hp."xx";?></td> <td><? $hp = substr("$b[hp_ortu]", 0, -2); echo $hp."xx";?></td><td><? echo $b[asal_sekolah];?></td></tr> 
				<?} ?> 
				 </tbody> </table> <br><br><br>
				  
				 <? }}}?>


<?} elseif ($halaman=="4"){?>
			  <? $querye = mysql_query("select DISTINCT siswa_aktif.Marketing from siswa_aktif where nama<>'' $hak_akses_publik $psb_aktif order by siswa_aktif.Marketing asc"); while($e=mysql_fetch_row($querye)) { $marketing="Not Found"; $idmarketing="not found";
			  $queryes = mysql_query("select nama,id from pegawai where id='$e[0]'");while($f=mysql_fetch_row($queryes)) { $marketing=$f[0];  $idmarketing=$f[1];}

			 //cek isi siswa_aktif per marketing , jika kosong, markketing abaikan
			  $c=0; $queryu = mysql_query("select * from siswa_aktif where nama<>'' and Marketing='$idmarketing' $psb_aktif  $filter_cari  order by siswa_aktif.nama asc");  while($b=mysql_fetch_row($queryu)) { $c=$c+1; } if ($c>0){?>
			 
			<div class="bg-default bg-light"><h2>Marketing : <? echo $marketing;?></h2></h2>
			  <table border=1 class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;"> <thead> 
			 <tr> <th width="30">No</th> <th>No.Register</th> <th >Nama</th> <th>No. Telp</th> <th>HP. Ortu</th><th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th></tr>  
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa_aktif where nama<>'' and Marketing='$idmarketing'  $psb_aktif  $filter_cari  order by siswa_aktif.nama asc");  while($b=mysql_fetch_array($query)) {
			$a=$a+1;  ?>
			<tr>   
			<td><? echo $a; ?></td> <td><? echo $b[1];?></td> 
			<td><a href="#view_angsuran" onClick=ViewAngsuran(<? echo $b[0];?>) ><? echo $b[2];?> <span class="icon-list"></span></a>  <a href="#bayar_angsuran" onClick=BayarAngsuran(<? echo $b[0];?>) ><span class="icon-plus-sign-alt"></span></a> </td>  
			<td><? $hp = substr("$b[no_telp]", 0, -2); echo $hp."xx";?></td> <td><? $hp = substr("$b[hp_ortu]", 0, -2); echo $hp."xx";?></td><td><? echo $b[asal_sekolah];?></td><td><? echo $b[jurusan];?></td><td><? echo $b[kampus];?></td></tr>
			<?} ?> 
			 </tbody> </table> <br><br><br>
			  
			 <?}}?>
<?}?>