<? session_start();
if (!isset($_SESSION[ps_nodaf])){?> <script> window.location='login.php'; </script><?}?>
<?php include "koneksi.php"; ?>

<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
 
<div class="climate">
<div class="col-md-4 climate-grids">
		<div class="climate-grid2">
			<span class="shoppy-rate"><h5><font color=white>Kata Motivasi</font></h5></span><br>Ini kataku, mana katamu..??
			
		</div>

		 <div class="panel-body">
		<?php  $bts = 50; $aa = mysql_query("select * from motivasi where pub = 'true' order by id desc limit $bts  "); $a=0;
		while ($tampilkan = mysql_fetch_array($aa)){ $a=$a+1; ?> <?php echo "#".$a.". ".$tampilkan['isi_teks'];?> Kiriman by :  <?php echo $tampilkan['dikirim_oleh'];?> <br><br>
		
		<?php	if  ($tampilkan['gambar'] == ""){
													
												}else { ?> <div class="gambarku"> <?php
												$gambarnya="images/".$tampilkan['gambar'];
												echo "<img src=\"$gambarnya\"   alt=''>"; ?> </div> <?php } ;?>
<?php }?>
		</div>

		
</div>
</div>

<div class="panel-body">
Kirimkan pesan motivasi anda melalui form dibawah ini:<br>
<form action="simpan_motivasi.php" method="POST""> <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
Isi pesan motivasi : <br>
<textarea type="text" name="pesan" cols="40" rows="4" class="mdl-textfield__input"></textarea><br>
<input type="submit" value="SUBMIT" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary left"></input>
</form><br><br>
</div>

