
 
 <tr>
 <td class="welcome" valign="top" align="left">
								
<h3>Daftar Calon Siswa-i PSPP Penerbangan</h3><br>
<table style="border-collapse: collapse; width:'100%';" border="1" class="form_pendaftaran">
  <tr  style="background-color: #ff9933;">
    <td width="10%" align="center"> &nbsp; No</td>
    <td width="60%"> &nbsp; Nama</td>
    <td width="30%"> &nbsp; Pilihan Kampus</td>
	
  </tr>
<? include "system/system/konek.php"; $a=0;
$query = mysql_query("select * from siswa where nama<>'' order by rand() limit 1000");	
while($b=mysql_fetch_row($query)){ $a=$a+1; ?>
  <tr>
    <td align="center"><? echo $a;?></td>
    <td> &nbsp; <? echo $b[2];?></td>
    <td> &nbsp; <? echo $b[11];?></td>
	
  </tr>
<?}?>
</table>
<br><br>Data ini adalah data pendaftar melalui online di website PSPP Penerbangan. Bagi anda yang sudah terdaftar di website ini silakan lakukan pembayaran biaya pendaftaran untuk prosses pendaftaran selanjutnya. Terima kasih<br><br><br>
</td></tr>