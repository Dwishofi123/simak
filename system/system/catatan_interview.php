<? session_start();?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<? include "konek.php";  $tanggal=date("Y-m-d H:i:s");  $tgls=date("Y-m-d H:i:s");?>


<? if ($_POST[catatan]<>""){
mysql_query("update siswa set catatan_interview='$_POST[catatan]',catatan_surat_pengumuman='$_POST[catatan_surat_pengumuman]' where id='$_GET[id]'");
mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$_SESSION[nama_login] mengubah/menginput data interview siswa : <br>$_POST[catatan] <br>Catatan : $_POST[catatan_surat_pengumuman] ')");
echo "<font color='red'><b>Data Hasil Interview Berhasil Disimpan!</b></font>";
}else{?>



<script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="../js/jquery.classyedit.js"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.classyedit.css" />


<script type="text/javascript">
function PrintDiv11() {    
           var divToPrint = document.getElementById('divToPrint11');
           var popupWin = window.open('', '_blank', 'width=842,height=595');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
</script>
 
<style> 
inputs:-webkit-input-placeholder { 
    color:    #b5b5b5; 
} 
 
inputs-moz-placeholder { 
    color:    #b5b5b5; 
} 
 
 .inputs  { 
 width:470px; 
padding: 5px 5px; 
font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 

font-size: 12px; 
color: #9D9E9E; 
text-shadow: 1px 1px 0 rgba(256, 256, 256, 1.0); 
background: #FFF; 
border: 1px solid #FFF; 
border-radius: 5px; 
box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
-moz-box-shadow: inset 0 1px 3px rgba(0,0,0,0.50); 
-webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
} 
.inputs:focus { 
   background: #DFE9EC; 
color: #414848; 
box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.25); 
-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
    outline:0; 
} 
  .inputs:hover   { 
background: #DFE9EC; 
color: #414848; 
} 
</style> 


 
  <script>
$(document).ready(function() {
$(".classy-editor").ClassyEdit();
 });
 </script> 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>





 
 

 <form action="catatan_interview.php?id=<? echo $_GET[id];?>&action=edit" method="post">
 <div class="modal-body clearfix" id="divToPrint11"> <div class="content controls"> 
 <div class="form-row"> <div class="col-md-3"><h2>Data Interview <? $query = mysql_query("SELECT nama,catatan_interview,hasil_tes_online,catatan_surat_pengumuman from siswa where id='$_GET[id]'"); while($b=mysql_fetch_row($query)) { echo $b[0]; $nama=$b[0]; $catatan=$b[1]; $nilai=$b[2]; $catatan_surat_pengumuman=$b[3];}?></h2></div>  </div> 
  <div class="form-row">   <div class="col-md-9"><textarea class="classy-editor" name="catatan" ><? if ($catatan<>""){echo $catatan;} else {  echo "Tanggal Interview : ".$tanggal."<br>Nama Siswa : ".$nama."<br>TTL/Usia :<br>Tinggi Badan :<br>Berat Badan :<br>Performance : Cukup / Baik<br>Dukungan Orang Tua : Ya / Tidak<br>Pengetahuan : Kurang / Cukup / Baik<br>Etika : Kurang / Cukup / Baik<br>Komunikasi : Kurang / Cukup / Baik<br>Kemampuan Khusus :<br>Diterima Program :<br>Dana Pendidikan : Dana Siap / Diusahakan<br>Speaking Ability : Middle / Good / Good Excelent<br>Communication Skills : Middle / Good / Good Excelent<br>Performance : Good Attitude / Modelling / Good Looking<br>Dijanjikan Kerja : Ya / Tidak<br>Nama Orang Tua :<br>Pekerjaan Ortu :<br>Jumlah Saudara Kandung :<br>HP Ortu :<br>Catatan lain :<br><br><b>PENGINTERVIEW : ".$_SESSION[nama_login]." </b><br><b>HASIL TES SELEKSI DITERIMA DI : ...........  </b><br><br>";} if ($catatan==""){ echo "<b>Hasil Tes Online : ".$nilai."</b>"; }?></textarea></div> </div>
  <div class="form-row"> Catatan Interview  <i style="font-size:11px;">(Catatan ini masuk di surat pengumuman hasil tes seleksi siswa)</i> <input type="text"  name="catatan_surat_pengumuman" style="background-color:orange; width:500px;" placeholder="Contoh : Wajib menambah tinggi badan dan mengikuti kursus bhs inggris" value="<? echo $catatan_surat_pengumuman;?>"></input> <div class="col-md-9"></div> </div>
  
 </div> </div> 

 
 <div class=modal-footer>  <button type=submit class="btn btn-success btn-clean">Simpan</button> <button type=button class="btn btn-success btn-clean" onClick=PrintDiv11()>Cetak</button></div> 
 
 </form>
 
<?}?>
 
 

