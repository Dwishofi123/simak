<? session_start();
include "system/system/konek.php";
if ($_GET[id]==""){ $aidi=$_SESSION[idpendaftaran]; } else {$aidi=$_GET[id];}
$query = mysql_query("SELECT jurusan,tempat_kuliah,status_seleksi,nama,tgl_test,catatan_surat_pengumuman FROM siswa where id='$aidi' ");
	while($b=mysql_fetch_row($query)){
?>
<script>
function PrintDiv13() {    
           var divToPrint = document.getElementById('divToPrint13');
           var popupWin = window.open('', '_blank', 'width=842,height=595');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
</script>--------------------------------------------------------------------------------------------------<br>

 <tr>
 <td class="welcome" valign="top" align="left">

<center><h2>Surat Hasil Tes Seleksi PSPP Penerbangan</h2></center><br><br>
<div id="divToPrint13">
No. 146/06/14/K/PSPP<br>
Hal : Pemberitahuan  <br><br>
Dengan hormat,<br><br>Berdasarkan penilaian dari hasil tes seleksi PSPP Penerbangan pada tanggal <?  echo $b[4]; ?> atas nama saudara/i <?  echo $b[3]; ?> dinyatakan :<br>
<center><strong><?  if ($b[2]=="Sudah Diterima"){$ket="Diterima";}else{$ket=$b[2];}  echo strtoupper($ket);?></strong></center><br>
Sebagai calon siswa-i baru <strong>PSPP (Pendidikan Staff Penerbangan dan Pramugari)</strong> - <? echo strtoupper($b[1]);?> untuk program pendidikan :<br>

<center><strong><? echo strtoupper($b[0]);?></strong></center>
<br>Dengan catatan : <?  echo $b[5]; ?>. Selanjutkan kami himbau agar saudara/i melaksanakan registrasi daftar ulang paling lambat 2 minggu setelah surat ini diterbitkan. Daftar ulang dilaksanakan dengan membayar biaya daftar ulang melalui <strong>transfer bank</strong> atau langsung di kampus <strong>PSPP (Pendidikan Staff Penerbangan dan Pramugari)</strong> terdekat. <br><Br>
<center>Sebelum perkuliahan dimulai, diharapkan untuk segera melengkapi persyaratan pendidikan dibawah ini :</center>
<table border="0" width="60%" style="font-size:10px;">
<tr><td>1.</td><td>Surat Keterangan Belum Menikah</td><td>10 Lembar</td></tr>
<tr><td>2.</td><td>Surat Keterangan Belum Menikah</td><td>10 Lembar</td></tr>
<tr><td>3.</td><td>Surat Keterangan Belum Menikah</td><td>10 Lembar</td></tr>
<tr><td>4.</td><td>Surat Keterangan Belum Menikah</td><td>10 Lembar</td></tr>
<tr><td>5.</td><td>Surat Keterangan Belum Menikah</td><td>10 Lembar</td></tr>
<tr><td>6.</td><td>Surat Keterangan Belum Menikah</td><td>10 Lembar</td></tr>
<tr><td>7.</td><td>Surat Keterangan Belum Menikah</td><td>10 Lembar</td></tr>
<tr><td>8.</td><td>Surat Keterangan Belum Menikah</td><td>10 Lembar</td></tr>
<tr><td>9.</td><td>Surat Keterangan Belum Menikah</td><td>10 Lembar</td></tr>
<tr><td>10.</td><td>Surat Keterangan Belum Menikah</td><td>10 Lembar</td></tr>
<tr><td>11.</td><td>Surat Keterangan Belum Menikah</td><td>10 Lembar</td></tr>
<tr><td>12.</td><td>Surat Keterangan Belum Menikah</td><td>10 Lembar</td></tr>
<tr><td>13.</td><td>Surat Keterangan Belum Menikah</td><td>10 Lembar</td></tr>
</table>
<br><i>Catatan : </i> 
Sehubungan dengan keterbatasan jumlah quota pendidikan, kami menghimbau saudara/i untuk segera melakukan <strong>Pendaftaran Ulang (Herregistrasi)</strong> secepatnya.<br><br>
Pembayaran pendaftaran ulang (Herregistrasi) dianggap sah jika dilakukan dengan cara :
<br>1. <strong>Transfer Bank</strong> ke Nomor Rekening dibawah ini :<br><br>

<table border="1"  width="80%">
<tr><td align=center>Nama Bank</td><td align=center>Nama Rekening</td><td align=center>Nomor Rekening</td></tr>
<tr><td align=center>BRI</td><td align=center>PSPP Penerbangan</td><td align=center>0098-01-002137-30-3</td></tr>
</table>
<br>
<i style="font-size:10px;">Setelah melakukan transfer ke nomor rekening diatas, harap langsung dikonfirmasikan ke kantor PSPP untuk dilakukan validasi dan harap bawa bukti transfer pada saat melakukan HERREGISTRASI/DAFTAR ULANG di kampus PSPP</i>
<br><br>PSPP tidak bertanggungjawab terhadap segala bentuk resiko transaksi yang dilakukan diluar ketentuan diatas. Demikian keterangan dari kami, harap dilaksanakan sesuai prosedur. Atas perhatiannya kami ucapkan terima kasih.


</div>
<br><br> <i><font color="red" size="2px">Bawa surat ini sebagai tanda bukti daftar ulang di kampus PSPP Penerbangan. Surat ini berlaku sebagai surat pengantar daftar ulang apabila status seleksi anda "DITERIMA". Terima kasih</font></i><div  class="form_pendaftaran"><input class="button" type="button"  value="Cetak Surat Hasil Tes Seleksi"  onclick="PrintDiv13();" ></input></div>
<br><br><br>--------------------------------------------------------------------------------------------------<br><br><br>
</td></tr>

<?}?>

