<? session_start();
$halaman=$_REQUEST['id'];
if ($halaman<>"100"){ $_SESSION[id_pagew]=$halaman;}
include "konek176.php";

if ($_GET[kampus]=="Semua Kampus"){ $kampus=""; $_SESSION[kampus.aktif]="";} else{$kampus=" and kampus='$_GET[kampus]' "; $_SESSION[kampus.aktif]=" and kampus='$_GET[kampus]' ";}

if ($_GET[kelas]==""){ $psb_aktif="".$_SESSION[kampus.aktif]." and materi='".$_SESSION[materi.aktif]."' ";
}else{
$psb_aktif="".$kampus." and materi='".$_GET[materi]."' "; $_SESSION['psb.aktif']=$_GET[kelas];  $_SESSION[materi.aktif]=$_GET[materi];}




if ($halaman=="100"){ 
   if ($_SESSION[filter_psb]=="") {$_SESSION[filter_psb]="";} else { $_SESSION[filter_psb]="";}
}


$halaman=$_SESSION[id_pagew];

echo "<h2>".$_SESSION[materi.aktif]." ".$_GET[kampus]."</h2>";?>

	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100%  > <thead> 
			 <tr align="center"> <th width="30" align="center">Peringkat </th> <th align="center">Nama</th><th align="center">Jurusan</th><th align="center">Kampus</th> <th align="center">Nilai</th> <th align="center">Tanggal Ujian</th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from nilai where nama <>'' $psb_aktif order by nilai.nilai desc"); while($b=mysql_fetch_row($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><? echo $b[1];?></td> <td><? echo $b[5];?></td><td><? echo $b[6];?></td><td><? echo $b[3];?></td>  <td><? echo $b[8];?></td> </tr> <? }?> 
	</tbody> </table> 

