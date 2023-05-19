<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? 
if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>

<? $aidi=$_SESSION['id_login'];  ?>

<div class="row"> <div class="col-md-5"> 



<script>
function SettingPSB(){
var tahun=document.getElementById("tahun").value;
var biaya=document.getElementById("biaya").value;
var reg_format=document.getElementById("reg_format").value;
$.colorbox({iframe:true, width:"40%", height:"25%", href: "system/submit_setting_psb.php?tahun="+tahun+"&biaya="+biaya+"&reg_format="+reg_format});}

</script>


<form action="#" method="post">
<div class="block block-drop-shadow">
 <div class="header"> <h2>Pengaturan Sistem PSB Aktif</h2> </div> 
 <div class="content controls"> 
 <div class="form-row">  <div class="col-md-3">Sistem PSB Aktif</div> <div class="col-md-8">
		 <select class="form-control" id="tahun"> 
			<?  include "konek.php";
			    $query = mysql_query("select * from config");while($b=mysql_fetch_row($query)){ $biaya=$b[3]; $psb_aktif=$b[1]; $reg_format=$b[4];}
				$query = mysql_query("select distinct(jurusan) from siswa where jurusan<>''");while($b=mysql_fetch_row($query)){ ?> 
				<option <? if ($psb_aktif==$b[0]){ echo "selected=selected";}?>><? echo $b[0]?></option><? }?>
				
		 </select>
 
</div> </div> 
 <div class="form-row">  <div class="col-md-3">Biaya Pendaftaran </div> <div class="col-md-5"><input class="form-control"  type="text" id="biaya" value="<? echo $biaya;?>"> </div> </div>
 <div class="form-row">  <div class="col-md-3">Format No.Regst </div> <div class="col-md-5"><input class="form-control"  type="text" id="reg_format" value="<? echo $reg_format;?>"> </div> </div>

 </div>
 <div class="footer tar">
 <button class="btn btn-default btn-clean" type=button onClick=SettingPSB() >Simpan</button></div> </div> 
 </form>
 
 
 
 </div> </div>