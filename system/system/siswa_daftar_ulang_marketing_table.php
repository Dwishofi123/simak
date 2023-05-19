<? session_start();
$halaman=$_REQUEST['id'];
include "konek.php";
if ($_GET[kelas]==""){$psb_aktif=" and jurusan='".$_SESSION['psb.aktif']."' ";}else{$psb_aktif=" and jurusan='".$_GET[kelas]."' "; $_SESSION['psb.aktif']=$_GET[kelas];}
$filter_marketing=" and Marketing='$_SESSION[id_login]'";


if ($halaman=="1"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><th>Status Daftar Ulang</th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa where nama<>'' and validasi_pendaftaran='Sudah Divalidasi' and status_seleksi='Sudah Diterima' $hak_akses_publik $filter_marketing $psb_aktif $filter_cari order by siswa.nama asc"); while($b=mysql_fetch_row($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><? echo $b[2];?> <a href="#view_angsuran" onClick=BoxEdit(<? echo $b[0];?>) data-title="Edit Data PSB"  class="modal-ajax tip" data-original-title="Edit data <? echo $b[2];?>"><? echo $b[2];?> <span class="icon-list"></span></a>  <? if ($b[48]=="Sudah" or $b[48]=="Mengundurkan Diri"){?>&nbsp; <a href="#cetak_kwitansi" onClick=CetakKwitansi(<? echo $b[0];?>)><span class="icon-print"></span></a><?}?></td> <td><? echo $b[6];?></td><td><? echo $b[10];?></td><td><? echo $b[11];?></td><td><?  if ($b[48]=="Belum"){ echo "<font color='yellow'>(Blm.Reg.Ulang)</font>"; }else{ echo $b[48];}?></td></tr> <? }?> 
	</tbody> </table> 
<?} elseif ($halaman=="2"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><th>Status Daftar Ulang</th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa where nama<>''and validasi_pendaftaran='Sudah Divalidasi' and status_seleksi='Sudah Diterima' and status_daftarulang='Belum'  $hak_akses_publik $filter_marketing $psb_aktif $filter_cari order by siswa.nama asc"); while($b=mysql_fetch_row($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><? echo $b[2];?> <a href="#view_angsuran" onClick=BoxEdit(<? echo $b[0];?>) data-title="Edit Data PSB"  class="modal-ajax tip" data-original-title="Edit data <? echo $b[2];?>"><? echo $b[2];?> <span class="icon-list"></span></a>  <? if ($b[48]=="Sudah" or $b[48]=="Mengundurkan Diri"){?>&nbsp; <a href="#cetak_kwitansi" onClick=CetakKwitansi(<? echo $b[0];?>)><span class="icon-print"></span></a><?}?></td> <td><? echo $b[6];?></td><td><? echo $b[10];?></td><td><? echo $b[11];?></td><td><?  if ($b[48]=="Belum"){ echo "<font color='yellow'>(Blm.Reg.Ulang)</font>"; }else{ echo $b[48];}?></td></tr> <? }?> 
	</tbody> </table> 
<? }elseif ($halaman=="3"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><th>Status Daftar Ulang</th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa where nama<>'' and validasi_pendaftaran='Sudah Divalidasi' and status_seleksi='Sudah Diterima' and status_daftarulang='Sudah' $hak_akses_publik $filter_marketing $psb_aktif $filter_cari order by siswa.nama asc"); while($b=mysql_fetch_row($query)) {
			$a=$a+1;?>
			<tr>   
			<td><? echo $a; ?></td> 
			<td>
				<a href="#view_angsuran" onClick=BoxEdit(<? echo $b[0];?>) data-title="Edit Data PSB"  class="modal-ajax tip" data-original-title="Edit data <? echo $b[2];?>"><? echo $b[2];?> <span class="icon-list"></span></a>  
				<? if ($b[48]=="Sudah" or $b[48]=="Mengundurkan Diri"){?>&nbsp; <a href="#cetak_kwitansi" onClick=CetakKwitansi(<? echo $b[0];?>)><span class="icon-print"></span></a><?}?>
			</td> 
			<td><? echo $b[6];?></td>
			<td><? echo $b[10];?></td>
			<td><? echo $b[11];?></td>
			<td><?  if ($b[48]=="Belum"){ echo "<font color='yellow'>(Blm.Reg.Ulang)</font>"; }else{ echo $b[48];}?></td></tr> <? }?> 
	</tbody> </table> 
	<? }elseif ($halaman=="4"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><th>Status Daftar Ulang</th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa where nama<>'' and validasi_pendaftaran='Sudah Divalidasi' and status_seleksi='Sudah Diterima' and status_daftarulang='Mengundurkan Diri' $hak_akses_publik $filter_marketing $psb_aktif $filter_cari order by siswa.nama asc"); while($b=mysql_fetch_row($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><a href="#view_angsuran" onClick=BoxEdit(<? echo $b[0];?>) data-title="Edit Data PSB"  class="modal-ajax tip" data-original-title="Edit data <? echo $b[2];?>"><? echo $b[2];?> <span class="icon-list"></span></a>  <? if ($b[48]=="Sudah" or $b[48]=="Mengundurkan Diri"){?>&nbsp; <a href="#cetak_kwitansi" onClick=CetakKwitansi(<? echo $b[0];?>)><span class="icon-print"></span></a><?}?></td> <td><? echo $b[6];?></td><td><? echo $b[10];?></td><td><? echo $b[11];?></td><td><?  if ($b[48]=="Belum"){ echo "<font color='yellow'>(Blm.Reg.Ulang)</font>"; }else{ echo $b[48];}?></td></tr> <? }?> 
	</tbody> </table> 
<? }?>

