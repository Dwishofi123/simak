<? session_start();
if ($_SESSION['idpendaftaran']==$_GET['id']){


include "konek.php";?>
<style>
.resizedimages {}
</style>
<div class="back_albums grid_8" > 

<div style="padding-left:62px;">

<script>
               
function CetakFormulir() {    
           var divToPrint = document.getElementById('cetakformulir');
           var popupWin = window.open('', '_blank', 'width=842,height=1000');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
</script>


<? 
$aidi=$_GET[id];
$query = mysql_query("select * from siswa where id=$aidi");	while($b=mysql_fetch_row($query)){ ?>
<input type="button" onClick=CetakFormulir(<? echo $_GET[id];?>) name="Submit" value="Cetak Formulir Pendaftaran" >

<div id="cetakformulir">
<center><h2><br><br>Formulir Pendaftaran <? echo $b[2];?></h2><br><br></center>
  <table width="600" border="0">
  <tr>
    <td width="204">Pilihan Jurusan </td>
    <td width="8">:</td>
    <td width="350"><? echo $b[10];?></td>
  </tr>
  <tr>
    <td>Pilihan Tempat Pendidikan </td>
    <td>:</td>
    <td><? echo $b[11];?></td>
  </tr>
</table>
  
  <p><strong>DATA DIRI </strong></p>
  <table width="600" border="0">
  <tr>
    <td width="204">Nama Lengkap </td>
    <td width="8">:</td>
    <td width="350"><? echo $b[2];?></td>
  </tr>
  <tr>
    <td>Nama Panggilan </td>
    <td>:</td>
    <td><? echo $b[51];?></td>
  </tr>
  <tr>
    <td>Agama</td>
    <td>:</td>
    <td><? echo $b[52];?></td>
  </tr>
  <tr>
    <td>Suku</td>
    <td>:</td>
    <td><? echo $b[53];?></td>
  </tr>
  <tr>
    <td>Jenis Kelamin </td>
    <td>:</td>
    <td><? echo $b[54];?></td>
  </tr>
  <tr>
    <td>Tempat &amp; Tanggal Lahir </td>
    <td>:</td>
    <td><? echo $b[55].", ".$b[85];?></td>
  </tr>
  <tr>
    <td>Usia</td>
    <td>:</td>
    <td><? echo $b[79];?></td>
  </tr>
  <tr>
    <td>Tinggi Badan </td>
    <td>&nbsp;</td>
    <td><? echo $b[63]?></td>
  </tr>
  <tr>
    <td>Berat Badan </td>
    <td>:</td>
    <td><? echo $b[69];?></td>
  </tr>
  <tr>
    <td>Hobi</td>
    <td>:</td>
    <td><? echo $b[56];?></td>
  </tr>
  <tr>
    <td>Golongan Darah </td>
    <td>:</td>
    <td><? echo $b[57];?></td>
  </tr>
  <tr>
    <td>Ukuran Sepatu </td>
    <td>:</td>
    <td><? echo $b[58];?></td>
  </tr>
  <tr>
    <td>Ukuran Baju / T- Shirt </td>
    <td>:</td>
    <td><? echo $b[59];?></td>
  </tr>
  <tr>
    <td>Sumber Informasi </td>
    <td>&nbsp;</td>
    <td>
      <? echo $b[64];?></td>
  </tr>
  <tr>
    <td>Motivasi Masuk PSPP </td>
    <td>:</td>
    <td><? echo $b[70];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<p><strong>INFORMASI KONTAK & TEMPAT TINGGAL </strong></p>
<table width="600" border="0">
  <tr>
    <td width="204">Alamat Lengkap </td>
    <td width="8">:</td>
    <td width="350"><? echo $b[3];?></td>
  </tr>
  <tr>
    <td>Telepon / Handphone </td>
    <td>:</td>
    <td><? $hp = substr("$b[4]", 0, -2); echo $hp."xx";?></td>
  </tr>  
  <tr>
    <td>Nama Ortu</td>
    <td>:</td>
    <td><? echo $b[82];?></td>
  </tr>
  <tr>
    <td>HP Ortu</td>
    <td>:</td>
    <td><? $hp = substr("$b[5]", 0, -2); echo $hp."xx";?></td>
  </tr>
  <tr>
    <td>Pekerjaan Ortu</td>
    <td>:</td>
    <td><? echo $b[83];?></td>
  </tr>
  <tr>
    <td>Alamat Ortu</td>
    <td>:</td>
    <td><? echo $b[84];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<p><strong>PENDIDIKAN</strong></p>
<table width="600" border="0">

  <tr>
    <td>Asal Sekolah / Universitas  </td>
    <td>:</td>
    <td><? echo $b[72];?></td>
  </tr>
  
  <tr>
    <td>Alamat Sekolah / Universitas</td>
    <td>&nbsp;</td>
    <td><? echo $b[73];?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p><strong><br><br><br><br><br><br> PENDIDIKAN FORMAL </strong></p>
<table width="600" border="0">
  <tr>
    <td width="204">Uraian</td>
    <td width="8">:</td>
    <td width="350"><? echo $b[74];?></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p><label></label>
</p>
<p>&nbsp;</p>
<p><strong>DATA DIRI (KUSRUS-KURSUS YANG PERNAH DIIKUTI) </strong></p>
<table width="600" border="0">
  <tr>
    <td width="204">Uraian</td>
    <td width="8">:</td>
    <td width="350"><? echo $b[75];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p><strong>INFOMASI TAMBAHAN</strong></p>
<table width="600" border="0">
  <tr>
    <td width="304">Email </td>
    <td width="8">:</td>
    <td width="350">{disembunyikan}</td>
  </tr>

  <tr>
    <td width="304">BBM Contact </td>
    <td width="8">:</td>
    <td width="350">{disembunyikan}</td>
  </tr>
  
    <tr>
    <td width="304"><strong>Nilai TES Online </strong></td>
    <td width="8">:</td>
    <td width="350"><strong><? echo $b[68];?>. Tanggal Tes Online : <? echo $b[8];?></strong></td>
  </tr>
  
    <tr>
    <td width="204">Foto</td>
    <td width="8">:</td>
    <td width="350"><a href="../../uploads/foto-<? echo $aidi;?>.jpg" target="_blank"><img src="../../uploads/foto-<? echo $aidi;?>.jpg" class="resizedimages" ></a></td>
  </tr>
   <tr>
    <td width="204">Foto Full Badan</td>
    <td width="8">:</td>
    <td width="350"><a href="../../uploads/foto-full-badan-<? echo $aidi;?>.jpg" target="_blank"><img src="../../uploads/foto-full-badan-<? echo $aidi;?>.jpg" class="resizedimages"></a></td>
  </tr>
   <tr>
    <td width="204">Surat Ket.Sehat</td>
    <td width="8">:</td>
    <td width="350"><a href="../../uploads/surat-<? echo $aidi;?>.jpg" target="_blank"><img src="../../uploads/surat-<? echo $aidi;?>.jpg" class="resizedimages"></a></td>
  </tr>
  
      <tr>
    <td width="204">Foto Cover Raport</td>
    <td width="8">:</td>
    <td width="350"><a href="../../uploads/cover-raport-<? echo $aidi;?>.jpg" target="_blank"><img src="../../uploads/cover-raport-<? echo $aidi;?>.jpg" class="resizedimages"></a></td>
  </tr>
</table>
</div><br><br><br><br>
<input type="button" onClick=CetakFormulir(<? echo $_GET[id];?>) name="Submit" value="Cetak Formulir Pendaftaran" >
<br><i>Khusus untuk calon pendaftar yang akan melakukan pendaftaran langsung ke kampus : <br>Mohon cetak dan bawa formulir pendaftaran ini ke kampus PSPP  untuk melakukan prosses pendaftaran selanjutnya. Terima kasih</i>
<?}?>

</div>
</div>
<?} else { echo "";}?>



