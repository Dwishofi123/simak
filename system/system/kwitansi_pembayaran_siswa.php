<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek176.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<? $aidi=$_SESSION[temp_id];
echo "<font color='yellow'><strong>".$_GET[pesan]."</strong></font><br><br>";
?>


<form action="submit_pembayaran_siswa.php">
<table border=0>
<tr><td>Tanggal Transaksi  &nbsp; &nbsp; &nbsp;</td><td>:</td><td> <input name="tanggal" class="form-control" value="<?  echo date("Y-m-d H:i:s");?>" type="text" disabled="disabled">
User : <input name="tanggal" class="form-control" value=" <? echo $_SESSION[nama_login]; ?>" type="text" disabled="disabled" size="20">  </td></tr>


<tr><td width="200px">Jenis Pembayaran</td><td> :</td><td><select name="angsuran"> 
<option>Angsuran 1</option>
<option>Angsuran 2</option>
<option>Angsuran 3</option>
<option>Angsuran 4</option>
<option>Angsuran 5</option>
<option>Angsuran 6</option>
<option>Angsuran 7</option>
<option>Angsuran 8</option>
<option>Angsuran 9</option>
<option>Angsuran 10</option>
</select></td></tr>

<tr><td>Nominal</td><td> :</td><td><input class="form-control" value="<? echo $_GET[nominal];?>" type="text"  name="nominal" ></input></td></tr>
<tr><td></td><td> </td><td><font color="yellow">Uraian Transfer Bank / Tgl Transfer & Nama Pentransfer</font><input class="form-control" value="<? echo $_GET[uraian];?>" type="text"  name="uraian_transfer" size="60"></input></td></tr>
<tr><td>No.Ref Transfer</td><td> :</td><td><input class="form-control" value="<? if ($_GET[no_ref]==""){echo "-";}else{echo $_GET[no_ref];}?>" type="text"  name="no_ref" id="no_ref" ></input></td></tr>
<tr><td>Catatan</td><td> : </td><td> <textarea cols="48" rows="2" name="catatan">Ini adalah kwitansi sementara. Biaya pendidikan yang sudah dibayarkan tidak bisa dikembalikan dengan alasan apapun.</textarea></td></tr>

<tr><td></td><td> :</td><td><input type=submit value="Simpan"></input></td></tr>

</table></form>
<i><font color="yellow">Hati-hati : Pembayaran yang sudah diinput tidak dapat diubah lagi.</font></i>