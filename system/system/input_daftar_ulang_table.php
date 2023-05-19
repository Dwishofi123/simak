<? session_start();
$halaman=$_REQUEST['id'];
include "konek.php";
if ($_GET[kelas]==""){$psb_aktif=" and jurusan='".$_SESSION['psb.aktif']."' ";}else{$psb_aktif=" and jurusan='".$_GET[kelas]."' "; $_SESSION['psb.aktif']=$_GET[kelas];}

if ($halaman=="1"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><th>Status Daftar Ulang</th><th></th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa where nama<>'' and validasi_pendaftaran='Sudah Divalidasi' and status_seleksi='Sudah Diterima' $hak_akses_publik $psb_aktif $filter_cari order by siswa.nama asc"); while($b=mysql_fetch_row($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><? echo $b[2];?>  <? if ($b[48]=="Sudah" or $b[48]=="Mengundurkan Diri"){?>&nbsp; <a href="#cetak_kwitansi" onClick=CetakKwitansi(<? echo $b[0];?>)><span class="icon-print"></span></a><?}?></td> <td><? echo $b[6];?></td><td><? echo $b[10];?></td><td><? echo $b[11];?></td><td><?  if ($b[48]=="Belum"){ echo "<font color='yellow'>(Blm.Reg.Ulang)</font>"; }else{ echo $b[48];}?></td><td><? if ($b[48]=="Belum"){?><button class="btn btn-default btn-warning" type=button onClick=DaftarUlang(<? echo $b[0];?>)>Daftar Ulang Sekarang!</button><?}?><? if ($b[48]=="Sudah" or $b[48]=="Mengundurkan Diri"){?><div class="btn-group"> <button type="button" class="btn btn-default btn-clean" onClick=Batal(<? echo $b[0];?>)>Batalkan</button> <button type="button" class="btn btn-default btn-clean dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> </button> <ul class="dropdown-menu" role="menu"> <li><a href="#MengundurkanDiri" onClick=MengundurkanDiri(<? echo $b[0];?>)>Mengundurkan Diri</a></li> <li><a href="#Batalkan" onClick=Batal(<? echo $b[0];?>)>Batalkan Daftar Ulang</a></li></ul> </div> </div> <?}?></td></tr> <? }?> 
	</tbody> </table> 
<?} elseif ($halaman=="2"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><th>Status Daftar Ulang</th><th></th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa where nama<>''and validasi_pendaftaran='Sudah Divalidasi' and status_seleksi='Sudah Diterima' and status_daftarulang='Belum'  $hak_akses_publik $psb_aktif $filter_cari order by siswa.nama asc"); while($b=mysql_fetch_row($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><? echo $b[2];?>  </td> <td><? echo $b[6];?></td><td><? echo $b[10];?></td><td><? echo $b[11];?></td><td><?  if ($b[48]=="Belum"){ echo "<font color='yellow'>(Blm.Reg.Ulang)</font>"; }else{ echo "Sudah";}?></td><td><? if ($b[48]=="Belum"){?><button class="btn btn-default btn-warning" type=button onClick=DaftarUlang(<? echo $b[0];?>)>Daftar Ulang Sekarang!</button><?}?></td></tr> <? }?> 
	</tbody> </table> 
<? }elseif ($halaman=="3"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><th>Status Daftar Ulang</th><th></th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa where nama<>'' and validasi_pendaftaran='Sudah Divalidasi' and status_seleksi='Sudah Diterima' and status_daftarulang='Sudah' $hak_akses_publik $psb_aktif $filter_cari order by siswa.nama asc"); while($b=mysql_fetch_row($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><? echo $b[2];?>  <? if ($b[48]=="Sudah" or $b[48]=="Mengundurkan Diri"){?>&nbsp; <a href="#cetak_kwitansi" onClick=CetakKwitansi(<? echo $b[0];?>)><span class="icon-print"></span></a><?}?></td> <td><? echo $b[6];?></td><td><? echo $b[10];?></td><td><? echo $b[11];?></td><td><?  if ($b[48]=="Belum"){ echo "<font color='yellow'>(Blm.Reg.Ulang)</font>"; }else{ echo $b[48];}?></td><td><? if ($b[48]=="Sudah" or $b[48]=="Mengundurkan Diri"){?><div class="btn-group"> <button type="button" class="btn btn-default btn-clean" onClick=Batal(<? echo $b[0];?>)>Batalkan</button> <button type="button" class="btn btn-default btn-clean dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> </button> <ul class="dropdown-menu" role="menu"> <li><a href="#MengundurkanDiri" onClick=MengundurkanDiri(<? echo $b[0];?>)>Mengundurkan Diri</a></li> <li><a href="#Batalkan" onClick=Batal(<? echo $b[0];?>)>Batalkan Daftar Ulang</a></li></ul> </div> </div> <?}?></td></tr> <? }?> 
	</tbody> </table> 
	<? }elseif ($halaman=="4"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><th>Status Daftar Ulang</th><th></th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa where nama<>'' and validasi_pendaftaran='Sudah Divalidasi' and status_seleksi='Sudah Diterima' and status_daftarulang='Mengundurkan Diri' $hak_akses_publik $psb_aktif $filter_cari order by siswa.nama asc"); while($b=mysql_fetch_row($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><? echo $b[2];?><? if ($b[48]=="Sudah" or $b[48]=="Mengundurkan Diri"){?>&nbsp; <a href="#cetak_kwitansi" onClick=CetakKwitansi(<? echo $b[0];?>)><span class="icon-print"></span></a><?}?></td> <td><? echo $b[6];?></td><td><? echo $b[10];?></td><td><? echo $b[11];?></td><td><?  if ($b[48]=="Belum"){ echo "<font color='yellow'>(Blm.Reg.Ulang)</font>"; }else{ echo $b[48];}?></td><td><? if ($b[48]=="Sudah" or $b[48]=="Mengundurkan Diri"){?><div class="btn-group"> <button type="button" class="btn btn-default btn-clean" onClick=Batal(<? echo $b[0];?>)>Batalkan</button> <button type="button" class="btn btn-default btn-clean dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> </button> <ul class="dropdown-menu" role="menu"> <li><a href="#MengundurkanDiri" onClick=MengundurkanDiri(<? echo $b[0];?>)>Mengundurkan Diri</a></li> <li><a href="#Batalkan" onClick=Batal(<? echo $b[0];?>)>Batalkan Daftar Ulang</a></li></ul> </div> </div> <?}?></td></tr> <? }?> 
	</tbody> </table> 
<? }?>

