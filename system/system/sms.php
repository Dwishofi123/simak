<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek176.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<?php  $tgls=date("Y-m-d H:i:s");?>


<? if ($_GET[action]<>""){

		if ($_GET[action]=="kirimsingle"){
				//kirim single
				mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$_POST[nomor]','$_POST[pesan]','Kirim SMS Bebas Lewat SMS Online','Online')");
			    mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$_SESSION[nama_login] mengirim sms ke $_POST[nomor], $_POST[pesan]')");
		
				
				
							
			}elseif ($_GET[action]=="kirimkaryawan"){
			// kirim karyawan				
				$queryu = mysql_query("select hp from pegawai where unit='$_POST[kampuskr]' and hp<>''"); while($c=mysql_fetch_row($queryu)) { 
				mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$c[0]','$_POST[pesankaryawan]','Kirim SMS Broadcast Siswa SMS Online','Online')");}
				mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$_SESSION[nama_login] mengirim broadcast sms ke karyawan $_POST[kampuskr], $_POST[pesankaryawan]')");
				
			
			} elseif ($_GET[action]=="kirimsiswa"){
				// kirim siswa
				$pesansiswa=$_POST[pesansiswa];
				if ($_POST[statusps]=="Sudah Bekerja"){ $filterkerja=" and bekerja='Sudah Bekerja' ";} elseif ($_POST[statusps]=="Belum Bekerja"){ $filterkerja=" and bekerja<>'Sudah Bekerja' ";} else {$filterkerja="";}
				$queryu = mysql_query("select no_telp from siswa_aktif where jurusan='$_POST[jurusanps]' and tempat_kuliah='$_POST[kampusps]' $filterkerja and no_telp<>''"); while($c=mysql_fetch_row($queryu)) {
				mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$c[0]','$pesansiswa','Kirim SMS Broadcast Siswa SMS Online','Online')");}
				mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$_SESSION[nama_login] mengirim broadcast sms ke siswa di jurusan $_POST[jurusanps] $_POST[kampusps], $pesansiswa')");

			
			}elseif ($_GET[action]=="kirimortu"){
				
				// kirim ortu
				
				if ($_POST[statusor]=="Sudah Bekerja"){ $filterkerja=" and bekerja='Sudah Bekerja' ";} elseif ($_POST[statusor]=="Belum Bekerja"){ $filterkerja=" and bekerja<>'Sudah Bekerja' ";} else {$filterkerja="";}
				$queryu = mysql_query("select hp_ortu from siswa_aktif where jurusan='$_POST[jurusanor]' and tempat_kuliah='$_POST[kampusor]' $filterkerja and hp_ortu<>''"); while($c=mysql_fetch_row($queryu)) {
				mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$c[0]','$_POST[pesanortu]','Kirim SMS Broadcast Siswa SMS Online','Online')");}
				mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$_SESSION[nama_login] mengirim broadcast sms ke ortu siswa di jurusan $_POST[jurusanor] $_POST[kampusor], $_POST[pesanortu]')");
				
			}
		echo "SMS Sedang Dikirim.....<br><br><a href='sms.php'><< Kembali</a>"; }else{?>

<body onload=klik()>

<? if ($_GET[id]=="2"){?> <script> function klik() {document.getElementById("kliktab20").click();} </script> <?}?>
<? if ($_GET[id]=="3"){?> <script> function klik() {document.getElementById("kliktab21").click();} </script> <?}?>
<? if ($_GET[id]=="4"){?> <script> function klik() {document.getElementById("kliktab22").click();} </script> <?}?>

<link href=../../image/style.css rel=stylesheet type=text/css /> 
 

<div class="block nav-tabs-vertical"> <div class="head bg-default bg-light"> 
<h2>Kirim SMS </h2> 
</div> 

<div class="tabs"> 
<ul class="nav nav-tabs"> 
<li class="active"><a href="#tab19" data-toggle="tab">SMS Single</a></li> 
<li class=""><a href="#tab20" data-toggle="tab" id="kliktab20">SMS Siswa</a></li> 
<li class=""><a href="#tab21" data-toggle="tab" id="kliktab21">SMS Ortu</a></li> 
<li class=""><a href="#tab22" data-toggle="tab" id="kliktab22">SMS Karyawan</a></li> 

</ul> 

<div class="content tab-content"> 


<!-- KIRIM SMS SINGLE -->
<div class="tab-pane active" id="tab19"> <p>
<form action="sms.php?action=kirimsingle" method="POST" >
<h3><font color="yellow">Kirim SMS Single</font></h3>
<div class="col-md-10"><label>Nomor Tujuan:</label> </div> <input name="nomor"  type="text">
<div class="col-md-10"><label>Pesan:</label> </div> <textarea name="pesan" id="pesan"></textarea>
<br><br>Sebelum mengirim pesan pastikan anda sudah memasukkan nomor tujuan pada kolom yang tersedia!
&nbsp; &nbsp; <button type="submit" class="btn  btn-default" >Kirim </button>
</form>
</p> </div> 





<!-- KIRIM SMS BROADCAST KE SISWA -->
<div class="tab-pane" id="tab20"> <p>
<form action="sms.php?action=kirimsiswa" class="sms" method="POST" >
<h3><font color="yellow">Kirim Broadcast SMS ke Siswa</font></h3>
<div class="col-md-3"><label>Pilih Jurusan :</label></div> 
<select name="jurusanps" placeholder="Jurusan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Jurusan'">
<? $queryu = mysql_query("select distinct(Jurusan) from siswa_aktif"); while($c=mysql_fetch_row($queryu)) {?><option  <? if($b[10]==$c[0]){ echo "selected=selected";}?>><? echo $c[0];?></option><?}?>
</select>

<div class="col-md-3"><label>Pilih Kampus :</label> </div>
<select name="kampusps" >
<? $queryu = mysql_query("select distinct(Tempat_Kuliah) from siswa_aktif"); while($c=mysql_fetch_row($queryu)) {?><option  <? if($b[11]==$c[0]){ echo "selected=selected";}?>><? echo $c[0];?></option><?}?>
</select>
	  
<div class="col-md-3"><label>Status Bekerja :</label> </div>
<select name="statusps" >
<option>Belum Bekerja</option>
<option>Sudah Bekerja</option>
<option>Semua</option>
</select>

<div class="col-md-10"><label>Masukkan Pesan:</label> </div> <textarea name="pesansiswa" id="pesansiswa"></textarea>
<br><br>Hati-hati! Ini akan mengirim pesan ke semua siswa di kelas yang terpilih. Mohon periksa ulang pesan anda!<br>
&nbsp; &nbsp; <button   type=submit class="btn  btn-default" data-dismiss=modal>Kirim </button>
</form>
</p> 
</div> 




<!-- KIRIM SMS BROADCAST ORANG TUA -->
<div class="tab-pane" id="tab21"> <p>
<form action="sms.php?action=kirimortu" class="sms" method="POST" >
<h3><font color="yellow">Kirim Broadcast SMS ke Orang Tua</font></h3>
<div class="col-md-3"><label>Pilih Jurusan Peserta Pendidikan:</label></div> 
<select name="jurusanor" placeholder="Jurusan" class="input_field" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Jurusan'">
<? $queryu = mysql_query("select distinct(Jurusan) from siswa_aktif"); while($c=mysql_fetch_row($queryu)) {?><option  <? if($b[10]==$c[0]){ echo "selected=selected";}?>><? echo $c[0];?></option><?}?>
</select>

<div class="col-md-3"><label>Pilih Kampus Peserta Pendidikan:</label> </div>
<select name="kampusor" >
<? $queryu = mysql_query("select distinct(Tempat_Kuliah) from siswa_aktif"); while($c=mysql_fetch_row($queryu)) {?><option  <? if($b[11]==$c[0]){ echo "selected=selected";}?>><? echo $c[0];?></option><?}?>
</select>
	  
<div class="col-md-3"><label>Status Bekerja Peserta Pendidikan :</label> </div>
<select name="statusor" >
<option>Belum Bekerja</option>
<option>Sudah Bekerja</option>
<option>Semua</option>
</select>
<div class="col-md-10"><label>Masukkan Pesan:</label> </div> <textarea name="pesanortu" id="pesanortu"></textarea>
<br><br>Hati-hati! Ini akan mengirim pesan ke semua siswa di kelas yang terpilih. Mohon periksa ulang pesan anda!<br>
&nbsp; &nbsp; <button   type=submit class="btn  btn-default" data-dismiss=modal>Kirim </button>
</form>
</p> 
</p> </div> 




<!-- KIRIM SMS BROADCAST KARYAWAN -->
<div class="tab-pane" id="tab22"> <p>
<form action="sms.php?action=kirimkaryawan" class="sms" method="POST" >
<h3><font color="yellow">Kirim Broadcast SMS Karyawan</font></h3>
<div class="col-md-3"><label>Pilih Karyawan di Kampus :</label> </div>
<select name="kampuskr" >
<? $queryu = mysql_query("select distinct(unit) from pegawai"); while($c=mysql_fetch_row($queryu)) {?><option  <? if($b[11]==$c[0]){ echo "selected=selected";}?>><? echo $c[0];?></option><?}?>
</select>

<div class="col-md-10"><label>Masukkan Pesan:</label> </div> <textarea name="pesankaryawan" id="pesankaryawan" ></textarea>
<br><br>Hati-hati! Ini akan mengirim pesan ke semua karyawan di kampus terpilih. Mohon periksa ulang pesan anda!<br>
&nbsp; &nbsp; <button   type=submit class="btn  btn-default" data-dismiss=modal>Kirim </button>
</form>
</p> </div> 

</div> 
</div> </div>



 
<link href=../css/stylesheets.css rel=stylesheet type=text/css /> 
<script type=text/javascript src=../js/plugins/jquery/jquery.min.js></script>
<script type=text/javascript src=../js/plugins/jquery/jquery-ui.min.js></script> 

<script type=text/javascript src=../js/plugins/bootstrap/bootstrap.min.js></script> 

<script type=text/javascript src=../js/plugins/uniform/jquery.uniform.min.js></script> 


 
 
 </body>
 <?}?>