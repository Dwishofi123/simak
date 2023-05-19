<?php session_start();
$halaman=$_REQUEST['id'];
include "konek.php";
if($halaman == "1")
{
	$sql = "select * from siswa where tes_online = 'sudah' and nama <>'' order by Nama asc ";
}
else IF($halaman == "2")
{
	//SQL UNTUK YANG BELUM DIINTERVIEW
	//echo "belum";
	$sql = "select * from siswa where tes_online = 'sudah' and nama <>''  and tgl_interview IS NULL  order by Nama asc";
}

else IF($halaman == "3")
{
	$sql = "select * from siswa where tes_online = 'sudah' and nama <>''  and tgl_interview <> '' order by Nama asc ";
}
else IF($halaman == "4")
{
	//$sql = "select * from siswa where tes_online = 'sudah' and tgl_interview <> '' order by Nama asc limit 20";
}


?>
	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" >
	<thead> 
	<tr> <th width="30">No</th> <th>Nama</th> <th >Asal Sekolah</th> <th >Tgl Tes Online </th><th>Nilai</th>
	<th>Kampus</th>
	<th>Angkatan</th>
	<th>Tgl Interview</th>
	<th>Interview By</th>
	<th></th>
	</tr>
			</thead> <tbody> 
			<?php 
			$no = 1;
//$query = mysql_query("select * from siswa where tes_online = 'sudah' order by Nama asc limit 20");
$query = mysql_query("$sql");
			while($cetak = mysql_fetch_array($query))
			{
		
		$harinya = date('d', strtotime($cetak['tgl_interview']));
		
		$bulanya = date('m', strtotime($cetak['tgl_interview']));
		$tahunya = date('Y', strtotime($cetak['tgl_interview']));
		$araibulan = array('01' => 'Januari','02' => 'Febrari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember');	
	
		$harinya_t = date('d', strtotime($cetak['Tgl_Test']));
		
		$bulanya_t = date('m', strtotime($cetak['Tgl_Test']));
		$tahunya_t = date('Y', strtotime($cetak['Tgl_Test']));
		
				?>
		<tr>
			<td><?php echo "$no";?></td>
			<td><?php 
			
			echo "$cetak[Nama]";
			
			
			?></td>
			<td><?php echo "$cetak[Asal_Sekolah]";?></td>
			<td><?php echo "$harinya_t $araibulan[$bulanya_t], $tahunya_t";?></td>
			<td><?php echo "$cetak[nilai_ujian]";?></td>
			<td><?php echo "$cetak[Tempat_Kuliah]";?></td>
			<td><?php echo "$cetak[Jurusan]";?></td>
			<td><?php if($cetak['tgl_interview'] == "")	{	echo "<font color='yellow'>(Blm.Interview)</font>";	}	else	{	echo "$harinya $araibulan[$bulanya], $tahunya";	}	;?></td>
			<td><?php	if($cetak['tgl_interview'] == "")	{	echo "<font color='yellow'>(Blm.Interview)</font>";	}	else	{	echo $cetak['interview_by'];	}	?></td>
			<td>
			<?php 
			if($cetak['tgl_interview'] == "")
			{
			
			$ambil_jurusan=explode(" ",$cetak['Jurusan']);
				if($ambil_jurusan[0] == "Pramugari")
				{	echo "<button class='btn btn-default btn-warning' type=button onClick='form_inter_pramugari($cetak[ID])'>Interview Sekarang!</button>";	}	else	{	echo "<button class='btn btn-default btn-warning' type=button onClick='form_inter_staff($cetak[ID])'>Interview Sekarang!</button>";	}
			}
			else
			{
				$ambil = substr($cetak['Jurusan'],0,9);	if($ambil == "Pramugari")	{	$cetak_jurusan = "system/export_interview_pramugari.php?nomor=$cetak[id_interview]";	}	else	{	$cetak_jurusan = "system/export_interview_staff.php?nomor=$cetak[id_interview]";	}	?>
				<a title="Export data interview atas nama <?php echo $cetak['Nama'];?>" href="#Export Data Interview" onClick="window.location='<?php echo "$cetak_jurusan";?>'"><span class="icon-print"></span></a>
				<?php
			}
			?>
			</td>
		</tr>
				<?php
				$no++;
			}
			?> 
	</tbody> </table> 
