

<? session_start();
include "koneksi.php"; ?>
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
<div class="portlet-grid panel-primary" > 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Edit Profil</h3>
    		  </div> 
			  
			  <?php $sqpas = mysql_query("select * from profil_siswa where  ps_nodaf ='$_SESSION[ps_nodaf]'  ");
			  $tp = mysql_fetch_array($sqpas);
$n = 1;
	?>

 <div class="panel-body">
 <form action="simpan.php" method="POST" ENCTYPE="multipart/form-data">
 <table>
	<tr><td>Nama</td><td>:</td><td> <? echo $tp['ps_nama'];?></td></tr>
	<tr><td>Prodi</td><td>:</td><td> <? echo $tp['ps_prodi'];?></td></tr>
	<tr><td>Kampus</td><td>:</td><td> <? echo $tp['ps_kampus'];?></td></tr>
	<tr><td>Bio</td><td>:</td><td> <textarea type="text" name="bio" placeholder="Isikan Bio Anda Disini!" rows="4" cols="40"><? echo $tp['ps_bio'];?></textarea></td></tr>
	<tr><td> <button type="submit" name="simpan" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">Simpan</button></td><td></td><td>  <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" onClick='history.back();'>Batal</button></td></tr>
</table>	
</form>
 </div>
 </div>
			


