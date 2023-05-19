<style type="text/css">
	table.tableizer-table {
		font-size: 12px;
		border: 1px solid #CCC; 
		font-family: Arial, Helvetica, sans-serif;
	} 
	.tableizer-table td {
		padding: 4px;
		margin: 3px;
		border: 1px solid #CCC;
	}
	.tableizer-table th {
		background-color: #104E8B; 
		color: #FFF;
		font-weight: bold;
	}
</style>
<table class="tableizer-table" >
<thead><tr class="tableizer-firstrow"><th>NO</th><th>NO INDUK</th><th>NAMA</th><th>JURUSAN</th><th>KAMPUS</th></tr></thead><tbody>
<? include "system/system/konek.php"; $a=0;
$query = mysql_query("select ps_induk,ps_nama,ps_prodi,ps_kampus from profil_siswa where ps_du ='sudah' and ps_ang like '%OKTOBER%' and ps_nama<>'' order by ps_nama asc");	
while($b=mysql_fetch_row($query)){ $a=$a+1; ?>
 <tr><td><? echo $a;?></td><td><? echo $b[0];?></td><td><? echo $b[1];?></td><td><? echo $b[2];?></td><td><? echo $b[3];?></td></tr>
<?}?>
 
</tbody></table>