<? session_start();?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<? include "konek176.php";
  $tanggal=date("Y-m-d H:i:s"); $tgl=date("d/m/Y");
  $aidi=$_SESSION[id_login];
  $aidi_siswa=$_SESSION[temp_id];
  $nominal="Rp. ".number_format($_GET[nominal],2,',','.');
  $status="lanjut"; 
  
  if ($_GET[angsuran]=="Angsuran 1")
  {
	$query = mysql_query("select pembayaran_1 from siswa_aktif where id='$aidi_siswa'"); 
	while($b=mysql_fetch_row($query)) { if($b[0]>0)
	{  
		$status="batal"; ?>
		<script type="text/JavaScript">setTimeout(function () {   window.location.href = "kwitansi_pembayaran_siswa.php?nominal=<? echo $_GET[nominal];?>&uraian=<? echo $_GET[uraian_transfer];?>&no_ref=<? echo $_GET[no_ref];?>&pesan=Maaf,kolom Jenis Pembayaran <? echo $_GET[angsuran];?> sudah terisi. Silakan gunakan kolom angsuran yg lain!"; }, 1); </script><?
	}
	else
	{  
		mysql_query("update siswa_aktif set pembayaran_1='$_GET[nominal]',Keterangan_1='$_GET[uraian_transfer]',tgl_bayar_1='$tanggal' where id='$aidi_siswa'"); 
		mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$_SESSION[hp_marketing]','Hari ini $_SESSION[unit] memprosses pembayaran $_SESSION[temp_nama] $_GET[angsuran] sebesar $nominal. #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref]','Info Bayar Angsuran Siswa ke Marketing','Online')");
		mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] melakukan transaksi pembayaran $_GET[angsuran] atas nama $_SESSION[temp_nama] salah satu siswa dari $_SESSION[marketing] sebesar $nominal')");
		mysql_query("insert into pembayaran_log(tanggal,nama_siswa,angsuran,nominal,detil_transfer,no_ref,marketing,unit)value('$tgl','$_SESSION[temp_nama]','$_GET[angsuran]','$nominal','$_GET[uraian_transfer]','$_GET[no_ref]','$_SESSION[marketing]','$_SESSION[unit]')");
		mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tanggal','Hari ini $_SESSION[temp_nama] sebagai salah satu siswa dari $_SESSION[marketing] telah melakukan pembayaran $_GET[angsuran] sebesar $nominal dikampus $_SESSION[unit].','marketing')");}}
  }
  
  elseif ($_GET[angsuran]=="Angsuran 2"){
   $query = mysql_query("select pembayaran_2 from siswa_aktif where id='$aidi_siswa'"); while($b=mysql_fetch_row($query)) { if($b[0]>0){  $status="batal"; ?>
  <script type="text/JavaScript">setTimeout(function () {   window.location.href = "kwitansi_pembayaran_siswa.php?nominal=<? echo $_GET[nominal];?>&uraian=<? echo $_GET[uraian_transfer];?>&no_ref=<? echo $_GET[no_ref];?>&pesan=Maaf,kolom Jenis Pembayaran <? echo $_GET[angsuran];?> sudah terisi. Silakan gunakan kolom angsuran yg lain!"; }, 1); </script>
  <?}else{  mysql_query("update siswa_aktif set pembayaran_2='$_GET[nominal]',Keterangan_2='$_GET[uraian_transfer]',tgl_bayar_2='$tanggal' where id='$aidi_siswa'"); 
 mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$_SESSION[hp_marketing]','Hari ini $_SESSION[unit] memprosses pembayaran $_SESSION[temp_nama] $_GET[angsuran] sebesar $nominal. #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref]','Info Bayar Angsuran Siswa ke Marketing','Online')");
  mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] melakukan transaksi pembayaran $_GET[angsuran] atas nama $_SESSION[temp_nama] salah satu siswa dari $_SESSION[marketing] sebesar $nominal')");
    mysql_query("insert into pembayaran_log(tanggal,nama_siswa,angsuran,nominal,detil_transfer,no_ref,marketing,unit)value('$tgl','$_SESSION[temp_nama]','$_GET[angsuran]','$nominal','$_GET[uraian_transfer]','$_GET[no_ref]','$_SESSION[marketing]','$_SESSION[unit]')");
  mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tanggal','Hari ini $_SESSION[temp_nama] sebagai salah satu siswa dari $_SESSION[marketing] telah melakukan pembayaran $_GET[angsuran] sebesar $nominal dikampus $_SESSION[unit].','marketing')");}}}
  
 
  elseif ($_GET[angsuran]=="Angsuran 3"){
  $query = mysql_query("select pembayaran_3 from siswa_aktif where id='$aidi_siswa'"); while($b=mysql_fetch_row($query)) { if($b[0]>0){  $status="batal"; ?>
  <script type="text/JavaScript">setTimeout(function () {   window.location.href = "kwitansi_pembayaran_siswa.php?nominal=<? echo $_GET[nominal];?>&uraian=<? echo $_GET[uraian_transfer];?>&no_ref=<? echo $_GET[no_ref];?>&pesan=Maaf,kolom Jenis Pembayaran <? echo $_GET[angsuran];?> sudah terisi. Silakan gunakan kolom angsuran yg lain!"; }, 1); </script>
  <?}else{  mysql_query("update siswa_aktif set pembayaran_3='$_GET[nominal]',Keterangan_3='$_GET[uraian_transfer]',tgl_bayar_3='$tanggal' where id='$aidi_siswa'"); 
 mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$_SESSION[hp_marketing]','Hari ini $_SESSION[unit] memprosses pembayaran $_SESSION[temp_nama] $_GET[angsuran] sebesar $nominal. #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref]','Info Bayar Angsuran Siswa ke Marketing','Online')");
  mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] melakukan transaksi pembayaran $_GET[angsuran] atas nama $_SESSION[temp_nama] salah satu siswa dari $_SESSION[marketing] sebesar $nominal')");
    mysql_query("insert into pembayaran_log(tanggal,nama_siswa,angsuran,nominal,detil_transfer,no_ref,marketing,unit)value('$tgl','$_SESSION[temp_nama]','$_GET[angsuran]','$nominal','$_GET[uraian_transfer]','$_GET[no_ref]','$_SESSION[marketing]','$_SESSION[unit]')");
  mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tanggal','Hari ini $_SESSION[temp_nama] sebagai salah satu siswa dari $_SESSION[marketing] telah melakukan pembayaran $_GET[angsuran] sebesar $nominal dikampus $_SESSION[unit].','marketing')");}}}
  

  elseif ($_GET[angsuran]=="Angsuran 4"){
  $query = mysql_query("select pembayaran_4 from siswa_aktif where id='$aidi_siswa'"); while($b=mysql_fetch_row($query)) { if($b[0]>0){  $status="batal"; ?>
  <script type="text/JavaScript">setTimeout(function () {   window.location.href = "kwitansi_pembayaran_siswa.php?nominal=<? echo $_GET[nominal];?>&uraian=<? echo $_GET[uraian_transfer];?>&no_ref=<? echo $_GET[no_ref];?>&pesan=Maaf,kolom Jenis Pembayaran <? echo $_GET[angsuran];?> sudah terisi. Silakan gunakan kolom angsuran yg lain!"; }, 1); </script>
  <?}else{  mysql_query("update siswa_aktif set pembayaran_4='$_GET[nominal]',Keterangan_4='$_GET[uraian_transfer]',tgl_bayar_4='$tanggal' where id='$aidi_siswa'"); 
 mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$_SESSION[hp_marketing]','Hari ini $_SESSION[unit] memprosses pembayaran $_SESSION[temp_nama] $_GET[angsuran] sebesar $nominal. #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref]','Info Bayar Angsuran Siswa ke Marketing','Online')");
  mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] melakukan transaksi pembayaran $_GET[angsuran] atas nama $_SESSION[temp_nama] salah satu siswa dari $_SESSION[marketing] sebesar $nominal')");
    mysql_query("insert into pembayaran_log(tanggal,nama_siswa,angsuran,nominal,detil_transfer,no_ref,marketing,unit)value('$tgl','$_SESSION[temp_nama]','$_GET[angsuran]','$nominal','$_GET[uraian_transfer]','$_GET[no_ref]','$_SESSION[marketing]','$_SESSION[unit]')");
  mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tanggal','Hari ini $_SESSION[temp_nama] sebagai salah satu siswa dari $_SESSION[marketing] telah melakukan pembayaran $_GET[angsuran] sebesar $nominal dikampus $_SESSION[unit].','marketing')");}}}
  

  elseif ($_GET[angsuran]=="Angsuran 5"){
  $query = mysql_query("select pembayaran_5 from siswa_aktif where id='$aidi_siswa'"); while($b=mysql_fetch_row($query)) { if($b[0]>0){  $status="batal"; ?>
  <script type="text/JavaScript">setTimeout(function () {   window.location.href = "kwitansi_pembayaran_siswa.php?nominal=<? echo $_GET[nominal];?>&uraian=<? echo $_GET[uraian_transfer];?>&no_ref=<? echo $_GET[no_ref];?>&pesan=Maaf,kolom Jenis Pembayaran <? echo $_GET[angsuran];?> sudah terisi. Silakan gunakan kolom angsuran yg lain!"; }, 1); </script>
  <?}else{  mysql_query("update siswa_aktif set pembayaran_5='$_GET[nominal]',Keterangan_5='$_GET[uraian_transfer]',tgl_bayar_5='$tanggal' where id='$aidi_siswa'"); 
 mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$_SESSION[hp_marketing]','Hari ini $_SESSION[unit] memprosses pembayaran $_SESSION[temp_nama] $_GET[angsuran] sebesar $nominal. #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref]','Info Bayar Angsuran Siswa ke Marketing','Online')");
  mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] melakukan transaksi pembayaran $_GET[angsuran] atas nama $_SESSION[temp_nama] salah satu siswa dari $_SESSION[marketing] sebesar $nominal')");
    mysql_query("insert into pembayaran_log(tanggal,nama_siswa,angsuran,nominal,detil_transfer,no_ref,marketing,unit)value('$tgl','$_SESSION[temp_nama]','$_GET[angsuran]','$nominal','$_GET[uraian_transfer]','$_GET[no_ref]','$_SESSION[marketing]','$_SESSION[unit]')");
  mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tanggal','Hari ini $_SESSION[temp_nama] sebagai salah satu siswa dari $_SESSION[marketing] telah melakukan pembayaran $_GET[angsuran] sebesar $nominal dikampus $_SESSION[unit].','marketing')");}}}
  

  elseif ($_GET[angsuran]=="Angsuran 6"){
  $query = mysql_query("select pembayaran_6 from siswa_aktif where id='$aidi_siswa'"); while($b=mysql_fetch_row($query)) { if($b[0]>0){  $status="batal"; ?>
  <script type="text/JavaScript">setTimeout(function () {   window.location.href = "kwitansi_pembayaran_siswa.php?nominal=<? echo $_GET[nominal];?>&uraian=<? echo $_GET[uraian_transfer];?>&no_ref=<? echo $_GET[no_ref];?>&pesan=Maaf,kolom Jenis Pembayaran <? echo $_GET[angsuran];?> sudah terisi. Silakan gunakan kolom angsuran yg lain!"; }, 1); </script>
  <?}else{  mysql_query("update siswa_aktif set pembayaran_6='$_GET[nominal]',Keterangan_6='$_GET[uraian_transfer]',tgl_bayar_6='$tanggal' where id='$aidi_siswa'"); 
 mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$_SESSION[hp_marketing]','Hari ini $_SESSION[unit] memprosses pembayaran $_SESSION[temp_nama] $_GET[angsuran] sebesar $nominal. #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref]','Info Bayar Angsuran Siswa ke Marketing','Online')");
  mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] melakukan transaksi pembayaran $_GET[angsuran] atas nama $_SESSION[temp_nama] salah satu siswa dari $_SESSION[marketing] sebesar $nominal')");
    mysql_query("insert into pembayaran_log(tanggal,nama_siswa,angsuran,nominal,detil_transfer,no_ref,marketing,unit)value('$tgl','$_SESSION[temp_nama]','$_GET[angsuran]','$nominal','$_GET[uraian_transfer]','$_GET[no_ref]','$_SESSION[marketing]','$_SESSION[unit]')");
  mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tanggal','Hari ini $_SESSION[temp_nama] sebagai salah satu siswa dari $_SESSION[marketing] telah melakukan pembayaran $_GET[angsuran] sebesar $nominal dikampus $_SESSION[unit].','marketing')");}}}
  

  elseif ($_GET[angsuran]=="Angsuran 7"){
  $query = mysql_query("select pembayaran_7 from siswa_aktif where id='$aidi_siswa'"); while($b=mysql_fetch_row($query)) { if($b[0]>0){  $status="batal"; ?>
  <script type="text/JavaScript">setTimeout(function () {   window.location.href = "kwitansi_pembayaran_siswa.php?nominal=<? echo $_GET[nominal];?>&uraian=<? echo $_GET[uraian_transfer];?>&no_ref=<? echo $_GET[no_ref];?>&pesan=Maaf,kolom Jenis Pembayaran <? echo $_GET[angsuran];?> sudah terisi. Silakan gunakan kolom angsuran yg lain!"; }, 1); </script>
  <?}else{  mysql_query("update siswa_aktif set pembayaran_7='$_GET[nominal]',Keterangan_7='$_GET[uraian_transfer]',tgl_bayar_7='$tanggal' where id='$aidi_siswa'"); 
 mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$_SESSION[hp_marketing]','Hari ini $_SESSION[unit] memprosses pembayaran $_SESSION[temp_nama] $_GET[angsuran] sebesar $nominal. #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref]','Info Bayar Angsuran Siswa ke Marketing','Online')");
  mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] melakukan transaksi pembayaran $_GET[angsuran] atas nama $_SESSION[temp_nama] salah satu siswa dari $_SESSION[marketing] sebesar $nominal')");
    mysql_query("insert into pembayaran_log(tanggal,nama_siswa,angsuran,nominal,detil_transfer,no_ref,marketing,unit)value('$tgl','$_SESSION[temp_nama]','$_GET[angsuran]','$nominal','$_GET[uraian_transfer]','$_GET[no_ref]','$_SESSION[marketing]','$_SESSION[unit]')");
  mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tanggal','Hari ini $_SESSION[temp_nama] sebagai salah satu siswa dari $_SESSION[marketing] telah melakukan pembayaran $_GET[angsuran] sebesar $nominal dikampus $_SESSION[unit].','marketing')");}}}
  

  elseif ($_GET[angsuran]=="Angsuran 8"){
  $query = mysql_query("select pembayaran_8 from siswa_aktif where id='$aidi_siswa'"); while($b=mysql_fetch_row($query)) { if($b[0]>0){  $status="batal"; ?>
  <script type="text/JavaScript">setTimeout(function () {   window.location.href = "kwitansi_pembayaran_siswa.php?nominal=<? echo $_GET[nominal];?>&uraian=<? echo $_GET[uraian_transfer];?>&no_ref=<? echo $_GET[no_ref];?>&pesan=Maaf,kolom Jenis Pembayaran <? echo $_GET[angsuran];?> sudah terisi. Silakan gunakan kolom angsuran yg lain!"; }, 1); </script>
  <?}else{  mysql_query("update siswa_aktif set pembayaran_8='$_GET[nominal]',Keterangan_8='$_GET[uraian_transfer]',tgl_bayar_8='$tanggal' where id='$aidi_siswa'"); 
 mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$_SESSION[hp_marketing]','Hari ini $_SESSION[unit] memprosses pembayaran $_SESSION[temp_nama] $_GET[angsuran] sebesar $nominal. #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref]','Info Bayar Angsuran Siswa ke Marketing','Online')");
  mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] melakukan transaksi pembayaran $_GET[angsuran] atas nama $_SESSION[temp_nama] salah satu siswa dari $_SESSION[marketing] sebesar $nominal')");
    mysql_query("insert into pembayaran_log(tanggal,nama_siswa,angsuran,nominal,detil_transfer,no_ref,marketing,unit)value('$tgl','$_SESSION[temp_nama]','$_GET[angsuran]','$nominal','$_GET[uraian_transfer]','$_GET[no_ref]','$_SESSION[marketing]','$_SESSION[unit]')");
  mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tanggal','Hari ini $_SESSION[temp_nama] sebagai salah satu siswa dari $_SESSION[marketing] telah melakukan pembayaran $_GET[angsuran] sebesar $nominal dikampus $_SESSION[unit].','marketing')");}}}
  

  elseif ($_GET[angsuran]=="Angsuran 9"){
  $query = mysql_query("select pembayaran_9 from siswa_aktif where id='$aidi_siswa'"); while($b=mysql_fetch_row($query)) { if($b[0]>0){  $status="batal"; ?>
  <script type="text/JavaScript">setTimeout(function () {   window.location.href = "kwitansi_pembayaran_siswa.php?nominal=<? echo $_GET[nominal];?>&uraian=<? echo $_GET[uraian_transfer];?>&no_ref=<? echo $_GET[no_ref];?>&pesan=Maaf,kolom Jenis Pembayaran <? echo $_GET[angsuran];?> sudah terisi. Silakan gunakan kolom angsuran yg lain!"; }, 1); </script>
  <?}else{  mysql_query("update siswa_aktif set pembayaran_9='$_GET[nominal]',Keterangan_9='$_GET[uraian_transfer]',tgl_bayar_9='$tanggal' where id='$aidi_siswa'"); 
 mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$_SESSION[hp_marketing]','Hari ini $_SESSION[unit] memprosses pembayaran $_SESSION[temp_nama] $_GET[angsuran] sebesar $nominal. #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref]','Info Bayar Angsuran Siswa ke Marketing','Online')");
  mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] melakukan transaksi pembayaran $_GET[angsuran] atas nama $_SESSION[temp_nama] salah satu siswa dari $_SESSION[marketing] sebesar $nominal')");
    mysql_query("insert into pembayaran_log(tanggal,nama_siswa,angsuran,nominal,detil_transfer,no_ref,marketing,unit)value('$tgl','$_SESSION[temp_nama]','$_GET[angsuran]','$nominal','$_GET[uraian_transfer]','$_GET[no_ref]','$_SESSION[marketing]','$_SESSION[unit]')");
  mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tanggal','Hari ini $_SESSION[temp_nama] sebagai salah satu siswa dari $_SESSION[marketing] telah melakukan pembayaran $_GET[angsuran] sebesar $nominal dikampus $_SESSION[unit].','marketing')");}}}
  

  elseif ($_GET[angsuran]=="Angsuran 10"){
  $query = mysql_query("select pembayaran_10 from siswa_aktif where id='$aidi_siswa'"); while($b=mysql_fetch_row($query)) { if($b[0]>0){ $status="batal"; ?>
  <script type="text/JavaScript">setTimeout(function () {   window.location.href = "kwitansi_pembayaran_siswa.php?nominal=<? echo $_GET[nominal];?>&uraian=<? echo $_GET[uraian_transfer];?>&no_ref=<? echo $_GET[no_ref];?>&pesan=Maaf,kolom Jenis Pembayaran <? echo $_GET[angsuran];?> sudah terisi. Silakan gunakan kolom angsuran yg lain!"; }, 1); </script>
  <?}else{  mysql_query("update siswa_aktif set pembayaran_10='$_GET[nominal]',Keterangan_10='$_GET[uraian_transfer]',tgl_bayar_10='$tanggal' where id='$aidi_siswa'"); 
  mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$_SESSION[hp_marketing]','Hari ini $_SESSION[unit] memprosses pembayaran $_SESSION[temp_nama] $_GET[angsuran] sebesar $nominal. #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref]','Info Bayar Angsuran Siswa ke Marketing','Online')");
  mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] melakukan transaksi pembayaran $_GET[angsuran] atas nama $_SESSION[temp_nama] salah satu siswa dari $_SESSION[marketing] sebesar $nominal')");
    mysql_query("insert into pembayaran_log(tanggal,nama_siswa,angsuran,nominal,detil_transfer,no_ref,marketing,unit)value('$tgl','$_SESSION[temp_nama]','$_GET[angsuran]','$nominal','$_GET[uraian_transfer]','$_GET[no_ref]','$_SESSION[marketing]','$_SESSION[unit]')");
  mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tanggal','Hari ini $_SESSION[temp_nama] sebagai salah satu siswa dari $_SESSION[marketing] telah melakukan pembayaran $_GET[angsuran] sebesar $nominal dikampus $_SESSION[unit].','marketing')");}}}
  

  if ($status<>"batal"){
  $query = mysql_query("SELECT total_pembayaran from siswa_aktif where id='$aidi_siswa'"); while($b=mysql_fetch_row($query)) { 
  $total=$b[0]; 
  $hasil=$total+$_GET[nominal]; 
  mysql_query("update siswa_aktif set total_pembayaran=$hasil where id='$aidi_siswa'");}
  
  
// kirim sms ke pak iwan
$nominal=" Rp. " . number_format($_GET[nominal],2,',','.');
mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)value('087899371972','Hari ini $_SESSION[temp_nama] siswa dari $_SESSION[marketing] melakukan pembayaran $_GET[angsuran] $nominal dikampus $_SESSION[unit]. #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref]','Info Bayar Angsuran Siswa ke Nomor Khusus','Online')");

// kirim sms ke pak paulus ch
mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)value('087809885054','Hari ini $_SESSION[temp_nama] siswa dari $_SESSION[marketing] melakukan pembayaran $_GET[angsuran] $nominal dikampus $_SESSION[unit]. #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref]','Info Bayar Angsuran Siswa ke Nomor Khusus','Online')");

// kirim sms ke marketing
//mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)value('$_SESSION[hp_marketing]','Pembayaran $_SESSION[temp_nama] $nominal #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref] sedang kami prosses. Terima kasih. Info:www.pspp-integrated.com/login','Info Bayar Angsuran Siswa ke Marketing','Online')");
//}

// kirim sms ke hp ortu
mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)value('$_SESSION[temp_hp_ortu]','Pembayaran $_SESSION[temp_nama] $nominal #TRANSFERCODE: $_GET[uraian_transfer]/No.Ref=$_GET[no_ref] sedang kami prosses. Terima kasih. INFO PSPP PENERBANGAN','Info Bayar Angsuran Siswa ke Ortu','Online')");
}

?>

 <script type="text/javascript">
function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=700,height=500');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
</script>


Data berhasil disimpan! Berikut kwitansi pembayarannya.<button onclick="PrintDiv();">Cetak Kwitansi</button>
<div id="divToPrint" >
<div style="width:700;height:470;background-color:teal; padding-left:10; padding-right:10; padding-top:10; padding-bottom:10;">
			   
<style>
input {border: none; background: #fff;}
textarea {border: none; background: #fff;}
</style>		   
			   
			   
 <div class="header1" style="font-size:10px" > <h2> Tanda Terima Slip Pembayaran </h2>  
 PSPP Lampung : Jl.Teuku Umar No 36C Kedaton Bandar Lampung (0721)772277<br>
 PSPP Jakarta : Jl. Marsekal Suryadharma Neglasari Tangerang Banten.(021)2225 1227 <br>
 PSPP Yogyakarta : Jl.Seturan Raya No.14, Catur Tunggal, Depok Sleman, Yogyakarta(0274)486287<br>
 PSPP Makassar : Blok B2 Jl. Perintis Kemerdekaan Km 15, Biringkanaya, Makassar.(0411)4727272</div>
 ===========================================================================<br>

Tanggal Transaksi : <input name="tanggal" class="form-control" value="<?  echo date("Y-m-d H:i:s");?>" type="text" disabled="disabled">
User : <input name="tanggal" class="form-control" value="<? echo $_SESSION[nama_login];?>" type="text" disabled="disabled" size="20"> <br>

<form action="submit_pembayaran_siswa.php">
<table border=0>
<tr><td>Nama</td><td> :</td><td><input name="nama" class="form-control" value="<? echo $_SESSION[temp_nama]; ?>" type="text" readonly="readonly" size="20"> </td></tr>
<tr><td>Jenis Bayar</td><td> :</td><td><input name="jenis" class="form-control" value="<? echo $_GET[angsuran];?>" type="text" readonly="readonly" size="20"> </td></tr>
<tr><td>Nominal</td><td> :</td><td><? $nominal="Rp. " . number_format($_GET[nominal],2,',','.'); echo $nominal." / "; echo $_GET[uraian_transfer]; if ($_GET[no_ref]==""){echo "-";}else{echo $_GET[no_ref];} ?></td></tr>

<tr><td>Catatan</td><td> : </td><td><textarea cols="75" rows="3" name="catatan"><? echo $_GET[catatan];?></textarea></td></tr>
</table>
===========================================================================<br>
<table width="100%">
<tr width="20%"><td></td><td align="center">Admin </td><td width="20%"></td><td  align="center">Penyetor</td></tr>
<tr><td><br><br></td><td> </td><td></td><td></td></tr>
<tr><td></td><td  align="center"><? echo $_SESSION[nama_login];?> </td><td></td><td  align="center"><? echo $_SESSION[temp_nama];?></td></tr>
</table></form>

</div>
</div>
			
			
  <button onclick="PrintDiv();">Cetak Kwitansi</button>