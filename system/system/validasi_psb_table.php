<? session_start();
$halaman=$_REQUEST['id'];
include "konek.php";
if ($_GET[kelas]==""){$psb_aktif=" and jurusan='".$_SESSION['psb.aktif']."' ";}else{$psb_aktif=" and jurusan='".$_GET[kelas]."' "; $_SESSION['psb.aktif']=$_GET[kelas];}

if ($halaman=="2"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><? if ($_SESSION[hak_akses_public]=="true"){?><th></th><?}?></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa where nama<>'' and validasi_pendaftaran='Belum Divalidasi'  $hak_akses_publik $psb_aktif $filter_cari  order by siswa.nama asc"); while($b=mysql_fetch_row($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><? echo $b[2];?>  </td> <td><? echo $b[6];?></td><td><? echo $b[10];?></td><td><? echo $b[11];?></td><? if ($_SESSION[hak_akses_public]=="true"){?><td><button class="btn btn-default btn-clean" type=button onClick=Validasi(<? echo $b[0];?>)>Validasi Pembayaran!</button></td><?}?></tr> <? }?> 
	</tbody> </table> 
<?} elseif ($halaman=="1"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><th>Tanggal Pembayaran</th><? if ($_SESSION[hak_akses_public]=="true"){?><th></th><?}?></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa where nama<>'' and validasi_pendaftaran='Sudah Divalidasi'  $hak_akses_publik $psb_aktif $filter_cari  order by siswa.nama asc"); while($b=mysql_fetch_row($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><a href="#" onClick=BoxEdit(<? echo $b[0];?>) data-title="Edit Data PSB"  class="modal-ajax tip" data-original-title="Edit data <? echo $b[2];?>"><? echo $b[2];?> <span class="icon-edit"></span></a> &nbsp;<a href="#hapus" onClick=BoxDelete(<? echo $b[0];?>)  data-title="Konfirmasi Hapus"  class="modal-ajax tip" data-original-title="Hapus"><span class="icon-trash"></span></a> &nbsp; <a href="#cetak_formulir" onClick=Formulir(<? echo $b[0];?>)><span class="icon-print"></span></a></td> <td><? echo $b[6];?></td><td><? echo $b[10];?></td><td><? echo $b[11];?></td><td><? echo $b[66].", PWD TES ONLINE : <font color='yellow'>".$b[0]."</font>";?></td><? if ($_SESSION[hak_akses_public]=="true"){?><td><button class="btn btn-default btn-clean" type=button  onClick=BatalkanValidasi(<? echo $b[0];?>)>Batalkan Validasi!</button></td><?}?></tr> <? }?> 
	</tbody> </table> 
<? }?>