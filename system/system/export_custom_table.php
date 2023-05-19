<? session_start();
$halaman=$_REQUEST['id'];
if ($halaman<>"100"){ $_SESSION[id_pagew]=$halaman;}
include "konek.php";
$halaman=$_SESSION[id_pagew];
$marketing=  explode(" | ",$_GET[marketing]);

if ($_GET[kampus]=="Semua Kampus"){ $filter_cari=$filter_cari; } elseif ($_GET[kampus]=="PSPP Lampung"){$filter_cari=$filter_cari." and tempat_kuliah='PSPP Lampung'";}  elseif ($_GET[kampus]=="PSPP Jakarta"){$filter_cari=$filter_cari." and tempat_kuliah='PSPP Jakarta'";} elseif ($_GET[kampus]=="PSPP Yogyakarta"){$filter_cari=$filter_cari." and tempat_kuliah='PSPP Yogyakarta'";}
if ($_GET[jurusan]<>""){ $filter_cari=$filter_cari." and jurusan='$_GET[jurusan]'";}
if ($_GET[bayar]=="Semua Siswa Sudah Mendaftar"){ $filter_cari=$filter_cari; } elseif ($_GET[bayar]=="Siswa Belum Membayar Biaya Pendaftaran"){$filter_cari=$filter_cari." and validasi_pendaftaran='Belum Divalidasi'";}  elseif ($_GET[bayar]=="Siswa Sudah Membayar Biaya Pendaftaran"){$filter_cari=$filter_cari." and validasi_pendaftaran='Sudah Divalidasi'";} 
if ($_GET[diterima]=="Semua Siswa Belum & Sudah Diterima"){ $filter_cari=$filter_cari; } elseif ($_GET[diterima]=="Siswa Tidak Diterima"){$filter_cari=$filter_cari." and status_seleksi='Tidak Diterima'";}  elseif ($_GET[diterima]=="Siswa Diterima"){$filter_cari=$filter_cari." and status_seleksi='Sudah Diterima'";} 
if ($_GET[diseleksi]=="Siswa Belum Diseleksi"){$filter_cari=$filter_cari." and status_seleksi='Belum Diseleksi'";}
if ($_GET[intreview]=="Siswa Sudah Interview"){ $filter_cari=$filter_cari." and catatan_interview<>''";}  elseif ($_GET[interview]=="Siswa Belum Interview"){$filter_cari=$filter_cari." and catatan_interview=''";} 
if ($_GET[daftar_ulang]=="Siswa Sudah Daftar Ulang"){ $filter_cari=$filter_cari." and status_daftarulang='Sudah'";}  elseif ($_GET[daftar_ulang]=="Siswa Belum Daftar Ulang"){$filter_cari=$filter_cari." and status_daftarulang='Belum'";} elseif ($_GET[daftar_ulang]=="Siswa Belum Daftar Ulang"){$filter_cari=$filter_cari." and status_daftarulang='Belum'";}  elseif ($_GET[daftar_ulang]=="Siswa Mengundurkan Diri"){$filter_cari=$filter_cari." and status_daftarulang='Mengundurkan Diri'";} 
if ($_GET[marketing]<>"Semua Marketing | All"){ $filter_cari=$filter_cari." and marketing='$marketing[1]'";}


echo $_GET[ck_jurusan];



if ($halaman=="1"){ echo "Data ditampilkan : ".$_GET[kampus].", ".$_GET[jurusan].", ".$_GET[bayar].", ".$_GET[diterima].", ".$_GET[intreview].", ".$_GET[daftar_ulang].", Marketing ".$marketing[0];?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <? echo $th;?></tr> </thead> <tbody> 
			
			
			<?$a=0; $query = mysql_query("select * from siswa where nama<>'' $hak_akses_publik $psb_aktif $filter_cari order by siswa.nama asc"); while($b=mysql_fetch_row($query)) { $a=$a+1;
			
			
			$td="<td>".$b[2]."</td>";?>			
			
			
			
			
			<tr>   <td><? echo $a; ?></td> <? echo $td;?></tr> <? }?> 
	</tbody> </table> 
<? }?>
			 

