<? session_start();?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<?  
 include "konek.php";
      $tgls=date("Y-m-d H:i:s");
	 
	if ($_GET[status]=="daftarulang"){?>
<div class="block"> <div class="content controls"> <h2>Daftar Ulang <? $query = mysql_query("SELECT nama,pembayaran_1,tgl_daftarulang from siswa where siswa.id=$_GET[id]");   while($b=mysql_fetch_row($query)) { echo $b[0]; $nama=$b[0]; $daftarulang=$b[1]; $tgldaftarulang=$b[2];}?></h2>
<form action="kwitansi_daftar_ulang.php?id=<? echo $_GET[id];?>" method="POST">
<table>
<tr><td>Total Biaya Pendidikan</td><td> :</td><td><input name="total" class="form-control" value="28800000" type="text"> </td></tr>
<tr><td>Nominal Daftar Ulang </td> <td> :</td><td><input name="nominal" class="form-control" value="<? echo $daftarulang;?>" type="text"></td></tr>
<tr><td>Uraian Transfer</td> <td> :</td><td><input name="uraian_transfer" class="form-control" value="<? echo $tgldaftarulang;?>" type="text" placeholder="Diisi Tanggal Transfer & Nama Pentransfer" size="50"></td></tr>
</table> 
 <div class="form-row"> <div class="col-md-3">Keterangan :</div> <div class="col-md-9"><textarea class="form-control" placeholder="Tambahkan keterangan pembayaran disini" rows="4" cols="65" name="catatan">Biaya pendidikan yang sudah dibayarkan tidak bisa dikembalikan dengan alasan apapun.</textarea></div> </div>
<input type=submit value=Simpan></input> 
</form></div></div>


	
	<?  
		 
		 
		} elseif ($_GET[status]=="batal"){
		$query = mysql_query("SELECT nama,asal_sekolah from siswa where id=$_GET[id]");   while($b=mysql_fetch_row($query)) { ; $nama=$b[0]; $asal_sekolah=$b[1]; }
		mysql_query("update siswa set status_daftarulang='Belum' where id='$_GET[id]'"); 
		mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$_SESSION[nama_login] mengubah status daftar ulang $nama $asal_sekolah menjadi BELUM DITERIMA')");
		 echo "Daftar ulang berhasil <b>DIBATALKAN</b>. ";
		
		} elseif ($_GET[status]=="mengundurkan_diri"){
		$query = mysql_query("SELECT nama,asal_sekolah from siswa where id=$_GET[id]");   while($b=mysql_fetch_row($query)) { ; $nama=$b[0]; $asal_sekolah=$b[1]; }
		mysql_query("update siswa set status_daftarulang='Mengundurkan Diri' where id='$_GET[id]'"); 
		mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$_SESSION[nama_login] mengubah status daftar ulang $nama $asal_sekolah menjadi MENGUNDURKAN DIRI')");
		 echo "<b>SISWA BERHASIL DISIMPAN DI DATA SISWA MENGUNDURKAN DIRI!</b>. ";
		
		}
		
		
		
?>