<? session_start();
$halaman=$_REQUEST['id'];
include "konek.php";

if ($_GET[kelas]==""){$psb_aktif=" and jurusan='".$_SESSION['psb.aktif']."' ";}else{$psb_aktif=" and jurusan='".$_GET[kelas]."' "; $_SESSION['psb.aktif']=$_GET[kelas];}

if ($halaman=="1"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><th>Status Interview</th><th></th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa where nama<>'' and validasi_pendaftaran='Sudah Divalidasi' and status_seleksi='Belum Diseleksi' $hak_akses_publik $psb_aktif $filter_cari  order by siswa.nama asc"); while($b=mysql_fetch_array($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td> <a href="#" onClick=Catatan(<? echo $b[0];?>)> <? echo $b[2];?>  <span class="icon-book"></span></a> &nbsp;<a href="#hapus" onClick=BoxDelete(<? echo $b[0];?>)  data-title="Konfirmasi Hapus"  class="modal-ajax tip" data-original-title="Hapus"><span class="icon-trash"></span></a></td> <td><? echo $b[6];?></td><td><? echo $b[10];?></td><td><? echo $b[11];?></td><td><a href="#" onClick=Catatan(<? echo $b[0];?>)> <? if($b[id_interview]==""){echo "<font color=yellow>Belum Interview </font>";}else{echo "Sudah Interview";}?> <span class="icon-book"></span></a> <? if ($_SESSION[hak_akses_public]=="true"){?><button class="btn btn-default btn-clean" type=button  onClick=Upload_Surat(<? echo $b[0];?>)>Upload Surat</button><?}?></td><? if ($_SESSION[hak_akses_public]=="true"){?><td><button class="btn btn-default btn-clean" type=button onClick=Terima(<? echo $b[0];?>)>Terima</button><button class="btn btn-default btn-clean" type=button onClick=Tolak(<? echo $b[0];?>)>Failled</button></td><?}?></tr> <? }?> 
	</tbody> </table> 
<?} elseif ($halaman=="2"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><th>Status Interview</th><th></th></tr> 
			</thead> <tbody> 
			<?$a=0;$query = mysql_query("select * from siswa where nama<>''and validasi_pendaftaran='Sudah Divalidasi' and status_seleksi='Sudah Diterima'  $hak_akses_publik $psb_aktif $filter_cari order by siswa.nama asc"); while($b=mysql_fetch_array($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td> <a href="#" onClick=Catatan(<? echo $b[0];?>)> <? echo $b[2];?>  <span class="icon-book"></span></a> &nbsp;<a href="#hapus" onClick=BoxDelete(<? echo $b[0];?>)  data-title="Konfirmasi Hapus"  class="modal-ajax tip" data-original-title="Hapus"><span class="icon-trash"></span></a></td> <td><? echo $b[6];?></td><td><? echo $b[10];?></td><td><? echo $b[11];?></td><td><a href="#" onClick=Catatan(<? echo $b[0];?>)> <? if($b[id_interview]==""){echo "<font color=yellow>Belum Interview </font>";}else{echo "Sudah Interview";}?> <span class="icon-book"></span></a> <? if ($_SESSION[hak_akses_public]=="true"){?><button class="btn btn-default btn-clean" type=button  onClick=Upload_Surat(<? echo $b[0];?>)>Upload Surat</button><?}?></td><? if ($_SESSION[hak_akses_public]=="true"){?><td><button class="btn btn-default btn-clean" type=button  onClick=Batal(<? echo $b[0];?>)>Batalkan!</button></td><?}?></tr> <? }?> 
	</tbody> </table> 
<? }elseif ($halaman=="3"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><th>Status Interview</th><th></th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa where nama<>'' and validasi_pendaftaran='Sudah Divalidasi' and status_seleksi='Tidak Diterima' $hak_akses_publik $psb_aktif $filter_cari  order by siswa.nama asc"); while($b=mysql_fetch_array($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td> <a href="#" onClick=Catatan(<? echo $b[0];?>)> <? echo $b[2];?> <span class="icon-book"></span></a> &nbsp;<a href="#hapus" onClick=BoxDelete(<? echo $b[0];?>)  data-title="Konfirmasi Hapus"  class="modal-ajax tip" data-original-title="Hapus"><span class="icon-trash"></span></a></td> <td><? echo $b[6];?></td><td><? echo $b[10];?></td><td><? echo $b[11];?></td><td><a href="#" onClick=Catatan(<? echo $b[0];?>)>  <? if($b[id_interview]==""){echo "<font color=yellow>Belum Interview </font>";}else{echo "Sudah Interview";}?> <span class="icon-book"></span></a> <? if ($_SESSION[hak_akses_public]=="true"){?><button class="btn btn-default btn-clean" type=button  onClick=Upload_Surat(<? echo $b[0];?>)>Upload Surat</button><?}?></td><? if ($_SESSION[hak_akses_public]=="true"){?><td><button class="btn btn-default btn-clean" type=button  onClick=Batal(<? echo $b[0];?>)>Batalkan!</button></td><?}?></tr> <? }?> 
	</tbody> </table> 
<? }?>