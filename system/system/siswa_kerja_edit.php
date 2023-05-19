<div style="visibility:hidden; height:0px;"><? session_start();?></div>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "konek.php";?>
 <? include "pikachu.php";?>
 <script type=text/javascript src=../js/plugins/jquery/jquery.min.js></script>
 <link href=../css/stylesheets.css rel=stylesheet type=text/css /> 

<br><br>
 <div class=col-md-12>
 
 <? if ($_GET[simpan]=="true") {
 mysql_query("update profil_siswa set ps_kerja='$_POST[status] / $_POST[signkontrak] / $_POST[tempatkerja] / $_POST[catatan_kerja]' where ps_no='$_GET[id]'");
 
  mysql_query("insert into log_siswa_kerja(nama,tgl_signkontrak,tempat_bekerja)values('$_GET[nama]','$_POST[signkontrak]','$_POST[tempatkerja]')");
  
 echo "<br><br>Data <strong>$_GET[nama]</strong> telah diubah dengan status <strong>$_POST[status] $_POST[tempatkerja] di $_POST[tempatkerja]</strong>. <br>Informasi ini juga tersebarkan melalui aplikasi PSPP Mobile for Android. Terima kasih";
 
 }else{ 
 
 $query = mysql_query("SELECT ps_nama,ps_kerja from profil_siswa where ps_no=$_GET[id]"); while($b=mysql_fetch_row($query)) {
 $kerja=explode("/",$b[1]);?>
<div class="block"> 
<div class="header"> <h2><? echo $b[0]; $nama=$b[0]; ?></h2> </div> 
<div class="content controls"> 
 <form action="siswa_kerja_edit.php?id=<? echo $_GET[id];?>&nama=<? echo $nama;?>&simpan=true" method="POST">
<div class="form-row"> 

<div class="col-md-3">Status Bekerja :</div> 
<div class="col-md-9">
<select class="form-control" name=status id=status> 
<option><? echo $kerja[0];?></option> 
 <option>SUDAH BEKERJA</option> 
 <option>BELUM BEKERJA</option>
 </select></div>
 <div class="col-md-3"><label>Tanggal Sign Kontrak :</label></div> <input value="<? echo $kerja[1];?>" name="signkontrak" placeholder="" onfocus="this.placeholder = '' " onblur="this.placeholder = ''" type="text"></input><br>
 <div class="col-md-3"><label>Tempat Bekerja :</label></div> <input value="<? echo $kerja[2];?>" name="tempatkerja" placeholder="" onfocus="this.placeholder = '' " onblur="this.placeholder = ''" type="text"></input><br>
<div class="col-md-3"><label>Catatan:</label> </div><textarea name="catatan_kerja" placeholder=""  onfocus="this.placeholder = '' " onblur="this.placeholder = ''"><? echo $kerja[3];?></textarea>
 

&nbsp; &nbsp; <button   type=submit class="btn  btn-default" data-dismiss=modal>Simpan </button>
<div><br><br></div></form>
<? }?>
</div>
</div>




 </div> </div>
 
 <?}?>
 </div>