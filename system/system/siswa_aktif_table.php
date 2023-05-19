<? session_start();
$halaman=$_REQUEST['id'];



if ($halaman<>"100"){ $_SESSION[id_pagew]=$halaman;}
include "konek176.php";
if ($_GET[kelas]=="")
{
	//$psb_aktif=" and jurusan='".$_SESSION['psb.aktif']."' and tempat_kuliah='".$_SESSION[kampus.aktif]."' ";}else{$psb_aktif=" and jurusan='".$_GET[kelas]."' and tempat_kuliah='".$_GET[kampus]."' "; $_SESSION['psb.aktif']=$_GET[kelas]; $_SESSION[kampus.aktif]=$_GET[kampus];
	$psb_aktif=" and jurusan='".$_SESSION['psb.aktif']."' and tempat_kuliah='".$_SESSION['unit']."' ";
}
else
{
	$psb_aktif=" and jurusan='".$_GET[kelas]."' and tempat_kuliah='".$_GET[kampus]."' "; 
	$_SESSION['psb.aktif']=$_GET[kelas]; 
	$_SESSION['kampus.aktif']=$_GET[kampus];
}
if ($halaman=="100"){ 
   if ($_SESSION[filter_psb]=="") {$_SESSION[filter_psb]="";} else { $_SESSION[filter_psb]="";}
}

$filter_cari=$_SESSION[filter_psb]; 
$halaman=$_SESSION[id_pagew];
		
echo "<h2>Siswa-i ".$_SESSION['psb.aktif']." ".$_SESSION[kampus.aktif]."</h2>";
if ($halaman=="1"){
	echo "select * from siswa_aktif where nama<>'' $hak_akses_publik $psb_aktif $filter_cari order by siswa_aktif.nama asc";
	?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No </th> <th>No.Register</th> <th >Nama</th> <th>No. Telp</th> <th>HP. Ortu</th><th>Asal Sekolah</th><th>Status Bekerja</th><th>Tempat Kerja</th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa_aktif where nama<>'' $hak_akses_publik $psb_aktif $filter_cari order by siswa_aktif.nama asc"); 
			while($b=mysql_fetch_array($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><? echo $b[nodaf];?></td> <td><? echo $b[nama];?> &nbsp;<a href="#edit" onClick=BoxEdit(<? echo $b[0];?>)  data-title="Edit Data"  class="modal-ajax tip" data-original-title="Edit"><span class="icon-edit"></span></a> &nbsp;</td>  <td><? $hp = substr("$b[no_telp]", 0, -2); echo $hp."xx";?></td> <td><? $hp = substr("$b[hp_ortu]", 0, -2); echo $hp."xx";?></td><td><? echo $b[asal_sekolah];?></td><td><? echo $b[bekerja];?></td><td><? echo $b[tempat_kerja];?></td></tr> <? }?> 
	</tbody> </table> 
<? } elseif ($halaman=="2"){?>

		<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No </th> <th>No.Register</th> <th >Nama</th> <th>No. Telp</th> <th>HP. Ortu</th><th>Asal Sekolah</th><th>Status Bekerja</th><th>Tempat Kerja</th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa_aktif where nama<>'' $hak_akses_publik $psb_aktif $filter_cari and bekerja<>'Sudah Bekerja' order by siswa_aktif.nama asc"); while($b=mysql_fetch_array($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><? echo $b[nodaf];?></td> <td><? echo $b[nama];?> &nbsp;<a href="#edit" onClick=BoxEdit(<? echo $b[0];?>)  data-title="Edit Data"  class="modal-ajax tip" data-original-title="Edit"><span class="icon-edit"></span></a> &nbsp;</td>  <td><? $hp = substr("$b[no_telp]", 0, -2); echo $hp."xx";?></td> <td><? $hp = substr("$b[hp_ortu]", 0, -2); echo $hp."xx";?></td><td><? echo $b[asal_sekolah];?></td><td><? echo $b[bekerja];?></td><td><? echo $b[tempat_kerja];?></td></tr> <? }?> 
	</tbody> </table> 

<?} elseif ($halaman=="3"){?>
					
			<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No </th> <th>No.Register</th> <th >Nama</th> <th>No. Telp</th> <th>HP. Ortu</th><th>Asal Sekolah</th><th>Status Bekerja</th><th>Tempat Kerja</th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa_aktif where nama<>'' $hak_akses_publik $psb_aktif $filter_cari and bekerja='Sudah Bekerja' order by siswa_aktif.nama asc"); while($b=mysql_fetch_array($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><? echo $b[nodaf];?></td> <td><? echo $b[nama];?> &nbsp;<a href="#edit" onClick=BoxEdit(<? echo $b[0];?>)  data-title="Edit Data"  class="modal-ajax tip" data-original-title="Edit"><span class="icon-edit"></span></a> &nbsp;</td>  <td><? $hp = substr("$b[no_telp]", 0, -2); echo $hp."xx";?></td> <td><? $hp = substr("$b[hp_ortu]", 0, -2); echo $hp."xx";?></td><td><? echo $b[asal_sekolah];?></td><td><? echo $b[bekerja];?></td><td><? echo $b[tempat_kerja];?></td></tr> <? }?> 
	</tbody> </table> 

		 

<? }?>