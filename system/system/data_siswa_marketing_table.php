<? session_start();
$halaman=$_REQUEST['id'];
if ($halaman<>"100")
{ 
	$_SESSION[id_pagew]=$halaman;
}
include "konek.php";
if ($_GET[kelas]=="")
{
	
	$psb_aktif=" and jurusan='".$_SESSION['psb.aktif']."' ";
}
else
{
	$psb_aktif=" and jurusan='".$_GET[kelas]."' "; 
	$_SESSION['psb.aktif']=$_GET[kelas];
}
if ($halaman=="100")
{ 
	if ($_SESSION[filter_psb]=="") 
	{
	   $_SESSION[filter_psb]=" and validasi_pendaftaran='Sudah Divalidasi'";
	} 
	else 
	{ 
		$_SESSION[filter_psb]="";
	}
}

$filter_marketing=" and Marketing='$_SESSION[id_login]'";
$filter_cari=$_SESSION[filter_psb]; 
$halaman=$_SESSION[id_pagew];
echo "select * from siswa where nama<>'' $filter_marketing $psb_aktif $filter_cari order by siswa.nama asc";

if ($halaman=="1"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Nama</th> <th>No. Telp</th> <th>HP. Ortu</th><th>Asal Sekolah</th><th>Pilihan Jurusan</th><th>Pilihan Kampus</th><th>Sumber Info</th> </tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from siswa where nama<>'' $filter_marketing $psb_aktif $filter_cari order by siswa.nama asc"); while($b=mysql_fetch_row($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td>  <td><? echo $b[2];?>  <a href="#cetak_formulir" onClick=Formulir(<? echo $b[0];?>)><span class="icon-print"></span></a></td>  <td><? echo $b[4];?></td> <td><? echo $b[5];?></td><td><? echo $b[6];?></td><td><? echo $b[10];?></td><td><? echo $b[11];?></td><td><? echo $b[86];?></td></tr> <? }?> 
	</tbody> </table> 
<? } elseif ($halaman=="2"){?>

		 <? $querye = mysql_query("select DISTINCT siswa.Tempat_Kuliah from siswa where siswa.Tempat_Kuliah<>'' $filter_marketing $psb_aktif"); while($e=mysql_fetch_row($querye)) {
		 $kampus=$e[0];
		  $quera = mysql_query("select * from siswa where nama<>'' and siswa.Tempat_Kuliah='$kampus' $psb_aktif $filter_marketing order by siswa.nama asc"); if ($quera){ 
		 ?>
		 
		 <div class="bg-default bg-light"><h2> Kampus PSPP <? echo $kampus." ".$jurusan;?></h2></div>
		  <table border=1 class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
		 <tr> <th width="30">No</th>  <th >Nama</th> <th >Alamat </th><th>No. HP</th> <th>HP. Ortu</th><th>Asal Sekolah</th><th>Sumber Info</th></tr> 
		</thead> <tbody> 
		<?$a=0; 
		$query = mysql_query("select * from siswa where nama<>'' and siswa.Tempat_Kuliah='$kampus'  $psb_aktif  $filter_cari $filter_marketing order by siswa.nama asc");  while($b=mysql_fetch_row($query)) {
		$a=$a+1;  ?>
		<tr>   <td><? echo $a; ?></td> <td><? echo $b[2];?> <a href="#cetak_formulir" onClick=Formulir(<? echo $b[0];?>)><span class="icon-print"></span></a></td> <td><? echo $b[3];?></td> <td><? echo $b[4];?></td> <td><? echo $b[5];?></td><td><? echo $b[6];?></td><td><? echo $b[86];?></td></tr> 
		<?} ?> 
		 </tbody> </table> 
		<br>
		 <br><br>
		  
		 <? }}?>

<?} elseif ($halaman=="3"){?>
					
				 <? $querye = mysql_query("select DISTINCT siswa.Tempat_Kuliah from siswa where siswa.Tempat_Kuliah<>'' $filter_marketing $psb_aktif"); while($e=mysql_fetch_row($querye)) {
				 $kampus=$e[0];
				 $querys = mysql_query("select DISTINCT siswa.Jurusan from siswa where siswa.Jurusan<>'' $filter_marketing  $psb_aktif "); while($c=mysql_fetch_row($querys)) {
				 $jurusan=$c[0];
				 
				//cek isi siswa per kelas , jika kosong, kelas abaikan
				  $c=0; $query = mysql_query("select * from siswa where nama<>'' and siswa.Tempat_Kuliah='$kampus' and siswa.Jurusan = '$jurusan' $psb_aktif  $filter_cari $filter_marketing order by siswa.nama asc");  while($b=mysql_fetch_row($query)) { $c=$c+1; } if ($c>0){?>
				 
				 
				 <div class="bg-default bg-light"><h2>Prodi <? echo $jurusan." ".$kampus;?></h2></div>
				  <table border=1 class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;"> <thead> 
				 <tr> <th width="30">No</th> <th >Nama</th> <th >Alamat </th><th>No. HP</th> <th>HP. Ortu</th><th>Asal Sekolah</th><th>Sumber Info</th></tr> 
				</thead> <tbody> 
				<?$a=0; $query = mysql_query("select * from siswa where nama<>'' and siswa.Tempat_Kuliah='$kampus' and siswa.Jurusan = '$jurusan'  $psb_aktif  $filter_marketing $filter_cari  order by siswa.nama asc");  while($b=mysql_fetch_row($query)) {
				$a=$a+1;  ?>
				<tr>   <td><? echo $a; ?></td>  <td><? echo $b[2];?>  <a href="#cetak_formulir" onClick=Formulir(<? echo $b[0];?>)><span class="icon-print"></span></a></td> <td><? echo $b[3];?></td> <td><? echo $b[4];?></td> <td><? echo $b[5];?></td><td><? echo $b[6];?></td><td><? echo $b[86];?></td></tr> 
				<?} ?> 
				 </tbody> </table> <br><br><br>
				  
				 <? }}}?>


			 

<? }?>