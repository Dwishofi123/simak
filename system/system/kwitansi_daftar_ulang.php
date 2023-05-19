<? session_start();?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>

 <script type="text/javascript">
function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=700,height=500');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
</script>


<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "../login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<? include "konek.php";
if($_POST[nominal]<>"" and $_POST[uraian_transfer]<>""){
$aidi_siswa=$_GET[id];
$tanggal=date("Y-m-d H:i:s");
$tgl=date("d/m/Y");
$nominal="Rp. ".number_format($_POST[nominal],2,',','.');
 
 // macam-macam temporary ambil dari file edit_daftar_ulang.php
$query=mysql_query("select No_Telp,nama,asal_sekolah,marketing from siswa where id='$_GET[id]'"); 
while($b=mysql_fetch_row($query)) 
{ 
	$hp=$b[0]; $nama=$b[1]; $asalsekolah=$b[2]; $idmarketing=$b[3];
}
$query=mysql_query("select nama,hp from pegawai where id='$idmarketing'"); while($b=mysql_fetch_row($query)) {  $marketing=$b[0]; $hpmarketing=$b[1];}
mysql_query("update siswa set biaya_pendidikan='$_POST[total]',pembayaran_1='$_POST[nominal]',tgl_bayar_1='$tanggal',Keterangan_1='$_POST[catatan]',status_daftarulang='Sudah',tgl_daftarulang='$_POST[uraian_transfer]',total_pembayaran='$_POST[nominal]' where id='$aidi_siswa'"); 
mysql_query("insert into perlengkapan_siswa(id_siswa,baju_biru,baju_batik,tshirt,sepatu,koper,tas,makeup,tab,trocking,sirkam,kamus,baju_pilot,dasi,id_card,wings,nameplate,baju_renang,kimono)values('$aidi_siswa','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-')");

$data_siswa = mysql_query("select * from siswa where id='$_GET[id]'");
$cetak_siswa = mysql_fetch_array($data_siswa);
//insert ke tabel siswa aktif
mysql_query("insert into siswa_aktif (id,nodaf,nama,jurusan) values('$cetak_siswa[ID]','$cetak_siswa[No_Reg]','$cetak_siswa[Nama]','$cetak_siswa[Jurusan]')");
//sms pemberitahuan ke siswa
mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$hp','Info Daftar Ulang PSPP Penerbangan. Terima kasih telah melakukan daftar ulang. Ini adalah sms pemberitahuan bahwa pembayaran anda telah diterima oleh PSPP Penerbangan. Terima kasih','SMS Daftar Ulang','Online')");

//sms ke marketing pemilik siswa
mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$hpmarketing','Info Daftar Ulang. Hari ini ($tgl) $nama $asalsekolah sebagai salah satu siswa dari $marketing telah melakukan pembayaran Daftar Ulang sebesar $nominal. #TRFCODE: $_POST[uraian_transfer] ','SMS Daftar Ulang','Online')");

mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tanggal','Hari ini ($tgl) $nama $asalsekolah sebagai salah satu siswa dari $marketing telah melakukan pembayaran Daftar Ulang sebesar $nominal dikampus $_SESSION[unit]. #TRFCODE: $_POST[uraian_transfer]','marketing')");

mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] melakukan transaksi daftar ulang atas nama $nama $asalsekolah dari marketing $marketing sebesar $nominal')");

  // kirim pesan ke nomor khusus
 //$query = mysql_query("SELECT tujuan from nomor_khusus"); while($b=mysql_fetch_row($query)) {
//mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)value('$b[0]','($tgl) $nama $asalsekolah sebagai salah satu siswa dari $marketing telah melakukan pembayaran Daftar Ulang sebesar $nominal dikampus $_SESSION[unit]. #TRFCODE: $_POST[uraian_transfer] Info:www.pspp-integrated.com','Kirim info daftar ulang ke nomor khusus','online')");
//} 

 
   // kirim pesan ke marketing 
 //$query = mysql_query("SELECT hp from pegawai where status_pegawai='Aktif' and jabatan='Marketing'"); while($b=mysql_fetch_row($query)) {
//mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)value('$b[0]','($tgl) $nama $asalsekolah sebagai salah satu siswa dari $marketing telah melakukan pembayaran Daftar Ulang dikampus $_SESSION[unit]. Terima kasih. Info:www.pspp-integrated.com','Kirim info daftar ulang ke nomor khusus','online')");
//} 

?>




Data berhasil disimpan! Berikut kwitansi pembayarannya.<button onclick="PrintDiv();">Cetak Kwitansi</button>
<div id="divToPrint" >
<div style="width:700;height:470;background-color:teal; padding-left:10; padding-right:10; padding-top:10; padding-bottom:10;">
	

<style>
input {border: none; background: #fff;}
textarea {border: none; background: #fff;}
</style>			
					   
			   
 <div class="header1" style="font-size:12px" > <h2> Kwitansi Daftar Ulang <? $query = mysql_query("SELECT nama,pembayaran_1,tgl_daftarulang,Keterangan_1 from siswa where siswa.id=$_GET[id]");   while($b=mysql_fetch_row($query)) { echo $b[0]; $daftarulang=$b[1]; $tgldaftarulang=$b[2]; $keterangan_1=$b[3];}?></h2>  PSPP Lampung : Jl.Teuku Umar No 36C Kedaton Bandar Lampung (0721)-772277<br>
 PSPP Jakarta : Aeropolis Residence Complex. Jl. Marsekal Suryadharma Neglasari Tangerang Banten. Telp. (021)-22251227<br>
 PSPP Yogyakarta : Jl.Seturan Raya No.14, Catur Tunggal, Depok Sleman, Yogyakarta Telp.(0274) 486 287</div><br>===========================================================================<br>

Tanggal Transaksi : <input name="tanggal" class="form-control" value="<?  echo date("Y-m-d H:i:s");?>" type="text" disabled="disabled">
User : <input name="tanggal" class="form-control" value="<? echo $_SESSION[nama_login];?>" type="text" disabled="disabled" size="20">  <br><br>

<form action="submit_pembayaran_siswa.php">
<table border=0>
<tr><td>Jenis Pembayaran</td><td> :</td><td><input name="jenis" class="form-control" value="DAFTAR ULANG" type="text" readonly="readonly" size="20"> </td></tr>

<tr><td>Nominal</td><td> :</td><td><input class="form-control" value="<?  echo "Rp. ".number_format($daftarulang,2,',','.');?>" type="text"  name="nominal" readonly="readonly"></input></td></tr>
<tr><td>Uraian Transfer</td><td> :</td><td><input class="form-control" value="<? echo $tgldaftarulang;?>" type="text"  name="uraian_transfer" size="50" readonly="readonly"></input></td></tr>
<tr><td>Catatan</td><td> : </td><td><textarea cols="65" rows="4" name="catatan"><? echo $_GET[catatan]."Nomor Register anda : ".$_GET[id]; ?>. <? echo $keterangan_1;?></textarea></td></tr>
</table>
<br>===========================================================================<br>
<table width="100%" border=0>
<tr><td align="center">Kasir </td><td width="40%"></td><td  align="center">Penyetor</td></tr>
<tr><td> </td><td><br><br></td><td></td></tr>
<tr><td  align="center"><? echo $_SESSION[nama_login];?> </td><td></td><td  align="center"><? echo $_SESSION[temp_nama];?></td></tr>
</table></form>

</div>
</div>
			
			
  <button onclick="PrintDiv();">Cetak Kwitansi</button>


<? } elseif ($_GET[status]=="cetak_kwitansi"){?>
<button onclick="PrintDiv();">Cetak Kwitansi</button>
<div id="divToPrint" >
<div style="width:700;height:470;background-color:teal; padding-left:10; padding-right:10; padding-top:10; padding-bottom:10;">
	

<style>
input {border: none; background: #fff;}
textarea {border: none; background: #fff;}
</style>			
					   
			   
 <div class="header1" style="font-size:12px" > <h2> Kwitansi Daftar Ulang <? $query = mysql_query("SELECT nama,pembayaran_1,tgl_daftarulang,Keterangan_1 from siswa where siswa.id=$_GET[id]");   while($b=mysql_fetch_row($query)) { echo $b[0]; $daftarulang=$b[1]; $tgldaftarulang=$b[2]; $Keterangan_1=$b[3];}?></h2>  PSPP Lampung : Jl.Teuku Umar No 36C Kedaton Bandar Lampung 0721-772277<br>
 PSPP Jakarta : Aeropolis Residence Complex. Jl. Marsekal Suryadharma Neglasari Tangerang Banten. Telp. (021)-22251227<br>
 PSPP Yogyakarta : Jl.Seturan Raya No.14, Catur Tunggal, Depok Sleman, Yogyakarta Telp.(0274) 486 287</div><br>===========================================================================<br>

Tanggal Transaksi : <input name="tanggal" class="form-control" value="<?  echo date("Y-m-d H:i:s");?>" type="text" disabled="disabled">
User : <input name="tanggal" class="form-control" value="<? echo $_SESSION[nama_login];?>" type="text" disabled="disabled" size="20">  <br><br>

<form action="submit_pembayaran_siswa.php">
<table border=0>
<tr><td>Jenis Pembayaran</td><td> :</td><td><input name="jenis" class="form-control" value="DAFTAR ULANG" type="text" readonly="readonly" size="20"> </td></tr>

<tr><td>Nominal</td><td> :</td><td><input class="form-control" value="<?  echo "Rp. ".number_format($daftarulang,2,',','.');?>" type="text"  name="nominal" readonly="readonly"></input></td></tr>
<tr><td>Uraian Transfer</td><td> :</td><td><input class="form-control" value="<? echo $tgldaftarulang;?>" type="text"  name="uraian_transfer" size="50" readonly="readonly"></input></td></tr>
<tr><td>Catatan</td><td> : </td><td><textarea cols="65" rows="4" name="catatan" readonly="readonly"><? echo $_GET[catatan]."Nomor Register anda : ".$_GET[id]; ?>. <? echo $Keterangan_1;?></textarea></td></tr>
</table>
<br>===========================================================================<br>
<table width="100%" border=0>
<tr><td align="center">Admin </td><td width="40%"></td><td  align="center">Penyetor</td></tr>
<tr><td> </td><td><br><br></td><td></td></tr>
<tr><td  align="center"><? echo $_SESSION[nama_login];?> </td><td></td><td  align="center"><? echo $_SESSION[temp_nama];?></td></tr>
</table></form>

</div>
</div>
			
			
  <button onclick="PrintDiv();">Cetak Kwitansi</button>








<?}else{?><h2>DAFTAR ULANG GAGAL!</h2>Mohon maaf, data yang anda masukan <b>BELUM LENGKAP!</b><br> Silakan isi nominal pembayaran dan lengkapi tanggal serta nama pentransfer. Terima kasih
<? }?>

