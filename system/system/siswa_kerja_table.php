<? session_start();
$halaman=$_REQUEST['id'];
if ($halaman<>"100"){ $_SESSION[id_pagew]=$halaman;}
include "konek.php";
if ($_GET[kelas]==""){$psb_aktif=" and ps_prodi='".$_SESSION['psb.aktif']."' ";}else{$psb_aktif=$_GET[kelas]; $_SESSION['psb.aktif']=$_GET[kelas];}

   $filter_cari=" and ps_absen='AKTIF' and ps_ang like '%".mysql_real_escape_string($_GET[angkatan])."' ";



$halaman=$_SESSION[id_pagew];

if ($halaman=="1"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			  <tr> <th width="30">No</th> <th>Nama</th> <th >Jurusan</th> <th >Kampus </th><th>Status Bekerja</th> <th>Sign Kontrak</th><th>Tempat Kerja</th><th>Catatan</th></tr>
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select ps_nama,ps_prodi,ps_kampus,ps_kerja,ps_no from profil_siswa where ps_nama<>'' $hak_akses_publik $psb_aktif $filter_cari order by ps_nama asc"); while($b=mysql_fetch_row($query)) {
			
			$kerja=explode("/",$b[3]);			
			$a=$a+1;?>
				<tr>   <td><? echo $a; ?></td> <td><a href="#edit" onClick=BoxEdit(<? echo $b[4];?>)  data-title="Edit Data"  class="modal-ajax tip" data-original-title="Edit"> <? echo $b[0];?> <span class="icon-edit"></span></a></td> <td> <? echo $b[1];?></td> <td><? echo $b[2];?></td> <td><? echo $kerja[0];?></td> <td><? echo $kerja[1];?></td><td><? echo $kerja[2];?></td><td><? echo $kerja[3];?></td></tr> 
			<? }?> 
	</tbody> </table> 
<? } elseif ($halaman=="2"){?>

		 <? $querye = mysql_query("select DISTINCT ps_kampus from profil_siswa where ps_kampus<>'' $hak_akses_publik $psb_aktif"); while($e=mysql_fetch_row($querye)) {
		 $kampus=$e[0];
		  $quera = mysql_query("select * from profil_siswa where ps_kampus='$kampus' $psb_aktif order by ps_nama asc"); if ($quera){ 
		 ?>
		 
		 <div class="bg-default bg-light"><h2> Kampus PSPP <? echo $kampus." ".$jurusan;?></h2></div>
		  <table border=1 class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			  <tr> <th width="30">No</th> <th>Nama</th> <th >Jurusan</th> <th >Kampus </th><th>Status Bekerja</th> <th>Sign Kontrak</th><th>Tempat Kerja</th><th>Catatan</th></tr>
		</thead> <tbody> 
		<?$a=0; 
		$query = mysql_query("select ps_nama,ps_prodi,ps_kampus,ps_kerja,ps_no from profil_siswa where ps_nama<>''  and ps_kampus='$kampus'  $psb_aktif  $filter_cari  order by ps_nama asc");  while($b=mysql_fetch_row($query)) {
		
			
			$kerja=explode("/",$b[3]);			
			$a=$a+1;?>
				<tr>   <td><? echo $a; ?></td> <td><a href="#edit" onClick=BoxEdit(<? echo $b[4];?>)  data-title="Edit Data"  class="modal-ajax tip" data-original-title="Edit"> <? echo $b[0];?> <span class="icon-edit"></span></a></td> <td> <? echo $b[1];?></td> <td><? echo $b[2];?></td> <td><? echo $kerja[0];?></td> <td><? echo $kerja[1];?></td><td><? echo $kerja[2];?></td><td><? echo $kerja[3];?></td></tr> 
			<? }?> 
		 </tbody> </table> 
		<br>
		 <br><br>
		  
		 <? }}?>

<?} elseif ($halaman=="3"){?>
					
				 <? $querye = mysql_query("select DISTINCT ps_kampus from profil_siswa where ps_kampus<>'' $hak_akses_publik $psb_aktif"); while($e=mysql_fetch_row($querye)) {
				 $kampus=$e[0];
				 $querys = mysql_query("select DISTINCT ps_prodi from profil_siswa where ps_prodi<>'' $hak_akses_publik  $psb_aktif "); while($c=mysql_fetch_row($querys)) {
				 $jurusan=$c[0];
				 
				//cek isi siswa_aktif per kelas , jika kosong, kelas abaikan
				  $c=0; $query = mysql_query("select * from profil_siswa where ps_nama<>''  and ps_kampus='$kampus' and ps_prodi = '$jurusan' $psb_aktif  $filter_cari  order by ps_nama asc");  while($b=mysql_fetch_row($query)) { $c=$c+1; } if ($c>0){?>
				 
				 
				 <div class="bg-default bg-light"><h2>Prodi <? echo $jurusan." ".$kampus;?></h2></div>
				  <table border=1 class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;"> <thead> 
			  <tr> <th width="30">No</th> <th>Nama</th> <th >Jurusan</th> <th >Kampus </th><th>Status Bekerja</th> <th>Sign Kontrak</th><th>Tempat Kerja</th><th>Catatan</th></tr>
				</thead> <tbody> 
				<?$a=0; $query = mysql_query("select ps_nama,ps_prodi,ps_kampus,ps_kerja,ps_no from profil_siswa where ps_nama<>'' and ps_kampus='$kampus' and ps_prodi = '$jurusan'  $psb_aktif  $filter_cari  order by ps_nama asc");  while($b=mysql_fetch_row($query)) {
				
				$kerja=explode("/",$b[3]);			
			$a=$a+1;?>
				<tr>   <td><? echo $a; ?></td> <td><a href="#edit" onClick=BoxEdit(<? echo $b[4];?>)  data-title="Edit Data"  class="modal-ajax tip" data-original-title="Edit"> <? echo $b[0];?> <span class="icon-edit"></span></a></td> <td> <? echo $b[1];?></td> <td><? echo $b[2];?></td> <td><? echo $kerja[0];?></td> <td><? echo $kerja[1];?></td><td><? echo $kerja[2];?></td><td><? echo $kerja[3];?></td></tr> 
			<? }?> 
				 </tbody> </table> <br><br><br>
				  
				 <? }}}?>


<?}?>