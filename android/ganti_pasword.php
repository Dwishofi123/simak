

<? session_start();
include "koneksi.php"; ?>
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
<div class="portlet-grid panel-primary" > 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Ubah Password</h3>
    		  </div> 
			  
			  <?php $sqpas = mysql_query("select * from profil_siswa where  ps_nodaf ='$_SESSION[ps_nodaf]'  ");
			  $tp = mysql_fetch_array($sqpas);
$n = 1;
	?>

 <div class="panel-body">
 <form action="" method="POST" ENCTYPE="multipart/form-data">
 <table>
	<tr><td>Nama</td><td>:</td><td> <? echo $tp['ps_nama'];?></td></tr>
	<tr><td>Prodi</td><td>:</td><td> <? echo $tp['ps_prodi'];?></td></tr>
	<tr><td>Kampus</td><td>:</td><td> <? echo $tp['ps_kampus'];?></td></tr>
	<tr><td></td><td></td><td> <br></td></tr>
	<tr><td>Username Baru </td><td>:</td><td> <input type="text" id="uname" name="uname"></input></td></tr>
	<tr><td>Password Baru </td><td>:</td><td> <input type="text" id="pwd" name="pwd"></input></td></tr>
	<tr><td></td><td></td><td> <br></td></tr>
	<tr><td> <button type="submit" name="simpan" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">Simpan</button></td><td></td><td>  <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" onClick='history.back();'>Batal</button></td></tr>
</table>	
</form>
 
 <? if ($_POST[uname]<>'' && $_POST[pwd]<>''){
mysql_query("update profil_siswa set ps_uname='$_POST[uname]', ps_pass='$_POST[pwd]' where  ps_nodaf ='$_SESSION[ps_nodaf]'");
echo "<font color='red'><h3>Selamat.. </h3>Username dan password anda berhasil diganti sbb :<br>
 <strong>USERNAME : $_POST[uname]</strong><br>
 <strong>PASSWORD : $_POST[pwd]</strong><br>Mohon simpan username dan pasword anda untuk digunakan sebagai akses login di lain waktu.</font>";
}?>

 </div>
 </div>
 

			


