<? session_start();
$halaman=$_REQUEST['id'];
if ($halaman<>"100"){ $_SESSION[id_pagew]=$halaman;}
include "konek.php";
if ($_GET[kelas]==""){$psb_aktif=" and ps_prodi='".$_SESSION['psb.aktif']."' ";}else{$psb_aktif=$_GET[kelas]; $_SESSION['psb.aktif']=$_GET[kelas];}

   $filter_cari=" and ps_absen='AKTIF'";



$halaman=$_SESSION[id_pagew];

if ($halaman=="1"){?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			  <tr> <th width="30">No</th> <th>Nama</th> <th >Jurusan</th> <th >Kampus </th><th>TB + BB</th> <th>Ujian Online</th><th>Presensi</th><th>Total Grade</th><th>Pembayaran</th></tr>
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select ps_nama,ps_prodi,ps_kampus,ps_grade_tinggi,ps_nodaf,ps_presensi,ps_status_bayar from profil_siswa where ps_nama<>'' $hak_akses_publik $psb_aktif $filter_cari order by ps_nama asc"); while($b=mysql_fetch_row($query)) {
			
			$nilai=0;
			$query1 = mysql_query("select sum(nilai) as nilai from nilai where nodaf='$b[4]'"); 
			while($f=mysql_fetch_row($query1)) { $nilai= $nilai+$f[0]; } $nilaiujian=$nilai/3;
			
			$total_grade=($b[3]+$nilaiujian+$b[5])/3;
			
			$a=$a+1;?>
				<tr>   <td><? echo $a; ?></td> <td><? echo $b[0];?> </td> <td> <? echo $b[1];?></td> <td><? echo $b[2];?></td> <td><? echo $b[3];?>%</td> <td><? echo $nilai;?>%</td><td><? echo $b[5];?>%</td><td><? echo $total_grade;?>%</td><td><? echo $b[6];?></td></tr> 
			<? }?> 
	</tbody> </table> 
<? } elseif ($halaman=="2"){?>

		 <? $querye = mysql_query("select DISTINCT ps_kampus from profil_siswa where ps_kampus<>'' $hak_akses_publik $psb_aktif"); while($e=mysql_fetch_row($querye)) {
		 $kampus=$e[0];
		  $quera = mysql_query("select * from profil_siswa where ps_kampus='$kampus' $psb_aktif order by ps_nama asc"); if ($quera){ 
		 ?>
		 
		 <div class="bg-default bg-light"><h2> Kampus PSPP <? echo $kampus." ".$jurusan;?></h2></div>
		  <table border=1 class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			  <tr> <th width="30">No</th> <th>Nama</th> <th >Jurusan</th> <th >Kampus </th><th>TB + BB</th> <th>Ujian Online</th><th>Presensi</th><th>Total Grade</th><th>Pembayaran</th></tr>
		</thead> <tbody> 
		<?$a=0; 
		$query = mysql_query("select ps_nama,ps_prodi,ps_kampus,ps_grade_tinggi,ps_nodaf,ps_presensi,ps_status_bayar from profil_siswa where ps_nama<>''  and ps_kampus='$kampus'  $psb_aktif  $filter_cari  order by ps_nama asc");  while($b=mysql_fetch_row($query)) {
		
		
		$nilai=0;
			$query1 = mysql_query("select sum(nilai) as nilai from nilai where nodaf='$b[4]'"); 
			while($f=mysql_fetch_row($query1)) { $nilai= $nilai+$f[0]; } $nilaiujian=$nilai/3;
			
			$total_grade=($b[3]+$nilaiujian+$b[5])/3;
			
			$a=$a+1;?>
				<tr>   <td><? echo $a; ?></td> <td><? echo $b[0];?> </td> <td> <? echo $b[1];?></td> <td><? echo $b[2];?></td> <td><? echo $b[3];?>%</td> <td><? echo $nilai;?>%</td><td><? echo $b[5];?>%</td><td><? echo $total_grade;?>%</td><td><? echo $b[6];?></td></tr> 
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
			  <tr> <th width="30">No</th> <th>Nama</th> <th >Jurusan</th> <th >Kampus </th><th>TB + BB</th> <th>Ujian Online</th><th>Presensi</th><th>Total Grade</th><th>Pembayaran</th></tr>
				</thead> <tbody> 
				<?$a=0; $query = mysql_query("select ps_nama,ps_prodi,ps_kampus,ps_grade_tinggi,ps_nodaf,ps_presensi,ps_status_bayar from profil_siswa where ps_nama<>'' and ps_kampus='$kampus' and ps_prodi = '$jurusan'  $psb_aktif  $filter_cari  order by ps_nama asc");  while($b=mysql_fetch_row($query)) {
				
				
				$nilai=0;
			$query1 = mysql_query("select sum(nilai) as nilai from nilai where nodaf='$b[4]'"); 
			while($f=mysql_fetch_row($query1)) { $nilai= $nilai+$f[0]; } $nilaiujian=$nilai/3;
			
			$total_grade=($b[3]+$nilaiujian+$b[5])/3;
			
			$a=$a+1;?>
				<tr>   <td><? echo $a; ?></td> <td><? echo $b[0];?> </td> <td> <? echo $b[1];?></td> <td><? echo $b[2];?></td> <td><? echo $b[3];?>%</td> <td><? echo $nilai;?>%</td><td><? echo $b[5];?>%</td><td><? echo $total_grade;?>%</td><td><? echo $b[6];?></td></tr> 
			<? }?> 
				 </tbody> </table> <br><br><br>
				  
				 <? }}}?>


<?}?>